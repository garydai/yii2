<?php

class InterestController extends AdminController
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
		$interest = Interest::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('port'=>$port, 'interest'=>$interest));
	
        }
	


        public function actionModify()
        {
                $interest_id =  intval($_GET['interest_id']) ? intval($_GET['interest_id']) : '';
                if(!$interest_id) exit();

                $interest = Interest::model()->find('id=:id', array(':id'=>$interest_id));
                if(!$interest) exit();
		
		$port = Port::model()->findAll();
		
                $this->render('modify',array('port'=>$port, 'interest'=>$interest));

        }


        public function actionAdd()
        {

		$port = Port::model()->findAll();
                $this->render('add', array('port'=>$port));

        }


        public function actionSave_interest()
        {
                Interest::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'port'=>$_POST['port'], 'content'=>$_POST['content']));
		echo 1;

        }



        public function actionAdd_interest()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $interest = new Interest;
                        $interest->title = $_POST['title'];
                        $interest->content = $_POST['content'];
			$interest->port = $_POST['port'];
                        $interest->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $interest_id =  intval($_GET['interest_id']) ? intval($_GET['interest_id']) : '';
                if(!$interest_id) exit();
                $interest = Interest::model()->findByPk($interest_id); // assuming there is a post whose ID is 10
                $interest->delete();
                //$this->actionIndex();

                $this->redirect(Yii::app()->request->urlReferrer);

        }



        public function actionSearch()
        {

                $keyword = $_POST['keywords'];
                $boat    = $_POST['boat'];
                $str = '';



		echo header("Content-Type: text/html;charset=utf-8");

                $model = NULL;

                if($keyword)
                {
                        $str = 'boat like '.'"'.'%'.$keyword.'%'.'"';
                }
                if($boat)
                {
                        if($str != '')
                                $str.=' and ';
                        $str.=' boat ='.'"'.$boat.'"';
                }
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = $str; // 设置查询条件
                $model = Diary::model()->findAll($criteria);

                $boat  = Boat::model()->findAll();


                $this->render('index', array('diary'=>$model, 'boat'=>$boat));
        }


	

}
