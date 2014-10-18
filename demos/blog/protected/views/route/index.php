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


  <input type=button  class="btn btn-primary" value="新增航线" onclick="location.href =('/route/add')"/>

  <table class="table">
    


                          <thead>
                            <tr>
				<td   align="center">航线ID</td>

                               <td   align="center">航线名称</td>
                        
                               <td   align="center">邮轮</td>

                               <td  align="center">路过港口</td>
                               <td  align="center">出发时间</td>
                               <td  align="center">行程天数</td>
                               <td  align="center">价格</td>
                               <td  align="center">行程安排</td>
                               <td  align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($route){ ?>
                                <?php for($i =0 ;$i< count($route) ; $i++){?>

                      <tr>
			<td align="center" id="id">
				<?php echo $route[$i]->id?>
			</td>
                        <td align="center" id="name">
                          <?php echo $route[$i]->name?>
                        </td>
                         <td align="center" id="bote">
                          <?php echo $route[$i]->boat?>
                        </td>

                        <td align="center" id="port">
                          <?php echo $route[$i]->port?>
                        </td>
                        <td align="center" id="start">
                          <?php echo $route[$i]->start_time?>
                        </td>
                        <td align="center" id="days">
                          <?php echo $route[$i]->days?>
                        </td>
                        <td align="center">
                         <a href= <?php if($route[$i]->price_id==NULL) echo "/price/add/routeId/".$route[$i]->id; else echo "/price/index/priceId/".$route[$i]->price_id; ?> ><?php if($route[$i]->price_id != NULL) echo $route[$i]->price.'元起'; else echo '添加价格'; ?></a>

                        </td>
                        
                         <td align="center"> 
                            <a href= <?php if($route[$i]->schedule != NULL) echo "/schedule/index/route_id/".$route[$i]->id; else echo "/schedule/modify/route_id/".$route[$i]->id ?>><?php if($route[$i]->schedule != NULL) echo "详情"; else echo "添加行程"; ?></a>
                        </td>
                        <td align="center"><a href="/route/modify/routeId/<?php echo $route[$i]->id;?>">修改</a>&nbsp; <a href="/route/remove/routeId/<?php echo $route[$i]->id;?>">删除</a></td>       
                      </tr>
				<?php }?>
				<?php }?>
                 </tbody>

  </table>
</div>




