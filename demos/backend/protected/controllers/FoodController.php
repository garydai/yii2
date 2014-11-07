<?php

class FoodController extends AdminController
{
	public $layout='column1';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}


        public function actionIndex()
        {


	//	header("Content-Type: text/html;charset=utf-8"); 
		//$model = new Route;
		$port = Port::model()->findAll();
		$food = Food::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('port'=>$port, 'food'=>$food));
	
        }
	

        public function actionModify()
        {
                $food_id =  intval($_GET['food_id']) ? intval($_GET['food_id']) : '';
                if(!$food_id) exit();

                $food = Food::model()->find('id=:id', array(':id'=>$food_id));
                if(!$food) exit();
		
		$port = Port::model()->findAll();
		
                $this->render('modify',array('port'=>$port, 'food'=>$food));

        }


        public function actionAdd()
        {

		$port = Port::model()->findAll();
                $this->render('add', array('port'=>$port));

        }


        public function actionSave_food()
        {
                Food::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'port'=>$_POST['port'], 'content'=>$_POST['content']));
		echo 1;

        }



        public function actionAdd_food()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $food = new Food;
                        $food->title = $_POST['title'];
                        $food->content = $_POST['content'];
			$food->port = $_POST['port'];
                        $food->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $food_id =  intval($_GET['food_id']) ? intval($_GET['food_id']) : '';
                if(!$food_id) exit();
		Food::model()->deleteByPk($food_id);
                $this->redirect(Yii::app()->request->urlReferrer);

        }



        public function actionSearch()
        {

                $keyword = $_POST['keywords'];
                $port    = $_POST['port'];
                $str = '';



		echo header("Content-Type: text/html;charset=utf-8");

                $model = NULL;

                if($keyword)
                {
                        $str = 'title like '.'"'.'%'.$keyword.'%'.'"';
                }
                if($port)
                {
                        if($str != '')
                                $str.=' and ';
                        $str.=' port ='.'"'.$port.'"';
                }
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = $str; // 设置查询条件
                $model = Food::model()->findAll($criteria);

                $port  = Port::model()->findAll();


                $this->render('index', array('food'=>$model, 'port'=>$port));
        }


        public function actionRemove_selected()
        {


                if($_GET['food_id'] != '')
                {
                        $food_id = explode(',', $_GET['food_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Food::model()->deleteByPk($food_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
        }


        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Food::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='title like '.'"%'.$_POST['searchPhrase'].'%" or  port like '.'"%'.$_POST['searchPhrase'].'%"';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['title']))
                {
                         $criteria->order = "title {$_POST['sort']['title']} ";
                }
                else if(isset($_POST['sort']['port']))
                {

                         $criteria->order = "port {$_POST['sort']['port']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Food::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'title'=>$o->title, 'port'=>$o->port);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }





	

}
