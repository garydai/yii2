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


        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Company::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['company']))
                {
                         $criteria->order = "name {$_POST['sort']['company']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Company::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'company'=>$o->name);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }


        public function actionModify()
        {
                $company_id =  intval($_GET['company_id']) ? intval($_GET['company_id']) : '';
                if(!$company_id) exit();

                $company = Company::model()->find('id=:id', array(':id'=>$company_id));
                if(!$company) exit();

                $this->render('modify',array('company'=>$company));

        }


        public function actionSave_company()
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

                Company::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));
                echo 1;

        }



        public function actionAdd_company()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $company = new Company;
                        $company->name = $_POST['title'];
                        $company->description = $_POST['content'];
                        if(isset($_POST['source']))
                                $company->source = $_POST['source'];
                        if(isset($_POST['thumb']))
                                $company->thumb = $_POST['thumb'];

                        $company->save();

                        echo 1;
                }

        }



}
