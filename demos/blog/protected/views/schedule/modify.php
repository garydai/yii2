<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>




<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">行程安排</div>

   
   <button class="btn btn-primary " onclick="insert(schedule)" href="#">添加行程</button>

  <!-- Table -->
  <table class="table" id="schedule">



                    	  <thead>
                            <tr>
                               <td align="center">天数</td>
			       <td align="center">标题</td>

                               <td align="center">内容</td>
				<td align="center">操作</td>
				
                            </tr>
                          </thead>

		  <tbody>
                    <!--//循环开始-->
                    <?php if($schedule){?>
                    <?php for($i =0 ;$i< count($schedule) ; $i++){
                    ?>
                      <tr>

                        <td align="center" name="day" ><input type="text" style="width:30px;"value=<?php echo $i +1 ?>>
                        </td>

                        <td align="center"> <input type="text" name="title" id="title"  value=<?php echo $schedule[$i]->title ?> ></td>



                        <td>

 				<textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"><?php echo $schedule[$i]->content ?></textarea>
			</td>

			

			<td align="center"> <a href="#" onclick="$(this).closest('tr').remove();return false;">删除行程</a></td>


                      </tr>
                    <?php }?>
                    <?php }?>
                    <!--//循环结束-->
		 </tbody>

	  </table>


	<div>
     <button class="btn btn-primary " onclick="onsave(<?php echo $route_id?>, schedule)">保存</button>
</div>

</div>

<script type="text/javascript">


function onsave(id, tableObj)
{


var num ='';
var title='';
var content='';

var str='';
for(var i=0;i<tableObj.rows.length;i++)
{
  // for(var j=0;j<tableObj.rows[i].cells.length;j++)
   {
      //str += tableObj.rows[i].cells[j].innerHTML+"   ";

           for(var z=0;z<tableObj.rows[i].cells[0].children.length;z++)
           {
	//	alert(z);
	//	var text = tableObj.rows[i].cells[0].children[0];
	//		alert(text);
		num += (tableObj.rows[i].cells[0].children[z]).value;
		title += (tableObj.rows[i].cells[1].children[z]).value;
		content += (tableObj.rows[i].cells[2].children[z]).value;
	///	alert(num);
		if(i != tableObj.rows.length -1)
		{
			num +='$$$$$$';
			title += '$$$$$$';
			content += '$$$$$$';
		}
        //	var text = tableObj.rows[i].cells[j].children[];//取得text object
               // str += text.value;
		//alert(str);
           }
   }
}

      $.ajax({

            type:"post",
            dataType:"json",//dataType (xml html script json jsonp text)
            data:{
                        "route_id":id,
                        "num":num,
                        "title":title,
                        "content":content
                        },
           url:"/schedule/saveInfo",
            success:function() {//成功获得的也是json对象
			alert('success');
		}
	});

}
function insert(table)
{

 var x=document.getElementById('schedule').insertRow(table.rows.length);

   
  var a1 = x.insertCell(0);
  var a2 = x.insertCell(1);
  var a3 = x.insertCell(2);
  var a4 = x.insertCell(3);
  
  a1.innerHTML=' <tr><td align="center" name="day" ><input style="width:30px" type="text" ></td>';
  a2.innerHTML='<td align="center"> <input type="text" name="title" id="title" ></td>';
  a3.innerHTML='<textarea style="margin: 0px; width: 600px; height: 100px;" name="description" id="description"></textarea>';
  a4.innerHTML="<td align='center'><a href='#'; onclick=\"$(this).closest('tr').remove();return false;\">删除行程</a></td></tr>";

	
}
</script>


