<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">航线信息</div>
  <!-- Table -->
  <table class="table">
    


                          <thead>
                            <tr>
                               <td width="12%"  align="center">航线</td>
                        
                               <td width="12%"  align="center">邮轮</td>

                               <td width="12%" align="center">路过港口</td>
                               <td width="12%" align="center">出发时间</td>
                               <td width="12%" align="center">旅游天数</td>
                               <td width="12%" align="center">价格</td>
                               <td width="12%" align="center">行程安排</td>
                               <td width="12%" align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>
                     <?php $route = $model; ?>
                      <tr id=<?php echo 0; $id="0" ?>>
                        <td align="center" id="name">
                          <?php echo $route->name?>
                        </td>
                         <td align="center" id="bote">
                          <?php echo $route->boat?>
                        </td>

                        <td align="center" id="port">
                          <?php echo $route->port?>
                        </td>
                        <td align="center" id="start">
                          <?php echo $route->start_time?>
                        </td>
                        <td align="center" id="days">
                          <?php echo $route->days?>
                        </td>
                        <td align="center">
                         <a href="/route/price/routeId/<?php echo $route->id;?>"><?php echo $route->price ?>元起</a>

                        </td>
                        
                         <td align="center"> 
                            <a href="/route/schedule/routeId/<?php echo $route->id;?>">详情</a>
                        </td>
                        <td align="center"><a href="/route/modify/routeId/<?php echo $route->id;?>">修改</a>&nbsp; <button  href="javascript:;" class="delete">删除</button></td>       
                      </tr>
                 </tbody>

  </table>
</div>




<!--
<div class="right" id="test">
       	    <div class="showinfo showinfoH showinfoD" >
              <table width="100%" border="0" cellspacing="1">
                    	  <thead>
                            <tr>
                               <td width="12%"  align="center">航线</td>
			
			       <td width="12%"  align="center">邮轮</td>

                               <td width="12%" align="center">路过港口</td>
                               <td width="12%" align="center">出发时间</td>
                               <td width="12%" align="center">旅游天数</td>
                               <td width="12%" align="center">价格</td>
                               <td width="12%" align="center">行程安排</td>
			       <td width="12%" align="center">操作</td>
                            </tr>
                          </thead>

		  <tbody>
		     <?php $route = $model; ?>
                      <tr id=<?php echo 0; $id="0" ?>>
                        <td align="center" id="name">
                          <?php echo $route->name?>
                        </td>
			 <td align="center" id="bote">
                          <?php echo $route->boat?>
                        </td>

                        <td align="center" id="port">
                          <?php echo $route->port?>
                        </td>
                        <td align="center" id="start">
		    	  <?php echo $route->start_time?>
			</td>
                        <td align="center" id="days">
                          <?php echo $route->days?>
			</td>
			<td align="center">
                         <a href="/route/price/routeId/<?php echo $route->id;?>">详情</a>

                        </td>
			
			 <td align="center"> 
			    <a href="/route/schedule/routeId/<?php echo $route->id;?>">详情</a>
                        </td>
			<td align="center"><a href="/route/modify/routeId/<?php echo $route->id;?>">修改</a>&nbsp; <button  href="javascript:;" class="delete">删除</button></td>	
                      </tr>
		 </tbody>

	  </table>
	 </div>


</div>


-->
