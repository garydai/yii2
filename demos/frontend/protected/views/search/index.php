<link rel="stylesheet" href="/css/zyl1.css">

<link rel="stylesheet" href="/css/zyl2.css">

<link rel="stylesheet" href="/css/yl_list.css">

<link rel="stylesheet" href="/css/yl_list_localjoin.css">
<div class="wq_body_wrapper container">

	<div class="filter_w shadow">
		<div class="filter_box cf">
			<div class="filter_name fn1">按目的地</div>
			<div class="filter_item filter_destination_item" txt="目的地" ftype="destination">
				<ul>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/a/'); $pos2 = strpos($url, '/d/'); $url = substr_replace($url, '全部', $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>" <?php if($s_area == '全部') echo 'class="active" '?>>全部</a></li>
					<?php for($i = 0; $i < count($continent); $i ++){ ?>
                                        	<li ><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/a/'); $pos2 = strpos($url, '/d/'); $url = substr_replace($url, $continent[$i]->name, $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>" <?php if($s_area == $continent[$i]->name) echo 'class="active" '?>><?php echo $continent[$i]->name?></a></li>
                                        	<?php for($j = 0; $j < count($area); $j ++)  if($area[$j]->continent == $continent[$i]->name){?>
                                                   <li ><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/a/'); $pos2 = strpos($url, '/d/'); $url = substr_replace($url, $area[$j]->name, $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>"  <?php if($s_area == $area[$j]->name) echo 'class="active" '?> ><?php echo $area[$j]->name?></a></li>
                                                <?php } ?>
                                        <?php } ?>

				</ul>
			</div>
		</div>


		<div class="filter_box cf">
			<div class="filter_name fn4">邮轮公司</div>
			<div class="filter_item filter_corps_item" txt="邮轮公司" ftype="corps">
				<ul style="width:800px;">
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/c/'); $pos2 = strpos($url, '/days/'); if($pos2 === FALSE) $url = substr_replace($url, '全部', $pos1 + 3); else $url = substr_replace($url, '全部', $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>"  <?php if($s_company == '全部') echo 'class="active" '?>>全部</a></li>
                                        <?php for($i = 0; $i < count($company); $i ++){ ?>
                                                <li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/c/'); $pos2 = strpos($url, '/days/'); if($pos2 === FALSE) $url = substr_replace($url, $company[$i]->name, $pos1 + 3); else $url = substr_replace($url, $company[$i]->name, $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>"  <?php if($s_company == $company[$i]->name) echo 'class="active" '?> ><?php echo $company[$i]->name?></a></li>
                                        <?php } ?>
					 
				</ul>
			</div>
		</div>


		<div class="filter_box cf">
			<div class="filter_name fn2">出发时间</div>
			<div class="filter_item filter_time_item" txt="出发时间" ftype="time">
				<ul>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/d/'); $pos2 = strpos($url, '/c/'); $url = substr_replace($url, '全部', $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>"   <?php if($s_data == '全部') echo 'class="active" '?>>全部</a></li>
				
                                        <?php for($i = 0; $i < count($data); $i ++){ ?>
                                                <li><a  href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/d/'); $pos2 = strpos($url, '/c/'); $url = substr_replace($url, $data[$i], $pos1 + 3, $pos2 -$pos1 -3); echo $url;   ?>"  <?php if($s_data == $data[$i]) echo 'class="active" '?> ><?php echo $data[$i]?></a></li>
                                        <?php } ?>

	
				</ul>
			</div>
		</div>

		<div class="filter_box cf">
			<div class="filter_name fn3">行程天数</div>
			<div class="filter_item filter_days_item" txt="行程天数" ftype="days">
				<ul>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '全部', $pos1 + 6); else $url = substr_replace($url, '全部', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '全部') echo 'class="active" '?> >全部</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '3', $pos1 + 6); else $url = substr_replace($url, '3', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '3') echo 'class="active" '?> >3天以下</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '4', $pos1 + 6); else $url = substr_replace($url, '4', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '4') echo 'class="active" '?>>4天</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '5', $pos1 + 6); else $url = substr_replace($url, '5', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '5') echo 'class="active" '?>>5天</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '6', $pos1 + 6); else $url = substr_replace($url, '6', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '6') echo 'class="active" '?> >6天</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '7', $pos1 + 6); else $url = substr_replace($url, '7', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '7') echo 'class="active" '?> >7天</a></li>
					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '8', $pos1 + 6); else $url = substr_replace($url, '8', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '8') echo 'class="active" '?> >8天</a></li>

					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '9', $pos1 + 6); else $url = substr_replace($url, '9', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '9') echo 'class="active" '?> >9天</a></li>

					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '10', $pos1 + 6); else $url = substr_replace($url, '10', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '10') echo 'class="active" '?> >10天</a></li>

					<li><a href="<?php $url = Yii::app()->request->url;  $pos1 = strpos($url, '/days/'); $pos2 = strpos($url, '/page/'); if($pos2 === FALSE) $url = substr_replace($url, '11', $pos1 + 6); else $url = substr_replace($url, '11', $pos1 + 6, $pos2 -$pos1 -6); echo $url;   ?>" <?php if($s_days == '11') echo 'class="active" '?> >10天以上</a></li>

				</ul>
			</div>
		</div>




	</div>





  	<div class="product_wrapper"> 
		<div class="product_list_opts">
		    

			<div class="page_change font_size13 font_color_gray">
				<div class="wq_clearfix">
					<span>共</span><span class="font_color_orange"><?php echo $count ?>个</span><span>产品</span>
				</div>
				<div class="wq_clearfix" id="page_simple_div">
					
					
						<a href=<?php if($page) echo '"'.'/search/route/a/'.$s_area.'/d/'.$s_data.'/c/'.$s_company.'/page/'.($page - 1).'"'; else echo '"'.'javacript:;'.'"' ?> class="prev_page"></a>
					
					
					<span>
						&nbsp;&nbsp;<span><?php echo $page + 1 ?></span><span>/</span><span><?php if($count % $limit ) echo(int)($count / $limit) + 1; else echo $count / $limit; ?></span>&nbsp;&nbsp;
					</span>
					
					
					
						<a href=<?php if($page < (int)($count / $limit) ) echo '"'.'/search/route/a/'.$s_area.'/d/'.$s_data.'/c/'.$s_company.'/page/'.($page + 1).'"'; else echo '"'.'javacript:;'.'"' ?> class="next_page"></a>
					

				</div>
			</div>

		</div>




	<div class="product_list_wrapper" id="product-list-ul">



	<ul class="product_list wq_clearfix">

			
				
					<?php for($i=0; $i < count($result); $i ++) { ?>
	
				<li>
					<a href="#" target="_blank">
					<div class="top_info font_size13 font_color_gray">
						<p class="p_title font_size14 font_color_orange" ><?php echo $result[$i]->name?></p>
		
		
					</div>
	
					<div class="p_img_wrapper wq_clearfix">
						<img class="p_img lazy" width="300" height="180" src=" " data-original="<?php echo $result[$i]->source?>">
		
						<div class="list_attribute">
							<p class="localjoin_trip_days">途径港口：<span><?php echo $result[$i]->port?></span></p>
							<p class="localjoin_begin_city">所属航线：<span><?php echo $result[$i]->area?></span></p>
							<p class="localjoin_end_city">出发港口：<span></span></p>
							<p class="localjoin_schedule">行程：<span><?php echo $result[$i]->days.'日'?></span></p>
			
							<div class="localjoin_price">
				
					
								<p class="current_price font_color_orange font_size12">
									￥<span class="font_size20"><?php echo $result[$i]->price?></span>/人起
								</p>
							</div>
			
							<p class="localjoin_btn"></p>
							<div class="p_tag">
				
								<ul class="p_tag_list wq_clearfix">
					
				 
								</ul>
					
							</div>
						</div>
					</div>
	<!-- <i class="link_icon"></i> -->
	
					</a>

					<div class="travel_profile_wrapper">
						<span class="travel_profile_icon"></span>
						<div class="travel_profile_line_wrapper">
							<?php for($i = 0; $i < count($schedule); $i ++) { ?>
							<div class="travel_profile_detail hide POIofDAY1">
								<p class="detail_arrow"></p>
								<p class="travel_profile_location_detail"><?php echo $schedule[$i]->title ?></p>
							</div>
							<?php }?>
						</div>	
					</div>

			    </li>
					<?php } ?>

	</ul>


	</div>
	</div>

</div>
<script type="text/javascript" src="/js/jquery.lazyLoad.js"></script>
<script>
				$('img.lazy').lazyload({
					threshold: 400
				});
</script>

