

<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/port/index">港口管理</a></li>
  <li class="active">修改港口</li>
</ol>




<script type="text/javascript" src="/silviomoreto-bootstrap-select-83d5a1b/js/bootstrap-select.js"></script>


<link rel="stylesheet" type="text/css" href="http://silviomoreto.github.io/bootstrap-select/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" media="screen"  href="/bootstrap-datepicker-master/css/datepicker3.css">  
   <script type="text/javascript"  src="/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>  






 <form class="form-horizontal" method="post" action="/port/saveInfo">
    <fieldset>
      <div id="legend" class="">
        <legend class="">修改港口信息</legend>
      </div>
	
        <table class="table">
                <tr>
                <td>港口名称</td>

                        <td> <input type="text" name="title" id="title"  value=<?php echo $port->name ?> >
</td>
                </tr>

		<tr>
                    <td>港口介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"><?php echo $port->description ?></textarea>
                    </td>
                </tr>

		<tr>
			<td>图片</td>

	</table>


	 <div>

		<button class="btn btn-primary" type="submit" value= <?php echo $port->id ?> id="submit" name="id" > 保存</button>
        </div>

    </fieldset>
  </form>


</div>
</div>


