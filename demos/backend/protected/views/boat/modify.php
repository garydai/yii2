<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>




<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/boat/index">邮轮管理</a></li>
  <li class="active">修改邮轮</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">邮轮信息</div>

        <table class="table">
                <tr>
                <td>邮轮名称</td>

                        <td> <input style="width:200px;" class="form-control" type="text" id="title" id="title"  value=<?php echo $boat->name ?> >
</td>
                </tr>
		<tr>
		<td>载客数</td>
			<td><input style="width:200px;" class="form-control" type="text" id="zaikeshu" value=<?php echo $boat->zaikeshu ?>></td>
		</tr>

                <tr>
                <td>排水量</td>
                        <td><input style="width:200px;" class="form-control" type="text" id="paishuiliang" value=<?php echo $boat->paishuiliang ?>></td>
                </tr>

                <tr>
                <td>最高速度</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="zuigaosudu" value=<?php echo $boat->zuigaosudu ?>></td>
                </tr>

                <tr>
                <td>甲板楼层</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="jiabanlouceng" value=<?php echo $boat->jiabanlouceng ?>></td>
                </tr>

                <tr>
                <td>工作人员</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="gongzuorenyuan" value=<?php echo $boat->gongzuorenyuan ?>></td>
                </tr>

                <tr>
                <td>长度</td>
                        <td><input class="form-control" style="width:200px;" type="text" id="changdu" value =<?php echo $boat->changdu ?>></td>
                </tr>

                <tr>
                <td>宽度</td>
                        <td><input class="form-control" type="text" id="kuandu" value=<?php echo $boat->kuandu ?>></td>
                </tr>

                <tr>
                <td>高度</td>
                        <td><input class="form-control" type="text" id="gaodu" value=<?php echo $boat->gaodu ?>></td>
                </tr>




	        <tr>
                <td>邮轮图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">



                        <?php if($boat->thumb){ ?>
                        <div class="row-fluid upload-thumb-box" id="old_thumb_34">
                                <div class="span3">
                                                <img src=<?php if($boat->thumb) echo $boat->thumb; ?> source=<?php if($boat->source) echo $boat->source;  ?> style="height: 80px;" class="mini-image-view">
                                </div>
                                <div class="span8">
                                    <p>
                                        <i title="删除" class="btn btn-danger hand deleteBtn J_thumb_delete" elm-id="old_thumb_34">删除</i>
                                    </p>
                                </div>
                            </div>

                        <?php } ?>
                        </div><!--  进度条容器  -->


                        <br /><p style=<?php if($boat->thumb) echo "display:none;"; else echo ""; ?> id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>



                <tr>
                    <td>邮轮介绍</td>


                        <td>

                        <div class="summernote" id="summernote"><?php echo $boat->description?></div>

                        </td>

                </tr>



	</table>


         <div>

                <button class="btn btn-primary" onclick="save(<?php echo $boat->id ?>)"  > 保存</button>
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
                        "id":id,
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
                url: "/boat/save_boat",
                success: function() {
                      alert('success');
                }
            });

};



</script>

