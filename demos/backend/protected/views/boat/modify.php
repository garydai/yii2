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
                        <td>
                                显示类型
                        </td>
                        <td>
                           <div class="checkbox" >
                              <label>
                              <input type="checkbox" id="show" <?php if($boat->type & 1) echo 'checked="true"'?> > 显示
                              </label>
                           </div>

                           <div class="checkbox" >
                              <label>
                              <input type="checkbox" id="cheap" <?php if($boat->type & 2) echo 'checked="true"'?> > 特价
                              </label>
                           </div>
                          <div class="checkbox" >
                              <label>
                              <input type="checkbox" id="recommend" <?php if($boat->type & 4) echo 'checked="true"'?> > 推荐
                              </label>
                           </div>



                        </td>
                </tr>



	        <tr>
                <td>邮轮图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">

			<?php if($boat->thumb) { $arr_t = explode(',', $boat->thumb); $arr_s = explode(',', $boat->source); for($i=0;$i<count($arr_t); $i++)  { ?>
                        <div class="row-fluid upload-thumb-box" id="old_thumb_34">
                                <div class="span3">
                                                <img src=<?php if($arr_t[$i]) echo $arr_t[$i]; ?> source=<?php if($arr_s[$i]) echo $arr_s[$i];  ?> style="height: 80px;" class="mini-image-view">
                                </div>
                                <div class="span8">
                                    <p>
                                        <i title="删除" class="btn btn-danger hand deleteBtn J_thumb_delete" elm-id="old_thumb_34">删除</i>
                                    </p>
                                </div>
                            </div>

                        <?php }} ?>




                        </div><!--  进度条容器  -->


                        <br /><p  id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
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

        var title = document.getElementById("title").value;

	var zaikeshu = document.getElementById("zaikeshu").value;
        var zuigaosudu = document.getElementById("zuigaosudu").value;
        var paishuiliang = document.getElementById("paishuiliang").value;
        var jiabanlouceng = document.getElementById("jiabanlouceng").value;
        var changdu = document.getElementById("changdu").value;
        var kuandu = document.getElementById("kuandu").value;
        var gongzuorenyuan = document.getElementById("gongzuorenyuan").value;
        var gaodu = document.getElementById("gaodu").value;



        var thumb = '';
        var source = '';
        $(".mini-image-view").each(function(){
                thumb += $(this).attr("src") + ',';
                source += $(this).attr("source") + ',';
        });





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



            $.ajax({
                dataType: "json",

                 data:{
                        "id":id,
                        "title":title,
                        "content":aHTML,
                        "thumb":thumb.substring(0,thumb.length-1),
                        "source":source.substring(0,source.length-1),
			"zaikeshu":zaikeshu,
			"zuigaosudu":zuigaosudu,
			"paishuiliang":paishuiliang,
			"changdu":changdu,
			"gongzuorenyuan":gongzuorenyuan,
			"gaodu":gaodu,
			"jiabanlouceng":jiabanlouceng,
			"kuandu":kuandu,
			"type":style
                },
                type: "POST",
                url: "/boat/save_boat",
                success: function() {
                      alert('success');
                }
            });

};



</script>

