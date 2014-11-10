<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>



<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/company/index">邮轮公司管理</a></li>
  <li class="active">新增邮轮公司信息</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">邮轮公司信息</div>
	
        <table class="table">
                <tr>
                <td>邮轮公司名称</td>

                        <td> <input type="text" name="title" id="title"  >
</td>
                </tr>


        <tr>
	        <td>邮轮公司图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">


                        </div><!--  进度条容器  -->


                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>





		<tr>
                    <td>邮轮公司介绍</td>


	                <td>

                        <div class="summernote" id="summernote"></div>

        	        </td>

                </tr>
	</table>


	 <div>

		<button class="btn btn-primary" onclick="save()"  > 保存</button>
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
                        "title":title,
                        "content":aHTML,
                        "thumb":thumb,
                        "source":source
                },
                type: "POST",
                url: "/company/add_company",
                success: function() {
                      alert('success');
                }
            });




//  $('.summernote').destroy();
};



</script>

