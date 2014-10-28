

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增行程安排</div>

   
  <!-- Table -->
  <table class="table" id="schedule">



          <tr>
             <td >天数</td>
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="title" id="day"   > </td>


        </tr>



          <tr>
             <td >用餐</td>
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="title" id="eat"  > </td>


        </tr>




          <tr>
             <td >住宿</td>
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="title" id="live"  > </td>


        </tr>



          <tr>
             <td >行程关键字</td>
          </tr>


          <tr >

                <td> <input type="text" style="width:400px"name="title" id="title"   > </td>


        </tr>


        <tr>
                <td>行程内容</td>
        </tr>

        <tr>
                <td>
                <div class="summernote" id="summernote"></div>
                </td>
        </tr>



          </table>


        <div>
     <button class="btn btn-success " onclick="save(<?php echo $route_id?>)">保存</button>
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




var save = function(route_id) {
  var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

  var title = document.getElementById("title").value;
  var day = document.getElementById("day").value;

  var eat = document.getElementById("eat").value;
  var live = document.getElementById("live").value;


            $.ajax({
                dataType: "json",

                 data:{
			"route_id":route_id,
                        "title":title,
			"day":day,
			"eat":eat,
			"live":live,
                        "content":aHTML
                },
                type: "post",
                url: "/schedule/add_schedule",
                success: function() {
                      alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });



}
</script>


