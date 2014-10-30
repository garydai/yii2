
<script type="text/javascript" src="/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/swfupload/handlers.js"></script>
<link href="http://www.biapost.com/demo/res/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>


<script type="text/javascript">
window.onload = function ()
{
	var mini_swfu1,mini_swfu2;
	var options1 =
	{
		/*后端上传设置*/
		upload_url: "/upload.php",
		post_params:{"PHPSESSID":"r86rq92stdga3onl0ue5c4r463"},

		/*上传设置*/
		file_size_limit : "2MB", //上传文件大小限制 2MB
		file_types : "*.jpeg;*.jpg;*.png;*.gif",        //上传文件类型限制，以分号隔开
		file_types_description : "Image",                //弹出的window窗口下方文件类型描述
		file_upload_limit : "1",                         //一次上传文件个数限制，0表示不限制

		/*上传事件处理设置，这些方法都在Handlers.js中定义*/
		/*下面是处理事件函数定义*/
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		file_queued_handler:fileQueued,

		/*按钮设置*/
		button_image_url : "/swfupload/uploadButton.jpg",
		button_placeholder_id : "spanButtonPlaceholder1",//上按钮占位符元素的ID
		button_width: 60,
		button_height: 60,
		button_text : '',//上传按钮上的文字
		button_text_style : '.btn-cls{color:red}',
		button_text_top_padding: 0,//按钮文字定位
		button_text_left_padding: 0,//按钮文字定位
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,

		/*flash文件设置*/
		flash_url : "/swfupload/swfupload.swf",

		/*通常的配置项  可通通过 this.customSettings.upload_target  访问到*/
		custom_settings :
		{
			upload_target : "divFileProgressContainer1",
			upload_error : "spanUpladErrorInfo1",
			upload_info_name : "thumb"
		},

		/*调试设置*/
		debug: false
	}
	mini_swfu1 = new SWFUpload(options1);
};

$(document).ready(function(e) {
	$('.J_thumb_delete').on('click', function(e){
		var _this     = jQuery(this);
		var elm_id    = _this.attr('elm-id');
		var elm_class = _this.attr('elm-class');
		if(elm_id != undefined)
		{
			jQuery('#'+elm_id).fadeOut("slow",function(){jQuery(this).remove();});
		}
		if(elm_class != undefined)
		{
			jQuery('.'+elm_id).fadeOut("slow",function(){jQuery(this).remove();});
		}
		
//		$('#thumb_upload_wp').show();
	});  
});


</script>

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
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="style" id="style" value=<?php echo $room->style ?> ></td>


        </tr>



	
          <tr>
             <td >相关邮轮公司</td>
          </tr>
			    
				
	  <tr >
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
          </tr>


          <tr >
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
        </tr>

        <tr>



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


                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>

		
        </tr>

		
	<tr>
		<td>舱房介绍</td>
	</tr>

	<tr>


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


