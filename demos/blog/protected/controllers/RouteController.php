<?php

class RouteController extends Controller
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
		$route = Route::model()->findAll();
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
                $this->render('index',array('route'=>$route));

	
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

                $routeId =  intval($_GET['routeId']) ? intval($_GET['routeId']) : '';
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

	
		$port = Port::model()->findAll();
	
                $this->render('modify',array('route'=>$route, 'days'=>$route->days, 'boat'=>$boat, 'area'=>$area, 'port'=>$port));

		
	}


        public function actionAdd()
        {



                $boat = Boat::model()->findAll();

                $area = Area::model()->findAll();


                $port = Port::model()->findAll();

                $this->render('add',array( 'boat'=>$boat, 'area'=>$area, 'port'=>$port));


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

		//echo $_POST['title'];
		$count =Route::model()->updateByPk($_POST['id'],array('name'=>$_POST['title'],'area'=>$_POST['area'], 'port'=>$_POST['port'], 'days'=>$_POST['days'], 
			'description'=>$_POST['description'], 'start_time'=>$_POST['date'] )); 
//		if($count>0){ echo "success"; }else{ echo "fail"; }

//		Route::model()->updateByPk(2,array('name'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));
                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
		}

	}

	public function actionAddInfo()
        {
//              echo 1;
              //  if(Yii::app()->request->isAjaxRequest)
                {
			$route = new Route;
			$route->name = $_POST['title'];
			$route->area = $_POST['area'];
			$route->port = $_POST['port'];
			$route->days = $_POST['days'];
			$route->description = $_POST['description'];
			$route->start_time = $_POST['date'];
			$route->save();
                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }

	public function actionRemove()
	{
                $routeId =  intval($_GET['routeId']) ? intval($_GET['routeId']) : '';
                if(!$routeId) exit();
		$route=Route::model()->findByPk($routeId); // assuming there is a post whose ID is 10
		$route->delete();
		//$this->actionIndex();

		$this->redirect(Yii::app()->request->urlReferrer);

	}




}
