<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="zh_CN"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="zh_CN"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="zh_CN"><![endif]-->
<!--[if gt IE 9]><!--><html lang="zh_CN"><!--<![endif]-->
<head>
        <meta charset="UTF-8">
        <title>美国旅游，去美国旅游网_我趣旅行网</title>
        <meta name="description" content="去美国旅游，上我趣。我趣旅行网提供美国全境的当地参团游、巴士游、自助游、酒店、机票、票券、体验活动、租车、导游、购物等一站
式的旅行产品预订服务。" />
        <meta name="keywords" content="美国旅游,去美国旅游,美国旅游网" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">



<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/js/wq.component.js"></script>

<link rel="stylesheet" type="text/css" href="/css/yl_common.css">
<link rel="stylesheet" type="text/css" href="/css/index.css">
<!--[if lt IE 9]>
<script src="//dn-woqu.qbox.me/a168/js/common/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 8]>
<script src="//dn-woqu.qbox.me/a168/js/common/json2.js"></script>
<![endif]-->
</head>


<style type="text/css">


.select_box{position:relative;}
.select_box input{cursor:pointer;width:100px;}
.select_box ul{background-color:#fdfdfd;display:none;border:1px solid #ccc;position:absolute;left:0; top:28px;width:155px;z-index:10;}
.select_box ul li{font: 12px/28px "宋体";text-align:left;color:#000;border-bottom: 1px solid #f4f4f4;cursor:pointer;padding-left:5px;}
.select_box ul li:hover{background-color:#1d7ad9;color:#fff;}
.select_box ul li.bigClass{font-weight:bold;}
.select_box ul li.smallClass{padding-left:30px;}


.hotsearch{margin:5px 0;border-top:1px solid #ebebeb}

.hotsearch .keyname{padding:0 10px;font-size: 15px}
.hotsearch .keyname a{line-height: 22px;font-size: 12px}



</style>
<body>

<script type="text/javascript">

$(function() {
    var t, u, n, i, r;
    $(".quick_weixin").hide(),
    $("#weixin").hover(function() {
        $(".quick_weixin").stop(!0, !0).slideDown()
    },
    function() {
        $(".quick_weixin").hide()
    }),
    $(".quick_qq").hide(),
    $("#qq").hover(function() {
        $(".quick_qq").stop(!0, !0).slideDown()
    },
    function() {
        $(".quick_qq").hide()
    }),
    $("#menusUl>div").hover(function() {
        var n = $(this).attr("id").replace("group", "");
        $("#" + n).addClass("menuhover"),
        $(this).show()
    },
    function() {
        var n = $(this).attr("id").replace("group", "");
        $("#" + n).removeClass("menuhover"),
        $(this).hide()
    }),
    $("#menusUl>ul>li").hover(function() {
        $("#" + this.id + "group").css("z-index", "1500").stop(!0, !0).slideDown(),
        $(this).addClass("menuhover")
    },
    function() {
        $("#" + this.id + "group").hide(),
        $(this).removeClass("menuhover")
    }),
    $("#divShow").animate({
        height: "100px"
    },
    400),
    $(".ship_mv").click(function() {
        $("#divShow").height() < $("#divContent").height() ? $("#divShow").stop(!0, !1).animate({
            height: $("#divContent").height() + 20
        },
        1e3) : $("#divShow").height() > 100 && $("#divShow").animate({
            height: "100px"
        },
        1e3)
    }),
    $(".product-tj").find(".tablist").hide().eq(0).show(),
    $(".product-tj .tabindex>li>a").removeClass("companryon").eq(0).addClass("companryon"),
    t = 0,
    $(".tabindex>li").hover(function() {
        var n = $(".tabindex>li").index(this);
        t != n && ($(this).parent().parent().parent().find(".tablist").hide().eq(n).show(), $(".tabindex>li>a").removeClass("companryon").eq(n).addClass("companryon")),
        t = n
    },
    function() {}),
    $(".product-tj").find(".show_product").hide().eq(0).show(),
    $(".product-tj .show_product_title>ul>li>a").removeClass("companryon").eq(0).addClass("companryon"),
    t = 0,
    $(".show_product_title>ul>li").hover(function() {
        var n = $(".show_product_title>ul>li").index(this);
        t != n && ($(this).parent().parent().parent().find(".show_product").hide().eq(n).show(), $(".show_product_title>ul>li>a").removeClass("companryon").eq(n).addClass("companryon")),
        t = n
    },
    function() {}),
    $(".product-tj>.room_info").hover(function() {
        $(this).children(".slideDiv").stop(!0, !1).animate({
            left: "120px"
        },
        300)
    },
    function() {
        $(this).children(".slideDiv").animate({
            left: "340px"
        },
        300)
    }),
    $(".jianban_img").children(":first").children().fadeOut(300).eq(0).fadeIn(300),
    $(".jiaban_tab>li>a").removeClass("hov1").eq(0).addClass("hov1"),
    u = 0,
    $(".jiaban_tab>li").hover(function() {
        var n = $(".jiaban_tab>li").index(this);
        u != n && ($(".jianban_img").children(":first").children().fadeOut(300).eq(n).fadeIn(300), $(".jiaban_tab>li>a").removeClass("hov1").eq(n).addClass("hov1")),
        u = n
    },
    function() {}),
    $(".banner_list").children(":first").children().hide().eq(0).show(),
    $(".SlideTriggers>a").removeClass().eq(0).addClass("tabhover"),
    n = 0,
    $(".SlideTriggers>a").hover(function() {
        var i = $(".banner_list").children(":first").children(),
        t = $(".SlideTriggers>a").index(this);
        n != t && (i.hide().eq(t).show(), $(".SlideTriggers>a").removeClass().eq(t).addClass("tabhover")),
        n = t
    },
    function() {}),
    setInterval(function() {
        var i = $(".banner_list").children(":first").children(),
        t = 0;
        n < i.length - 1 && (t = n + 1),
        i.hide().eq(t).show(),
        $(".SlideTriggers>a").removeClass().eq(t).addClass("tabhover"),
        n = t
    },
    5e3),
    $(".linelist").each(function() {
        var t = $(this).find("a").attr("href").replace(/[^0-9]/ig, ""),
        n = $(this);
        $.ajax({
            type: "Get",
            url: "/api/ShowTuBiao/",
            data: {
                id: t
            },
            success: function(t) {
                n.find(".ltubiao").html(t)
            }
        }),
        $.ajax({
            type: "Get",
            url: "/api/ShowCanKaoPrice/",
            data: {
                id: t
            },
            success: function(t) {
                n.find(".cankao_price").html(t)
            }
        })
    }),
    $(".apishipimg").each(function() {
        var t = $(this).attr("value").replace(/[^0-9]/ig, ""),
        n = $(this);
        $.ajax({
            type: "Get",
            url: "/api/ShipTuPian/",
            data: {
                id: t
            },
            success: function(t) {
                n.attr("src", t)
            }
        })
    }),
    $(".tourguide dd").hide(),
    $(".tourguide").children(":first").children("dt").addClass("tit_on"),
    $(".tourguide").children(":first").children("dd").show(),
    $(".tourguide dt").click(function() {
        $(this).next().is(":hidden") ? ($(".tourguide dt").removeClass("tit_on"), $(".tourguide dd").slideUp(), $(this).next().slideDown(), $(this).addClass("tit_on")) : ($(".tourguide dt").removeClass("tit_on"), $(".tourguide dd").slideUp())
    }),
    $(".index_ship>div>.hot_ship").hover(function() {
        $(this).find(".shiptxt").stop(!0, !1).animate({
            height: "180px"
        },
        500)
    },
    function() {
        $(this).find(".shiptxt").animate({
            height: "20%"
        },
        500)
    }),
    $(".select_box input").click(function() {
        var t = $(this),
        i = $(this).next("input"),
        n = $(this).parent().find("ul");
        n.css("display") == "none" ? ($(".select_box ul").hide(), n.height() > 280 && n.css({
            height: "280px",
            "overflow-y": "scroll"
        }), n.show(), n.hover(function() {},
        function() {
            n.hide()
        }), n.find("li").click(function() {
            t.val($.trim($(this).text())),
            i.val($(this).attr("value")),
            n.hide()
        }).hover(function() {
            $(this).addClass("hover")
        },
        function() {
            $(this).removeClass("hover")
        })) : n.hide()
    }),
    i = $(".search_bg .tab_list").width(),
    $(".search_bg .searchtitle>span").click(function() {
        $(".search_bg .searchtitle>span").removeClass("current"),
        $(this).addClass("current");
        var n = $(".search_bg .searchtitle>span").index(this);
        $(".search_bg #typeid").val(n + 1),
        $(".search_bg .tab_list").stop(!0, !1).animate({
            width: i,
            "margin-left": i / 20
        },
        300),
        $(".search_bg .tab_list").animate({
            width: i,
            "margin-left": "0px"
        },
        300,
        function() {
            $(this).css("overflow", "visible")
        }),
        $(".search_bg .tab_list").css("overflow", "visible")
    }),
    r = $(".smallsearch .searchtj").width(),
    $(".smallsearch .searchtitle>span").click(function() {
        $(".smallsearch .searchtitle>span").removeClass("current"),
        $(this).addClass("current");
        var n = $(".smallsearch .searchtitle>span").index(this);
        $(".smallsearch #typeid").val(n + 1),
        $(".smallsearch .searchtj").stop(!0, !1).animate({
            width: r,
            "margin-left": r / 20
        },
        300),
        $(".smallsearch .searchtj").animate({
            width: r,
            "margin-left": "0px"
        },
        300,
        function() {
            $(this).css("overflow", "visible")
        })
    })
})

</script>

<header id="wq_header">
	<div class="wq_header_top">
		<div class="wq_header_top_container wq_clearfix">
			
			<ul class="wq_header_top_right wq_clearfix">

				<li class="wq_nav_op"><a target="_blank" href="h#" rel="nofollow">帮助中心</a></li>
			</ul>
			
		</div>
	</div>
	<div class="wq_header_bottom_wrapper">
		<div class="wq_header_bottom">
			<a id="wq_logo" target="_self" href="#"></a> 
			<em class="header_partner"></em>
		</div>
	</div>


<nav class="header_nav">
	<ul class="wq_clearfix" id="head_navigator">
		<li class="nav_main">
			<div id="allProTag" class="all_product_tag" target="_blank" href="javascript:;">
				<span>这里起航<i></i></span>
				<div class="nm_side_bar">
					<div class="nmsb_mask"></div>	
					<form action="/search_0_0_0_0_0_0.html" method="get" id="searchForm">			

						<li class="wq_clearfix">
							<i></i>
							<div class="nm_area">
								
									<label >产品编号</label>
									<input class="left"  style="width:100px;" type="text" id="bianhao" name="biaohao" onclick="if(this.value=='输入编号') this.value='';" onblur="if(this.value=='') this.value='输入编号';" value="输入编号"/>
								
							</div>
							
						</li>

						<li class="pt15 wq_clearfix">
							<i></i>
							<h2 class="nm_area">
								<label >邮轮航线</label>
								<span class="select_box">
									<input id="shipidshow" type="text" value="请选择目的地" readonly="readonly" />
           							            <ul class="select_ul">
								                    <li value="0" class="bigClass">全部</li>
								            </ul>

								</span>

							</h2>
							
						</li>

						<li class="pt15 wq_clearfix">
							<i></i>
							<h2 class="nm_area">
								<label >邮轮公司</label>

								<span class="select_box">
									<input id="shipidshow" type="text" value="请选择邮轮公司" readonly="readonly" />
           							            <ul class="select_ul">
								                    <li value="0" class="bigClass">全部</li>
								            </ul>

								</span>

							</h2>
							
						</li>
						<li class="pt15 wq_clearfix">
							<i></i>
							<h2 class="nm_area">
								<label >开航日期</label>

								<span class="select_box">
									<input id="shipidshow" type="text" value="请选择开航日期" readonly="readonly" />
           							            <ul class="select_ul">
								                    <li value="0" class="bigClass">全部</li>
								            </ul>

								</span>

							</h2>
							
						</li>
						<li class="pt15 wq_clearfix">
							<i></i>
								<h2 class="nm_area">
								<label >出发城市</label>

								<span class="select_box">
									<input id="shipidshow" type="text" value="请选择出发城市" readonly="readonly" />
           							            <ul class="select_ul">
								                    <li value="0" class="bigClass">全部</li>
								            </ul>

								</span>

							</h2>
							
						</li>
								
					</form>


				    <div class="hotsearch">
					    <span>当季热门邮轮</span>
						    <div class="keyname">
							    <a href="#" target="_blank">日韩航线</a>
							    <a href="#" target="_blank">地中海航线</a>
							    <a href="#" target="_blank">歌诗达邮轮</a>
							    <a href="#" target="_blank">皇家加勒比邮轮</a>
						    </div>
				    </div>




				</div>
			</div>
		</li>
		
		
		<li class="nav_channel" data-nav="homepage"><a target="_self" href="#">首页</a></li>
		<li class="nav_channel" data-nav="localjoin"><a target="_blank" href="#">邮轮航线<em></em></span></a><i class="nav_triangle"></i>
			<ul class="nav_sub_list nsl_lj">
				<li><a target="_blank" href="#">美国东海岸</a></li>
				<li><a target="_blank" href="#">美国西海岸</a></li>
				<li><a target="_blank" href="#">夏威夷</a></li>
				<li><a target="_blank" href="#">佛罗里达</a></li>
				<li><a target="_blank" href="#">阿拉斯加</a></li>
			</ul>
		</li>
		<li class="nav_channel" data-nav="mustactive"><a target="_blank" href="#">邮轮公司<em></em></a><i class="nav_triangle"></i>
			<ul class="nav_sub_list nsl_ms">
				<li><a target="_blank" href="#">纽约</a></li>
				<li><a target="_blank" href="#">华盛顿</a></li>
				<li><a target="_blank" href="#">洛杉矶</a></li>
				<li><a target="_blank" href="#">旧金山</a></li>
				<li><a target="_blank" href="#">拉斯维加斯</a></li>
				<li><a target="_blank" href="#">夏威夷</a></li>
				<li><a target="_blank" href="#">奥兰多</a></li>
				<li><a target="_blank" href="#">迈阿密</a></li>
			</ul>
		</li>
		<li class="nav_channel" data-nav="car"><a target="_blank" href="#">攻略游记</a></li>
		<li class="nav_channel" data-nav="hotel"><a target="_blank" href="#">聚焦邮轮</a></li>
		<li class="nav_channel" data-nav="traffic"><a target="_blank" href="#">优惠活动</a></li>
		
		
	</ul>
</nav>
	




	
	
	
</header>



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
							
							
								<li class="wq_clearfix">
									<a class="sale_img_wrapper" target="_blank" href="http://www.woqu.com/usa-mustactive-detail-nstd_XEMPIRE001">
										<img class="sale_img lazy" src="" data-original='http://dn-woqu.qbox.me/via/400x300/empire-state-building-tickets-observatory-and-optional-skip-the-line-in-new-york-city-49154_20140912223317539.jpg' height="240" width="320" />
										<div class="sale_info_wrapper">
											<h2 class="si_title">test</h2>
											<h3 class="si_desc"></h3>
											<div class="price_wrapper">
												<span class="new_price font_color_orange font_size14">
													USD<span class="font_size28">24.0</span>/人起
												</span>
												<del class="del_price font_color_gray font_size12">
													
														原价USD<span class="font_size16">30.0</span>/人起
													
												</del>
												<span class="sale_buy_btn">去看看</span>
											</div>
											<div class="count_down" name="countDown" data-endTime="2014-12-03 00:00:00.0">
												<i></i>
												剩余
												<span name="day">0</span>天
												<span name="hour">0</span>时
												<span name="minute">0</span>分
												<span name="second">0</span>秒
											</div>
										</div>
									</a>
								</li>
							
								<li class="wq_clearfix">
									<a class="sale_img_wrapper" target="_blank" href="http://www.woqu.com/usa-localjoin-detail-tou_bu25ac18">
										<img class="sale_img lazy" src="" data-original='http://dn-woqu.qbox.me/guide/origin/0_20140926150518713.jpg' height="240" width="320" />
										<div class="sale_info_wrapper">
											<h2 class="si_title">test2</h2>
											<h3 class="si_desc"></h3>
											<div class="price_wrapper">
												<span class="new_price font_color_orange font_size14">
													USD<span class="font_size28">414.75</span>/人起
												</span>
												<del class="del_price font_color_gray font_size12">
													
														原价USD<span class="font_size16">497.7</span>/人起
													
												</del>
												<span class="sale_buy_btn">去看看</span>
											</div>
											<div class="count_down" name="countDown" data-endTime="2014-11-18 00:00:00.0">
												<i></i>
												剩余
												<span name="day">0</span>天
												<span name="hour">0</span>时
												<span name="minute">0</span>分
												<span name="second">0</span>秒
											</div>
										</div>
									</a>
								</li>
						
							
						</ul>
						<a class="prev_sale" href="javascript:;"></a>
						<a class="next_sale" href="javascript:;"></a>
					</div>
					
					<div class="hot_wrapper" data-blockId="promotion_hot">
						<h3>热销榜</h3>
						<div id="hotList">
							<div class="hot_box">
								
									
										<ul id="hot-top-12-test" class="hot_list">
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-localjoin-detail-tou_bu25ac79">
											<img class="first_page"  src="" data-original='//dn-woqu.qbox.me/poi/120x90/d/138968591271802.jpg' width="80" height="60" />
											<span class="hl_title" title="4日<经典>旧金山、优胜美地/17哩湾、斯坦福大学、丹麦城、硅谷超值游(优美风光+顶级学府）">
												
													test3
												
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">155.33</span>/人起
											</span>
										</p>
									</li>
									
								
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-mustactive-detail-via_3461tandem">
											<img class="first_page"  src="" data-original='http://dn-woqu.qbox.me/via/120x90/las-vegas-tandem-skydiving-in-las-vegas-48098.jpg' width="80" height="60" />
											<span class="hl_title" title="拉斯维加斯双人跳伞之旅，体验自由落体的惊险刺激">
												
												
													test4
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">228.99</span>/人起
											</span>
										</p>
									</li>
											
										</ul>
									
								
									
										<ul id="hot-top-12-test" class="hot_list">
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-localjoin-detail-tou_bu36ac42">
											<img  class="lazy" src="" data-original='//dn-woqu.qbox.me/poi/120x90/s/138900642905773.jpg' width="80" height="60" />
											<span class="hl_title" title="6日<畅玩>纽约、华盛顿、波士顿、尼亚加拉瀑布豪华游(知名学府深度游）">
												
													test5
												
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">265.0</span>/人起
											</span>
										</p>
									</li>
									
								
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-mustactive-detail-via_2030vip">
											<img  class="lazy" src="" data-original='http://dn-woqu.qbox.me/via/120x90/the-vip-experience-at-universal-studios-hollywood-in-los-angeles-136764.jpg' width="80" height="60" />
											<span class="hl_title" title="好莱坞环球影城VIP门票，享受明星般的贵宾体验">
												
												
													test6
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">298.99</span>/人起
											</span>
										</p>
									</li>
																																		
										</ul>
									
								
									
										<ul id="hot-top-12-test" class="hot_list">
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-localjoin-detail-tou_bu36ac36">
											<img  class="lazy" src="" data-original='//dn-woqu.qbox.me/poi/120x90/p/138866543926149.jpg' width="80" height="60" />
											<span class="hl_title" title="7日<畅玩>纽约、波士顿、尼亚加拉瀑布、哈佛大学、西点军校、Woodbury购物豪华游(全程入住豪华酒店）">
												
													123
												
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">307.5</span>/人起
											</span>
										</p>
									</li>
									
								
									
									<li>
										<a target="_blank" href="http://www.woqu.com/usa-mustactive-detail-nstd_bdika001">
											<img  class="lazy" src="" data-original='http://dn-woqu.qbox.me/via/120x90/A_20140905165106940.jpg' width="80" height="60" />
											<span class="hl_title" title="米高梅大赌场酒店-太阳剧团《KA》秀">
												
												
													123
												
											</span>
										</a>
										<p class="wq_clearfix">
											<span class="hl_price font_color_orange font_size12">
												USD<span class="font_size16">153.95</span>/人起
											</span>
										</p>
									</li>
									
																
										</ul>
									
								
							</div>
						</div>
						<a class="prev_hot" href="javascript:;"></a>
						<a class="next_hot" href="javascript:;"></a>
					</div>
					
					

				</div>
				<div class="hot_sale_right">
					
				</div>
			</div>

		</div>




<script type="text/javascript">


	$('.nm_side_bar').show();


	var bannerSlider = new Slider($('#bannerSlider'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: true,
					mode: 'fade',
					controller: $('#bannerCtrl'),
					activeControllerCls: 'active'
				});



	//sale slide
	var saleSlider = new Slider($('#saleSlide'), {
		time: 5000,
		delay: 400,
		event: 'hover',
		auto: false,
		mode: 'slide',
		controller: $(),
		activeControllerCls: ''
	});
	$('.prev_sale').click(function() {
		saleSlider.prev();
		$('#saleSlide').find('.lazy').trigger('sporty');
	});
	$('.next_sale').click(function() {
		saleSlider.next();
		$('#saleSlide').find('.lazy').trigger('sporty');
	});

	//hot slide
	var hotSlider = new Slider($('#hotList'), {
		time: 5000,
		delay: 400,
		event: 'hover',
		auto: false,
		mode: 'fade',
		controller: $(),
		activeControllerCls: ''
	});
	$('.prev_hot').click(function() {
		hotSlider.prev();
		$('#hotList').find('.lazy').trigger('sporty');
	});
	$('.next_hot').click(function() {
		hotSlider.next();
		$('#hotList').find('.lazy').trigger('sporty');
	});




</script>







</body>
</html>