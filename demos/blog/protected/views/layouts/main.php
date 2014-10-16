<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />





        <script type="text/javascript" src=" <?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>



		<link href="/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">


<link href="/bootstrap-3.2.0-dist/css/bootstrap-theme.min.css" rel="stylesheet">


		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script src="/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>





	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	

</head>

<body>



<div class="container">  






<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/post/index">后台管理系统</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/post/index">首页</a></li>




       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">订单管理<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/book/undeal">未处理订单</a></li>
            <li><a href="/book/all">所有订单</a></li>
	</ul>
	</li>


        <li><a href="/route/index">航线管理</a></li>
	
	<li><a href="/boat/index">邮轮管理</a></li>

        <li><a href="/area/index">地区管理</a></li>
        <li><a href="/port/index">港口管理</a></li>


      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

-->
        <?php echo $content; ?>



<script type="text/javascript">
$(function(){


	$(".navbar-nav").find("li").each(function()
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
