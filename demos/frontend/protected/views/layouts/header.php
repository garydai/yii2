<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="zh_CN"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="zh_CN"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="zh_CN"><![endif]-->
<!--[if gt IE 9]><!--><html lang="zh_CN"><!--<![endif]-->
<head>
        <meta charset="UTF-8">
        <title>会玩邮轮带您体验非凡邮轮之旅_玩邮轮旅行网</title>
        <meta name="description" content="会玩邮轮带您体验非凡邮轮之旅" />
        <meta name="keywords" content="玩邮轮" />
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

				<li class="wq_nav_op"><a target="_blank" href="#" rel="nofollow">帮助中心</a></li>
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


						<li class="pt15 wq_clearfix">
							<i></i>
							<h2 class="nm_area">
								<label >邮轮航线</label>
								<span class="select_box">
									<input id="shipidshow" type="text" value="请选择目的地" readonly="readonly" />
           							            <ul class="select_ul">
										    <?php for($i = 0; $i < count($this->g_area); $i ++){ ?>
								                    <li value="0" class="bigClass"><?php echo $this->g_area[$i]->name?></li>
											<?php } ?>
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





