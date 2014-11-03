<script type="text/javascript" src="/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/swfupload/handlers.js"></script>
<link href="/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>




<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/boat/index">邮轮管理</a></li>
  <li class="active">新增邮轮</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">邮轮信息</div>

        <table class="table">
                <tr>
                <td>邮轮名称</td>

                        <td> <input style="width:200px;" class="form-control" type="text" id="title" id="title"  >
</td>
                </tr>
		<tr>
		<td>载客数</td>
			<td><input style="width:200px;" class="form-control" type="text" id="zaikeshu" ></td>
		</tr>

                <tr>
                <td>排水量</td>
                        <td><input style="width:200px;" class="form-control" type="text" id="paishuiliang" ></td>
                </tr>

                <tr>
                <td>最高速度</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="zuigaosudu" ></td>
                </tr>

                <tr>
                <td>甲板楼层</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="jiabanlouceng" ></td>
                </tr>

                <tr>
                <td>工作人员</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="gongzuorenyuan" ></td>
                </tr>

                <tr>
                <td>长度</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="changdu" ></td>
                </tr>

                <tr>
                <td>宽度</td>
                        <td><input class="form-control" type="text" id="kuandu" ></td>
                </tr>

                <tr>
                <td>高度</td>
                        <td><input class="form-control" type="text" id="gaodu" ></td>
                </tr>




	        <tr>
                <td>邮轮图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">
                        </div><!--  进度条容器  -->


                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>



                <tr>
                    <td>邮轮介绍</td>


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


var save = function() {
        var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

        var thumb = $('.mini-image-view').attr("src");

        var source = $('.mini-image-view').attr("source");
        var title = document.getElementById("title").value;

	var zaikeshu = document.getElementById("zaikeshu").value;
        var zuigaosudu = document.getElementById("zuigaosudu").value;
        var paishuiliang = document.getElementById("paishuiliang").value;
        var jiabanlouceng = document.getElementById("jiabanlouceng").value;
        var changdu = document.getElementById("changdu").value;
        var kuandu = document.getElementById("kuandu").value;
        var gongzuorenyuan = document.getElementById("gongzuorenyuan").value;
        var gaodu = document.getElementById("gaodu").value;

            $.ajax({
                dataType: "json",

                 data:{
                        "title":title,
                        "content":aHTML,
                        "thumb":thumb,
                        "source":source,
			"zaikeshu":zaikeshu,
			"zuigaosudu":zuigaosudu,
			"paishuiliang":paishuiliang,
			"changdu":changdu,
			"gongzuorenyuan":gongzuorenyuan,
			"gaodu":gaodu,
			"jiabanlouceng":jiabanlouceng,
			"kuandu":kuandu
                },
                type: "POST",
                url: "/boat/add_boat",
                success: function() {
                      alert('success');
                }
            });

};



</script>

