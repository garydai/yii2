

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">修改游记</div>

   

  <!-- Table -->
  <table class="table" id="schedule">


          <tr>
             <td >相关邮轮</td>
          </tr>
			    
				
	  <tr >
	    <td><select class="selectpicker boat" name="boat" id="boat">

                      <?php if($boat){ ?>
                      <?php for($i =0 ;$i< count($boat) ; $i++){?>
                        <option <?php if($boat[$i]->name == $diary->boat ) echo 'selected="selected"' ?>><?php echo $boat[$i]->name ?> </option>

                      <?php }?>
                      <?php }?>

                 </select>
             </td>
	</tr>



          <tr>
             <td >游记标题</td>
          </tr>


          <tr >

		<td> <input type="text" style="width:400px"name="title" id="title"  value=<?php echo $diary->title ?> > </td>

		
        </tr>


		
	<tr>
		<td>游记内容</td>
	</tr>

	<tr>
		<td>
		<div class="summernote" id="summernote"><?php echo $diary->content?></div>
		</td>
	</tr>



	  </table>


	<div>
     <button class="btn btn-success " onclick="save(<?php echo $diary->id ?>)">保存</button>
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

  var boat = $('.boat').val();
  var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
			"id":id,
                        "title":title,
			"boat":boat,
                        "content":aHTML
                },
                type: "post",
                url: "/diary/save_diary",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>


