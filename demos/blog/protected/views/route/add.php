<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>




 <!--form class="form-horizontal" method="get" action="/route/saveInfo" -->
	 <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">航线信息</legend>
      </div>
	
        <table class="table">
                <tr>
                <td>航线名称</td>

                        <td> <input type="text" name="title" id="title"   >
</td>
                </tr>


                 <tr>

                       <td>地区</td>
			
                        <td><select class="selectpicker area" name="area" id="area">


                               <?php if($area){ ?>
                                <?php for($i =0 ;$i< count($area) ; $i++){?>
                                <option><?php echo $area[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>

                          </select>
                        </td>

                </tr>


                 <tr>

                       <td>邮轮</td>
			
                        <td><select class="selectpicker boat" name="boat" id="boat" >
				
				<?php if($boat){ ?>
			        <?php for($i =0 ;$i< count($boat) ; $i++){?>
				<option><?php echo $boat[$i]->name ?> </option>
				
				<?php }?>
				<?php }?>
				</select>
                        </td>

                </tr>



                 <tr>

                       <td>港口</td>

                        <td><select class="selectpicker port" multiple name="port" id="port">


                              <?php if($port){ ?>
                                <?php for($i =0 ;$i< count($port) ; $i++){?>
                                <option><?php echo $port[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>



                          </select>
                        </td>

                </tr>





                <tr>
                <td>出发时间</td>

		<td>
			<!--div class="input-prepend input-group"-->


		 <!--div id="datetimepicker" class="input-append date"-->  
				<input type="text"  name="date" id="datepicker" data-date-format="yyyy-mm-dd"  />

			<!--/div-->
			<script type="text/javascript">
						$(document).ready(function() {


							$('#datepicker').datepicker();  

						});
					</script>



                </td>
                </tr>


                <tr>
                <td>行程天数</td>

                        <td> <input type="text" name="days"  id="days"  >
		</td>
                </tr>


		


		<tr>
                    <td>航线介绍</td>
                    <td>
                        <textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"></textarea>
                    </td>
                </tr>


	</table>


	 <div>

		<!--input type="submit" value="保存" id="submit" name="submit" /-->
		 <button class="btn btn-primary " onclick="onsave()">保存</button>   
        </div>

    </fieldset>
  </form>


</div>
</div>


<script type="text/javascript">



function onsave()
{


	var t ="";
	t += $("#port").val();
       $.ajax({

            type:"post",
            dataType:"json",//dataType (xml html script json jsonp text)
            data:{
			"title":$("#title").val(),
			"area":$("#area").val(),
			"port":t,
			"boat":$("#boat").val(),
			"days":$("#days").val(),
			"description":$("#description").val(),
			"date":$("#datepicker").val()
			},
           url:"/route/addInfo",
            success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");


                alert("success");
                }

        });


}

$(function() {

$('.selectpicker').selectpicker({
      size: 10
  });


 //$('.area').selectpicker('val', ['济州','福冈']);


	
       $.ajax({
            type:"get",
            dataType:"json",//dataType (xml html script json jsonp text)
	    data:{id:2},
            url:"/route/getInfo",
            success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");

		$('.boat').selectpicker('val', json.boat);
		$('.area').selectpicker('val', json.area);
		var v = json.port.split(',');
		$('.port').selectpicker('val', v);

                //alert("success")
		}
	});


})
</script>
