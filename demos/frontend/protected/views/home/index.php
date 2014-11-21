	

		<div id="bannerSlider" class="banner_wrapper">
			<ul id="bannerList" class="slider_list wq_clearfix">
				
					<li class="slider_item">
						<a target="_blank" href="#">
							<img src="/images/ad/1.jpg" width="1000" height="400">
						</a>
					</li>
				
					<li class="slider_item">
						<a target="_blank" href="#">
							<img src="/images/ad/2.jpg" width="1000" height="400">
						</a>
					</li>
				
					<li class="slider_item">
						<a target="_blank" href="#">
							<img src="/images/ad/3.jpg" width="1000" height="400">
						</a>
					</li>
				
				
	
				
			</ul>
			<ul id="bannerCtrl" class="btn_list">
				
					<li class="btn_item active">1</li>
				
					<li class="btn_item ">2</li>
				
					<li class="btn_item ">3</li>

				
				
			</ul>
		</div>



		<div class="wq_body_wrapper container">
			<!-- hot && sale -->
			<div class="hot_sale_wrapper wq_clearfix">
				<div class="hot_sale_left">
					<div id="saleSlide" data-blockId="promotion_time_limited">
						<ul class="sale_slide_list">
							<?php for($i  = 0; $i < count($cheap); $i++) {  ?>						
							
								<li class="wq_clearfix">
									<a class="sale_img_wrapper" target="_blank" href="#">
										<img class="sale_img lazy" src="" data-original= '<?php echo $cheap[$i]->source ?>' height="240" width="320" />
										<div class="sale_info_wrapper">
											<h2 class="si_title"><?php echo $cheap[$i]->name ?></h2>
											<h3 class="si_desc"></h3>
											<div class="price_wrapper">
												<span class="new_price font_color_orange font_size14">
													<span class="font_size28"><?php echo $cheap[$i]->price ?></span>元/人起
												</span>
												<span class="sale_buy_btn">去看看</span>
											</div>
										</div>
									</a>
								</li>
							
							<?php } ?>
						</ul>
						<a class="prev_sale" href="javascript:;"></a>
						<a class="next_sale" href="javascript:;"></a>
					</div>
					
					<div class="hot_wrapper" data-blockId="promotion_hot">
						<h3>热门预定</h3>
						<div id="hotList">
							<div class="hot_box">
								
									<?php if($hot) for($i=0; $i < (int)(count($hot) / 4) + 1; $i ++) { ?>	
										<ul id="hot-top-12-test" class="hot_list">
									
									<?php for($j = 0; $j < count($hot) ; $j ++) { ?>
									<li>
										<a target="_blank" href="#">
											<img class="first_page lazy"  src="" data-original='<?php echo $hot[$i*4 + $j%4]->thumb ?>' width="80" height="60" />
											<span class="hl_title" title="<?php echo $hot[$i*4 + $j%4]->name ?>">
												
													<?php echo  $hot[$i*4 + $j%4]->name ?>
												
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												<span class="font_size16"><?php echo  $hot[$i*4 + $j%4]->price ?></span>元/人起
											</span>
										</p>
									</li>
									<?php } ?>
								
									
																
										</ul>
									<?php } ?>
									
								
							</div>
						</div>
						<a class="prev_hot" href="javascript:;"></a>
						<a class="next_hot" href="javascript:;"></a>
					</div>
					
					

				</div>
				<div class="hot_sale_right">
					
				</div>

		</div>

		<div class="wq_index_part wq_clearfix" id="">
			<h2 class="wq_index_part_title">精彩航线</h2>
			<ul class="local_trip_map" id="local_trip_map_list">
				<?php for($i = 0; $i < count($area) && $i < 8; $i ++) {?>
				<li data-content="<?php echo "lj".$i ?>" class= "<?php if($i)echo "local_trip_list hide"; else echo "local_trip_list" ?>">
					<h3 class="local_trip_title">&gt </h3>
					<div class="local_trip_container">
						<img class="local_trip_img lazy" src="" data-original='<?php echo $area[$i]->source ?>'  width="260" height="220">
					</div>
					<div class='route_description'>
						
						<p> 航线介绍:</p>
						<p>简介</p>
					</div>
				</li>
				<?php } ?>
			</ul>
			<div class="local_trip_main">
				<ul class="local_trip_area wq_clearfix" id="local_trip_area_list">
					<?php for($i = 0; $i < count($area) && $i < 8; $i ++) {?>
					<li data-target="lj" class="<?php if($i)echo "local_trip_area_li"; else echo "local_trip_area_li active" ?>"><a target="_blank" href="#"><?php echo $area[$i]->name ?></a><i class="la_radius_right"></i><i class="la_sharp"></i></li>
					<?php } ?>
				</ul>
				<a target="_blank" href="#" class="local_trip_more">更多&gt;</a>
				<div id="localjoin_wrapper"></div>
			</div>
		</div>
		


				<!-- 广告-->
				<a target="_blank" href="#" data-blockId="localjoin_banner_ad">
					<img class="wq_index_part lazy" width="993" height="90" src="" data-original="/"/>
				</a>

			<div class="wq_index_part wq_clearfix">
				<h2 class="wq_index_part_title">热门目的地之旅</h2>
				<ul class="local_trip_map trip_play_map" id="trip_play_map">
					 <?php for($i = 0; $i < count($continent) && $i < 8; $i ++) {?>
					<li data-content="<?php echo "ma".$i ?>" class= "<?php if($i)echo "trip_play_li hide"; else echo "trip_play_li" ?>" >
				    <a target="_blank" href="#" class="trip_play_title trip_play_title_ls"><span class="trip_play_title_ch"><?php echo $continent[$i]->name ?></span><i></i></a>
					<div class="local_trip_container local_trip_container_l">
							<p class="local_trip_container_para">可以玩什么？</p>
					</div>
					<?php } ?>
				</ul>
				<div class="local_trip_main trip_play_main" id="trip_play_main">
					<ul class="local_trip_area wq_clearfix" id="trip_city_list">
						<?php for($i = 0; $i < count($continent) && $i < 8; $i ++) {?>
						<li data-target="ma" class="<?php if($i)echo "local_trip_area_li"; else echo "local_trip_area_li active" ?>"><a target="_blank" href="#"><?php echo $continent[$i]->name ?></a><i class="la_radius_right"></i><i class="la_sharp"></i></li>
        	                                <?php } ?>
                                	</ul>

				 	<a target="_blank" href="#" class="local_trip_more">更多&gt;</a>
				</div>
			</div>	




                <div class="wq_index_part wq_clearfix" id="">
                        <h2 class="wq_index_part_title">热门邮轮</h2>
                        <ul class="local_trip_map" id="local_trip_map_list">
                                <?php for($i = 0; $i < count($boat) && $i < 8; $i ++) {?>
                                <li data-content="<?php echo "lj".$i ?>" class= "<?php if($i)echo "local_trip_list hide"; else echo "local_trip_list" ?>">
                                        <h3 class="local_trip_title">&gt;</h3>
                                        <div class="local_trip_container">
                                                <img class="local_trip_img lazy" src="" data-original='<?php $arr=explode(',', $boat[$i]->source); if($arr)echo $arr[0]; ?>'  width="260" height="220">
                                        </div>
                                </li>
                                <?php } ?>
                        </ul>
                        <div class="local_trip_main">
                                <ul class="local_trip_area wq_clearfix" id="local_trip_area_list">
                                        <?php for($i = 0; $i < count($boat) && $i < 8; $i ++) {?>
                                        <li data-target="lj" class="<?php if($i)echo "local_trip_area_li"; else echo "local_trip_area_li active" ?>"><a target="_blank" href="#"><?php echo $boat[$i]->name ?></a><i class="la_radius_right"></i><i class="la_sharp"></i></li>
                                        <?php } ?>
                                </ul>
                                <a target="_blank" href="#" class="local_trip_more">更多&gt;</a>
                                <div id="boat_wrapper"></div>
                        </div>
                </div>





			<div class="wq_index_part wq_fqa_part wq_clearfix">
				<section class="info_section">
					<h3>常见问题</h3>
					<ul class="info_list fqa_hot_list">
						<?php foreach($diary as $o) {?>
							<li>
								<a target="_blank" href="#"><?php echo $o->title?></a>

							</li>
						<?php } ?>
					</ul>
				</section>

				<section class="info_section">
                                        <h3>邮轮游记</h3>
                                        <ul class="info_list fqa_hot_list">
                                                <?php foreach($diary as $o) {?>
                                                        <li>
                                                                <a target="_blank" href="#"><?php echo $o->title?></a>

                                                        </li>
                                                <?php } ?>
                                        </ul>
                                </section>

                               <section class="info_section info_section_last">
                                        <h3>邮轮咨询</h3>
                                        <ul class="info_list fqa_hot_list">
                                                <?php foreach($diary as $o) {?>
                                                        <li>
                                                                <a target="_blank" href="#"><?php echo $o->title?></a>

                                                        </li>
                                                <?php } ?>
                                        </ul>
                                </section>



				
			</div>


		</div>




<script type="text/javascript" src="/js/jquery.lazyLoad.js"></script>
<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/index-route.js"></script>

<script type="text/javascript">





</script>
