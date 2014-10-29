

<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li class="active">舱房管理</li>
</ol>



<form method="post" id="search-form" class="form-inline text-right" action="/room/search">
        <input type="text" name="keywords" class="form-control" value="" placeholder="输入美食标题关键字搜
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
 <div class="panel-heading">舱房信息</div>
  <!-- Table -->


  <button type=button  class="btn btn-success " onclick="location.href =('/room/add')"> <span class="glyphicon glyphicon-plus"></span></button>
  <table class="table">



                          <thead >
                            <tr>
                               <td align="center">舱房类型</td>
                               <td align="center">相关邮轮</td>
			       <td align="center">相关邮轮公司</td>
                               <td align="center">操作</td>
                            </tr>
                          </thead>



                  <tbody>

                                <?php if($room){ ?>
                                <?php for($i =0 ;$i< count($room) ; $i++){?>

                      <tr>
                        <td align="center" id="style">
                                <?php echo $room[$i]->style?>
                        </td>
                        <td align="center" id="boat">
                                <?php echo $room[$i]->boat?>
                        </td>


                        <td align="center" id="company">
                                <?php echo $room[$i]->company?>
                        </td>


			<td align="center"><a href="/room/modify/room_id/<?php echo $room[$i]->id;?>"><span class="glyphicon glyphicon-pencil"</span></a>&nbsp;&nbsp; <a href="/room/remove/room_id/<?php echo $room[$i]->id;?>"><span class="glyphicon glyphicon-trash"</span></a>
			</td>

			
		      </tr>
			 <?php }?>
                         <?php }?>
		</tbody>

 </table>
</div>



