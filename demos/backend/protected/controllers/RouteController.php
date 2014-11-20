<?php

class RouteController extends AdminController
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



	public function actionSearch()
	{

		$keyword = $_GET['keywords'];
		$boat    = $_GET['boat'];
		$area = $_GET['area'];
		$str = '';
		$model = NULL;
		
		if($keyword)
		{
			$str = 'name like '.'"'.'%'.$keyword.'%'.'"';
		}
		if($boat )
		{
			if($str != '')
				$str.=' and ';
			$str.=' boat ='.'"'.$boat.'"';
		}
		if($area )
		{
			if($str != '')
				$str.=' and ';
			$str.= '  area =" '.$area.'"';
		}
	//	echo $str;
	        $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = $str; // 设置查询条件
                $model = Route::model()->findAll($criteria);
		
 		$boat  = Boat::model()->findAll();
                $area  = Area::model()->findAll();
		
		
		$this->render('index', array('route'=>$model, 'boat'=>$boat, 'area'=>$area));
	}
        public function actionIndex()
        {


	//	header("Content-Type: text/html;charset=utf-8"); 
		//$model = new Route;
		//$route = Route::model()->findAll();
		//$boat  = Boat::model()->findAll();
		//$area  = Area::model()->findAll();
//		echo 1;
              //  $model=new ContactForm;
               // if(isset($_POST['ContactForm']))
                //{
                  //      $model->attributes=$_POST['ContactForm'];
                    //    if($model->validate())
                      //  {
                        //        $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                          //      mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                            //    Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                              //  $this->refresh();
                        //}
                //}
                $this->render('index');

	
        }
	
	public function actionSchedule()
	{
		$routeId =  intval($_GET['routeId']) ? intval($_GET['routeId']) : '';
		if(!$routeId) exit();
		
		$route = Route::model()->find('id=:id', array(':id'=>$routeId));
		if(!$routeId) exit();
		$scheduleId = $route->schedule;
		$arr = explode(',', $scheduleId);
		$str = str_replace(',', ' or id = ', $scheduleId);
		//echo $str;
		$criteria = new CDbCriteria; // 创建CDbCriteria对象
		$criteria->condition = 'id = ' .$str; // 设置查询条件
	//	echo $criteria->condition;
		$model = Schedule::model()->findAll($criteria);
		
		$this->render('schedule',array('model'=>$model, 'days'=>$route->days, 'routeId'=>$route->id));
	
	//	echo $model[0]->title;

	
	}
	
	public function actionModify()
	{

                $routeId =  intval($_GET['route_id']) ? intval($_GET['route_id']) : '';
                if(!$routeId) exit();

                $route = Route::model()->find('id=:id', array(':id'=>$routeId));
                if(!$route) exit();
                $scheduleId = $route->schedule;
                $arr = explode(',', $scheduleId);
                $str = str_replace(',', ' or id = ', $scheduleId);
                //echo $str;
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = 'id = ' .$str; // 设置查询条件
               // echo $criteria->condition;
                $model = Schedule::model()->findAll($criteria);


		$boat = Boat::model()->findAll();
		
		$area = Area::model()->findAll();

		$company = Company::model()->findAll();
	
		$port = Port::model()->findAll();

		$continent = Continent::model()->findAll();	

                $this->render('modify',array('route'=>$route, 'days'=>$route->days, 'boat'=>$boat, 'area'=>$area, 'port'=>$port, 'company'=>$company, 'continent'=>$continent));

		
	}


        public function actionAdd()
        {



                $boat = Boat::model()->findAll();

                $area = Area::model()->findAll();

		$company = Company::model()->findAll();

                $port = Port::model()->findAll();

		$continent = Continent::model()->findAll();
	
                $this->render('add',array( 'boat'=>$boat, 'area'=>$area, 'port'=>$port, 'company'=>$company, 'continent'=>$continent));


        }



	public function actionGetInfo()
	{


		if(Yii::app()->request->isAjaxRequest)
		{
		
	                $routeId =  intval($_GET['id']) ? intval($_GET['id']) : '';
        	        if(!$routeId) exit();

                	$route = Route::model()->find('id=:id', array(':id'=>$routeId));
	                if(!$route) exit();
			echo CJSON::encode(array('boat'=>$route->boat, 'area'=>$route->area, 'port'=>$route->port));//Yii 的方法将数组处理成json数据
		}
	}

	public function actionSaveInfo()
        {
//		echo 1;
		if(Yii::app()->request->isAjaxRequest)
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




		//echo $_POST['title'];
		$count =Route::model()->updateByPk($_POST['id'],array('name'=>$_POST['title'],'area'=>$_POST['area'], 'port'=>$_POST['port'], 
			'description'=>$_POST['description'], 'start_time'=>$_POST['date'] ,'source'=>$source, 'thumb'=>$thumb, 'style'=>$_POST['style'], 'company'=>$_POST['company'])); 
		echo 1;
		}

	}

	public function actionAddInfo()
        {
//              echo 1;
              //  if(Yii::app()->request->isAjaxRequest)
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


			$route = new Route;
			$route->name = $_POST['title'];
			$route->area = $_POST['area'];
			$route->port = $_POST['port'];
			$route->style = $_POST['style'];
			$route->company = $_POST['company'];
			$route->source = $source;
			$route->thumb = $thumb;
			$route->description = $_POST['description'];
			$route->start_time = $_POST['date'];
			$route->continent = $_POST['continent'];
			$route->save();
			echo 1;
                }

        }

	public function actionRemove()
	{
                $routeId =  intval($_GET['route_id']) ? intval($_GET['route_id']) : '';
                if(!$routeId) exit();
		Route::model()->deleteByPk($routeId);

	}


        public function actionRemove_selected()
        {


                if($_GET['route_id'] != '')
                {
                        $route_id = explode(',', $_GET['route_id']);
                        var_dump($route_id);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Route::model()->deleteByPk($route_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Route::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" or boat like '.'"%'.$_POST['searchPhrase'].'%" or port like '.'"%'.$_POST['searchPhrase'].'%"';
		}
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['port']))
                {
                         $criteria->order = "port {$_POST['sort']['port']} ";
                }
                else if(isset($_POST['sort']['name']))
                {
                         $criteria->order = "name {$_POST['sort']['name']} ";
                }

                else if(isset($_POST['sort']['company']))
                {
                         $criteria->order = "company {$_POST['sort']['company']} ";
                }
                else if(isset($_POST['sort']['boat']))
                {
                         $criteria->order = "boat {$_POST['sort']['boat']} ";
                }
                else if(isset($_POST['sort']['start_time']))
                {
                         $criteria->order = "start_time {$_POST['sort']['start_time']} ";
                }
                else if(isset($_POST['sort']['price']))
                {
                         $criteria->order = "price {$_POST['sort']['price']} ";
                }

                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Route::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
			$price = '';
			$schedule = '';
			if($o->price_id == NUll)
			{
				$price = '<a href= "/price/add/routeId/'.$o->id.'">添加价格</a>';
			
			}
			else
			{
				$price = '<a href="/price/index/priceId/'.$o->price_id.'">'.$o->price.'元起'.'</a>';
			}
			if($o->schedule != NULL)
			{
				$schedule = '<a href="/schedule/index/route_id/'.$o->id.'">详情</a>';
			}
			else
			{
				$schedule = '<a href="/schedule/add/route_id/'.$o->id.'">添加行程</a>';
			}
			$style= '';
			if($o->style and 1 )
			{
				$style .='|显示';
			}
			if($o->style and 2)
			{
				$style .= '|特价';
			}
			if($o->style and 4)
			{
				$style .= '|推荐';
			}
                        $json = array('id'=>intval($o->id), 'port'=>$o->port, 'name'=>$o->name, 'boat'=>$o->boat, 'start_time'=>$o->start_time, 'price'=>$price, 'schedule'=>$schedule, 'days'=>$o->days, 'style'=>$style);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));


        }


        public function actionSelect_area()
        {

                $continent =  $_POST['continent'];

                if(!$continent) exit();

                $criteria = new CDbCriteria; // 创建CDbCriteria对象

                $criteria->select='name';
                $criteria->condition = 'continent = "'.$continent.'"'; // 设置查询条件
                $model = Area::model()->findAll($criteria);
                $ret = '';
                foreach($model as $value)
                {
                        $ret .= '<option>'.$value->name.'</option>';
                }

                echo CJSON::encode(array('option'=>$ret));

        }




}
