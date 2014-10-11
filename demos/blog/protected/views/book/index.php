<?php
$this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
        '订单管理',
);
?>






<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pub.css" rel="stylesheet" type="text/css" />


<div class="ebooking_tab">
        <ul class="ebooking_tab_list">
                <li class="current"><a href="">未处理订单</a></li>
                <li style="margin-right:30px;"><a href="">今日订单汇总</a></li>
                <li><a href="">全部订单</a></li>
        </ul>
</div>



