<?php

class DiaryController extends AdminController
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
		$boat = Boat::model()->findAll();
		$diary = Diary::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('boat'=>$boat, 'diary'=>$diary));
	
        }
	


        public function actionModify()
        {
                $diary_id =  intval($_GET['diary_id']) ? intval($_GET['diary_id']) : '';
                if(!$diary_id) exit();

                $diary = Diary::model()->find('id=:id', array(':id'=>$diary_id));
                if(!$diary) exit();
		
		$boat = Boat::model()->findAll();
		
                $this->render('modify',array('diary'=>$diary, 'boat'=>$boat));

        }


        public function actionAdd()
        {

		$boat = Boat::model()->findAll();
                $this->render('add', array('boat'=>$boat));

        }


        public function actionSave_diary()
        {
                Diary::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'boat'=>$_POST['boat'], 'content'=>$_POST['content']));
		echo 1;

        }



        public function actionAdd_diary()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $diary = new Diary;
                        $diary->title = $_POST['title'];
                        $diary->content = $_POST['content'];
			$diary->boat = $_POST['boat'];
                        $diary->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $diary_id =  intval($_GET['diary_id']) ? intval($_GET['diary_id']) : '';
                if(!$diary_id) exit();
		Diary::model()->deleteByPk($diary_id);
                //$this->actionIndex();

                //$this->redirect(Yii::app()->request->urlReferrer);

        }


       public function actionRemove_selected()
        {


                if($_GET['diary_id'] != '')
                {
                        $diary_id = explode(',', $_GET['diary_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Diary::model()->deleteByPk($diary_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
        }



        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Diary::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='title like '.'"%'.$_POST['searchPhrase'].'%" or  boat like '.'"%'.$_POST['searchPhrase'].'%" or company like '.'"%'.$_POST['searchPhrase'].'%"';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['title']))
                {
                         $criteria->order = "style {$_POST['sort']['title']} ";
                }
                else if(isset($_POST['sort']['boat']))
                {

                         $criteria->order = "boat {$_POST['sort']['boat']} ";
                }
                else if(isset($_POST['sort']['company']))
                {

                         $criteria->order = "company {$_POST['sort']['company']}' ";
                }
        //      var_dump($criteria);
                //$criteria->condition= ;
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Diary::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'title'=>$o->title, 'boat'=>$o->boat, 'company'=>$o->company);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }






        public function actionSearch()
        {

                $keyword = $_POST['keywords'];
                $boat    = $_POST['boat'];
                $str = '';



		echo header("Content-Type: text/html;charset=utf-8");

                $model = NULL;

                if($keyword)
                {
                        $str = 'boat like '.'"'.'%'.$keyword.'%'.'"';
                }
                if($boat)
                {
                        if($str != '')
                                $str.=' and ';
                        $str.=' boat ='.'"'.$boat.'"';
                }
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = $str; // 设置查询条件
                $model = Diary::model()->findAll($criteria);

                $boat  = Boat::model()->findAll();


                $this->render('index', array('diary'=>$model, 'boat'=>$boat));
        }


	

}
