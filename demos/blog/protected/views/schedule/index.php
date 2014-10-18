<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>





<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">行程安排</div>


  <input type=button  class="btn btn-primary" value="修改行程" onclick="location.href =('<?php echo "/schedule/modify/route_id/".$route_id ?>') "/>
  <!-- Table -->
  <table class="table">



                    	  <thead>
                            <tr>
                               <td align="center">天数</td>
			       <td align="center">标题</td>

                               <td align="center">内容</td>
				
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

                        <td align="center"> <?php echo $schedule[$i]->content ?></td>


                      </tr>
                    <?php }?>
                    <?php }?>
                    <!--//循环结束-->
		 </tbody>

	  </table>



</div>




