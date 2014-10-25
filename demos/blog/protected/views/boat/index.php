<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">邮轮信息</div>
  <!-- Table -->

  <button type=button  class="btn btn-success" onclick="location.href =('/boat/add')"><span class="glyphicon glyphicon-plus"></span></button>



  <table class="table">
    


                          <thead>
                            <tr>
                               <td  align="center">邮轮</td>
			       <td align ="center">载客数/排水量/最高速度/甲板楼层</td>
				<td align="center">工作人员/长度/宽度/高度</td>                        
                               <td   align="center">邮轮介绍</td>

                               <td  align="center">图片</td>
                               <td  align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($boat){ ?>
                                <?php for($i =0 ;$i< count($boat) ; $i++){?>

                      <tr>
                        <td align="center" id="name">
                          <?php echo $boat[$i]->name?>
                        </td>
			<td align="center"><?php echo $boat[$i]->zaikeshu.'/'.$boat[$i]->paishuiliang.'/'.$boat[$i]->zuigaosudu.'/'.$boat[$i]->jiabanlouceng ?></td>
			<td align="center"><?php echo $boat[$i]->gongzuorenyuan.'/'.$boat[$i]->changdu.'/'.$boat[$i]->kuandu.'/'.$boat[$i]->gaodu ?></td>
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




