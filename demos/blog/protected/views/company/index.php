


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">邮轮公司信息</div>
  <!-- Table -->

  <button type=button  class="btn btn-success" onclick="location.href =('/company/add')"> <span class="glyphicon glyphicon-plus"></span></button>


  <table class="table">
    


                          <thead>
                            <tr>
                               <td align="center">邮轮公司</td>
                        
                               <td align="center">公司介绍</td>

                               <td align="center">图片</td>
                               <td align="center">操作</td>
                            </tr>
                          </thead>

                  <tbody>

                      		<?php if($company){ ?>
                                <?php for($i =0 ;$i< count($company) ; $i++){?>

                      <tr>
                        <td align="center" id="name">
                          <?php echo $company[$i]->name?>
                        </td>
                         <td align="center" id="description">
                          <?php echo $company[$i]->description?>
                        </td>

                        <td align="center" id="image">
                          <?php echo $company[$i]->image?>
                        </td>
                        <td align="center"><a href="/company/modify/company_id/<?php echo $company[$i]->id;?>">修改</a>&nbsp; <a href="/company/remove/company_id/<?php echo $company[$i]->id;?>">删除</a></td>       
                      </tr>
				<?php }?>
				<?php }?>
                 </tbody>

  </table>
</div>




