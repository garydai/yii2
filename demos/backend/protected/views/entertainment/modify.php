<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>


<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/entertainment/index">娱乐管理</a></li>
  <li class="active">修改娱乐</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">修改娱乐</div>

   

  <!-- Table -->
  <table class="table" id="schedule">







          <tr>
             <td >娱乐类型</td>

                <td> <input type="text" style="width:400px"name="style" id="style" value=<?php echo $entertainment->style ?> ></td>


        </tr>



	
          <tr>
             <td >相关邮轮公司</td>
	    <td><select class="selectpicker company" name="company" id="company">
			<option>请选择所属邮轮公司</option>
                      <?php if($company){ ?>
                      <?php for($i =0 ;$i< count($company) ; $i++){?>
                        <option <?php if($company[$i]->name == $entertainment->company) echo 'selected="selected"' ?>><?php echo $company[$i]->name ?> </option>

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
                        <option <?php if($boat[$i]->name == $entertainment->boat) echo 'selected="selected"' ?> ><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
        </tr>




        <tr>
                <td>娱乐图片</td>



                <td>
                        <div class="fluid" id="divFileProgressContainer1">


                        <?php if($entertainment->thumb) { $arr_t = explode(',', $entertainment->thumb); $arr_s = explode(',', $entertainment->source); for($i=0;$i<count($arr_t); $i++)  { ?>
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

			<?php } ?>
                        </div><!--  进度条容器  -->


                        <br /><p style=<?php if($entertainment->thumb) echo "display:none;"; else echo ""; ?> id="thumb_upload_wp"><span id="spanButtonPlaceholder1"></span></p>
                        <p id="spanUpladErrorInfo1"></p>
                </td>

		
        </tr>

		
	<tr>
		<td>娱乐介绍</td>


		<td>

			<div class="summernote" id="summernote"><?php echo $entertainment->content?></div>


                </td>
	</tr>



	  </table>


	<div>
     <button class="btn btn-success " onclick="save(<?php echo $entertainment->id ?>)">保存</button>
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
                url: "/entertainment/select_boat",
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

	
        var thumb = '';
        var source = '';
        $(".mini-image-view").each(function(){
                thumb += $(this).attr("src") + ',';
                source += $(this).attr("source") + ',';
        });


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
                url: "/entertainment/save_entertainment",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


