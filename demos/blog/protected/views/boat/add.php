<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/boat/index">邮轮管理</a></li>
  <li class="active">新增邮轮</li>
</ol>


<script type="text/javascript" src="/silviomoreto-bootstrap-select-83d5a1b/js/bootstrap-select.js"></script>


<link rel="stylesheet" type="text/css" href="http://silviomoreto.github.io/bootstrap-select/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" media="screen"  href="/bootstrap-datepicker-master/css/datepicker3.css">  
   <script type="text/javascript"  src="/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>  






 <form class="form-horizontal" method="post" action="/boat/addInfo">
    <fieldset>
      <div id="legend" class="">
        <legend class="">邮轮信息</legend>
      </div>
	
        <table class="table">
                <tr>
                <td>邮轮名称</td>

                        <td> <input type="text" name="title" id="title"  >
</td>
                </tr>

		<tr>
                    <td>邮轮介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"></textarea>
                    </td>
                </tr>

		<tr>
			<td>图片</td>

	</table>


	 <div>

		<button class="btn btn-primary" type="submit"  id="submit" name="id" > 保存</button>
        </div>

    </fieldset>
  </form>


</div>
</div>


