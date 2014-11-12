<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>


<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/room/index">舱房管理</a></li>
  <li class="active">修改舱房</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">修改舱房</div>

   

  <!-- Table -->
  <table class="table" id="schedule">







          <tr>
             <td >舱房类型</td>

                <td> <input type="text" style="width:400px"name="style" id="style" value=<?php echo $room->style ?> ></td>


        </tr>



	
          <tr>
             <td >相关邮轮公司</td>
	    <td><select class="selectpicker company" name="company" id="company">
			<option>请选择所属邮轮公司</option>
                      <?php if($company){ ?>
                      <?php for($i =0 ;$i< count($company) ; $i++){?>
                        <option <?php if($company[$i]->name == $room->company) echo 'selected="selected"' ?>><?php echo $company[$i]->name ?> </option>

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
                        <option <?php if($boat[$i]->name == $room->boat) echo 'selected="selected"' ?> ><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>




        <tr>
                <td>舱房图片</td>



                <td>
                        <div class="fluid" id="divFileProgressContainer1">



			<?php if($room->thumb){ ?>
			<div class="row-fluid upload-thumb-box" id="old_thumb_34">
                                <div class="span3">
                                                <img src=<?php if($room->thumb) echo $room->thumb; ?> source=<?php if($room->source) echo $room->source;  ?> style="height: 80px;" class="mini-image-view">
                                </div>
                                <div class="span8">
                                    <p>
                                        <i title="删除" class="btn btn-danger hand deleteBtn J_thumb_delete" elm-id="old_thumb_34">删除</i>
                                    </p>
                                </div>
                            </div>

			<?php } ?>
                        </div><!--  进度条容器  -->


                        <br /><p style=<?php if($port->thumb) echo "display:none;"; else echo ""; ?> id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>

		
        </tr>

		
	<tr>
		<td>舱房介绍</td>


		<td>

			<div class="summernote" id="summernote"><?php echo $room->content?></div>


                </td>
	</tr>



	  </table>


	<div>
     <button class="btn btn-success " onclick="save(<?php echo $room->id ?>)">保存</button>
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



$("#company").on('change', function () 
{


	var company =  $('.company').val()
	    $.ajax({
                dataType: "json",

                 data:{
                        "company":company
                },
                type: "post",
                url: "/room/select_boat",
                success: function(option) {

			 $("#boat").html(option['option']);
		         $('.boat').selectpicker('refresh');

                  //  editor.insertImage(welEditable, url);
                }
            });



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




var save = function(id) {
	var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

	var company = $('.company').val();
	var boat = $('.boat').val();

	var thumb = $('.mini-image-view').attr("src");

	var source = $('.mini-image-view').attr("source");
	var style = document.getElementById("style").value;

            $.ajax({
                dataType: "json",

                 data:{
			"id":id,
                        "style":style,
			"company":company,
			"boat":boat,
                        "content":aHTML,
			"thumb":thumb,
			"source":source
                },
                type: "POST",
                url: "/room/save_room",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


