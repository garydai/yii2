<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="zh_CN"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="zh_CN"><![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="zh_CN"><![endif]-->
<!--[if gt IE 9]><!--><html lang="zh_CN"><!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<title>美国旅游，去美国旅游网_我趣旅行网</title>
		<meta name="description" content="去美国旅游，上我趣。我趣旅行网提供美国全境的当地参团游、巴士游、自助游、酒店、机票、票券、体验活动、租车、导游、购物等一站式的旅行产品预订服务。" />
		<meta name="keywords" content="美国旅游,去美国旅游,美国旅游网" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<!--[if lt IE 9]>
	<script src="//dn-woqu.qbox.me/a168/js/common/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 8]>
	<script src="//dn-woqu.qbox.me/a168/js/common/json2.js"></script>
<![endif]-->
	</head>



<body>









<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/post/index">后台管理系统</a>
    </div>

    <div class="nav navbar-nav navbar-right">
		 <li><a href="/Admin/adminuser/logout">登出</a></li>
    </div>

  </div>
</nav>

<!--
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

-->

<div class="container-fluid">


       <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav" >
              	<li class="active"><a href="/post/index">首页</a></li>

		       <li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown">订单管理<span class="caret"></span></a>
          		<ul class="dropdown-menu" role="menu">
            			<li><a href="/book/undeal">未处理订单</a></li>
            			<li><a href="/book/done">已完成订单</a></li>
        		</ul>
        		</li>


      		 <li><a href="/route/index">航线管理</a></li>
      	         <li><a href="/company/index">邮轮公司管理</a></li>
       		 <li><a href="/boat/index">邮轮管理</a></li>

    		 <li><a href="/area/index">地区管理</a></li>
     		 <li><a href="/port/index">港口管理</a></li>
		 <li><a href="/diary/index">游记管理</a></li>
		 <li><a href="/interest/index">景点管理</a></li>
		 <li><a href="/food/index">美食管理</a><li>	
		 <li><a href="/room/index">舱房管理</a><li>

                 <li><a href="/restaurant/index">餐厅管理</a><li>

                 <li><a href="/entertainment/index">娱乐管理</a><li>
	
		<li><a href="/qna/index">问答管理</a><li>
    </ul>
        </div>


 <div class="col-xs-12 col-sm-10">
  
        <?php echo $content; ?>

</div>

<script type="text/javascript">
$(function(){


	$(".nav").find("li").each(function()
	{

		var a = $(this).find("a:first")[0];
		//alert($(a).attr("href"));
	 	//alert(location.pathname);


		if ($(a).attr("href") === location.pathname)
		{
			
			$(this).addClass("active");
		}
		else
		{
			$(this).removeClass("active");
		}


                if(location.pathname === "/book/undeal" || location.pathname === "/book/all")
                {
                        $(".dropdown").addClass("active");
                }


	});
})
</script>


</div>  

<!--
	<div id="footer">

		Copyright &copy; --><!--?php echo date('Y'); ?--><!-- by My Company.<br/>
		All Rights Reserved.<br/>-->
		<!--?php echo Yii::powered(); ?-->
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
