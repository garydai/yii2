<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>



<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/port/index">港口管理</a></li>
  <li class="active">修改港口</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">修改港口信息</div>
	
        <table class="table">
                <tr>
                <td>港口名称</td>

                        <td> <input type="text" name="title" id="title"  value=<?php echo $port->name ?> >
</td>
                </tr>


        <tr>
	        <td>港口图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">



                        <?php if($port->thumb){ ?>
                        <div class="row-fluid upload-thumb-box" id="old_thumb_34">
                                <div class="span3">
                                                <img src=<?php if($port->thumb) echo $port->thumb; ?> source=<?php if($port->source) echo $port->source;  ?> style="height: 80px;" class="mini-image-view">
                                </div>
                                <div class="span8">
                                    <p>
                                        <i title="删除" class="btn btn-danger hand deleteBtn J_thumb_delete" elm-id="old_thumb_34">删除</i>
                                    </p>
                                </div>
                            </div>

                        <?php } ?>
                        </div><!--  进度条容器  -->


                        <br /><p style= <?php if($port->thumb) echo "display:none;"; else echo ""; ?> id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>





		<tr>
                    <td>港口介绍</td>


	                <td>

                        <div class="summernote" id="summernote"><?php echo $port->description?></div>

        	        </td>

                </tr>
	</table>


	 <div>

		<button class="btn btn-primary" onclick="save(<?php echo $port->id ?>)"  > 保存</button>
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


var save = function(id) {
        var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

        var thumb = $('.mini-image-view').attr("src");

        var source = $('.mini-image-view').attr("source");
        var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
                        "id":id,
                        "title":title,
                        "content":aHTML,
                        "thumb":thumb,
                        "source":source
                },
                type: "POST",
                url: "/port/save_port",
                success: function() {
                      alert('success');
                }
            });




//  $('.summernote').destroy();
};



</script>

