<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>


<script type="text/javascript" src="/silviomoreto-bootstrap-select-83d5a1b/js/bootstrap-select.js"></script>


<link rel="stylesheet" type="text/css" href="http://silviomoreto.github.io/bootstrap-select/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" media="screen"  href="/bootstrap-datepicker-master/css/datepicker3.css">  
   <script type="text/javascript"  src="/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>  






 <!--form class="form-horizontal" method="get" action="/route/saveInfo" -->
	 <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">航线信息</legend>
      </div>
	
        <table class="table">
                <tr>
                <td>航线名称</td>

                        <td> <input class="form-control" style="width:200px;" type="text" name="title" id="title"  value=<?php echo $route->name ?> >
</td>
                </tr>


                 <tr>

                       <td>地区</td>
			
                        <td><select class="selectpicker area" name="area" id="area">


                               <?php if($area){ ?>
                                <?php for($i =0 ;$i< count($area) ; $i++){?>
                                <option><?php echo $area[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>

                          </select>
                        </td>

                </tr>


                 <tr>

                       <td>邮轮</td>
			
                        <td><select class="selectpicker boat" name="boat" id="boat" >
				
				<?php if($boat){ ?>
			        <?php for($i =0 ;$i< count($boat) ; $i++){?>
				<option><?php echo $boat[$i]->name ?> </option>
				
				<?php }?>
				<?php }?>
				</select>
                        </td>

                </tr>



                 <tr>

                       <td>港口</td>

                        <td><select class="selectpicker port " multiple name="port" id="port">


                              <?php if($port){ ?>
                                <?php for($i =0 ;$i< count($port) ; $i++){?>
                                <option><?php echo $port[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>



                          </select>
                        </td>

                </tr>





                <tr>
                <td>出发时间</td>

		<td>
			<!--div class="input-prepend input-group"-->


		 <!--div id="datetimepicker" class="input-append date"-->  
				<input type="text" class="form-control" style="width:200px;" name="date" id="datepicker" data-date-format="yyyy-mm-dd" value= <?php echo $route->start_time?> />

			<!--/div-->
			<script type="text/javascript">
						$(document).ready(function() {


							$('#datepicker').datepicker();  

						});
					</script>



                </td>
                </tr>

		<!--
                <tr>
                <td>行程天数</td>

		</td>
                </tr>
		-->

		


		<tr>
                    <td>航线介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" class="form-control" id="description"><?php echo $route->description ?></textarea>
                    </td>
                </tr>


	</table>


	 <div>

		<!--input type="submit" value="保存" id="submit" name="submit" /-->
		 <button class="btn btn-primary " onclick="onsave(<?php echo $route->id?>)">保存</button>   
        </div>

    </fieldset>
  </form>




<script type="text/javascript">



function onsave(route_id)
{






o = document.getElementById("port");
	var t ="";
	t += $("#port").val();
	//alert($("#port").val());
       $.ajax({

            type:"post",
            dataType:"json",//dataType (xml html script json jsonp text)
            data:{
			"id":route_id,
			"title":$("#title").val(),
			"area":$("#area").val(),
			"port":t,
			"boat":$("#boat").val(),
			"days":$("#days").val(),
			"description":$("#description").val(),
			"date":$("#datepicker").val()
			},
           url:"/route/saveInfo",
            success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");


                alert("success");
                }




        //    type:"get",
          //  dataType:"json",//dataType (xml html script json jsonp text)
         //   data:{id:2},
          //  url:"/route/saveInfo",
           // success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");

//
  //             alert("success");
    //            }


        });





}

$(function() {

$('.selectpicker').selectpicker({
      size: 10
  });


 //$('.area').selectpicker('val', ['济州','福冈']);


	
       $.ajax({
            type:"get",
            dataType:"json",//dataType (xml html script json jsonp text)
	    data:{id:2},
            url:"/route/getInfo",
            success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");

		$('.boat').selectpicker('val', json.boat);
		$('.area').selectpicker('val', json.area);
		var v = json.port.split(',');
		$('.port').selectpicker('val', v);

                //alert("success")
		}
	});


})
</script>
<!--

<div>
    <ul id="index-tabs" class="nav nav-tabs">
        <li><a class="active" href="http://www.biapost.com/demo/admin.php?m=index&c=index&a=index" data-toggle="tab">Tab Header 1</a></li>
        <li><a href="/your_url_2" data-toggle="tab">Tab Header 2</a></li>
    </ul>
</div>


-->

<!--
<div class="tabbable">
    <ul class="nav nav-tabs" id="myTabs">    
        <li><a href="#home"  class="active" data-toggle="tab">Home</a></li>
        <li><a href="#foo" data-toggle="tab">Foo</a></li>
        <li><a href="#bar" data-toggle="tab">Bar</a></li>
    </ul>
 
    <div class="tab-content">
        <div class="tab-pane active" id="home"></div>
        <div class="tab-pane" id="foo"></div>
        <div class="tab-pane" id="bar">Some static text. (displayed if AJAX request fails)</div>
    </div>
</div>
-->
<!--

<div class="hero-unit clearfix">
			<div class="col-md-12">

    <div class="tabbable">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a class="glyphicon glyphicon-th-list" href="javascript:void(0)">文章列表</a></li>
            <li><a class="glyphicon glyphicon-th-list" href="http://www.biapost.com/demo/admin.php?m=content&c=article&a=indexchoice"><em>精选文章</em></a></li>
            <li><a class="glyphicon glyphicon-plus" href="http://www.biapost.com/demo/admin.php?m=content&c=article&a=add"><em>添加文章</em></a></li>
        </ul>
    </div>

</div>
</div>

-->
<!--
<ul id="myTab" class="nav nav-tabs">
   <li class="active"> <a class="glyphicon glyphicon-th-list" data-toggle="tab"  >航线</a> </li>
   <li><a href="#boat" data-toggle="tab" onclick='showPage("tab1", "tab1.php")'>邮轮</a></li>
   <li><a href="#port" data-toggle="tab">路过港口</a></li>
   <li><a href="#start" data-toggle="tab">出发时间</a></li>
   <li><a href="#days" data-toggle="tab">旅游天数</a></li>
</ul>



<div>
<div id="myTabContent" class="tab-content">
  
</div>
</div>
-->
<!--
<div class="tab-pane fade in active" id="route">

						<select id="example1">
							<option value="cheese" selected>Cheese</option>
							<option value="tomatoes">Tomatoes</option>
							<option value="mozarella">Mozzarella</option>
							<option value="mushrooms">Mushrooms</option>
							<option value="pepperoni">Pepperoni</option>
							<option value="onions">Onions</option>
						</select>

</div>

 <div class="tab-pane fade" id="boat">
-->


<!-- Build your select: -->
<!--select class="multiselect" multiple="multiple"-->


<!--/select-->
 
<!-- Initialize the plugin: -->
<!--
<script type="text/javascript">
  $(document).ready(function() {
    $('.multiselect').multiselect();
  });

  function showPage(var1, var2)
  {


	var aa=	'  <select id="example1"><option value="cheese" selected>Cheese</option><option value="tomatoes">Tomatoes</option><option value="mozarella">Mozzarella</option><option value="mushrooms">Mushrooms</option></select>';
   document.getElementById("boat").innerHTML = aa;

  }



    $(function() {



	var baseURL = '/index.php/book/index';
        //load content for first tab and initialize
	//alert(baseURL);
	  $.get(baseURL, function (data) {
	//	alert(1);
	//	document.write(data);
        	        $('#home').html(data);
        //$('#home').load(baseURL, function() {

		//alert(baseURL);
          //  $('#myTabs').tab(); //initialize tabs
        });    


        $('#myTabs').bind("show", function(e) {   





 $.get(baseURL, function (data) {
        //      alert(1);
        //      document.write(data);
                        $('#home').html(data);

});

		alert(1); 
           var pattern=/#.+/gi //use regex to get anchor(==selector)
           var contentID = e.target.toString().match(pattern)[0]; //get anchor        
		alert(contentID); 
           //load content for selected tab
            $(contentID).load(baseURL+contentID.replace('#',''), function(){
                $('#myTabs').tab(); //reinitialize tabs
            });
        });
    });




</script>

-->

<!--
   </div>

   <div class="tab-pane fade" id="port">



   </div>

   <div class="tab-pane fade" id="start">
      <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
   </div>
   <div class="tab-pane fade" id="days">
      <p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。
      </p>
   </div>
</div>


-->
