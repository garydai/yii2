<?php

class ContinentController extends AdminController
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
		$continent = Continent::model()->findAll();
                $this->render('index',array('continent'=>$continent));

	
        }

        public function actionModify()
        {
	        $continentId =  intval($_GET['continent_id']) ? intval($_GET['continent_id']) : '';
                if(!$continentId) exit();

                $continent = Continent::model()->find('id=:id', array(':id'=>$continentId));
                if(!$continent) exit();

                $this->render('modify',array('continent'=>$continent));

	}
	
	public function actionSaveInfo()
	{
		Continent::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['description']));
		$this->redirect(Yii::app()->request->urlReferrer);
	
	}

        public function actionRemove()
        {
                $continentId =  intval($_GET['continentId']) ? intval($_GET['continentId']) : '';
                if(!$continentId) exit();
                //$continent=Continent::model()->findByPk($continentId); // assuming there is a post whose ID is 10
                //$continent->delete();
                //$this->actionIndex();
		Continent::model()->findByPk($continentId);
                //$this->redirect(Yii::app()->request->urlReferrer);

        }


	public function actionRemove_selected()
        {


                if($_GET['continent_id'] != '')
                {
                        $continent_id = explode(',', $_GET['continent_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Continent::model()->deleteByPk($continent_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
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
                        $continent = new Continent;
                        $continent->name = $_POST['title'];
                        $continent->description = $_POST['description'];
                        $continent->save();

                        $this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'continent'=>$_POST['continent'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }
        public function actionGet_data()
        {
        //      var_dump($_POST);
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['name']))
                {
                         $criteria->order = "name {$_POST['sort']['continent']} ";
                }

                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Continent::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'name'=>$o->name);
                        array_push($arr, $json);

                }
		$count = count($model);
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }

        public function actionAdd_continent()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $continent = new Continent;
                        $continent->name = $_POST['title'];
                        $continent->description = $_POST['content'];
                        if(isset($_POST['source']))
                                $continent->source = $_POST['source'];
                        if(isset($_POST['thumb']))
                                $continent->thumb = $_POST['thumb'];

                        $continent->save();

                        echo 1;
                }

        }

        public function actionSave_continent()
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

                Continent::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));
                echo 1;

        }
	
	

}
