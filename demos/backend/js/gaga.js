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
                file_upload_limit : "10",                         //一次上传文件个数限制，0表示不限制

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
                button_image_url : "/3rd/swfupload/uploadButton.jpg",
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
                flash_url : "/3rd/swfupload/swfupload.swf",

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

              $('#thumb_upload_wp').show();
          });




	$("#company").on('change', function ()
	{


        	var company =  $('.company').val();
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
			}

		});
	});



	$("#continent").on('change', function ()
	{


        var continent =  $('.continent').val()
            $.ajax({
                dataType: "json",

                 data:{
                        "continent":continent
                },
                type: "post",
                url: "/route/select_area",
                success: function(option) {

                         $("#area").html(option['option']);
                         $('.area').selectpicker('refresh');

                	}
             });
             
                  //
                  //
	});
                  //
                  //
                  //

});

