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
		$model = Route::model()->find('id=:id', array(':id'=>2));
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
                $this->render('index',array('model'=>$model));

	
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
		echo $criteria->condition;
		$model = Schedule::model()->findAll($criteria);

		$this->render('schedule',array('model'=>$model, 'days'=>$route->days, 'routeId'=>$route->id));
	
	//	echo $model[0]->title;

	
	}


}
