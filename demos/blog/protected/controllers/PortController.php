<?php

class PortController extends Controller
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
		$port = Port::model()->findAll();
                $this->render('index',array('port'=>$port));

	
        }
	


        public function actionModify()
        {
                $portId =  intval($_GET['portId']) ? intval($_GET['portId']) : '';
                if(!$portId) exit();

                $port = Port::model()->find('id=:id', array(':id'=>$portId));
                if(!$port) exit();

                $this->render('modify',array('port'=>$port));

        }


        public function actionAdd()
        {


                $this->render('add',array());

        }


        public function actionSaveInfo()
        {
                Port::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['description']));
                $this->redirect(Yii::app()->request->urlReferrer);

        }



        public function actionAddInfo()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $port = new Port;
                        $port->name = $_POST['title'];
                        $port->description = $_POST['description'];
                        $port->save();

			$this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $portId =  intval($_GET['portId']) ? intval($_GET['portId']) : '';
                if(!$portId) exit();
                $port=Port::model()->findByPk($portId); // assuming there is a post whose ID is 10
                $port->delete();
                //$this->actionIndex();

                $this->redirect(Yii::app()->request->urlReferrer);

        }


	

}
