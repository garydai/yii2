

<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li class="active">美食管理</li>
</ol>



<form method="post" id="search-form" class="form-inline text-right" action="/food/search">
        <input type="text" name="keywords" class="form-control" value="" placeholder="输入美食标题关键字搜
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
 <div class="panel-heading">港口美食</div>
  <!-- Table -->


  <button type=button  class="btn btn-success " onclick="location.href =('/food/add')"> <span class="glyphicon glyphicon-plus"></span></button>
  <table class="table">



                          <thead >
                            <tr>
                               <td align="center">美食标题</td>
                               <td align="center">相关港口</td>
                               <td align="center">操作</td>
                            </tr>
                          </thead>



                  <tbody>

                                <?php if($food){ ?>
                                <?php for($i =0 ;$i< count($food) ; $i++){?>

                      <tr>
                        <td align="center" id="title">
                                <?php echo $food[$i]->title?>
                        </td>
                        <td align="center" id="port">
                                <?php echo $food[$i]->port?>
                        </td>
			<td align="center"><a href="/food/modify/food_id/<?php echo $food[$i]->id;?>"><span class="glyphicon glyphicon-pencil"</span></a>&nbsp;&nbsp; <a href="/food/remove/food_id/<?php echo $food[$i]->id;?>"><span class="glyphicon glyphicon-trash"</span></a>
			</td>

			
		      </tr>
			 <?php }?>
                         <?php }?>
		</tbody>

 </table>
</div>



