<?php
/*
 * swfupload图片上传  
 * author:微型凳子  
 * date:2012/3/23  
 * email:denghuien@mischair.com  
 * site:http://mischair.com  
 */ 
//	if (isset($_POST["PHPSESSID"])) {
//		session_id($_POST["PHPSESSID"]);
//	}
	session_start();

	//unset($_SESSION['upload_tem']);
	ini_set("html_errors", "0");
	if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
		echo "错误:无效的上传!";
		exit(0);
	}

	// Get the image and create a thumbnail
	 $file_types=explode(".",$_FILES["Filedata"]["name"]);
     $file_type=$file_types[count($file_types)-1];
	if(strtolower($file_type)=='gif' )
	{
		$img = imagecreatefromgif($_FILES["Filedata"]["tmp_name"]);
	}
	else if(strtolower($file_type)=='png')
	{
		$img = imagecreatefrompng($_FILES["Filedata"]["tmp_name"]);
	}
	else if(strtolower($file_type)=='bmp')
	{
		$img = imagecreatefromwbmp($_FILES["Filedata"]["tmp_name"]);
	}
	else
	{
		$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
	}

	if (!$img) {
		echo "错误:无法创建图像 ". $_FILES["Filedata"]["tmp_name"];
		exit(0);
	}

	$width = imageSX($img);
	$height = imageSY($img);

	if (!$width || !$height) {
		echo "错误：无效的高或高";
		exit(0);
	}

	// Build the thumbnail
	$target_width = 100;
	$target_height = 100;
	$target_ratio = $target_width / $target_height;

	$img_ratio = $width / $height;

	if ($target_ratio > $img_ratio) {
		$new_height = $target_height;
		$new_width = $img_ratio * $target_height;
	} else {
		$new_height = $target_width / $img_ratio;
		$new_width = $target_width;
	}

	if ($new_height > $target_height) {
		$new_height = $target_height;
	}
	if ($new_width > $target_width) {
		$new_height = $target_width;
	}

	$new_img = ImageCreateTrueColor(100, 100);
	if (!@imagefilledrectangle($new_img, 0, 0, $target_width-1, $target_height-1, 0)) {	// Fill the image black
		echo "错误：不能填充新图片";
		exit(0);
	}

	if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
		echo "错误：不能调整大小的图像";
		exit(0);
	}

	if (!isset($_SESSION["file_info"])) {
		$_SESSION["file_info"] = array();
	}
	ob_start();
	imagejpeg($new_img);
	$imagevariable = ob_get_contents();
	ob_end_clean();

	$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);



	
	$_SESSION["file_info"][$file_id] = $imagevariable;
	//echo "FILEID:" . $file_id;	// Return the file id to the script
	
	include("upimg.class.php");
	if(!empty($_FILES["Filedata"]))
	{
		$folder="upload/images/".date("Y-m-d");
		$up = new upimg("$folder","upload/thumb/".date("Y-m-d")); //可以写成：$up = new upimg();
		$up->autoThumb = TRUE; //可省略
		$up->srcDel=TRUE;
		$up->thumbWidth = 200; //可省略
		$up->thumbHeight = 200; //可省略
		$up->maxsize=2014; //上传文件大小单位是kb
		/*$op=array(
			'uploadFolder'=>'upload/images/'.date('Y-m-d'),	
			'thumbFolder'=>'upload/thumbs/'.date('Y-m-d'),	
			'srcDel'=>false,
			'autoThumb'=>true,
			'thumbWidth'=>550,
			'thumbHeight'=>400,
			'maxSize'=>2014,
		);

		
		$up = new upimg($op);*/

		$result= $up->upload('Filedata'); // HTML中<input />的name属性值
		//$water="logo.png";
		//$waterimage= new waterimage($up->thumbPath,$water,3);//添加水印
	//	$waterimage->waterimg();
		$_SESSION["upload_tem"]=$up->thumbPath;
		$_SESSION["upload_tem"]=trim($_SESSION["upload_tem"],",");
		echo '/'.$up->thumbPath;
		
	//	var_dump($_SESSION);
	}


?>
