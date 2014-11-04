<script type="text/javascript"  src="/js/gaga.js"></script>


<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li><a href="/qna/index">问答管理</a></li>
  <li class="active">新增问答</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">新增问答</div>




        <table class="table">
                <tr>
                <td>问答标题</td>

                        <td> <input type="text" name="title" id="title" >
</td>
                </tr>

                <tr>
                    <td>问答内容</td>

                        <td>

                        <div class="summernote" id="summernote"></div>

                        </td>

                </tr>
        </table>


         <div>

                <button class="btn btn-primary" onclick="save()"  > 保存</button>
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



                erocessData: false,
                success: function(url) {
                //      alert(url);
                    editor.insertImage(welEditable, url);
                }
            });
        }


var save = function() {
        var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).

        var thumb = $('.mini-image-view').attr("src");

        var source = $('.mini-image-view').attr("source");
        var title = document.getElementById("title").value;

            $.ajax({
                dataType: "json",

                 data:{
                        "title":title,
                        "content":aHTML,
                        "thumb":thumb,
                        "source":source
                },
                type: "POST",
                url: "/qna/add_qna",
                success: function() {
                      alert('success');
                }
            });

};



</script>

