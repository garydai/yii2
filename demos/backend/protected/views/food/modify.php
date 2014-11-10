<script type="text/javascript" src="/3rd/swfupload/swfupload.js"></script>
<script type="text/javascript" src="/3rd/swfupload/handlers.js"></script>
<link href="/3rd/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<style>
.edui-default .edui-editor,.edui-default .edui-editor-toolbarboxouter{border-radius:0;}
</style>

<script type="text/javascript"  src="/js/gaga.js"></script>



<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/food/index">美食管理</a></li>
  <li class="active">修改美食</li>
</ol>


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">修改美食</div>

   

  <!-- Table -->
  <table class="table" >


          <tr>
             <td >相关港口</td>
          </tr>
			    
				
	  <tr >
	    <td><select class="selectpicker port" name="port" id="port">
                      <?php if($port){ ?>
                      <?php for($i =0 ;$i< count($port) ; $i++){?>
                        <option <?php if($port[$i]->name == $food->port ) echo 'selected="selected"' ?>><?php echo $port[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
	</tr>



          <tr>
             <td >美食标题</td>
          </tr>


          <tr >

		<td> <input type="text" style="width:400px"name="title" id="title"  value=<?php echo $food->title ?> > </td>

		
        </tr>


		
	<tr>
		<td>美食内容</td>
	</tr>

	<tr>
		<td>
		<div class="summernote" id="summernote"><?php echo $food->content?></div>
		</td>
	</tr>



	  </table>


	<div>
     <button class="btn btn-success " onclick="save(<?php echo $food->id ?>)">保存</button>
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



                processData: false,
                success: function(url) {
                //      alert(url);
                    editor.insertImage(welEditable, url);
                }
            });
        }




var save = function(id) {
  var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

  var port = $('.port').val();
  var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
			"id":id,
                        "title":title,
			"port":port,
                        "content":aHTML
                },
                type: "post",
                url: "/food/save_food",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


