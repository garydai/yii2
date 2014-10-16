<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">港口信息</div>
  <!-- Table -->
  <table class="table">
    


                          <thead>
                            <tr>
                               <td width="12%"  align="center">港口</td>
                        
                               <td width="12%"  align="center">港口介绍</td>

                               <td width="12%" align="center">图片</td>
                               <td width="12%" align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($port){ ?>
                                <?php for($i =0 ;$i< count($port) ; $i++){?>

                      <tr>
                        <td align="center" id="name">
                          <?php echo $port[$i]->name?>
                        </td>
                         <td align="center" id="description">
                          <?php echo $port[$i]->description?>
                        </td>

                        <td align="center" id="image">
                          <?php echo $port[$i]->image?>
                        </td>
                        <td align="center"><a href="/port/modify/portId/<?php echo $port[$i]->id;?>">修改</a>&nbsp; <a href="/port/remove/portId/<?php echo $port[$i]->id;?>">删除</a></td>       
                      </tr>
				<?php }?>
				<?php }?>
                 </tbody>

  </table>
</div>




