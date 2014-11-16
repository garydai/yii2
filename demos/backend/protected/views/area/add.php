<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>





<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/area/index">第二级地区管理</a></li>
  <li class="active">新增第二级地区</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增地区</div>




        <table class="table">

                <tr>
                <td>地区名称</td>

                        <td> <input type="text" name="title" id="title" >
		</td>
                </tr>



          <tr>
             <td >所属第一级地区</td>
            <td><select class="selectpicker continent" name="continent" id="continent">

                      <?php if($continent){ ?>
                      <?php for($i =0 ;$i< count($continent) ; $i++){?>
                        <option><?php echo $continent[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>


        <tr>
                <td>地区图片</td>

                <td>
                        <div class="fluid" id="divFileProgressContainer1">

                        </div><!--  进度条容器  -->


                        <br /><p style="" id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>


        </tr>


                <tr>
                    <td>地区介绍</td>

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


        var thumb = '';
        var source = '';
        $(".mini-image-view").each(function(){
                thumb += $(this).attr("src") + ',';
                source += $(this).attr("source") + ',';
        });


  	var continent = $('.continent').val();

        var title = document.getElementById("title").value;
            $.ajax({
                dataType: "json",

                 data:{
                        "title":title,
			"continent":continent,
                        "content":aHTML,
                        "thumb":thumb,
                        "source":source
                },
                type: "POST",
                url: "/area/add_area",
                success: function() {
                      alert('success');
                }
            });

};



</script>

