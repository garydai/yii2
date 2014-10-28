<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">行程</div>
  <!-- Table -->

  <button type=button  class="btn btn-success" onclick="save(<?php echo $schedule->id ?>)">保存</button>
 </button>





  <table class="table" id="schedule">


          <tr>
             <td >行程关键字</td>
          </tr>


          <tr >
		 <td> <input type="text" style="width:400px"name="title" id="title"  value=<?php echo $schedule->title ?> > </td>

          </tr>




        <tr>
                <td>行程内容</td>
        </tr>

        <tr>
                <td>

		<div class="summernote" id="summernote"><?php echo $schedule->content?></div>
                </td>
        </tr>



          </table>





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
		//	alert(url);	
                    editor.insertImage(welEditable, url);
                }
            });
        }




var save = function(id) {
  var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).


 var title = document.getElementById("title").value;
	
	    $.ajax({
		dataType: "json",

		 data:{
			"id":id,
                        "html":aHTML,
			"title":title
		},
                type: "post",
                url: "/schedule/save_content",
                success: function(content) {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });




//  $('.summernote').destroy();
};



</script>
