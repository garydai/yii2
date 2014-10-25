<?php

class CompanyController extends AdminController
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
		$company = Company::model()->findAll();
                $this->render('index',array('company'=>$company));

	
        }

		
	public function actionAdd()
	{
		$this->render('add');
	}
	
	public function actionAddInfo()
	{
		$company = new Company;
		$company->name = $_POST['title'];
		$company->description=$_POST['description'];
		$company->save();

		$this->redirect(Yii::app()->request->urlReferrer);	
	}	

}
