<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">邮轮信息</div>
  <!-- Table -->

  <input type=button  class="btn btn-primary" value="新增邮轮" onclick="location.href =('/boat/add')"/>


  <table class="table">
    


                          <thead>
                            <tr>
                               <td width="12%"  align="center">邮轮</td>
                        
                               <td width="12%"  align="center">邮轮介绍</td>

                               <td width="12%" align="center">图片</td>
                               <td width="12%" align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($boat){ ?>
                                <?php for($i =0 ;$i< count($boat) ; $i++){?>

                      <tr>
                        <td align="center" id="name">
                          <?php echo $boat[$i]->name?>
                        </td>
                         <td align="center" id="description">
                          <?php echo $boat[$i]->description?>
                        </td>

                        <td align="center" id="image">
                          <?php echo $boat[$i]->image?>
                        </td>
                        <td align="center"><a href="/boat/modify/boatId/<?php echo $boat[$i]->id;?>">修改</a>&nbsp; <a href="/boat/remove/boatId/<?php echo $boat[$i]->id;?>">删除</a></td>       
                      </tr>
				<?php }?>
				<?php }?>
                 </tbody>

  </table>
</div>




