<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>





<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">行程安排</div>


  <input type=button  class="btn btn-success" value="修改行程" onclick="location.href =('<?php echo "/schedule/modify/route_id/".$route_id ?>') "/>
  <!-- Table -->
  <table class="table">



                    	  <thead>
                            <tr>
                               <td align="center">天数</td>
			       <td align="center">标题</td>

                               <td align="center">内容</td>

				 <td align="center">用餐</td>
				<td align="center">住宿</td>
				
                            </tr>
                          </thead>

		  <tbody>
                    <!--//循环开始-->
                    <?php if($schedule){?>
                    <?php for($i =0 ;$i< count($schedule) ; $i++){
                    ?>
                      <tr>

                        <td align="center" name="day" >
                          <?php echo $i+1 ?>
                        </td>

                        <td align="center"> <?php echo $schedule[$i]->title ?></td>

                        <td align="center"> <a href='<?php echo "/schedule/content/schedule_id/".$schedule[$i]->id?>'>详细信息</a> </td>

			 <td align="center"> <?php echo $schedule[$i]->eat ?></td>
			 <td align="center"> <?php echo $schedule[$i]->live ?></td>
                      </tr>
                    <?php }?>
                    <?php }?>
                    <!--//循环结束-->
		 </tbody>

	  </table>



</div>




