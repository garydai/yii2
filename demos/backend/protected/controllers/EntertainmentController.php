<?php

class EntertainmentController extends AdminController
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
		$entertainment = Entertainment::model()->findAll();
          //      $this->render('index',array('port'=>$port));
		$this->render('index', array('entertainment'=>$entertainment ));
	
        }
	

        public function actionModify()
        {
                $entertainment_id =  intval($_GET['entertainment_id']) ? intval($_GET['entertainment_id']) : '';
                if(!$entertainment_id) exit();

                $entertainment = Entertainment::model()->find('id=:id', array(':id'=>$entertainment_id));
                if(!$entertainment) exit();
		
		$company = Company::model()->findAll();
		$boat = Boat::model()->findAll();
		
                $this->render('modify',array('boat'=>$boat, 'entertainment'=>$entertainment, 'company'=>$company));

        }


        public function actionAdd()
        {

		$company = Company::model()->findAll();
		$boat    = Boat::model()->findAll();
                $this->render('add', array('company'=>$company, 'boat'=>$boat));

        }


        public function actionSave_entertainment()
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
                Entertainment::model()->updateByPk($_POST['id'], array('style'=>$_POST['style'], 'content'=>$_POST['content'], 
			'company'=>$_POST['company'], 'source'=>$source, 'thumb'=>$thumb, 'boat'=>$_POST['boat']));
		echo 1;

        }



        public function actionAdd_entertainment()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $entertainment = new Entertainment;
                        $entertainment->style = $_POST['style'];
                        $entertainment->content = $_POST['content'];
			$entertainment->company = $_POST['company'];
			if(isset($_POST['source']))
				$entertainment->source = $_POST['source'];
			if(isset($_POST['thumb']))
				$entertainment->thumb = $_POST['thumb'];
			$entertainment->boat = $_POST['boat'];

                        $entertainment->save();

			//$this->redirect(Yii::app()->request->urlReferrer);
			echo 1;
//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }


        public function actionRemove()
        {
                $entertainment_id =  intval($_GET['entertainment_id']) ? intval($_GET['entertainment_id']) : '';
                if(!$entertainment_id) exit();
		$Entertainment::model()->deleteByPk($entertainment_id);
                $this->redirect(Yii::app()->request->urlReferrer);

        }

        public function actionRemove_selected()
        {


		if($_GET['entertainment_id'] != '')
		{
                	$entertainment_id = explode(',', $_GET['entertainment_id']);
			var_dump($entertainment_id);
                	//$entertainment = Entertainment::model()->findByPk($entertainment_id); // assuming there is a post whose ID is 10
                	Entertainment::model()->deleteByPk($entertainment_id);

                	//$this->redirect(Yii::app()->request->urlReferrer);
		}
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
                $model = Entertainment::model()->findAll($criteria);

                $port  = Port::model()->findAll();


                $this->render('index', array('entertainment'=>$model, 'port'=>$port));
        }


	public function actionData()
	{
		var_dump($_POST);
	}
	public function actionGet_data()
	{
	//	var_dump($_POST);
		$count = Entertainment::model()->count();	
		$criteria = new CDbCriteria;
		if($_POST['searchPhrase'] !='')
		{
			$criteria->condition='style like '.'"%'.$_POST['searchPhrase'].'%" or  boat like '.'"%'.$_POST['searchPhrase'].'%" or company like '.'"%'.$_POST['searchPhrase'].'%"';
		}
		if(isset($_POST['sort']['id'] ))
		{
			
			$criteria->order = " id  {$_POST['sort']['id']} ";
		}
		else if(isset($_POST['sort']['style']))
		{			
			 $criteria->order = "style {$_POST['sort']['style']} ";
		}
		else if(isset($_POST['sort']['boat']))
		{

			 $criteria->order = "boat {$_POST['sort']['boat']} ";
		}
		else if(isset($_POST['sort']['company']))
		{

			 $criteria->order = "company {$_POST['sort']['company']}' ";
		}
	//	var_dump($criteria);
		//$criteria->condition= ;
		$criteria->limit = $_POST['rowCount'];
		$criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];
	
		$model = Entertainment::model()->findAll($criteria);
	//	var_dump($model);
		$arr = array();
		foreach($model as $o)
		{
			$json = array('id'=>intval($o->id), 'style'=>$o->style, 'boat'=>$o->boat, 'company'=>$o->company);
			array_push($arr, $json);
		
		}
	//	var_dump( $arr);	
		echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));
			
	}	

}
