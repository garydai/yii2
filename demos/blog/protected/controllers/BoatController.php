<?php

class BoatController extends Controller
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
                $this->render('index',array('boat'=>$boat));

	
        }

        public function actionModify()
        {
	        $boatId =  intval($_GET['boatId']) ? intval($_GET['boatId']) : '';
                if(!$boatId) exit();

                $boat = Boat::model()->find('id=:id', array(':id'=>$boatId));
                if(!$boat) exit();

                $this->render('modify',array('boat'=>$boat));

	}
	
	public function actionSaveInfo()
	{
		Boat::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['description']));
		$this->redirect(Yii::app()->request->urlReferrer);
	
	}

        public function actionRemove()
        {
                $boatId =  intval($_GET['boatId']) ? intval($_GET['boatId']) : '';
                if(!$boatId) exit();
                $boat=Boat::model()->findByPk($boatId); // assuming there is a post whose ID is 10
                $boat->delete();
                //$this->actionIndex();

                $this->redirect(Yii::app()->request->urlReferrer);

        }

		
	

}
