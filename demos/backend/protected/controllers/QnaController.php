<?php

class QnaController extends AdminController
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
		$qna = Qna::model()->findAll();
                $this->render('index',array('qna'=>$qna));

	
        }
	


        public function actionModify()
        {
                $qnaId =  intval($_GET['qna_id']) ? intval($_GET['qna_id']) : '';
                if(!$qnaId) exit();

                $qna = Qna::model()->find('id=:id', array(':id'=>$qnaId));
                if(!$qna) exit();

                $this->render('modify',array('qna'=>$qna));

        }


        public function actionAdd()
        {


                $this->render('add',array());

        }


        public function actionSaveInfo()
        {
                Qna::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'content'=>$_POST['content']));
                $this->redirect(Yii::app()->request->urlReferrer);

        }



        public function actionAddInfo()
        {
//              echo 1;
//                if(Yii::app()->request->isAjaxRequest)
                {
                        $qna = new Qna;
                        $qna->title = $_POST['title'];
                        $qna->content = $_POST['content'];
                        $qna->save();

			$this->redirect(Yii::app()->request->urlReferrer);

//                        echo CJSON::encode(array('title'=>$_POST['title'], 'area'=>$_POST['area'], 'qna'=>$_POST['qna']));//Yii 的方法将数组处理成json数据
                }

        }



        public function actionRemove_selected()
        {


                if($_GET['qna_id'] != '')
                {
                        $qna_id = explode(',', $_GET['qna_id']);
                        //$room = Room::model()->findByPk($room_id); // assuming there is a post whose ID is 10
                        Interest::model()->deleteByPk($qna_id);

                        //$this->redirect(Yii::app()->request->urlReferrer);
                }
        }



        public function actionRemove()
        {
                $qna_id =  intval($_GET['qna_id']) ? intval($_GET['qna_id']) : '';
                if(!$qna_id) exit();
                //$this->actionIndex();
		Qna::model()->deleteByPk($qna_id);
                //$this->redirect(Yii::app()->request->urlReferrer);

        }

        public function actionGet_data()
        {
        //      var_dump($_POST);
                $count = Qna::model()->count();
                $criteria = new CDbCriteria;
                if($_POST['searchPhrase'] !='')
                {
                        $criteria->condition='title like '.'"%'.$_POST['searchPhrase'].'%" ';
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['title']))
                {
                         $criteria->order = "title {$_POST['sort']['title']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Qna::model()->findAll($criteria);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'title'=>$o->title);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);        
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }

        public function actionSave_qna()
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

                Qna::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'content'=>$_POST['content'], 'source'=>$source, 'thumb'=>$thumb));
                echo 1;

        }


        public function actionAdd_qna()
        {
//                if(Yii::app()->request->isAjaxRequest)
                {


                        $qna = new Qna;
                        $qna->title = $_POST['title'];
                        $qna->content = $_POST['content'];
                        if(isset($_POST['source']))
                                $qna->source = $_POST['source'];
                        if(isset($_POST['thumb']))
                                $qna->thumb = $_POST['thumb'];

                        $qna->save();

                        echo 1;
                }

        }






	

}
