<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>



<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/route/index">航线管理</a></li>
  <li class="active">新增航线</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增航线信息</div>

        <table class="table">
                <tr>
                <td class="col-md-1">航线名称</td>

                        <td> <input class="form-control" style="width:200px;" type="text" name="title" id="title"   >
</td>
                </tr>



	          <tr>
	             <td >一级地区</td>

        	    <td><select class="selectpicker continent" name="continent" id="continent">
                	        <option>请选择所属邮轮公司</option>
	                      <?php if($continent){ ?>
        	              <?php for($i =0 ;$i< count($continent) ; $i++){?>
                	        <option><?php echo $continent[$i]->name ?> </option>

	                      <?php }?>
        	              <?php }?>

	                 </select>
        	     </td>
	        </tr>



                 <tr>

                       <td>二级地区</td>
			
                        <td><select class="selectpicker area" name="area" id="area">
				<option>请选择地区</option>

                               <?php if($area){ ?>
                                <?php for($i =0 ;$i< count($area) ; $i++){?>
                                <option><?php echo $area[$i]->name ?> </option>

                                <?php }?>
                                <?php }?>

                          </select>
                        </td>

                </tr>


          <tr>
             <td >相关邮轮公司</td>
            <td><select class="selectpicker company" name="company" id="company">
                        <option>请选择所属邮轮公司</option>
                      <?php if($company){ ?>
                      <?php for($i =0 ;$i< count($company) ; $i++){?>
                        <option ><?php echo $company[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>



          <tr>
             <td >相关邮轮</td>
            <td><select class="selectpicker boat" name="boat" id="boat">
                         <option>请选择所属邮轮</option>

                      <?php if($boat){ ?>
                      <?php for($i =0 ;$i< count($boat) ; $i++){?>
                        <option ><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>







                 <tr>

                       <td>港口</td>

                        <td><select class="selectpicker port " multiple name="port" id="port">



                              <?php if($port){ ?>
                                <?php for($i =0 ;$i< count($port) ; $i++){?>
                                <option ><?php echo $port[$i]->name ?> </option>

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
				<input type="text" class="form-control" style="width:200px;" name="date" id="datepicker" data-date-format="yyyy-mm-dd"  />

			<!--/div-->
			<script type="text/javascript">
						$(document).ready(function() {


							$('#datepicker').datepicker();  

						});
					</script>



                </td>
                </tr>

		
		<tr>
			<td>
				航线类型
			</td>
			<td>
			   <div class="checkbox" >
			      <label>
			      <input type="checkbox" id="show" checked="true" > 显示
			      </label>
			   </div>
			   
                           <div class="checkbox" >
                              <label>
                              <input type="checkbox" id="cheap" > 特价
                              </label>
                           </div>
                          <div class="checkbox" >
                              <label>
                              <input type="checkbox" id="recommend"  > 推荐
                              </label>
                           </div>


		
			</td>
		</tr>




        <tr>
                <td>航线图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">


                        </div><!--  进度条容器  -->


                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>






                <tr>
                    <td>航线介绍</td>

                        <td>

                        <div class="summernote" id="summernote"></div>

                        </td>

                </tr>


	</table>


	 <div>

		<!--input type="submit" value="保存" id="submit" name="submit" /-->
		 <button class="btn btn-primary " onclick="onsave()">保存</button>   
        </div>

</div>



<script type="text/javascript">





$(document).ready(function() {



        $('#summernote').summernote({
                  height: 400,                 // set editor height

                onImageUpload: function(files, editor, welEditable)
                {
                        sendFile(files[0], editor, welEditable);
                }

        });


//  $('.summernote').destroy();


});


         function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "/schedule/upload_image",
                cache: false,
                contentType: false,



                erocessData: false,
                success: function(url) {
                //      alert(url);
                    editor.insertImage(welEditable, url);
                }
            });
        }


});


function onsave(route_id)
{






	var show = document.getElementById("show").checked;
	var cheap = document.getElementById("cheap").checked;
	var recommend = document.getElementById("recommend").checked;
	var style = 0;
	if(show == true)
		style = 1;
	if(cheap == true)
		style += 2;
	if(recommend == true)
		style += 4;
	var t ="";
	t += $("#port").val();


        var thumb = $('.mini-image-view').attr("src");

        var source = $('.mini-image-view').attr("source");

	var aHTML = $('.summernote').code(); 

	//alert($("#port").val());
       $.ajax({

            type:"post",
            dataType:"json",//dataType (xml html script json jsonp text)
            data:{
			"id":route_id,
			"title":$("#title").val(),
			"continent":$("#continent").val(),
			"area":$("#area").val(),
			"port":t,
			"style":style,
			"boat":$("#boat").val(),
			"company":$("#company").val(),
			"days":$("#days").val(),
			"description":aHTML,
			"date":$("#datepicker").val(),
			"source":source,
			"thumb":thumb
			},
           url:"/route/addInfo",
            success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");


                alert("success");
                }




        //    type:"get",
          //  dataType:"json",//dataType (xml html script json jsonp text)
         //   data:{id:2},
          //  url:"/route/saveInfo",
           // success:function(json) {//成功获得的也是json对象
                //$.fn.yiiGridView.update("ad-grid");

//
  //             alert("success");
    //            }


        });





}

$(function() {

$('.selectpicker').selectpicker({
      size: 10
  });


 //$('.area').selectpicker('val', ['济州','福冈']);
	

})
</script>
