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
  <div class="panel-heading">港口信息</div>
  <!-- Table -->

  <button type=button  class="btn btn-success"onclick="location.href =('/port/add')"> <span class="glyphicon glyphicon-plus"></span></button>
 </button>




<div id="summernote">Hello Summernote</div>


</div>



<script>

$(document).ready(function() {



$('#summernote').summernote({
  height: 300,                 // set editor height

});

});


</script>
