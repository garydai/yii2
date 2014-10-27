<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>

<link href="/summernote/summernote.css" rel="stylesheet">
<script src="/summernote/summernote.min.js"></script>



<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">行程</div>
  <!-- Table -->

  <button type=button  class="btn btn-success" onclick="save()">保存</button>
 </button>




<div class="summernote" id="summernote"><?php echo $schedule->content?></div>


</div>



<script>

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
			alert(url);	
                    editor.insertImage(welEditable, url);
                }
            });
        }




var save = function() {
  var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).


	alert(aHTML);
	document.write(aHTML);
  $('.summernote').destroy();
};



</script>
