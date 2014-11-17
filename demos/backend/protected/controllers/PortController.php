<?php

class PortController extends AdminController
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
                $portId =  intval($_GET['port_id']) ? intval($_GET['port_id']) : '';
                if(!$portId) exit();


		$area = Area::model()->findAll();
		//$connection = Yii::app()->db;  
		//$sql = "SELECT a.id, a.name, a.description, b.source, c.thumb FROM g_port a, g_source b, g_thumb c where a.source =b.id and a.thumb=c.id";  
		//$command = $connection->createCommand($sql);  
		//$result = $command->queryAll();  
		//var_dump($result[0]);
                $port = Port::model()->find('id=:id', array(':id'=>$portId));
                if(!$port) exit();
		 $this->render('modify',array('port'=>$port, 'area'=>$area));	
        }


        public function actionAdd()
        {

		$area = Area::model()->findAll();
                $this->render('add',array('area'=>$area));

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



        public function actionRemove_selected()
        {


                if($_GET['port_id'] != '')
                {
                        $port_id = explode(',', $_GET['port_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Port::model()->deleteByPk($port_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
        }



        public function actionRemove()
        {
                $port_id =  intval($_GET['port_id']) ? intval($_GET['port_id']) : '';
                if(!$port_id) exit();
                //$this->actionIndex();
		Port::model()->deleteByPk($port_id);
               $this->redirect(Yii::app()->request->url);

        }

        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Port::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['port']))
                {
                         $criteria->order = "name {$_POST['sort']['port']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Port::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'port'=>$o->name);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }

        public function actionSave_port()
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

                Port::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'area'=>$_POST['area'], 'description'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));
                echo 1;

        }


        public function actionAdd_port()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $port = new Port;
                        $port->name = $_POST['title'];
			$port->area = $_POST['area'];
                        $port->description = $_POST['content'];
                        if(isset($_POST['source']))
			{

				/*
                                $t = explode(',', $_POST['source']);
				$id = '';
                                foreach($t as $a)
                                {
                                        if($a != '')
                                        {
                                                $source = new Source;
                                                $source->source = $a;
                                                $source->save();
                                                $id .= $source->id.','; 
                                        }
				
                                }

				*/
				$port->source = $_POST['source'];
	
			}
                        if(isset($_POST['thumb']))
			{
				/*
				$t = explode(',', $_POST['thumb']);
				$id = '';
				foreach($t as $a)
				{
					if($a != '')
					{
						$thumb = new Thumb;
						$thumb->thumb = $a;
						$thumb->save();
						$id .= $thumb->id.',';	
					}
				}
				*/
				$port->thumb = $_POST['thumb'];
			}
                        $port->save();

                        echo 1;
                }

        }






	

}
