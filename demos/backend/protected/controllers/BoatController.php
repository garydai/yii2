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
	        $boatId =  intval($_GET['boat_id']) ? intval($_GET['boat_id']) : '';
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
                $boat_id =  intval($_GET['boat_id']) ? intval($_GET['boat_id']) : '';
                if(!$boat_id) exit();
                //$this->actionIndex();
		Boat::model()->findByPk($boat_id);
               // $this->redirect(Yii::app()->request->urlReferrer);

        }



       public function actionRemove_selected()
        {


                if($_GET['boat_id'] != '')
                {
                        $boat_id = explode(',', $_GET['boat_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Interest::model()->deleteByPk($boat_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
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

        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Boat::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='name like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['boat']))
                {
                         $criteria->order = "name {$_POST['sort']['boat']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Boat::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
			$p1 = $o->zaikeshu.'/'.$o->paishuiliang.'/'.$o->zuigaosudu.'/'.$o->jiabanlouceng;
			$p2 = $o->gongzuorenyuan.'/'.$o->changdu.'/'.$o->kuandu.'/'.$o->gaodu;
                        $json = array('id'=>intval($o->id), 'boat'=>$o->name, 'p1'=>$p1, 'p2'=>$p2);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }


        public function actionSave_boat()
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

		Boat::model()->updateByPk($_POST['id'], array('name'=>$_POST['title'], 'zaikeshu'=>$_POST['zaikeshu'] , 'paishuiliang'=>$_POST['paishuiliang'], 'zuigaosudu'=>$_POST['zuigaosudu'], 'jiabanlouceng'=>$_POST['jiabanlouceng'], 'gongzuorenyuan'=>$_POST['gongzuorenyuan'], 'changdu'=>$_POST['changdu'], 'kuandu'=>$_POST['kuandu'], 'gaodu'=>$_POST['gaodu'], 'description'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));

                echo 1;

        }

        public function actionAdd_boat()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $boat = new Boat;
                        if(isset($_POST['source']))
                                $boat->source = $_POST['source'];
                        if(isset($_POST['thumb']))
                                $boat->thumb = $_POST['thumb'];

                        $boat->name = $_POST['title'];
                        $boat->zaikeshu = $_POST['zaikeshu'];
                        $boat->paishuiliang = $_POST['paishuiliang'];
                        $boat->zuigaosudu = $_POST['zuigaosudu'];
                        $boat->jiabanlouceng = $_POST['jiabanlouceng'];
                        $boat->gongzuorenyuan = $_POST['gongzuorenyuan'];
                        $boat->changdu = $_POST['changdu'];
                        $boat->kuandu = $_POST['kuandu'];
                        $boat->gaodu = $_POST['gaodu'];
                        $boat->description = $_POST['content'];
                        $boat->save();



                        echo 1;
                }

        }
	
	

}
