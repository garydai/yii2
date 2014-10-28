<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>





<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">行程安排</div>


  <button type=button  class="btn btn-success " onclick="location.href = ('<?php echo  "/schedule/add/route_id/{$route_id}" ?>')  "> <span class="glyphicon glyphicon-plus"></span></button>


  <!-- Table -->
  <table class="table">



                    	  <thead>
                            <tr>
                               <td align="center">天数</td>
                               <td align="center">内容</td>

			       <td align="center">用餐</td>
 			       <td align="center">住宿</td>
  			       <td  align="center">操作</td>
	
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

                        <td align="center"> <a href='<?php echo "/schedule/content/schedule_id/".$schedule[$i]->id?>'>详细信息</a> </td>

			 <td align="center"> <?php echo $schedule[$i]->eat ?></td>
			 <td align="center"> <?php echo $schedule[$i]->live ?></td>

			<td align="center"><a href="/schedule/modify/schedule_id/<?php echo $schedule[$i]->id;?>"><span class="glyphicon glyphicon-pencil"</span></a>&nbsp;&nbsp; <a href="/schedule/remove/schedule_id/<?php echo $schedule[$i]->id;?>"><span class="glyphicon glyphicon-trash"</span></a></td>

                      </tr>
                    <?php }?>
                    <?php }?>
                    <!--//循环结束-->
		 </tbody>

	  </table>



</div>




