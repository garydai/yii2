
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
  <li class="active">新增舱房</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增舱房</div>

   

  <!-- Table -->
  <table class="table" id="schedule">







          <tr>
             <td >舱房类型</td>
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="style" id="style" > </td>


        </tr>



	
          <tr>
             <td >相关邮轮公司</td>
          </tr>
			    
				
	  <tr >
	    <td><select class="selectpicker company" name="company" id="company">

                      <?php if($company){ ?>
                      <?php for($i =0 ;$i< count($company) ; $i++){?>
                        <option><?php echo $company[$i]->name ?> </option>

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

                      <?php if($boat){ ?>
                      <?php for($i =0 ;$i< count($boat) ; $i++){?>
                        <option><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>




        <tr>
                <td>舱房图片</td>
        </tr>

        <tr>
        </tr>

		
	<tr>
		<td>美食内容</td>
	</tr>

	<tr>


		<td>
                        <div class="fluid" id="divFileProgressContainer1">
                                                               
                        
                        </div><!--  进度条容器  -->
                        
                        
                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>
	</tr>



	  </table>


	<div>
     <button class="btn btn-success " onclick="save()">保存</button>
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


	        $('#summernote_room').summernote({
                  height: 400,                 // set editor height

		toolbar: [
    //[groupname, [button list]]
     
 			   ['insert', ['picture']],
			  ],

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



                processData: false,
                success: function(url) {
                //      alert(url);
                    editor.insertImage(welEditable, url);
                }
            });
        }




var save = function() {
  var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

  var port = $('.port').val();
  var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
                        "title":title,
			"port":port,
                        "content":aHTML
                },
                type: "post",
                url: "/room/add_room",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


