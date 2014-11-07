<ol class="breadcrumb">
  <li><a href="/route/index">航线管理</a></li>
  <li class="active">行程安排</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">行程安排</div>


  <button type=button  class="btn btn-success " onclick="location.href = ('<?php echo  "/schedule/add/route_id/{$route_id}" ?>')  "> <span class="glyphicon glyphicon-plus"></span></button>


	<div id="sid" style="display:none;"><?php echo $schedule_id?> </div>


        <table id="grid-selection" class="table table-condensed table-hover table-striped">
                <thead>
                 <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                        <th data-column-id="day">天数</th>
                        <th data-column-id="eat">用餐</th>
			<th data-column-id="live">住宿</th>
                        <th data-column-id="commands"data-formatter="commands" data-sortable="false">操作</th>
                </tr>
                </thead>
        </table>


        <div>
        <button class="btn btn-success " onclick="remove1()">删除</button>
        </div>
</div>








<script type="text/javascript">

var rowIds = [];

var sid = document.getElementById("sid").innerHTML;
var grid = $("#grid-selection").bootgrid({
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
		sid:sid
		
        };
    },

    rowCount: [20,30,40],
    url: "/schedule/get_data/",
    selection: true,
    multiSelect: true,
    formatters: {
         "commands": function(column, row)
        {

            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-pencil\"></span></button> " +
                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
        }
    }
}).on("selected.rs.jquery.bootgrid", function(e, rows)
{
    for (var i = 0; i < rows.length; i++)
    {
        rowIds.push(rows[i].id);
    }
   // alert("Select: " + rowIds.join(","));
}).on("deselected.rs.jquery.bootgrid", function(e, rows)
{
    for (var i = 0; i < rows.length; i++)
    {
        rowIds.push(rows[i].id);
    }
   // alert("Deselect: " + rowIds.join(","));
}).on("loaded.rs.jquery.bootgrid", function()
{
    grid.find(".command-edit").on("click", function(e)
    {

         location.href = "/schedule/modify/schedule_id/" + $(this).data("row-id");

//        alert("You pressed edit on row: " + $(this).data("row-id"));
    }).end().find(".command-delete").on("click", function(e)
    {
        var rows = Array();
        rows[0] = $(this).data("row-id");

        $.ajax({
                type: "get",
                url: "/schedule/remove/schedule_id/" + rows[0],
                success: function() {
                      //alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });



        $("#grid-selection").bootgrid('reload');
    });
});

function remove1()
{
        //alert(1);

        //alert(rowIds.join(","));
       $.ajax({
                type: "get",
                url: "/schedule/remove_selected/schedule_id/" + rowIds.join(","),
                success: function() {
                      //alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });



        $("#grid-selection").bootgrid('reload');


}

</script>

