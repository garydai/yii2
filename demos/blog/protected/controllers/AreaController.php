<?php

class AreaController extends AdminController
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
	        $areaId =  intval($_GET['area_id']) ? intval($_GET['area_id']) : '';
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
                //$area=Area::model()->findByPk($areaId); // assuming there is a post whose ID is 10
                //$area->delete();
                //$this->actionIndex();
		Area::model()->findByPk($areaId);
                //$this->redirect(Yii::app()->request->urlReferrer);

        }


	public function actionRemove_selected()
        {


                if($_GET['area_id'] != '')
                {
                        $area_id = explode(',', $_GET['area_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Area::model()->deleteByPk($area_id);

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
                        $area = new Area;
                        $area->name = $_POST['title'];
                        $area->description = $_POST['description'];
                        $area->save();

                        $this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'port'=>$_POST['port']));//Yii 的方法将数组处理成json数据
                }

        }
        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Area::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['area']))
                {
                         $criteria->order = "name {$_POST['sort']['area']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Area::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'area'=>$o->name);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }

        public function actionAdd_area()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $area = new Area;
                        $area->name = $_POST['title'];
                        $area->description = $_POST['content'];
                        if(isset($_POST['source']))
                                $area->source = $_POST['source'];
                        if(isset($_POST['thumb']))
                                $area->thumb = $_POST['thumb'];

                        $area->save();

                        echo 1;
                }

        }

        public function actionSave_area()
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

                Area::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'description'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));
                echo 1;

        }
	
	

}
