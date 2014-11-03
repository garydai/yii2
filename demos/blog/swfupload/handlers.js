/**
 * 队列错误处理函数
 */
function fileQueueError(file, errorCode, message) 
{
	try 
	{
		var errorName = "";
		if (errorCode === SWFUpload.errorCode_QUEUE_LIMIT_EXCEEDED) 
		{
			errorName = "你的队列文件可能太多了";
		}

		if (errorName !== "") 
		{
			alert(errorName);
			return;
		}

		switch (errorCode) 
		{
			case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
				errorName = "文件大小为零";
				break;
			case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
				errorName = "文件大小超限";
				break;
			case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
				errorName = "选择的文件类型与设定的文件类型不匹配";
				break;
			case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
				errorName = "超过允许上传文件的数量";
				break;
			default:
				errorName = '';
				break;
		}
		if(errorName != '')
		{
			var error_info_obj = document.getElementById(this.customSettings.upload_error); 
			error_info_obj.style.visibility='visible';
			var _errr_html = '<span class="alert alert-error">'+errorName+'</span>';
			error_info_obj.innerHTML = _errr_html;
			setTimeout(function(){remove(error_info_obj.childNodes[0],100)},3000);
			return;
		}
	}
	catch (ex) 
	{
		this.debug(ex);
	}
}

function fileQueued(file) 
{
	addProgressBarBorder (file, this);
}

/**
 * 上传准备工作
 */
function fileDialogComplete(numFilesSelected, numFilesQueued,numFilesInQueue) 
{
	/*
	numFilesSelected 文件的选择个数
	numFilesQueued 队列中的个数，若果没有超限，则是实际上传个数，如果超限则是0
	*/
	try 
	{
		if (numFilesQueued > 0) //队列中的个数大于零 开始上传
		{
			this.startUpload();//开始上传
		}
	}
	catch (ex) 
	{
		this.debug(ex);
	}
}


/**
 * 上传进度控制
 */
function uploadProgress(file, bytesLoaded, bytesTotal) 
{	
	try 
	{
		var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);                 //完成的百分比
		var progress = new FileProgress(file,this.customSettings.upload_target);  //上传状态控制类
		progress.setProgress(percent);	                                         //设置当前上传的进度
		//上传完成不能取消 可以删除
		if (percent === 100) 
		{
			progress.setStatus("100%");//提示上传完成
			progress.toggleCancel(false);
			progress.toggleDelete(true,this);
		}
		//上传中可以取消 不能删除
		else 
		{
			progress.toggleCancel(true, this);
			progress.toggleDelete(false);
		}
	}
	catch (ex) 
	{
		this.debug(ex);
	}
}

/**
 * 上传成功以后执行的函数
 */
function uploadSuccess(file,serverData) 
{
	/*
	file 上传的文件的属性对象
	serverData 从php端返回的数据
	*/
	try 
	{

		var arr_data = new Array();
		arr_data = serverData.split('|@|');
		var progress = new FileProgress(file, this.customSettings.upload_target);
	//	if (arr_data[0] == 'success') 
		//if (true) 
		{


			progress.setStatus("加载缩略图..."); //加载缩略图提示
		//	addImage(arr_data[2],progress);      //正在加载缩略图
			addImage(serverData, progress);
			progress.setStatus('');     //加载完成，清空提示文字
			
			progress.toggleCancel(false);
			progress.toggleDelete(true,this);
			
		}
	//	else 
		{
		//	addImage(Core_RES_GV._URL_IMAGE_+'def/unknow.png',progress);       //正在加载缩略图
		//	progress.setStatus(arr_data[1]+' '+arr_data[2]);                   //加载完成，清空提示文字
		}
	}
	catch (ex) 
	{
		this.debug(ex);
	}
}

/**
 * 上传完成以后的处理
 */
function uploadComplete(file) 
{
	try 
	{
		if (this.getStats().files_queued > 0) //如果还有队列继续上传
		{
			this.startUpload();
		}
	}
	catch (ex) 
	{
		this.debug(ex);
	}
}

/**
 * 上传出错处理
 */
function uploadError(file, errorCode, message) 
{
	var imageName =  "error.gif";
	var progress;
	try {
		switch (errorCode) 
		{
			case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
				try 
				{
					progress = new FileProgress(file,  this.customSettings.upload_target);
					progress.setCancelled();
					progress.setStatus("Cancelled");
					progress.toggleCancel(false);
				}
				catch (ex1) 
				{
					this.debug(ex1);
				}
				break;
			case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
				try 
				{
					progress = new FileProgress(file,  this.customSettings.upload_target);
					progress.setCancelled();
					progress.setStatus("Stopped");
					progress.toggleCancel(true);
				}
				catch (ex2) 
				{
					this.debug(ex2);
				}
				break;
			case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
				imageName = "uploadlimit.gif";
				break;
			default:
				//alert(message);
				break;
		}

		//addImage("./swfupload/" + imageName);

	} catch (ex3) {
		this.debug(ex3);
	}

}

/**
 * 显示缩略图
 * src图片网络访问路劲
 * file该文件上传对象
 */
function addImage(src,progress) 
{

	//移除进度背景
	var img_container = progress.fileProgressElement.childNodes[0];
	img_container.removeChild(img_container.childNodes[0]);
	var newImg = document.createElement("img");
	newImg.className = 'mini-image-view';
	var source = src.replace('thumb','images');
	newImg.setAttribute('source',source);
	img_container.appendChild(newImg);
	if (newImg.filters) 
	{
		try 
		{
			newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
		}
		catch (e) 
		{
			newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
		}
	}
	else 
	{
		newImg.style.opacity = 0;
	}

	newImg.style.height = '120px';
	newImg.src = src;

	//当浏览器加载图片完成时执行函数
	newImg.onload = function () 
	{
		fadeIn(newImg, 0);
	}
}

/**
 * 淡入淡出效果
 * 
 */
function fadeIn(element, opacity) 
{
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps
	if (opacity < 100) 
	{
		opacity += reduceOpacityBy;
		if (opacity > 100) 
		{
			opacity = 100;
		}
		if (element.filters) 
		{
			try 
			{
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			}
			catch (e) 
			{
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		}
		else 
		{
			element.style.opacity = opacity / 100;
		}
	}
	if (opacity < 100) 
	{
		setTimeout(function (){fadeIn(element, opacity);}, rate);
	}
}

/**
 * 隐藏
 * 
 */                       // 100
function fadeOut(element, opacity) 
{
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps
	if (opacity > 0) 
	{
		opacity -= reduceOpacityBy; //  95
		if (opacity < 0) 
		{
			opacity = 0;
		}
		if (element.filters) 
		{
			try 
			{
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			}
			catch (e) 
			{
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		}
		else 
		{
			element.style.opacity = opacity / 100;
		}
		if (opacity == 0)
		{
			element.style.display = 'none';
		}
	}

	if (opacity > 0) 
	{
		setTimeout(function (){fadeOut(element, opacity);}, rate);
	}
}
/**
 * 删除
 * 
 */                       // 100
function remove(element, opacity) 
{
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps
	if (opacity > 0) 
	{
		opacity -= reduceOpacityBy; //  95
		if (opacity < 0) 
		{
			opacity = 0;
		}
		if (element.filters) 
		{
			try 
			{
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			}
			catch (e) 
			{
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		}
		else 
		{
			element.style.opacity = opacity / 100;
		}
		if (opacity == 0)
		{
			element.parentNode.removeChild(element);
		}
	}

	if (opacity > 0) 
	{
		setTimeout(function (){remove(element, opacity);}, rate);
	}
}	

/**
 * 选择文件确定以后 生成相应数目的进度框
 */
function addProgressBarBorder (file,_this)
{
	var divFileProgressContainer = _this.customSettings.upload_target;
	var progressBarContainer = document.getElementById(divFileProgressContainer);//获取进度条容器元素
	//加注进度框
	var progress_bar=
			'<div class="row-fluid upload-thumb-box" id="'+file.id+'">'+
				'<div class="span3">'+
					'<a href="javascript:void(0)" style="height:120px;" class="thumbnail"><div></div></a>'+
				'</div>'+
				'<div class="span8">'+
					'<p>等待上传...</p>'+
					'<p>'+
						
						'<i title="删除" class="btn btn-danger hand deleteBtn">删 除</i>'+
						'<i title="取消" class="btn btn-danger hand cancelBtn">取 消</i>'+
					'</p>'+
				'</div>'+
			'</div>';
	progressBarContainer.insertAdjacentHTML('beforeEnd',progress_bar);
}


/* ******************************************
 *	上传进度对象
 *	控制文件上传进度的显示状态
 * ****************************************** 
 */
function FileProgress(file,progressContainerId) 
{
	this.fileProgressID = file.id;                                           //上传完成后缩略图容器的DIV ID
	this.fileProgressElement = document.getElementById(this.fileProgressID); //获取这个div dom对象
}

/**
 * 设置当前进度
 */
FileProgress.prototype.setProgress = function (percentage) 
{
	this.fileProgressElement.childNodes[0].childNodes[0].childNodes[0].style.width = percentage + "%"; //改变进度框的背景宽度来模拟进度
	this.fileProgressElement.childNodes[1].childNodes[0].innerHTML   = percentage + "%";   //改变百分比
};

FileProgress.prototype.setCancelled = function () 
{
	this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);//删除缩略图
};

//设置图片中间的状态提示信息例如：正在加载，加载了百分多少，正在显示缩略图。。。。
FileProgress.prototype.setStatus = function (status) 
{
	this.fileProgressElement.childNodes[1].childNodes[0].innerHTML = status;
};

/**
 * 删除按钮的隐藏显示    同时绑定删除按钮事件
 * @param show  true(显示删除按钮)   false(隐藏删除按钮)
 */
FileProgress.prototype.toggleDelete = function (show,swfuploadInstance) 
{	


	var operate_obj = this.fileProgressElement.childNodes[1].childNodes[1].childNodes[0];//删除元素DOM对象
	//operate_obj.style.visibility = show ? "visible" : "hidden";//原句，修改后如下
	operate_obj.style.display = show ? "inline-block" : "none";
	if (swfuploadInstance)
	{
		operate_obj.onclick = function () 
		{
			remove(this.parentNode.parentNode.parentNode,100);
			ResetSWFStatistics(swfuploadInstance);
		};	
	}
};

/**
 * 取消按钮的隐藏显示  同时绑定取消事件
 * param   show                true(显示取消按钮)   false(隐藏取消按钮)
 * param   swfuploadInstance   上传对象实例
 */
FileProgress.prototype.toggleCancel = function (show, swfuploadInstance) 
{		
	var operate_obj = this.fileProgressElement.childNodes[1].childNodes[1].childNodes[1];//取消元素DOM对象
	operate_obj.style.display = show ? "inline-block" : "none";
	if (swfuploadInstance) 
	{
		var fileID = this.fileProgressID;
		operate_obj.onclick = function () //取消上传并删除
		{
			swfuploadInstance.cancelUpload(fileID,false);
			remove(this.parentNode.parentNode.parentNode,100);
			return false;
		};
	}
};

/**
 * 删除一个上传的文件时 重置swf上传计数器 以达到删除后还可以上传的目的
 */
function ResetSWFStatistics (swfuploadInstance)
{
	var stats = swfuploadInstance.getStats();
	stats.successful_uploads--;
	swfuploadInstance.setStats(stats);
}
