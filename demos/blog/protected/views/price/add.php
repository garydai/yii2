<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>




<form class="form-horizontal"  method="post" action="/price/addInfo">
    <fieldset>
      <div id="legend" class="">
        <legend class="">新增价格</legend>
      </div>




<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">内舱价格</div>
  <!-- Table -->


  <table class="table">
    
                          <thead>
                            <tr>
				<td   align="center">标准(第1/2成人价)</td>

                               <td   align="center">标准(第3/4成人价)</td>
                        
                               <td   align="center">标准(第3/4儿童价)</td>
                                <td   align="center">高级(第1/2成人价)</td>

                               <td   align="center">高级(第3/4成人价)</td>

                               <td   align="center">高级(第3/4儿童价)</td>

                            </tr>
                          </thead>

                  <tbody>
                      <tr>
			<td align="center"> <input type="text" name="basic_neicang1" id="title"  ></td>
			<td align="center"> <input type="text" name="basic_neicang2" id="title"  ></td>
			<td align="center"> <input type="text" name="basic_neicang3" id="title"  ></td>

			<td align="center"> <input type="text" name="classic_neicang1" id="title"  ></td>
			<td align="center"> <input type="text" name="classic_neicang2" id="title"  ></td>
			<td align="center"> <input type="text" name="classic_neicang3" id="title"  ></td>


		     </tr>

                 </tbody>

  </table>


</div>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">海景价格</div>
  <!-- Table -->



  <table class="table">



                          <thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                               <td   align="center">标准(第3/4成人价)</td>

                               <td   align="center">标准(第3/4儿童价)</td>
                                <td   align="center">高级(第1/2成人价)</td>

                               <td   align="center">高级(第3/4成人价)</td>

                               <td   align="center">高级(第3/4儿童价)</td>

                            </tr>
                          </thead>

                  <tbody>


                      <tr>
                        <td align="center"> <input type="text" name="basic_haijing1" id="title"  ></td>
                        <td align="center"> <input type="text" name="basic_haijing2" id="title"  ></td>
                        <td align="center"> <input type="text" name="basic_haijing3" id="title"  ></td>

                        <td align="center"> <input type="text" name="classic_haijing1" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_haijing2" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_haijing3" id="title"  ></td>


                     </tr>



                 </tbody>

  </table>


</div>





<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">阳台价格</div>
  <!-- Table -->


  <table class="table">



                          <thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                               <td   align="center">标准(第3/4成人价)</td>

                               <td   align="center">标准(第3/4儿童价)</td>
                                <td   align="center">高级(第1/2成人价)</td>

                               <td   align="center">高级(第3/4成人价)</td>

                               <td   align="center">高级(第3/4儿童价)</td>

                            </tr>
                          </thead>

                  <tbody>



                      <tr>
                        <td align="center"> <input type="text" name="basic_yangtai1" id="title"   ></td>
                        <td align="center"> <input type="text" name="basic_yangtai2" id="title"   ></td>
                        <td align="center"> <input type="text" name="basic_yangtai3" id="title"   ></td>

                        <td align="center"> <input type="text" name="classic_yangtai1" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_yangtai2" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_yangtai3" id="title"  ></td>


                     </tr>


                 </tbody>

  </table>


</div>



<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">套房价格</div>
  <!-- Table -->


  <table class="table">



                          <thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                               <td   align="center">标准(第3/4成人价)</td>

                               <td   align="center">标准(第3/4儿童价)</td>
                                <td   align="center">高级(第1/2成人价)</td>

                               <td   align="center">高级(第3/4成人价)</td>

                               <td   align="center">高级(第3/4儿童价)</td>

                            </tr>
                          </thead>

                  <tbody>



                      <tr>
                        <td align="center"> <input type="text" name="basic_taofang1" id="title"   ></td>
                        <td align="center"> <input type="text" name="basic_taofang2" id="title"  ></td>
                        <td align="center"> <input type="text" name="basic_taofang3" id="title"  ></td>

                        <td align="center"> <input type="text" name="classic_taofang1" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_taofang2" id="title"  ></td>
                        <td align="center"> <input type="text" name="classic_taofang3" id="title"  ></td>


                     </tr>


                 </tbody>

  </table>


</div>



         <div>

               <button class="btn btn-primary" type="submit" value= <?php echo $route_id ?> id="submit" name="route_id" > 保存</button>

        </div>

    </fieldset>
  </form>




