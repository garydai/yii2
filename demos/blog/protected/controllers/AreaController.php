<?php

class AreaController extends Controller
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
		$area = Area::model()->findAll();
                $this->render('index',array('area'=>$area));

	
        }

        public function actionModify()
        {
	        $areaId =  intval($_GET['areaId']) ? intval($_GET['areaId']) : '';
                if(!$areaId) exit();

                $area = Area::model()->find('id=:id', array(':id'=>$areaId));
                if(!$area) exit();

                $this->render('modify',array('area'=>$area));

	}
	
	public function actionSaveInfo()
	{
		Area::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['description']));
		$this->redirect(Yii::app()->request->urlReferrer);
	
	}

        public function actionRemove()
        {
                $areaId =  intval($_GET['areaId']) ? intval($_GET['areaId']) : '';
                if(!$areaId) exit();
                $area=Area::model()->findByPk($areaId); // assuming there is a post whose ID is 10
                $area->delete();
                //$this->actionIndex();

                $this->redirect(Yii::app()->request->urlReferrer);

        }

        public function actionAdd()
        {


                $this->render('add',array());

        }


        public function actionAddInfo()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $area = new Area;
                        $area->name = $_POST['title'];
                        $area->description = $_POST['description'];
                        $area->save();

                        $this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


	
	

}
