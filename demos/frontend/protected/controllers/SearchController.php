<?php

class SearchController extends Controller
{
	public $layout='searchpage';

	public $g_area = null;
	public $g_continent = null;
	public $g_company = null;
	public $g_data = null;
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function actionIndex()
	{



		$area = Area::model()->findAll();
		$continent = Continent::model()->findAll();
		$boat = Boat::model()->findAll();	
		//var_dump($continent);
		$this->g_area = $area;
		$this->g_continent = $continent;
		$company = Company::model()->findAll();	
		$this->g_company = $company;
		$this->render('index', array('area'=>$area, 'continent'=>$continent, 'company'=>$company ));
	}



        public function actionRoute()
        {



                $area = Area::model()->findAll();
                $continent = Continent::model()->findAll();
                $boat = Boat::model()->findAll();




                $this->g_area = $area;
                $this->g_continent = $continent;
                $company = Company::model()->findAll();
                $this->g_company = $company;



		$s_data =  $_GET['d'];
		$s_company = $_GET['c'];
		$s_area = $_GET['a'];
		$s_days = $_GET['days'];
		if(strstr($s_data, '请选择'))
			$s_data = '全部';
		
                if(strstr($s_company, '请选择'))
                        $s_company = '全部';

                if(strstr($s_area, '请选择'))
                        $s_area = '全部';


                $year = date("Y");
                $month = date('n');
                $arr = array();

                for($i = $month ; $i <= 12; $i ++)
                {
                        array_push($arr, $year.'年'.$i.'月');
                }
                $year += 1;
                for($i = 1 ; $i <= 12; $i ++)
                {
                        array_push($arr, $year.'年'.$i.'月');
                }

		$criteria = new CDbCriteria;
		if($s_company != '全部')
		{
			$criteria->addCondition("company = '$s_company' ", 'AND');
		}
		if($s_data != '全部')
                {
			$d = str_replace('年', '-', $s_data);
			$d = str_replace('月', '', $d);

                        $criteria->addCondition(" start_time >= '$d' and start_time < ".'"'.$d.'-40"' , 'AND');
                }
                if($s_area != '全部')
                {
                        $criteria->addCondition("area = '$s_area' or continent = '$s_area' ", 'AND');
                }

		if($s_days != '全部')
		{
			if($s_days == 3)
			{
				$criteria->addCondition("days <= $s_days", 'AND');
			}
			else if($s_days == 11)
			{
				$criteria->addCondition("days >= $s_days", 'AND');

			}	
			else $criteria->addCondition("days = $s_days", 'AND');

		}
		$page = 0;
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
		}
		$count = Route::model()->count($criteria);
		
		$criteria->limit = 10;
		$criteria->offset = $page * $criteria->limit;
		
		
		$result = Route::model()->findAll($criteria);
		$schedule = array();	
		#foreach($result as $item)
		{
		#	if($item != '')
			{	
		#		$item = str_replace(',', ' and id = ', $item);
		#		$item = ' id = '.$item;
		#		$c = new CDbCriteria;
		#		$c->condition = $item;
		#		$c->order = 'day asc';
		#		$c->select = 'title';
		#		$r = Schedule::model()->findAll($c);
		#		array_push($schedule, $r);

			}	
		}	
		//echo '<meta charset="UTF-8">';

		//echo $criteria->condition;
		//var_dump($result);
		$this->render('index', array('s_data'=>$s_data, 's_company'=>$s_company, 's_area'=>$s_area, 'area'=>$area, 'continent'=>$continent, 'company'=>$company, 'data'=>$arr, 'result'=>$result, 'count'=>$count, 'page'=>$page, 'limit'=>$criteria->limit, 's_days'=>$s_days, 'schedule'=>$schedule));
		
        }




}
