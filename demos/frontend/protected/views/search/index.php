<link rel="stylesheet" href="/css/zyl1.css">

<link rel="stylesheet" href="/css/zyl2.css">


<div class="main_w">
<div class="main">
	<div class="filter_w shadow">
		<div class="filter_box cf">
			<div class="filter_name fn1">按目的地</div>
			<div class="filter_item filter_destination_item" txt="目的地" ftype="destination">
				<ul>
					<li><a href="javascript:void(0)" key_val="-1" range="all" class="active">不限</a></li>
					<?php for($i = 0; $i < count($continent); $i ++){ ?>
                                        	<li value="0" ><a><?php echo $continent[$i]->name?></a></li>
                                        	<?php for($j = 0; $j < count($area); $j ++)  if($area[$j]->continent == $continent[$i]->name){?>
                                                   <li value = '1'><a><?php echo $area[$j]->name?></a></li>
                                                <?php } ?>
                                        <?php } ?>

				</ul>
			</div>
		</div>


		<div class="filter_box cf">
			<div class="filter_name fn4">邮轮公司</div>
			<div class="filter_item filter_corps_item" txt="邮轮公司" ftype="corps">
				<ul style="width:800px;">
					<li><a href="javascript:void(0)" key_val="-1" range="all" class="active">不限</a></li>
                                        <?php for($i = 0; $i < count($company); $i ++){ ?>
                                                <li value="0" ><a><?php echo $company[$i]->name?></a></li>
                                        <?php } ?>
					 
				</ul>
			</div>
		</div>


		<div class="filter_box cf">
			<div class="filter_name fn2">出发时间</div>
			<div class="filter_item filter_time_item" txt="出发时间" ftype="time">
				<ul>
					<li><a href="javascript:void(0)" key_val_begin="-1" key_val_end="-1" range="all" class="active">不限</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2014-11-01" key_val_end="2014-11-30">11月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2014-12-01" key_val_end="2014-12-31">12月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-01-01" key_val_end="2015-01-31">1月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-02-01" key_val_end="2015-02-28">2月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-03-01" key_val_end="2015-03-31">3月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-04-01" key_val_end="2015-04-30">4月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-05-01" key_val_end="2015-05-31">5月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-06-01" key_val_end="2015-06-30">6月</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2015-01-01" key_val_end="2015-12-31">2015年</a></li>
					<li><a href="javascript:void(0)" key_val_begin="2016-01-01" key_val_end="2016-12-31">2016年</a></li>
					<li class="custom"><span class="custom_btn">准确时间</span></li>
					<li class="self"><input type="text" id="startDate" tip="最早出发时间" value="最早出发时间"><span>~</span><input type="text" id="endDate" tip="最晚出发时间" value="最晚出发时间"><button type="button" class="self_confirm">确定</button><a href="javascript:void(0)" style="display:none;" key_val_begin="" key_val_end=""></a></li>
				</ul>
			</div>
		</div>

		<div class="filter_box cf">
			<div class="filter_name fn3">航程天数</div>
			<div class="filter_item filter_days_item" txt="航程天数" ftype="days">
				<ul>
					<li><a href="javascript:void(0)" key_val="-1" range="all" class="active">不限</a></li>
					<li><a href="javascript:void(0)" key_val="1-3">3天以下</a></li>
					<li><a href="javascript:void(0)" key_val="4">4天</a></li>
					<li><a href="javascript:void(0)" key_val="5">5天</a></li>
					<li><a href="javascript:void(0)" key_val="6">6天</a></li>
					<li><a href="javascript:void(0)" key_val="7">7天</a></li>
					<li><a href="javascript:void(0)" key_val="8">8天</a></li>
					<li><a href="javascript:void(0)" key_val="9">9天</a></li>
					<li><a href="javascript:void(0)" key_val="10">10天</a></li>
					<li><a href="javascript:void(0)" key_val="11-0">10天以上</a></li>
				</ul>
			</div>
		</div>




	</div>
</div>
</div>
