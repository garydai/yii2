<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">地区信息</div>
  <!-- Table -->
  <table class="table">
    


                          <thead>
                            <tr>
                               <td width="12%"  align="center">地区</td>
                        
                               <td width="12%"  align="center">地区介绍</td>

                               <td width="12%" align="center">图片</td>
                               <td width="12%" align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($area){ ?>
                                <?php for($i =0 ;$i< count($area) ; $i++){?>

                      <tr>
                        <td align="center" id="name">
                          <?php echo $area[$i]->name?>
                        </td>
                         <td align="center" id="description">
                          <?php echo $area[$i]->description?>
                        </td>

                        <td align="center" id="image">
                          <?php echo $area[$i]->image?>
                        </td>
                        <td align="center"><a href="/area/modify/areaId/<?php echo $area[$i]->id;?>">修改</a>&nbsp; <a href="/area/remove/areaId/<?php echo $area[$i]->id;?>">删除</a></td>       
                      </tr>
				<?php }?>
				<?php }?>
                 </tbody>

  </table>
</div>




