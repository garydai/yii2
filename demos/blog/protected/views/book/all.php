<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">所有订单</div>
  <!-- Table -->



	  <table class="table">



                          <thead>
                            <tr>
                                <td   align="center">订单ID</td>

                               <td   align="center">航线ID</td>

                               <td   align="center">航线名称</td>

                               <td  align="center">舱位</td>
				 <td  align="center">预定人数</td>
                               <td  align="center">出发时间</td>
                               <td  align="center">顾客名字</td>
                               <td  align="center">联系方式</td>
				 <td  align="center">下单时间</td>

                            </tr>
                          </thead>

                  <tbody>


				<?php if($book){ ?>
                                <?php for($i =0 ;$i< count($book) ; $i++){?>

                      <tr>
                        <td align="center" >
                                <?php echo $book[$i]->id?>
                        </td>
                        <td align="center" >
                          <?php echo $book[$i]->route_id?>
                        </td>
                         <td align="center" >
                          <?php echo $book[$i]->route_title?>
                        </td>

                        <td align="center" >
                          <?php echo $book[$i]->room?>
                        </td>

			<td align="center" >
                          <?php echo $book[$i]->count?>
                        </td>
			<td align="center" >
                          <?php echo $book[$i]->start_time?>
                        </td>


                        <td align="center" >
                          <?php echo $book[$i]->customer?>
                        </td>

                        <td align="center" >
                          <?php echo $book[$i]->phone?>
                        </td>

                       <td align="center" >
                          <?php echo $book[$i]->book_time?>
                        </td>

			<?php } ?>
			<?php } ?>
		</tbody>
	</table>


</div>
</div>


















