



<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li class="active">景点管理</li>
</ol>


<form method="post" id="search-form" class="form-inline text-right" action="/diary/search">
        <input type="text" name="keywords" class="form-control" value="" placeholder="输入景点名称关键字搜
索"/>
        <select name="port" class="w-auto form-control">
            <option value="0">选择港口</option>

                                <?php if($port){ ?>
                                <?php for($i =0 ;$i< count($port) ; $i++){?>
                                <option><?php echo $port[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>

                    </select>
        <input type="submit" resubmit="false" form-id="search-form" class="btn btn-success" value="搜索" />
    </form>


<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">港口景点</div>
  <!-- Table -->


  <button type=button  class="btn btn-success " onclick="location.href =('/interest/add')"> <span class="glyphicon glyphicon-plus"></span></button>
  <table class="table">



                          <thead >
                            <tr>
                               <td align="center">景点标题</td>
                               <td align="center">相关港口</td>
                               <td align="center">操作</td>
                            </tr>
                          </thead>



                  <tbody>

                                <?php if($interest){ ?>
                                <?php for($i =0 ;$i< count($interest) ; $i++){?>

                      <tr>
                        <td align="center" id="title">
                                <?php echo $interest[$i]->title?>
                        </td>
                        <td align="center" id="boat">
                                <?php echo $interest[$i]->port?>
                        </td>
			<td align="center"><a href="/interest/modify/interest_id/<?php echo $interest[$i]->id;?>"><span class="glyphicon glyphicon-pencil"</span></a>&nbsp;&nbsp; <a href="/interest/remove/interest_id/<?php echo $interest[$i]->id;?>"><span class="glyphicon glyphicon-trash"</span></a>
			</td>

			
		      </tr>
			 <?php }?>
                         <?php }?>
		</tbody>

 </table>
</div>



