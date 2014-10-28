
<form method="post" id="search-form" class="form-inline text-right" action="/diary/search">
        <input type="text" name="keywords" class="form-control" value="" placeholder="输入邮轮名称关键字搜
索"/>
        <select name="boat" class="w-auto form-control">
            <option value="0">选择邮轮</option>

                                <?php if($boat){ ?>
                                <?php for($i =0 ;$i< count($boat) ; $i++){?>
                                <option><?php echo $boat[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>

                    </select>
        <input type="submit" resubmit="false" form-id="search-form" class="btn btn-success" value="搜索" />
    </form>


<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">邮轮游记</div>
  <!-- Table -->


  <button type=button  class="btn btn-success " onclick="location.href =('/diary/add')"> <span class="glyphicon glyphicon-plus"></span></button>
  <table class="table">



                          <thead >
                            <tr>
                               <td width="100px">游记id</td>
                               <td align="center">游记标题</td>
                               <td align="center">相关邮轮</td>
                               <td align="center">操作</td>
                            </tr>
                          </thead>



                  <tbody>

                                <?php if($diary){ ?>
                                <?php for($i =0 ;$i< count($diary) ; $i++){?>

                      <tr>
                        <td align="center" id="id">
                                <?php echo $diary[$i]->id?>
                        </td>
 			
                        <td align="center" id="title">
                                <?php echo $diary[$i]->title?>
                        </td>
                        <td align="center" id="boat">
                                <?php echo $diary[$i]->boat?>
                        </td>
			<td align="center"><a href="/diary/modify/diary_id/<?php echo $diary[$i]->id;?>"><span class="glyphicon glyphicon-pencil"</span></a>&nbsp;&nbsp; <a href="/diary/remove/diary_id/<?php echo $diary[$i]->id;?>"><span class="glyphicon glyphicon-trash"</span></a>
			</td>

			
		      </tr>
			 <?php }?>
                         <?php }?>
		</tbody>

 </table>
</div>



