

<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/interest/index">景点管理</a></li>
  <li class="active">新增景点</li>
</ol>




<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">增加景点</div>

   

  <!-- Table -->
  <table class="table" id="schedule">


          <tr>
             <td >相关港口</td>
	    <td><select class="selectpicker port" name="port" id="port">

                      <?php if($port){ ?>
                      <?php for($i =0 ;$i< count($port) ; $i++){?>
                        <option><?php echo $port[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
	</tr>



          <tr>
             <td >景点标题</td>

		<td> <input type="text" style="width:400px"name="title" id="title"   > </td>

		
        </tr>


		
	<tr>
		<td>景点内容</td>
		<td>
		<div class="summernote" id="summernote"></div>
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
                url: "/interest/add_interest",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


