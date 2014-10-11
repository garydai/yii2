<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>





<script type="text/javascript" language="javascript">
//在页面装载时，让所有的td都拥有点击事件
 $(document).ready(function(){
    //找到所有td节点
    var tds = document.getElementById("cchange");
   // var    tds = $("td");
    //var tds = $("#sampleName");
  //  var tds = document.getElementsByName('cchange');
   // alert(tds);


	if(tds.click(tdclick))
	{
		alert(tds);
	}
    //给所有的td节点增加点击事件
    tds.click(tdclick);
});
function tdclick(){


        document.write("我是向页面输出的文字！");
    var clickfunction = this;
    //0,获取当前的td节点
    var td = $(this);
    //获取id
    var sampleId = $(this).val();
    //alert(id);
    //1,取出当前td中的文本内容保存起来
    var text = $(this).text();
    //2，清空td里边内同
    td.html("");
    //3,建立一个文本框，也就是建一个input节点
    var input = $("<input>");
    //4,设置文本框中值是保存起来的文本内容
    input.attr("value",text);
    //4.5让文本框可以相应键盘按下的事件
    input.keyup(function(event){
        //记牌器当前用户按下的键值
        var myEvent = event || window.event;//获取不同浏览器中的event对象
        var kcode = myEvent.keyCode;
        //判断是否是回车键按下
        if(kcode == 13){
            var inputnode = $(this);
            //获取当前文本框的内容
            var inputext = inputnode.val();
            //清空td里边的内容,然后将内容填充到里边
            var tdNode = inputnode.parent();
            tdNode.html(inputext);
            //让td重新拥有点击事件
            tdNode.click(tdclick);
            if(inputext != text){                    //只有当内容不一样时才进行保存
                 //调用该方法与后台交互
                sampleNameUpdate(sampleId, inputext, 'sampleAlterAction.action');
            }
        }
    });
    //5，把文本框加入到td里边去
    td.append(input);
    //5.5让文本框里边的文章被高亮选中
    //需要将jquery的对象转换成dom对象
    var inputdom = input.get(0);
    inputdom.select();
    //6,需要清楚td上的点击事件
    td.unbind("click");
}
</script>




<div class="right">
        <!-- //开始 展示数据 -->
       	    <div class="showinfo showinfoH showinfoD" >
              <table width="100%" border="0" cellspacing="1">
                    	  <thead>
                            <tr>
                               <td width="12%"  align="center">航线</td>
			       <td width="12%"  align="center">邮轮</td>

                               <td width="12%" align="center">路过港口</td>
                               <td width="12%" align="center">出发时间</td>
                               <td width="14%" align="center">旅游天数</td>
                               <td width="14%" align="center">价格</td>
                               <td width="14%" align="center">行程安排</td>
                            </tr>
                          </thead>

		  <tbody>
                    <!--//循环开始-->
                    <!--?php if($model){?-->
                    <!--?php for($i =0 ;$i<count($model); $i++){
                        $route = $model[$i];
                    ?-->
		     <?php $route = $model; ?>
                      <tr>
                        <td align="center" name="cchange">
                          <?php echo $route->name?>
                        </td>
			 <td align="center" id="cchange">
                          <?php echo $route->boat?>
                        </td>

                        <td align="center" id="cchange1">
                          <?php echo $route->port?>
                        </td>
                        <td align="center" id="cchang2e">
		    	  <?php echo $route->start_time?>
			</td>
                        <td align="center" id="cchange3">
                          <?php echo $route->days?>
			</td>
			<td align="center">
                          详情
                        </td>

			 <td align="center">
                          
			    <a href="/route/schedule/routeId/<?php echo $route->id;?>">详情</a>
                        </td>

                      </tr>
                    <!--?php }?-->
                    <!--?php }?-->
                    <!--//循环结束-->
		 </tbody>

	  </table>
	 </div>



</div>
