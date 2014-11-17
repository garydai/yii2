<?php

class HomeController extends Controller
{
	public $layout='column2';

	public $a = null;
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function actionIndex()
	{


		$this->a = '1';
		$criteria = new CDbCriteria; // 创建CDbCriteria对象
                $criteria->condition = "(style & 2) !=0"; // 设置查询条件
                $cheap = Route::model()->findAll($criteria);
		$criteria->condition = '(style&4) !=0';
		$hot = Route::model()->findAll($criteria);
		$area = Area::model()->findAll();
		$criteria1 = new CDbCriteria; // 创建CDbCriteria对象
                $criteria1->select = "title"; // 设置查询条件
		$criteria1->limit = 8;
		$diary = Diary::model()->findAll($criteria1);
		$continent = Continent::model()->findAll();
		$boat = Boat::model()->findAll();	
		//var_dump($continent);	
		$this->render('index', array('hot'=>$hot, 'cheap'=>$cheap, 'area'=>$area, 'diary'=>$diary, 'continent'=>$continent, 'boat'=>$boat));
	}


	public function actionGet_route()
	{

		$criteria = new CDbCriteria;
		$criteria->limit = 8;  
		$area = Area::model()->findAll($criteria);

		$html = '<ul class="local_trip_pro" id="local_trip_content_list" data-blockid="recommend_localjoin">';
		for($j = 0; $j < count($area); $j ++)
		{
			if($j)
				$html .='<li class="local_trip_pro_li wq_clearfix hide" data-content="lj'.$j.'" style="display:none;">';
			else
				$html .='<li class="local_trip_pro_li wq_clearfix" data-content="lj'.$j.'">';	
			
			$criteria1 = new CDbCriteria; 
                	$criteria1->condition = "(style & 4) !=0"; 
			$criteria1->addCondition('area ="'.$area[$j]->name.'"', 'AND');
			$criteria1->limit = 3;
			$route = Route::model()->findAll($criteria1);
			for($i = 0; $i < count($route); $i ++)
			{
				if($i)
					$html .= '<a class="local_trip_right img_slide_animte_wrapper" href="';
				else
					$html .= '<a class="local_trip_left_l img_slide_animte_wrapper" href="';
			
				if($i)	
					$html.='#" target="_blank"> <img class="local_trip_img_s img_slide_animte first_page"  src="'.$route[$i]->source.'" data-original="'.$route[$i]->source.'" style="display: block;"> <span class="local_trip_mask_s"></span> <span class="local_trip_txt_s" title="'.$route[$i]->name.'">'.$route[$i]->name.'</span>'.'<span class="local_trip_price_s font_size12"><span class="font_size16">'.$route[$i]->price.'</span>元/人起</span></a>';
				else
					$html.='#" target="_blank"> <img class="local_trip_img_l img_slide_animte first_page" alt=" '.$route[$i]->name.'" src="'.$route[$i]->source.'" data-original="'.$route[$i]->source.'" style="display: block;"> <span class="local_trip_mask_l"></span> <span class="local_trip_bl"></span><span class="local_trip_txt_l" title="'.$route[$i]->name.'">'.$route[$i]->name.'</span>'.'<span class="local_trip_price_l font_size14 font_color_orange"><span class="font_size28">'.$route[$i]->price.'</span>元/人起</span></a>';
				
			}
			$html.='</li>';

		}	
		$html.='</ul>';	
		echo $html;	
		
	}


        public function actionGet_boat()
        {

                $criteria = new CDbCriteria;
		$criteria->condition = "(type & 4) !=0";

                $criteria->limit = 8;
                $boat = Boat::model()->findAll($criteria);

                $html = '<ul class="local_trip_pro" id="local_trip_content_list" data-blockid="recommend_localjoin">';
                for($j = 0; $j < count($boat); $j ++)
                {
                        if($j)
                                $html .='<li class="local_trip_pro_li wq_clearfix hide" data-content="lj'.$j.'" style="display:none;">';
                        else
                                $html .='<li class="local_trip_pro_li wq_clearfix" data-content="lj'.$j.'">';
			$arr = explode(',', $boat[$j]->source);
		
                        for($i = 1; $i < count($arr) && $i < 4; $i ++)
                        {
                                if($i-1)
                                        $html .= '<a class="local_trip_right img_slide_animte_wrapper" href="';
                                else
                                        $html .= '<a class="local_trip_left_l img_slide_animte_wrapper" href="';

                                if($i-1)
                                        $html.='#" target="_blank"> <img class="local_trip_img_s img_slide_animte first_page"  src="'.$arr[$i].'" data-original="'.$arr[$i].'" style="display: block;"> <span class="local_trip_mask_s"></span> <span class="local_trip_txt_s" title="'.'">'.'</span>'.'<span class="local_trip_price_s font_size12"><span class="font_size16">'.'</span></span></a>';
                                else
                                        $html.='#" target="_blank"> <img class="local_trip_img_l img_slide_animte first_page" alt=" '.'" src="'.$arr[$i].'" data-original="'.$arr[$i].'" style="display: block;"> <span class="local_trip_mask_l"></span> <span class="local_trip_bl"></span><span class="local_trip_txt_l" title="'.'">'.'</span>'.'<span class="local_trip_price_l font_size14 font_color_orange"><span class="font_size28">'.'</span></span></a>';

                        }
                        $html.='</li>';

                }
                $html.='</ul>';
                echo $html;

	}
	
        public function actionGet_area()
        {

                $criteria = new CDbCriteria;
                $criteria->limit = 8;
                $continent = Continent::model()->findAll($criteria);

                $html = '';
                for($j = 0; $j < count($continent); $j ++)
                {
                        if($j)
                                $html .='<ul class="local_trip_pro" data-content="ma'.$j.'" data-blockid="recommend_mustactive"  style="display:none;"> <li class="local_trip_pro_li wq_clearfix"> ';
                        else
                                $html .='<ul class="local_trip_pro" data-content="ma'.$j.'" data-blockid="recommend_mustactive"  style="display:block;">   <li class="local_trip_pro_li wq_clearfix">';


			
			$connection = Yii::app()->db;  
			$sql = "SELECT p.name, p.source, p.thumb FROM  g_port p, g_area a where a.continent = '{$continent[$j]->name}' and p.area = a.name ";
		  
			$command = $connection->createCommand($sql);  
			$result = $command->queryAll();  

                        //$criteria1 = new CDbCriteria;
                        //$criteria1->condition = "(style & 4) !=0";
                       // $criteria1->addCondition('continent ="'.$continent[$j]->name.'"');
                       // $criteria1->limit = 3;
                       // $area = Area::model()->findAll($criteria1);
                        for($i = 0; $i < count($result); $i ++)
                        {
                                $html .= '<a class="trip_play_list img_slide_animte_wrapper" href="';

                                $html.='#" target="_blank"> <img class="trip_play_img img_slide_animte first_page"  src="'.$result[$i]['source'].'" data-original="'.$result[$i]['source'].'" alt="" style="display: block;"> <span class="trip_play_txt" title="'.$result[$i]['name'].'">'.$result[$i]['name'].'</span></a>';

                        }
                        $html.='</li>';

                }
                $html.='</ul>';
                echo $html;
		
		
        }



}
