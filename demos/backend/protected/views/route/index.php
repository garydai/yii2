<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li class="active">邮轮管理</li>
</ol>


<style type="text/css">

.bootgrid-table th > .test11 {


	width: 50px;
}
	
-->

</style>


<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading">航线信息</div>
  <!-- Table -->


  <button type=button  class="btn btn-success " onclick="location.href =('/route/add')"> <span class="glyphicon glyphicon-plus"></span></button>


        <table id="grid-selection" class="table table-condensed table-hover table-striped">
                <thead>
                 <tr>
                        <th  headerCssClass="test11" data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                        <th data-column-id="name">航线名称</th>
                        <th data-column-id="boat">邮轮</th>
                        <th data-column-id="port">路过港口</th>
			<th data-column-id="style">航线类型</th>
                        <th data-column-id="start_time">出发时间</th>
                        <th data-column-id="days">行程天数</th>
                        <th data-column-id="price">价格</th>
                        <th data-column-id="schedule">行程安排</th>

                        <th data-column-id="commands"data-formatter="commands" data-sortable="false">操作</th>
                </tr>
                </thead>
        </table>


</div>


<script type="text/javascript">

var rowIds = [];

var grid = $("#grid-selection").bootgrid({
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
        };
    },

    rowCount: [20,30,40],
    url: "/route/get_data/",
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

         location.href = "/route/modify/route_id/" + $(this).data("row-id");

//        alert("You pressed edit on row: " + $(this).data("row-id"));
    }).end().find(".command-delete").on("click", function(e)
    {
        var rows = Array();
        rows[0] = $(this).data("row-id");
        $.ajax({
                type: "get",
                url: "/route/remove/route_id/" + rows[0],
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
                url: "/route/remove_selected/route_id/" + rowIds.join(","),
                success: function() {
                      //alert('success');
                  //  editor.insertImage(welEditable, url);
                }
            });

        $("#grid-selection").bootgrid('reload');
}

</script>





