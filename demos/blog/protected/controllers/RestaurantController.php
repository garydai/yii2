<?php

class RoomController extends AdminController
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
		$room = Room::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('room'=>$room, 'boat'=>$boat));
	
        }
	

        public function actionModify()
        {
                $room_id =  intval($_GET['room_id']) ? intval($_GET['room_id']) : '';
                if(!$room_id) exit();

                $room = Room::model()->find('id=:id', array(':id'=>$room_id));
                if(!$room) exit();
		
		$company = Company::model()->findAll();
		$boat = Boat::model()->findAll();
		
                $this->render('modify',array('boat'=>$boat, 'room'=>$room, 'company'=>$company));

        }


        public function actionAdd()
        {

		$company = Company::model()->findAll();
		$boat    = Boat::model()->findAll();
                $this->render('add', array('company'=>$company, 'boat'=>$boat));

        }


        public function actionSave_room()
        {
                Room::model()->updateByPk($_POST['id'], array('style'=>$_POST['style'], 'content'=>$_POST['content'], 
			'company'=>$_POST['company'], 'source'=>$_POST['source'], 'thumb'=>$_POST['thumb'], 'boat'=>$_POST['boat']));
		echo 1;

        }



        public function actionAdd_room()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $room = new Room;
                        $room->style = $_POST['style'];
                        $room->content = $_POST['content'];
			$room->company = $_POST['company'];
			$room->source = $_POST['source'];
			$room->thumb = $_POST['thumb'];
			$room->boat = $_POST['boat'];

                        $room->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $room_id =  intval($_GET['room_id']) ? intval($_GET['room_id']) : '';
                if(!$room_id) exit();
                $room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                $room->delete();
                //$this->actionIndex();

                $this->redirect(Yii::app()->request->urlReferrer);

        }

	public function actionSelect_boat()
	{
		
		


		$company =  $_POST['company'];
		
                if(!$company) exit();

		$criteria = new CDbCriteria; // 创建CDbCriteria对象

		$criteria->select='name';
                $criteria->condition = 'company = "'.$company.'"'; // 设置查询条件
                $model = Boat::model()->findAll($criteria);
		$ret = '';
		foreach($model as $value)
		{
			$ret .= '<option>'.$value->name.'</option>';
		}

		echo CJSON::encode(array('option'=>$ret));

		

	}


        public function actionSearch()
        {

                $keyword = $_POST['keywords'];
                $port    = $_POST['port'];
                $str = '';



		echo header("Content-Type: text/html;charset=utf-8");

                $model = NULL;

                if($keyword)
                {
                        $str = 'title like '.'"'.'%'.$keyword.'%'.'"';
                }
                if($port)
                {
                        if($str != '')
                                $str.=' and ';
                        $str.=' port ='.'"'.$port.'"';
                }
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = $str; // 设置查询条件
                $model = Room::model()->findAll($criteria);

                $port  = Port::model()->findAll();


                $this->render('index', array('room'=>$model, 'port'=>$port));
        }


	

}
