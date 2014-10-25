<?php

class BoatController extends AdminController
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
		Boat::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['description'], 'zaikeshu'=>$_POST['zaikeshu'] , 'paishuiliang'=>$_POST['paishuiliang'], 'zuigaosudu'=>$_POST['zuigaosudu'], 'jiabanlouceng'=>$_POST['jiabanlouceng'], 'gongzuorenyuan'=>$_POST['gongzuorenyuan'], 'changdu'=>$_POST['changdu'], 'kuandu'=>$_POST['kuandu'], 'gaodu'=>$_POST['gaodu'] ));
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

        public function actionAddInfo()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $boat = new Boat;
                        $boat->name = $_POST['title'];
			$boat->zaikeshu = $_POST['zaikeshu'];
			$boat->paishuiliang = $_POST['paishuiliang'];
                        $boat->zuigaosudu = $_POST['zuigaosudu'];
                        $boat->jiabanlouceng = $_POST['jiabanlouceng'];
                        $boat->gongzuorenyuan = $_POST['gongzuorenyuan'];
                        $boat->changdu = $_POST['changdu'];
                        $boat->kuandu = $_POST['kuandu'];
                        $boat->gaodu = $_POST['gaodu'];
			$boat->description = $_POST['description'];
                        $boat->save();

                        $this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }

        public function actionAdd()
        {


                $this->render('add',array());

        }

		
	

}
