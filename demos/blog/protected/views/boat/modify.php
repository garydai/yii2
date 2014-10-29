<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/boat/index">邮轮管理</a></li>
  <li class="active">修改邮轮</li>
</ol>


<script type="text/javascript" src="/silviomoreto-bootstrap-select-83d5a1b/js/bootstrap-select.js"></script>


<link rel="stylesheet" type="text/css" href="http://silviomoreto.github.io/bootstrap-select/bootstrap-select.min.css">
 <link rel="stylesheet" type="text/css" media="screen"  href="/bootstrap-datepicker-master/css/datepicker3.css">  
   <script type="text/javascript"  src="/bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>  





<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">邮轮信息</div>

 <form class="form-horizontal" method="post" action="/boat/saveInfo">
    <fieldset>
        <table class="table">
                <tr>
                <td>邮轮名称</td>

                        <td> <input style="width:200px;" class="form-control" type="text" name="title" id="title"  value=<?php echo $boat->name ?> >
</td>
                </tr>
		<tr>
		<td>载客数</td>
			<td><input style="width:200px;" class="form-control" type="text" name="zaikeshu" value=<?php echo $boat->zaikeshu ?>></td>
		</tr>

                <tr>
                <td>排水量</td>
                        <td><input style="width:200px;" class="form-control" type="text" name="paishuiliang" value=<?php echo $boat->paishuiliang ?>></td>
                </tr>

                <tr>
                <td>最高速度</td>
                        <td><input class="form-control" style="width:200px;" type="text" name="zuigaosudu" value=<?php echo $boat->zuigaosudu ?>></td>
                </tr>

                <tr>
                <td>甲板楼层</td>
                        <td><input class="form-control" style="width:200px;" type="text" name="jiabanlouceng" value=<?php echo $boat->jiabanlouceng ?>></td>
                </tr>

                <tr>
                <td>工作人员</td>
                        <td><input class="form-control" style="width:200px;" type="text" name="gongzuorenyuan" value=<?php echo $boat->gongzuorenyuan ?>></td>
                </tr>

                <tr>
                <td>长度</td>
                        <td><input class="form-control" style="width:200px;" type="text" name="changdu" value =<?php echo $boat->changdu ?>></td>
                </tr>

                <tr>
                <td>宽度</td>
                        <td><input class="form-control" type="text" name="kuandu" value=<?php echo $boat->kuandu ?>></td>
                </tr>

                <tr>
                <td>高度</td>
                        <td><input class="form-control" type="text" name="gaodu" value=<?php echo $boat->gaodu ?>></td>
                </tr>




	
		<tr>
                    <td>邮轮介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"><?php echo $boat->description ?></textarea>
                    </td>
                </tr>

		<tr>
			<td>图片</td>

	</table>


	 <div>

		<button class="btn btn-success" type="submit" value= <?php echo $boat->id ?> id="submit" name="id" > 保存</button>
        </div>

    </fieldset>
  </form>

</div>
</div>
</div>


