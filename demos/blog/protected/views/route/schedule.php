<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>




<div class="right">
        <!-- //开始 展示数据 -->
       	    <div class="showinfo showinfoH showinfoD" >
              <table width="100%" border="0" cellspacing="1">
                    	  <thead>
                            <tr>
                               <td width="12%"  align="center">天数</td>
			       <td width="12%"  align="center">标题</td>

                               <td width="12%" align="center">内容</td>
                            </tr>
                          </thead>

		  <tbody>
                    <!--//循环开始-->
                    <?php if($model){?>
                    <?php for($i =0 ;$i< $days ; $i++){
			if($i < count($model) )
                           $route = $model[$i];
			else $route = null;
                    ?>
                      <tr>
                        <td align="center">
                          <?php echo $i+1 ?>
                        </td>
			 <td align="center">
                          <?php if($route)
				echo $route->title?>
                        </td>

                        <td align="center">
                          <?php 
				if($route)
				echo $route->content?>
                        </td>

                      </tr>
                    <?php }?>
                    <?php }?>
                    <!--//循环结束-->
		 </tbody>

	  </table>
	 </div>



</div>




