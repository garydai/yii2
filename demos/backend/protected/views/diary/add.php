
<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/diary/index">游记管理</a></li>
  <li class="active">新增游记</li>
</ol>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增游记</div>


  <!-- Table -->
  <table class="table" id="schedule">


          <tr>
             <td >相关邮轮</td>
	    <td><select class="selectpicker boat" name="boat" id="boat">

                      <?php if($boat){ ?>
                      <?php for($i =0 ;$i< count($boat) ; $i++){?>
                        <option><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
	</tr>



          <tr>
             <td >游记标题</td>

		<td> <input type="text" style="width:400px"name="title" id="title"   > </td>

		
        </tr>


		
	<tr>
		<td>游记内容</td>
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

  var boat = $('.boat').val();
  var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
                        "title":title,
			"boat":boat,
                        "content":aHTML
                },
                type: "post",
                url: "/diary/add_diary",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


