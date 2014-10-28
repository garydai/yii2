

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">增加美食</div>

   

  <!-- Table -->
  <table class="table" id="schedule">


          <tr>
             <td >相关港口</td>
          </tr>
			    
				
	  <tr >
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
             <td >美食标题</td>
          </tr>


          <tr >

		<td> <input type="text" style="width:400px"name="title" id="title"   > </td>

		
        </tr>


		
	<tr>
		<td>美食内容</td>
	</tr>

	<tr>
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
                url: "/food/add_food",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


