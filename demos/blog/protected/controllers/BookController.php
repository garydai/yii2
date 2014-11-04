<?php

class BookController extends AdminController
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}


	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

        public function actionIndex()
        {

                $model=new ContactForm;
                if(isset($_POST['ContactForm']))
                {
                        $model->attributes=$_POST['ContactForm'];
                        if($model->validate())
                        {
                                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                                $this->refresh();
                        }
                }
                $this->render('index',array('model'=>$model));




	
        }

	public function actionUndeal()
	{
		$this->render('undeal');		
	}


        public function actionDone()
        {
                $this->render('done');
        }




        public function actionAll()
        {
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = 'deal = 1'; // 设置查询条件
               // echo $criteria->condition;
                $book = Book::model()->findAll($criteria);

                $this->render('all', array('book'=>$book));
        }



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function actionGet_undeal_data()
        {
        //      var_dump($_POST);
                $criteria = new CDbCriteria;
		$criteria->condition = 'deal = 0';
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->addCondition(' route_id like "%'.$_POST['searchPhrase'].'%" or route_title like "%'.$_POST['searchPhrase'].'%" or room like "%'.$_POST['searchPhrase'].'%" or start_time like "%'.$_POST['searchPhrase'].'%" or count like "%'.$_POST['searchPhrase'].'%" or customer like "%'.$_POST['searchPhrase'].'%" or phone like "%'.$_POST['searchPhrase'].'%" or book_time like "%'.$_POST['searchPhrase'].'%" or insurance like "%'.$_POST['searchPhrase'].'%" ', 'AND');
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['route_id']))
                {
                         $criteria->order = "route_id {$_POST['sort']['route_id']} ";
                }
                else if(isset($_POST['sort']['route_title']))
                {
                         $criteria->order = "route_title {$_POST['sort']['route_title']} ";
                }

                else if(isset($_POST['sort']['room']))
                {
                         $criteria->order = "room {$_POST['sort']['room']} ";
                }

                else if(isset($_POST['sort']['start_time']))
                {
                         $criteria->order = "start_time {$_POST['sort']['start_time']} ";
                }

                else if(isset($_POST['sort']['count']))
                {
                         $criteria->order = "count {$_POST['sort']['count']} ";
                }

                else if(isset($_POST['sort']['customer']))
                {
                         $criteria->order = "customer {$_POST['sort']['customer']} ";
                }
                else if(isset($_POST['sort']['phone']))
                {
                         $criteria->order = "phone {$_POST['sort']['phone']} ";
                }

                else if(isset($_POST['sort']['book_time']))
                {
                         $criteria->order = "book_time {$_POST['sort']['book_time']} ";
                }
                else if(isset($_POST['sort']['insurance']))
                {
                         $criteria->order = "insurance {$_POST['sort']['insurance']} ";
                }

                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Book::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
		$count 	= count($model);
                foreach($model as $o)
                {
			$insu = '无';
			if($o->insurance != 0)
				$insu = '有';
                        $json = array('id'=>intval($o->id), 'route_id'=>$o->route_id, 'route_title'=>$o->route_title, 'room'=>$o->room, 'count'=>$o->count, 'start_time'=>$o->start_time, 'customer'=>$o->customer, 'phone'=>$o->phone, 'insurance'=>$insu, 'book_time'=>$o->book_time);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }


	function actionGet_done_data()
        {
        //      var_dump($_POST);
                $criteria = new CDbCriteria;
                $criteria->condition = 'deal = 1';
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->addCondition(' route_id like "%'.$_POST['searchPhrase'].'%" or route_title like "%'.$_POST['searchPhrase'].'%" or room like "%'.$_POST['searchPhrase'].'%" or start_time like "%'.$_POST['searchPhrase'].'%" or count like "%'.$_POST['searchPhrase'].'%" or customer like "%'.$_POST['searchPhrase'].'%" or phone like "%'.$_POST['searchPhrase'].'%" or book_time like "%'.$_POST['searchPhrase'].'%" or insurance like "%'.$_POST['searchPhrase'].'%" ', 'AND');
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['route_id']))
                {
                         $criteria->order = "route_id {$_POST['sort']['route_id']} ";
                }
                else if(isset($_POST['sort']['route_title']))
                {
                         $criteria->order = "route_title {$_POST['sort']['route_title']} ";
                }

                else if(isset($_POST['sort']['room']))
                {
                         $criteria->order = "room {$_POST['sort']['room']} ";
                }

                else if(isset($_POST['sort']['start_time']))
                {
                         $criteria->order = "start_time {$_POST['sort']['start_time']} ";
                }

                else if(isset($_POST['sort']['count']))
                {
                         $criteria->order = "count {$_POST['sort']['count']} ";
                }

                else if(isset($_POST['sort']['customer']))
                {


			$criteria->order = "customer {$_POST['sort']['customer']} ";
                }
                else if(isset($_POST['sort']['phone']))
                {
                         $criteria->order = "phone {$_POST['sort']['phone']} ";
                }

                else if(isset($_POST['sort']['book_time']))
                {
                         $criteria->order = "book_time {$_POST['sort']['book_time']} ";
                }
                else if(isset($_POST['sort']['insurance']))
                {
                         $criteria->order = "insurance {$_POST['sort']['insurance']} ";
                }

                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Book::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                $count  = count($model);
                foreach($model as $o)
                {
                        $insu = '无';
                        if($o->insurance != 0)
                                $insu = '有';
                        $json = array('id'=>intval($o->id), 'route_id'=>$o->route_id, 'route_title'=>$o->route_title, 'room'=>$o->room, 'count'=>$o->count, 'start_time'=>$o->start_time, 'customer'=>$o->customer, 'phone'=>$o->phone, 'insurance'=>$insu, 'book_time'=>$o->book_time);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }
}
