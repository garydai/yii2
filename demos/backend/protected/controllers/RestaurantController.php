<?php

class RestaurantController extends AdminController
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
		$restaurant = Restaurant::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('restaurant'=>$restaurant ));
	
        }
	

        public function actionModify()
        {
                $restaurant_id =  intval($_GET['restaurant_id']) ? intval($_GET['restaurant_id']) : '';
                if(!$restaurant_id) exit();

                $restaurant = Restaurant::model()->find('id=:id', array(':id'=>$restaurant_id));
                if(!$restaurant) exit();
		
		$company = Company::model()->findAll();
		$boat = Boat::model()->findAll();
		
                $this->render('modify',array('boat'=>$boat, 'restaurant'=>$restaurant, 'company'=>$company));

        }


        public function actionAdd()
        {

		$company = Company::model()->findAll();
		$boat    = Boat::model()->findAll();
                $this->render('add', array('company'=>$company, 'boat'=>$boat));

        }


        public function actionSave_restaurant()
        {


		$source = '';
		$thumb = '';
		if(isset($_POST['source']))
		{
			$source = $_POST['source'];
		}
		if(isset($_POST['thumb']))
		{
			$thumb = $_POST['thumb'];
		}
                Restaurant::model()->updateByPk($_POST['id'], array('style'=>$_POST['style'], 'content'=>$_POST['content'], 
			'company'=>$_POST['company'], 'source'=>$source, 'thumb'=>$thumb, 'boat'=>$_POST['boat']));
		echo 1;

        }



        public function actionAdd_restaurant()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $restaurant = new Restaurant;
                        $restaurant->style = $_POST['style'];
                        $restaurant->content = $_POST['content'];
			$restaurant->company = $_POST['company'];
			if(isset($_POST['source']))
				$restaurant->source = $_POST['source'];
			if(isset($_POST['thumb']))
				$restaurant->thumb = $_POST['thumb'];
			$restaurant->boat = $_POST['boat'];

                        $restaurant->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $restaurant_id =  intval($_GET['restaurant_id']) ? intval($_GET['restaurant_id']) : '';
                if(!$restaurant_id) exit();
		$Restaurant::model()->deleteByPk($restaurant_id);
                $this->redirect(Yii::app()->request->urlReferrer);

        }

        public function actionRemove_selected()
        {


		if($_GET['restaurant_id'] != '')
		{
                	$restaurant_id = explode(',', $_GET['restaurant_id']);
			var_dump($restaurant_id);
                	//$restaurant = Restaurant::model()->findByPk($restaurant_id); // assuming there is a post whose ID is 10
                	Restaurant::model()->deleteByPk($restaurant_id);

                	//$this->redirect(Yii::app()->request->urlReferrer);
		}
        }


	public function actionSelect_boat()
	{

		$company =  $_POST['company'];
		
                if(!$company) exit();

		$criteria = new CDbCriteria; // 创建CDbCriteria对象

		$criteria->select='name';
                $criteria->condition = 'company = "'.$company.'"'; // 设置查询条件
                $model = Boat::model()->findAll($criteria);
		$ret = '';
		foreach($model as $value)
		{
			$ret .= '<option>'.$value->name.'</option>';
		}

		echo CJSON::encode(array('option'=>$ret));

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
                $model = Restaurant::model()->findAll($criteria);

                $port  = Port::model()->findAll();


                $this->render('index', array('restaurant'=>$model, 'port'=>$port));
        }


	public function actionData()
	{
		var_dump($_POST);
	}
	public function actionGet_data()
	{
	//	var_dump($_POST);
		$count = Restaurant::model()->count();	
		$criteria = new CDbCriteria;
		if($_POST['searchPhrase'] !='')
		{
			$criteria->condition='style like '.'"%'.$_POST['searchPhrase'].'%" or  boat like '.'"%'.$_POST['searchPhrase'].'%" or company like '.'"%'.$_POST['searchPhrase'].'%"';
		}
		if(isset($_POST['sort']['id'] ))
		{
			
			$criteria->order = " id  {$_POST['sort']['id']} ";
		}
		else if(isset($_POST['sort']['style']))
		{			
			 $criteria->order = "style {$_POST['sort']['style']} ";
		}
		else if(isset($_POST['sort']['boat']))
		{

			 $criteria->order = "boat {$_POST['sort']['boat']} ";
		}
		else if(isset($_POST['sort']['company']))
		{

			 $criteria->order = "company {$_POST['sort']['company']}' ";
		}
	//	var_dump($criteria);
		//$criteria->condition= ;
		$criteria->limit = $_POST['rowCount'];
		$criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];
	
		$model = Restaurant::model()->findAll($criteria);
	//	var_dump($model);
		$arr = array();
		foreach($model as $o)
		{
			$json = array('id'=>intval($o->id), 'style'=>$o->style, 'boat'=>$o->boat, 'company'=>$o->company);
			array_push($arr, $json);
		
		}
	//	var_dump( $arr);	
		echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));
			
	}	

}
