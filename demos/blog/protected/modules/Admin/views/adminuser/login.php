<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />





        <script type="text/javascript" src=" <?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>



                <link href="/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">


<link href="/bootstrap-3.2.0-dist/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="/css/gaga.css" rel="stylesheet">

                <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
                <script src="/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>



 <div class="col-xs-5 col-sm-5 ">
</div>
<div class="col-xs-6 col-sm-6">
<h1>Login</h1>

<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableAjaxValidation'=>true,
)); ?>

        <div class="row">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username'); ?>
                <?php echo $form->error($model,'username'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password'); ?>
                <?php echo $form->error($model,'password'); ?>
        </div>

        <div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe'); ?>
        </div>

        <div class="row submit">
                <?php echo CHtml::submitButton('Login'); ?>
        </div>



<?php $this->endWidget(); ?>
</div><!-- form -->


</div>
