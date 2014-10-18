<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>




<form class="form-horizontal"  method="post" action="/price/saveInfo">
    <fieldset>
      <div id="legend" class="">
        <legend class="">修改价格</legend>
      </div>




<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">内舱价格</div>
  <!-- Table -->


  <table class="table">
    
		<?php $s = $price->basic_neicang;

			$var = explode(',', $s);
			$a1 = $var[0];
			$a2 = $var[1];
			$a3 = $var[2];

			$s = $price->classic_neicang;

                        $var = explode(',', $s);
                        $b1 = $var[0];
                        $b2 = $var[1];
                        $b3 = $var[2];


 		?>

                          <thead>
                            <tr>
				<td   align="center">标准(第1/2成人价)</td>

			<td align="center"> <input type="text" name="basic_neicang1" id="title"  value=<?php echo $a1 ?> ></td>
			    </tr>

			    <tr>
                               <td   align="center">标准(第3/4成人价)</td>
                        	<td align="center"> <input type="text" name="basic_neicang2" id="title"  value=<?php echo $a2 ?> ></td>
				</tr>

				<tr>
                               <td   align="center">标准(第3/4儿童价)</td>
                               

				<td align="center"> <input type="text" name="basic_neicang3" id="title"  value=<?php echo $a2 ?> ></td>
				</tr>

				<tr>
				 <td   align="center">高级(第1/2成人价)</td>


				<td align="center"> <input type="text" name="classic_neicang1" id="title"  value=<?php echo $b1 ?> ></td>

			

				</tr>

				<tr>
                               <td   align="center">高级(第3/4成人价)</td>
		
				<td align="center"> <input type="text" name="classic_neicang2" id="title"  value=<?php echo $b2 ?> ></td>

			</tr>		

				<tr>
                               <td   align="center">高级(第3/4儿童价)</td>
			
				<td align="center"> <input type="text" name="classic_neicang3" id="title"  value=<?php echo $b3 ?> ></td>
	
                            	</tr>
                          </thead>


  </table>


</div>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">海景价格</div>
  <!-- Table -->



  <table class="table">



               <?php $s = $price->basic_haijing;

                        $var = explode(',', $s);
                        $a1 = $var[0];
                        $a2 = $var[1];
                        $a3 = $var[2];

                        $s = $price->classic_haijing;

                        $var = explode(',', $s);
                        $b1 = $var[0];
                        $b2 = $var[1];
                        $b3 = $var[2];
                ?>


                          <thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                        <td align="center"> <input type="text" name="basic_haijing1" id="title"  value=<?php echo $a1 ?> ></td>
                            </tr>

                            <tr>
                               <td   align="center">标准(第3/4成人价)</td>
                                <td align="center"> <input type="text" name="basic_haijing2" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                               <td   align="center">标准(第3/4儿童价)</td>


                                <td align="center"> <input type="text" name="basic_haijing3" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                                 <td   align="center">高级(第1/2成人价)</td>


                                <td align="center"> <input type="text" name="classic_haijing1" id="title"  value=<?php echo $b1 ?> ></td>


        
                                </tr>

                                <tr>
                               <td   align="center">高级(第3/4成人价)</td>
                                
                                <td align="center"> <input type="text" name="classic_haijing2" id="title"  value=<?php echo $b2 ?> ></td>
                
                        </tr>

                                <tr>
                               <td   align="center">高级(第3/4儿童价)</td>

                                <td align="center"> <input type="text" name="classic_haijing3" id="title"  value=<?php echo $b3 ?> ></td>

                                </tr>
                          </thead>


  </table>


</div>





<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">阳台价格</div>
  <!-- Table -->


  <table class="table">





                <?php $s = $price->basic_yangtai;

                        $var = explode(',', $s);
                        $a1 = $var[0];
                        $a2 = $var[1];
                        $a3 = $var[2];

                        $s = $price->classic_yangtai;

                        $var = explode(',', $s);
                        $b1 = $var[0];
                        $b2 = $var[1];
                        $b3 = $var[2];
                ?>
			<thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                        <td align="center"> <input type="text" name="basic_yangtai1" id="title"  value=<?php echo $a1 ?> ></td>
                            </tr>

                            <tr>
                               <td   align="center">标准(第3/4成人价)</td>
                                <td align="center"> <input type="text" name="basic_yangtai2" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                               <td   align="center">标准(第3/4儿童价)</td>


                                <td align="center"> <input type="text" name="basic_yangtai3" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                                 <td   align="center">高级(第1/2成人价)</td>


                                <td align="center"> <input type="text" name="classic_yangtai1" id="title"  value=<?php echo $b1 ?> ></td>



                                </tr>

                                <tr>
                               <td   align="center">高级(第3/4成人价)</td>

                                <td align="center"> <input type="text" name="classic_yangtai2" id="title"  value=<?php echo $b2 ?> ></td>

                        </tr>

                                <tr>
                               <td   align="center">高级(第3/4儿童价)</td>

                                <td align="center"> <input type="text" name="classic_yangtai3" id="title"  value=<?php echo $b3 ?> ></td>

                                </tr>
			</thead>

  </table>


</div>



<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">套房价格</div>
  <!-- Table -->


  <table class="table">



                <?php $s = $price->basic_taofang;

                        $var = explode(',', $s);
                        $a1 = $var[0];
                        $a2 = $var[1];
                        $a3 = $var[2];

                        $s = $price->classic_taofang;

                        $var = explode(',', $s);
                        $b1 = $var[0];
                        $b2 = $var[1];
                        $b3 = $var[2];
                ?>
                        <thead>
                            <tr>
                                <td   align="center">标准(第1/2成人价)</td>

                        <td align="center"> <input type="text" name="basic_taofang1" id="title"  value=<?php echo $a1 ?> ></td>
                            </tr>

                            <tr>
                               <td   align="center">标准(第3/4成人价)</td>
                                <td align="center"> <input type="text" name="basic_taofang2" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                               <td   align="center">标准(第3/4儿童价)</td>


                                <td align="center"> <input type="text" name="basic_taofang3" id="title"  value=<?php echo $a2 ?> ></td>
                                </tr>

                                <tr>
                                 <td   align="center">高级(第1/2成人价)</td>


                                <td align="center"> <input type="text" name="classic_taofang1" id="title"  value=<?php echo $b1 ?> ></td>



                                </tr>

                                <tr>
                               <td   align="center">高级(第3/4成人价)</td>

                                <td align="center"> <input type="text" name="classic_taofang2" id="title"  value=<?php echo $b2 ?> ></td>

                        </tr>

                                <tr>
                               <td   align="center">高级(第3/4儿童价)</td>

                                <td align="center"> <input type="text" name="classic_taofang3" id="title"  value=<?php echo $b3 ?> ></td>

                                </tr>
			</thead>


  </table>


</div>



         <div>


               <button class="btn btn-primary" type="submit" value= <?php echo $price->id.','.$price->route_id ?> id="submit" name="id" > 保存</button>


        </div>

    </fieldset>
  </form>




