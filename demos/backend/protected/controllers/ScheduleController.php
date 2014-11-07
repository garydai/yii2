<?php

class ScheduleController extends AdminController
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




                $route_id =  intval($_GET['route_id']) ? intval($_GET['route_id']) : '';
                if(!$route_id) exit();

                $route = Route::model()->find('id=:id', array(':id'=>$route_id));
                if(!$route_id) exit();
                $scheduleId = $route->schedule;
                $arr = explode(',', $scheduleId);
                $str = str_replace(',', ' or id = ', $scheduleId);
                //echo $str;
                $criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = 'id = ' .$str; // 设置查询条件
        //      echo $criteria->condition;
                $model = Schedule::model()->findAll($criteria);

                $this->render('index',array('schedule_id'=>$route->schedule, 'days'=>$route->days, 'route_id'=>$route->id));


	
        }
	


        public function actionModify()
        {

                $schedule_id =  intval($_GET['schedule_id']) ? intval($_GET['schedule_id']) : '';
                if(!$schedule_id) exit();

                $schedule = Schedule::model()->find('id=:id', array(':id'=>$schedule_id));

		$this->render('modify', array('schedule'=>$schedule));


        
	}




        public function actionAdd()
        {

		$route_id = $_GET['route_id'];
                $this->render('add', array('route_id'=>$route_id));



        }




        public function actionAdd_schedule()
        {


		$schedule = new Schedule;
		$schedule->title = $_POST['title'];
		$schedule->content = $_POST['content'];
		$schedule->day = $_POST['day'];
		$schedule->eat = $_POST['eat'];
		$schedule->live = $_POST['live'];

		$schedule->save();

		
		$route_id = $_POST['route_id'];

		$route = Route::model()->findByPk($route_id);
		
		$s = $route->schedule;
		if($s == '' || $s == NULL)
			$s = $schedule->id;
		else
			$s.=','.$schedule->id;

		Route::model()->updateByPk($route_id, array('schedule'=>$s));

		echo 1;


        }



	public function actionSave_schedule()
	{
		
		 Schedule::model()->updateByPk($_POST['id'], array('title'=>$_POST['title'], 'title'=>$_POST['title'], 'content'=>$_POST['content'], 'day'=>$_POST['day'], 'eat'=>$_POST['eat'], 'live'=>$_POST['live']));
                echo 1;

	}
        public function actionSaveInfo()
        {

		//echo 1;
		$number = $_POST['num'];

		$title = $_POST['title'];
		$content = $_POST['content'];


			$route_id = $_POST['route_id'];

		if($number != '' || $title != '' || $content !='')
		{
			$v_num = explode('$$$$$$', $number);
			$v_title = explode('$$$$$$', $title);
			$v_content = explode('$$$$$$', $content);
		//echo 1;
		//echo $number;

			$a = '';
			for($i = 0; $i < count($v_num); $i++)
			{

				{
					$schedule = new Schedule;
					$schedule->title = $v_title[$i];
					$schedule->content = $v_content[$i];
					$schedule->day = $v_num[$i];
					$schedule->save();
					$a.=$schedule->id;
					if($i != count($v_num) - 1)
						$a.=',';
				}
			}

                	Route::model()->updateByPk($route_id, array('schedule'=>$a, 'days'=>count($v_num)));
               
		}
		else Route::model()->updateByPk($route_id, array('schedule'=>NULL, 'days'=>0));

		 $this->redirect(Yii::app()->request->urlReferrer);

		echo 1;
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

	public function actionContent()
	{

                $schedule_id =  intval($_GET['schedule_id']) ? intval($_GET['schedule_id']) : '';
                if(!$schedule_id) exit();
		$schedule = Schedule::model()->findByPk($schedule_id);	
		$this->render('content', array('schedule'=>$schedule));
	}

	public function actionUpload_image()
	{
		
		if ($_FILES['file']['name']) 
		{
//		    echo $_FILES['file']['name'];
	            if (!$_FILES['file']['error']) 
		    {
        	        $name = md5(rand(100, 200));
                	$ext = explode('.', $_FILES['file']['name']);
	                $filename = $name . '.' . $ext[1];
        	        $destination = 'assets/images/' . $filename; //change this directory
	                $location = $_FILES["file"]["tmp_name"];
//			echo $location;
               		move_uploaded_file($location, $destination);
                	echo 'http://121.199.53.139:8080/assets/images/' . $filename;//change this URL
        	    }
	            else
        	    {
	              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
	            }
       		}
		
	}	

	public function actionSave_content()
	{
		
		$schedule_id =  intval($_POST['id']) ? intval($_POST['id']) : '';
                if(!$schedule_id) exit();

		Schedule::model()->updateByPk($schedule_id, array('content'=>$_POST['html'], 'title'=>$_POST['title']));

	
		echo CJSON::encode(array('title'=>$_POST['html']));
	}


        public function actionGet_data()
        {


		$sid = '';
		if(isset($_POST['sid']))
		{
			
			$sid = str_replace(',', ' or id = ', $_POST['sid']);

		}
		if($sid == '')
		{
			echo 1;
		}
	

                $criteria = new CDbCriteria;
		$criteria->condition = 'id ='.$sid;

                if($_POST['searchPhrase'] !='')
                {
                        $criteria->addCondition(' day like '.'"%'.$_POST['searchPhrase'].'%" or  eat like '.'"%'.$_POST['searchPhrase'].'%" or live like '.'"%'.$_POST['searchPhrase'].'%"', 'AND');
                }
                if(isset($_POST['sort']['id'] ))
                {

                        $criteria->order = " id  {$_POST['sort']['id']} ";
                }
                else if(isset($_POST['sort']['day']))
                {
                         $criteria->order = "day {$_POST['sort']['day']} ";
                }

                else if(isset($_POST['sort']['eat']))
                {
                         $criteria->order = "eat {$_POST['sort']['eat']} ";
                }
                else if(isset($_POST['sort']['live']))
                {

                         $criteria->order = "live {$_POST['sort']['live']} ";
                }
                $criteria->limit = $_POST['rowCount'];
                $criteria->offset= (intval($_POST['current']) -1)*$_POST['rowCount'];

                $model = Schedule::model()->findAll($criteria);
		$count = count($model);
        //      var_dump($model);
                $arr = array();
                foreach($model as $o)
                {
                        $json = array('id'=>intval($o->id), 'day'=>$o->day, 'eat'=>$o->eat, 'live'=>$o->live);
                        array_push($arr, $json);

                }
        //      var_dump( $arr);
                echo json_encode(array('rowCount'=>$_POST['rowCount'], 'current'=>$_POST['current'], 'rows'=>$arr, 'total'=>$count));

        }





}
