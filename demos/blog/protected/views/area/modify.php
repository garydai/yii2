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






 <form class="form-horizontal" method="post" action="/area/saveInfo">
    <fieldset>
      <div id="legend" class="">
        <legend class="">地区信息</legend>
      </div>
	
        <table class="table">
                <tr>
                <td>地区名称</td>

                        <td> <input type="text" name="title" id="title"  value=<?php echo $area->name ?> >
</td>
                </tr>

		<tr>
                    <td>地区介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"><?php echo $area->description ?></textarea>
                    </td>
                </tr>

		<tr>
			<td>图片</td>

	</table>


	 <div>

		<button type="submit" value= <?php echo $area->id ?> id="submit" name="id" > 保存</button>
        </div>

    </fieldset>
  </form>


</div>
</div>


