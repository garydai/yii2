<ol class="breadcrumb">
  <li><a href="/post/index">首页</a></li>
  <li class="active">已完成订单</li>
</ol>



<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">已完成订单</div>
  <!-- Table -->




        <table id="grid-selection" class="table table-condensed table-hover table-striped">
                <thead>
                 <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                        <th data-column-id="route_id">航线id</th>
                        <th data-column-id="route_title">航线名称</th>
                        <th data-column-id="room">舱位</th>
                        <th data-column-id="count">预订人数</th>
                        <th data-column-id="start_time">出发时间</th>
                        <th data-column-id="customer">顾客名字</th>
                        <th data-column-id="phone">联系方式</th>
                        <th data-column-id="book_time">下单时间</th>
                        <th data-column-id="insurance">保险状态</th>





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
    url: "/book/get_done_data/",
    selection: true,
    multiSelect: true,
    formatters: {
         "commands": function(column, row)
        {

            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\">处理</button> ";
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

         location.href = "/book/deal/book_id/" + $(this).data("row-id");



    });
});

</script>













