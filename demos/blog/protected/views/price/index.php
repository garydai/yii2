<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '航线管理',
);
?>







<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">内舱价格</div>
  <!-- Table -->


  <button type=button  class="btn btn-success" value="修改价格" onclick="location.href =('<?php echo "/price/modify/priceId/".$price->id ?>')" />

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

                               <td   align="center">标准(第3/4成人价)</td>
                        
                               <td   align="center">标准(第3/4儿童价)</td>
                                <td   align="center">高级(第1/2成人价)</td>

                               <td   align="center">高级(第3/4成人价)</td>

                               <td   align="center">高级(第3/4儿童价)</td>

                            </tr>
                          </thead>

                  <tbody>
                      <tr>
                        <td align="center" id="id">
                                <?php echo $a1?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $a2?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $a3?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>


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

                      <tr>
                        <td align="center" id="id">
                                <?php echo $a1?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $a2?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $a3?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>


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

                      <tr>
                        <td align="center" id="id">
                                <?php echo $a1?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $a2?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $a3?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>


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

                      <tr>
                        <td align="center" id="id">
                                <?php echo $a1?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $a2?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $a3?>
                        </td>
                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>

                        <td align="center" id="id">
                                <?php echo $b1?>
                        </td>


                     </tr>


                 </tbody>

  </table>


</div>







