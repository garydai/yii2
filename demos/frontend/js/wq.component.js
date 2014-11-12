
/*========================== jquery plugin ===============================*/
;$(function($, win, doc) {
	//add function open window
	var open_win_default = {
			method:"GET",
			target:"_blank",
			url:"",
			params:[] //params:[{name:"age",value:"17"},...]
	};
	$.extend({
		openWin:function(options){
			options = jQuery.extend({}, open_win_default, options);
			var _form = $("#wq_open_win");
			if(_form.length==0) _form = $("<form id='wq_open_win' style='display:none;' action='' target='_blank' method='GET'></form>").appendTo("body");
			_form.children().remove();
			_form.attr("action",options.url).attr("target",options.target).attr("method",options.method);
			if(options.params && options.params.length>0){
				for(var i=0;i<options.params.length;i++){
					_form.append("<input type='hidden' name='"+options.params[i].name+"' value='"+options.params[i].value+"'/>");
				}
			}
			_form.submit();
		},
		/**
		 * 跨域请求proxy
		 * url,dataType,callback needed
		 */
		corsProxy:function(opt){
			var _method = opt.method||"GET",
				_url = encodeURI(opt.url),
				_dataType = opt.dataType,
				_params = opt.params||{},
				_callback = opt.callback,
				_domain = opt.domain || "http://www.woqu.com";
				
			var _paramsJsonStr = encodeURI(JSON.stringify(_params));
			var _src = _domain + "/ajax-proxy?url="+_url+"&method="+_method+"&params="+_paramsJsonStr+"&dataType="+_dataType+"&callback="+_callback;
			var _frame = $("#ajaxProxyFrame");
			if(_frame.length==0) {
				_frame = $("<iframe id='ajaxProxyFrame' style='display:none;'></iframe>").appendTo("body");
			}
			_frame.attr("src",_src);
		}
	});

	$Wq_Tip = {
		def_opt: {
			title: "我趣温馨提醒",
			content: "this is an example",
			close: $.noop,
			left: 0,
			top: 0,
			zIndex: 98,
			needCover: true
		},
		show: function(opt) {
			opt = $.extend({}, $Wq_Tip.def_opt, opt);
			var cover = $("#cover");
			if (cover.length == 0) cover = $('<div id="cover" style="display:none;position:fixed;_position:absolute;z-index:' + opt.zIndex + ';left:0;top:0;opacity:0.06;filter:alpha(opacity=6);background-color:#000;"></div>').appendTo("body");
			cover.css({
				width: $(win).width(),
				height: $(win).height()
			});
			if (opt.needCover) cover.show();
			else cover.hide();
			var tip_wrapper = $('<div id="tip_wrapper" style="width:266px;border:1px solid #06a6a6;background-color:#fff;position:absolute;z-index:' + (opt.zIndex + 1) + ';padding:15px;"></div>')
				.appendTo("body");
			tip_wrapper.css({
				left: opt.left,
				top: opt.top
			});
			$('<p style="color:#f08300;font-size:16px;font-weight:bold;padding-bottom:8px;">' + opt.title + '</p>').appendTo(tip_wrapper);
			$('<p style="color:#aeaeae;font-size:14px;">' + opt.content + '</p>').appendTo(tip_wrapper);
			var close_btn = $('<i style="position:absolute;left:280px;top:5px;width:12px;height:12px;background:url(\'http://dn-woqu.qbox.me/a168/img/common/woqu-detail-all.png\') -389px -87px no-repeat;"></i>').appendTo(tip_wrapper);
			close_btn.click(function() {
				$(this).parent().remove();
				$("#cover").hide();
				if (typeof opt.close == 'function') {
					opt.close.call(this, null);
				}
			});

			return tip_wrapper;
		}
	}
	
	
	
	
	/* ------------------------$.function----------------------------------- */
	/**
	 @plugin : woqu common Scrollspy
	 @author : Maoyu
	 @date   : 2014-08-04
	 @Usage  : 
			1.对浮动导航整体设置class="wq_scroll_nav"。对导航标签链接a设置class="wq_scroll_navbar"
			<div class="wq_scroll_nav">
				<a href="#" class="wq_scroll_navbar" ></a>
				<a href="#" class="wq_scroll_navbar" ></a>
				<a href="#" class="wq_scroll_navbar" ></a>
			</div>
			-----------------------------------------------------------
			2.对滚动的每个内容块设置class="wq_scroll_part"
			<div class="wq_scroll_part" id=""></div>
			<div class="wq_scroll_part" id=""></div>
			<div class="wq_scroll_part" id=""></div>
			-----------------------------------------------------------
			3.js中引入以上语句。
			$('.wq_scroll_nav').wq_scrollspy( {
				ActiveControlClass:'active_navbar', //定义导航块选中时的样式类:active_navbar，可自定义类名
				beforeScrollArea:'',//未到达滚动区域时，浮动导航执行的函数,例:beforeScrollArea:function(){ $('.wq_scroll_nav').hide(); },
				scrollToArea:'',//到达滚动区域时，浮动导航执行的函数
				scrollOutArea: '', //离开滚动区域时，滚动导航执行的函数，默认隐藏
				whenInArea_call: ''// 当在滚动区域滚动时的回调函数
			});
			------------------------------------------------------------
			4. 在css中定义导航选中时的样式：active_navbar类
			.active_navbar{}
	 **/
	$.fn.wqScrollSpy = function(options) {
		var defaults = {
				wq_scroll_nav: '', 		//对浮动导航整体设置class
				wq_scroll_navbar: '', 	//对导航标签设置class
				wq_scroll_part: '', 	//对滚动的每个内容块设置class
				/*以上三个变量用于同页面多个控制导航条时，变量为空时默认用@Usage中的类名*/
				ActiveControlClass: '', //导航块选中时的样式
				beforeScrollArea: '', 	//未到达滚动区域时，浮动导航执行的函数,例:beforeScrollArea:function(){ $('.wq_scroll_nav').hide(); },
				scrollToArea: '', 		//到达滚动区域时，浮动导航执行的函数
				scrollOutArea: '', 		//离开滚动区域时，滚动导航执行的函数，默认隐藏
				whenInArea_call: ''		// 当在滚动区域滚动时的回调函数
			},
			opts = $.extend({}, $.fn.wqScrollSpy.defaults, options),
			wq_scroll_nav = (opts.wq_scroll_nav == null) ? 'wq_scroll_nav' : opts.wq_scroll_nav,
			wq_scroll_navbar = (opts.wq_scroll_navbar == null) ? 'wq_scroll_navbar' : opts.wq_scroll_navbar,
			wq_scroll_part = (opts.wq_scroll_part == null) ? 'wq_scroll_part' : opts.wq_scroll_part,
			ActiveControlClass = opts.ActiveControlClass,
			beforeScrollArea = opts.beforeScrollArea,
			scrollToArea = opts.scrollToArea,
		    scrollOutArea = opts.scrollOutArea,
		    whenInArea_call = opts.whenInArea_call,
			ishide = opts.ishide,
			doc_H = $(doc).height(),
			win_H = $(win).height(),
			wq_scroll_part_H = 0,
			every_part_top = new Array(),
			every_navbar = new Array();

		$('.' + wq_scroll_part).each(function() {
			wq_scroll_part_H += $(this).height();
		});

		//导航如需要隐藏或其他样式，刚加载页面时隐藏导航或执行其他样式
		function changeScrollpartStatus() {
			var _scrollT = $(win).scrollTop(),
				scrollpartTop = $('.' + wq_scroll_part).eq(0).offset().top;
			if (_scrollT < scrollpartTop) {
				beforeScrollArea();
			}
			if (_scrollT > scrollpartTop && _scrollT < wq_scroll_part_H + $('.' + wq_scroll_part).offset().top) {
				scrollToArea();
			}
		}

		function scrollPartEvent() {
			var scrollT = $(win).scrollTop();
			$('.' + wq_scroll_part).each(function(i) {
				every_part_top[i] = $(this).offset().top;
				every_navbar[i] = $('.' + wq_scroll_navbar).eq(i);
				
				//判断当前页面位置，并执行相应函数
				changeScrollpartStatus();

				//设置导航标签active样式
				if (scrollT >= every_part_top[i]) {
					$('.' + wq_scroll_navbar).removeClass(ActiveControlClass);
					every_navbar[i].addClass(ActiveControlClass);
				}

				//判断滚动区域的最后一部分执行函数
				var wq_scroll_part_L = $('.' + wq_scroll_part).length;
		
				if (i == (wq_scroll_part_L - 1)){
					var last_part_offset_top = every_part_top[i],
						last_part_H = $(this).height(),
						wq_scroll_nav_H = $('.'+wq_scroll_nav).height();
					
					if(scrollT > (last_part_offset_top + last_part_H - wq_scroll_nav_H)) {
						if(opts.scrollOutArea == null){
							$('.'+wq_scroll_nav).hide();
						}else{
							scrollOutArea();
						}
					}
				}
			});
		}
		$(win).on('scroll', function() {
			scrollPartEvent();
			if(!(opts.whenInArea_call == null)){
				whenInArea_call();
			}
		});
		$('.' + wq_scroll_navbar).click(function() {
			$('.' + wq_scroll_navbar).removeClass(ActiveControlClass);
			$(this).addClass(ActiveControlClass);
		});

		changeScrollpartStatus();

		return this;
	};
	/**
	 * 正则验证
 	 */
 	$.wqRegExpTest = function(type, content) {
 		var regExpMap = {
				'common'			: /[\s\S]*/,													//匹配任何内容
				'noChinese'			: /^[^\u4e00-\u9fa5]{0,}$/,										//非中文
				'letter'			: /^[a-zA-Z]+$/,											    //纯字母
				'number'			: /^\d+$/, 														//匹配数字
				'numberLimit10'		: /^\d{10}$/, 													//匹配10位数字
                'creditMonth'		: /^(([0][1-9])|([1][0-2]))$/,
                'creditYear'		: /^(\d){1,2}$/,
                'creditCvc'			: /^(\d){3,4}$/,
                'creditNumberUSA'	: /^(\d){5,19}$/,				
				'email'				: /^\w+([-.]\w+)*@\w+([-]\\w+)*\.(\w+([-]\w+)*\.)*[a-z]{2,3}$/,
				'mobile'			: /^1[0-9]{10}$/, 												//指的是中国的手机号码
				'mobileCN'			: /^1[0-9]{10}$/,												//中国1开头的10为数字
				'mobileUSA'			: /^[0-9]{10}$/, 												//美国10位数字
				'mobileHK'			: /^[0-9]{8}$/, 												//香港
				'mobileMacau'		: /^[0-9]{8}$/, 												//澳门
				'mobileTW'			: /^09[0-9]{8}$/, 												//台湾
				'password'			: /^[a-zA-Z0-9]{6,22}$/,
				'telephone' 		: /^[+]{0,1}(\d){1,4}[ ]{0,1}([-]{0,1}((\d)|[ ]){1,12})+$/,
				'date'				: /^\d{4}-\d{2}-\d{2}$/, 										//简单日期格式判断  1990-12-12
				'flightNum'			: /^[a-zA-Z]{2}[0-9]{1,4}$/										//航班号格式判断	航空公司双字码（字母两位） + 2-4位数字
			},
			regExpErrMap = {
				'email'				: '邮箱格式错误',
				'mobile'			: '手机格式错误',
				'letter'			: '请输入英文字母',
				'noChinese'			: '请输入英文或数字',
				'number'			: '请输入正确数字',
				'numberLimit10'		: '请输入正确的10位数字',
				'creditMonth'		: '请输入2位的月数',
                'creditYear'		: '请输入2位的年数',
                'creditCvc'			: '请输入正确的验证码',
                'creditNumberUSA'	: '请输入正确的卡号',
				'mobileCN'			: '手机格式错误(中国)',
				'mobileUSA'			: '手机格式错误(美国)',
				'mobileHK'			: '手机格式错误(香港)',
				'mobileMacau'		: '手机格式错误(澳门)',
				'mobileTW'			: '手机格式错误(台湾)',
				'telephone' 		: '座机格式错误',
				'password'			: '密码长度必须为6-22位',
				'date'				: '请选择日期',
				'flightNum'			: '请输入正确的航班号码'
			};

 		return {code: regExpMap[type].test(content), msg: regExpErrMap[type]};
 	};
	/**
	 * 内容填写错误提示插件
 	 */
  	$.wqErrorTips = function(opt) {
		var typeArr = ['data-vtype', 	//获取元素的类型 mobile || email || common(没有特别类型的) || ...   	*必须项*
					   'data-vrequire', //判断元素是否必填 true || false	 									*必须项(除非有data-vgroup)*
					   'data-vgroup', 	//如果值相同的元素只需填一个，属于组元素则不需要data-vrequire属性		*拥有该属性则不需要data-vrequire*	
					   'data-vrepeat',	//需要确认的值需要与原值相同，需要确认的元素必须有data-vrequire属性
					   'data-vdefault'	//下拉列表选项有默认值，判断如果当前的值为默认值的话就报“请选择类型”
					  ],
			repeatErrMap = {
				'email': '确认邮箱与原邮箱不一致',
				'password': '确认密码与原密码不一致'
			},
			isWrapExits = $('#errorTips').length ? true : false,
			tipsHtml = $(),
			wrapper = $(opt.wrapper),
			validArr = wrapper.find('*[data-vtype]'),	//DOM Object
			len = validArr.length;

		if (!isWrapExits) {
			tipsHtml = $('<span id="errorTips" class="comp_tips_default" style="display: block;position: absolute;top: 0;left: 0;height: 24px;line-height: 24px;z-index: 999;font-size: 14px;color: #f5f6f6;padding: 0 5px;background-color: #f08300;display: none;"></span>');
			tipsHtml.appendTo($(doc.body));
		} else {
			tipsHtml = $('#errorTips');
		}	
		for (var i = 0; i < len; i++) {
			var valItem_DOM = validArr[i],
				valItem = $(valItem_DOM),	//当前元素
				val = $.trim(valItem.val()),
				offset = valItem.offset(),
				x = offset.left + valItem.width() + 10 + 'px',
				y = offset.top + valItem.height() - 16 + 'px',
				type = valItem.attr('data-vtype'),
				isMatchRegExp = $.wqRegExpTest(type, val).code,
				regExpErr = $.wqRegExpTest(type, val).msg,
				isRequire = valItem.attr('data-vrequire') === 'true' ? true : false,
				hasGroup = valItem.attr('data-vgroup') ? true : false,
				currentGroup = hasGroup ? valItem.attr('data-vgroup') : '',		//当前属于的组
				needRepeat = valItem.attr('data-vrepeat') ? true : false,
				currentRepeat = needRepeat ? valItem.attr('data-vrepeat') : '',	//当前需要确认的
				hasDefault = valItem.attr('data-vdefault') ? true : false,
				isDefault = hasDefault ? (val == '请选择') : false;			//有默认值的选项当前的值

			tipsHtml.css({
				'top': y,
				'left': x
			});
			if (isRequire) {	//必填
				if (!val) {		//为空
					tipsHtml.html('不能为空').show();
					positionFix(valItem);
					return;
				} else {		//不为空
					if (hasDefault && isDefault)	{	//有默认值
						tipsHtml.html('请选择一种类型').show();
						positionFix(valItem);
						return;
					} else if (!isMatchRegExp) {	//不匹配
						tipsHtml.html(regExpErr).show();
						positionFix(valItem);
						return;
					} else {	//匹配
						if (needRepeat) {		//需要确认
							var rGroupArr = wrapper.find('*[data-vrepeat="' + currentRepeat + '"]'),
								_len = rGroupArr.length,
								rFirstVal = $.trim($(rGroupArr[0]).val());
							for (var t = 1; t < _len; t++) {
								var repeatItem = $(rGroupArr[t]),
									rVal = $.trim(repeatItem.val()),
									rOffset = repeatItem.offset(),
									rX = rOffset.left + repeatItem.width() + 10 + 'px',
									rY = rOffset.top + repeatItem.height() - 16 + 'px';
								tipsHtml.css({
									'top': rY,
									'left': rX
								});
								if (rVal == rFirstVal) {
									tipsHtml.hide();
									continue;
								} else {
									tipsHtml.html(repeatErrMap[type]).show();
									positionFix(repeatItem);
									return;
								}
							}
						} else {
							tipsHtml.hide();
							continue;
						}
					}
				}
			} else {	//非必填
				if (hasGroup) {		//属于分组
					if (val) {		//不为空
						if (!isMatchRegExp) {	//不匹配
							tipsHtml.html(regExpErr).show();
							positionFix(valItem);
							return;
						} else {
							tipsHtml.hide();
							continue;
						}
					} else {	//为空，则遍历该分组所有元素，如果全部为空则提示错误，如果有不为空但不匹配也提示错误
						var groupArr = wrapper.find('*[data-vgroup="' + currentGroup + '"]'),
							_len_ = groupArr.length,
							isGroupEmpty = true,
							isGroupValid = true;
						for (var j = 0; j < _len_; j++) {
							var groupItem_DOM = groupArr[j],
								groupItem = $(groupItem_DOM),
								gOffset = groupItem.offset(),
								gX = gOffset.left + groupItem.width() + 10 + 'px',
								gY = gOffset.top + groupItem.height() - 16 + 'px',
								gVal = $.trim(groupItem.val()),
								gType = groupItem.attr('data-vtype')/*,
								gregExp = regExpMap[gType]*/;
							tipsHtml.css({
								'top': gY,
								'left': gX
							});
							if (!gVal) {	//遍历的组元素为空，则从下一个开始执行
								continue;
							} else {	//遍历到不为空的组元素
								isGroupEmpty = false;
								if (!$.wqRegExpTest(gType, gVal).code) {	//不匹配正则
									tipsHtml.html(regExpErr).show();
									isGroupValid = false;
									positionFix(groupItem);
									return;
								} else {	//匹配正则
									tipsHtml.hide();
									continue;
								}
							}
						}
						if (isGroupEmpty) {
							var first = $(groupArr[0]),
								content = '', 
								fOffset = first.offset(),
								fX = fOffset.left + first.width() + 10 + 'px',
								fY = fOffset.top + first.height() - 16 + 'px';
							if (first.attr('data-vtype') == 'mobile' ||  first.attr('data-vtype') == 'telephone') {
								content = '手机或者座机至少填写一个'
							}
							tipsHtml.css({'top': fY, 'left': fX}).html(content).show();
							positionFix(first);
							return;
						}
						if (!isGroupEmpty && isGroupValid) {
							tipsHtml.hide();
							continue;
						}
					}
				} else {	//不属于分组
					if (val) {		//不为空
						if (!isMatchRegExp) {	//不匹配
							tipsHtml.html(regExpErr).show();
							positionFix(valItem);
							return;
						} else {
							tipsHtml.hide();
							continue;
						}
					}
				}
			}
		}
		//全部通过验证则执行回调函数
		opt.success();
		function positionFix(elem) {
			var offsetY = elem.offset().top;
			$(window).scrollTop(offsetY - 300);
			elem.focus(function() {
				tipsHtml.hide();
			});
		}
	};


	$.AlertMsg = function(options){
		var AlertMsgIDArr=[];
		var msg = options.msg||"", 
			elem = options.elem || null, 
			position = options.position || null, 
			distance = options.distance || 5,
			type = options.type || null,
			msgId = options.msgId || "alert_msg_"+new Date().getTime(),
			timeout = options.timeout || 2500;
		if($(".alert_msg").length > 0){
			$(".alert_msg").remove();
		}
		AlertMsgIDArr.push[msgId];
		if(type=='error') type='alert_msg_error';
		else if(type=='suc') type='alert_msg_suc';
		else if(type=='tips') type='alert_msg_tips';
		else type='';
		var left = 0,top=0;
		var d = $('<div class="alert_msg '+type+'" id="'+msgId+'">'+msg+'</div>').appendTo("body");
		if(elem==null || position==null || position==='center'){
			var winWidth = window.innerWidth || document.documentElement.clientWidth,
			winHeight = window.innerHeight || document.documentElement.clientHeight;
			var left = (winWidth - d.width())/2,
				top=(winHeight - d.height())/2;
			d.css({"top": top+"px", "left": left+"px", "z-index": 10000}).show();
		}else{
			left = $(elem).offset().left,
			top = $(elem).offset().top,
			twidth = elem[0].offsetWidth,
			theight = elem[0].offsetHeight;
			if(position=='right') left = left + twidth + distance ;
			if(position=='bottom') top = top + theight + distance;
			if(position=='top') top = top - theight - distance ;
			d.css({"top": top+"px", "left": left+"px", "z-index": 10000}).show();
		}
		setTimeout(function() {
			AlertMsgRemove(msgId);
		},timeout);

		function AlertMsgRemove(_id){
			$("#"+_id).animate({opacity:"0"},500,function(){
				for(var i=0;i<AlertMsgIDArr.length;i++){
					if(AlertMsgIDArr[i]==_id) AlertMsgIDArr[i];
				}
				$(this).remove();
			});
		}
	};

	/**
	 * 提交评论弹框
 	 */
	$.submitComment = function(opt) {
		if ($('#commentDialog').length > 0) {
			$('#commentDialog').remove();
		}
		var defaults = {
			isSuccess: true,	//提交评论是否成功
			content: ''			//提示文本
		},
		opt = $.extend({}, defaults, opt),
		commentDialog = $('<div id="commentDialog" class="wq_submit_comment_dialog">\
							<i class="wq_close_icon"></i>\
							<p class="wq_submit_comment_content"></p>\
							<div class="wq_submit_comment_btn wq_clearfix">\
								<p class="wq_sc_auto_close"><span id="wq_sc_time">3</span>秒后自动关闭</p>\
							</div>\
						</div>').appendTo($(doc.body)).css('top', ($(win).height())/ 2 + $(win).scrollTop());
		if (opt.isSuccess) {
			commentDialog.children('.wq_submit_comment_content').attr('class', 'wq_submit_comment_content wq_sc_success').html(opt.content);
		} else {      
			commentDialog.children('.wq_submit_comment_content').attr('class', 'wq_submit_comment_content wq_sc_fail').html(opt.content);
		}
		function init() {
			_autoCount();
			commentDialog.find('.wq_close_icon').click(_close);
		}
		function _close() {
			commentDialog.remove();
		}
		function _autoCount() {		//定时关闭弹框，3秒
			var interval, timer,
				second = 3,
				sc = $('#wq_sc_time');

			sc.html(second);
			interval = setInterval(function() {
				if (second)
					sc.html(--second);
				else
					clearInterval(interval);
			}, 1000);
			timer = setTimeout(function() {
				_close();
				clearTimeout(timer);
			}, second*1000);
		}
		init();
	};

	/**
	 * 来自网站的提醒(目前使用在酒店频道)
	 */
	$.hotelCancelDialog = function(opts) {
		var defaults = {
			type: 'free',	//free || pay
			title: '我趣君提醒你',
			content: '<span style="line-height: 70px;">酒店提示框</span>',
			width: 370,
			height: 200,
			callback: $.noop
		};

		opts = $.extend({}, defaults, opts);

		var target,
		_htmlTemplate = $('<div class="hotel_dialog_mask_wrapper"><div class="hotel_dialog_mask"></div>\
							<div style="height: ' + opts.height + 'px; width: ' + opts.width + 'px;margin-left: ' + -opts.width/2 + 'px;margin-top: ' + -opts.height/2 + 'px;" class="hotel_dialog_wrapper ' + opts.type + '_dialog">\
							<a class="hd_close" href="javascript:;"></a>\
							<h1 class="hd_title">' + opts.title + '</h1>\
							<div class="hd_main">\
								<i class="' + opts.type + '_icon"></i>\
								<div class="hd_content">' + opts.content + '</div>\
								<div class="hd_btn_wrapper">\
									<a class="cancel_btn" href="javascript:;" data-event="0">否</a>\
									<a class="confirm_btn" href="javascript:;" data-event="1">是</a>\
								</div>\
							</div>\
						</div></div>');
		if ($('.hotel_dialog_wrapper').length) {
			target = $('.hotel_dialog_wrapper');

			if (target.is('.' + opts.type + '_dialog')) {
				target.show();
			} 
		} else {
			$(doc.body).append(_htmlTemplate);
		}
		target = _htmlTemplate.appendTo($(doc.body));

		target.on('click', '.hd_close', function() {
			close();
		});

		target.on('click', '.hd_btn_wrapper a', function() {
			var _this = $(this);
			if (opts.callback && typeof opts.callback == 'function') {
				opts.callback(_this.data('event'));
				close();
			}
		});

		function close() {
			target.hide();
		}
	};

	/* ------------------------$.fn.function----------------------------------- */
	/**
	 * 单选按钮插件
 	 */
	$.fn.wqRadio = function() {
		return this.each(function() {
			var _this = $(this),
				dRadio = _this.attr('data-radio'),
				hidden = $(doc.body).find('input[data-radio="' + dRadio + '"]'),
				clsName = 'wq_active_radio',
				dVal = _this.attr('data-value');
			_this.click(function() {
				var _this_ = $(this);
				if (_this_.hasClass(clsName))
					return;
				$(doc.body).find('span.wq_active_radio[data-radio="' + dRadio + '"]').removeClass(clsName);
				_this_.addClass(clsName);
				hidden.val(dVal);
			});
		});
	};

	/**
	 * 复选按钮插件
 	 */
	$.fn.wqCheckbox = function(opt) {
		var defaults = {
			clickEvent: $.noop()
		},
		opt = $.extend({}, defaults, opt);
		return this.each(function() {
			var _this = $(this),
				newNode,
				id = _this.attr('id'),
				val = _this.val(),
				checkboxName = _this.attr('name'),
				isCheck = _this.attr('checked') ? true : false;
			_this.hide();
			newNode = $(createNode(id, isCheck));
			newNode.insertBefore(_this);
			newNode = $(doc).find('span[data-id="' + id + '"]');
			newNode.click(function() {
				var _this = $(this),
					target = $('#' + id);

				if (_this.hasClass('comp_active_checkbox')) {
					_this.removeClass('comp_active_checkbox');
					target.prop('checked', false);
					target.val('false');
				} else {
					_this.addClass('comp_active_checkbox');
					target.prop('checked', true);
					target.val('true');
				}
				if((typeof opt.clickEvent) == 'function'){
					opt.clickEvent();
				}
			});
		});
		function createNode(id, isCheck) {
			return '<span data-id="' + id + '" class="comp_checkbox ' + (isCheck ? 'comp_active_checkbox' : '') + '"><i></i></span>';
		}
	};

	/**
	 * placeholder fix插件
 	 */
	$.fn.wqPlaceHolder = function(opt) {
		var defaults = {
			fontSize: '18px',
			lineHeight: '18px',
			height: '18px',
			placeHolderColor: '#aaa',
			top: 3,
			left: 5,
			inputTextColor: '#000',
			content: ''
		},
		opt = $.extend({}, defaults, opt);
		return this.each(function() {
			var spanHtml = $('<span class="wq_place_holder" style="position: absolute;top: 0;left: 0;vertical-align: middle;cursor: text;"></span>'),
				_this = $(this),
				offset = _this.offset(),
				_top = offset.top,
				_left = offset.left,
				relParent = opt.relParent || doc.body;
			spanHtml.css({
				'position': 'absolute',
				'vertical-align': 'middle',
				'top': ((relParent == doc.body) ? opt.top + _top : opt.top) + 'px',
				'left': ((relParent == doc.body) ? opt.left + _left : opt.left) + 'px',
				'font-size': opt.fontSize,
				'line-height': opt.lineHeight,
				'height': opt.height,
				'color': opt.placeHolderColor
			}).html(opt.content).click(function() {
				_this.focus();
				$(this).hide();
			});
			$(relParent).append(spanHtml);
			_this.css({
				'color': opt.inputTextColor
			}).focus(function() {
				spanHtml.hide();
			}).blur(function() {
				if (!_this.val()) {
					spanHtml.show();
				}
			});
			if(relParent == doc.body){	//相对于body定位的才需要监听resize事件
				$(win).resize(function() {
					offset = _this.offset(),
					_top = offset.top,
					_left = offset.left;
					spanHtml.css({
						'top': opt.top + _top  + 'px',
						'left': opt.left + _left + 'px'
					});
				});
			}
			if (_this.val()) {
				spanHtml.hide();
			}
		});
	};

	/**
	 * hover tips插件
 	 */
	$.fn.wqShowTips = function(opt) {
		var defaults = {
			width: 200,
			content: '',
			title: '信息提示',
			iconLeft: 95,
			direction: 'down',
			Cls: ''			//内容相同则可以通过相同的class名调用，内容不同则提供唯一的id或者class调用
		},
		opt = $.extend({}, defaults, opt);
		
		return this.each(function() {
			var _this = $(this),
				tipsHtml = $(),
				delay;

			if ($('.tips_' + opt.Cls).length) {
				tipsHtml = $('.tips_' + opt.Cls);
			} else {
				tipsHtml = $('<div class="wq_hover_tips_down tips_' + opt.Cls + '">\
								<p class="wq_tips_content_title">'+opt.title+'</p>\
								<i></i>\
								<p class="wq_tips_content">' + opt.content + '</p>\
							</div>');
			}
			tipsHtml.css('width', opt.width).appendTo($(doc.body));
			tipsHtml.find('i').css('left', opt.iconLeft);
			$(doc.body).append(tipsHtml);
			_this.hover(function() {
			    if (opt.content != $('.tips_' + opt.Cls).find('.wq_tips_content').text()){
				   $('.tips_' + opt.Cls).find('.wq_tips_content').html(opt.content);
				}
				var _this_ = $(this),
					offset = _this_.offset(),
					x = offset.left + _this_.width() - opt.width / 2 + 10, 
					y = offset.top + 30;

				delay = setTimeout(function() {
					tipsHtml.css({
						'left': x,
						'top': y
					}).fadeIn();
				}, 100);
			}, function() {
				clearTimeout(delay);
				tipsHtml.hide();
			});
		});
	};
	/**
	 *new hover tips插件
	 *created by Kylin
 	 */
	$.fn.wqTipsShow = function(options){
	    var defaults ={
	        width:300,
	        title:'',
	        fadetime:100,
	        content:''
	        },
	        options = $.extend({},defaults,options);
	        return this.each(function(){
	            var _this = $(this),
	             tipsHtml =$('<div class="wqdialog">\
	                            <span class="arrow"></span>\
	                            <div class="wqdialog-title">\
	                            <p class="wqdialog-title-inner"></p>\
	                            </div>\
	                            <div class="wqdialog-content"></div>\
	                        </div>');
	             //如果提示框不存在则生成新的
	            if(!$(".wqdialog").length){
	                tipsHtml.appendTo($(document.body));
	            } else {
	                tipsHtml = $(".wqdialog");
	            }

            _this.hover(function(){
                var windowWidth = $(window).width(),
                    offSet = _this.offset(),
                    rightWidth = windowWidth - offSet.left,
                    arrowPos = options.width/2 - 11,
                    l,t;
                tipsHtml.css('width', options.width);
                tipsHtml.children().eq(2).html(options.content);
                if(options.title.length){
                    tipsHtml.children().eq(1).show();
                    tipsHtml.children().eq(0).addClass("triangle-blue").removeClass("triangle-white");
                    tipsHtml.children().eq(1).find("p").html(options.title);
                } else {
                    tipsHtml.children().eq(0).addClass("triangle-white").removeClass("triangle-blue");
                    tipsHtml.children().eq(1).hide();
                }
                //判断提示框应该出现的位置
                if(rightWidth >= options.width*0.6)
                {
                    l = offSet.left - options.width/2 + _this.width()/2;
                } else {
                    l = offSet.left - options.width + _this.width();
                    //小三角形的位置不能超出提示框
                    if(options.width - _this.width()/2 <= 21){
                        arrowPos = options.width - _this.width()/2 + 11;
                    } else {
                        arrowPos = options.width - _this.width()*0.7 + 11;
                    }
                }
                t = offSet.top + _this.height() + 15;
                $(".arrow").css({"left":arrowPos});
                timer = setTimeout(function(){
                    tipsHtml.css({
                        'left': l,
                        'top': t
                    }).fadeIn();
                },options.fadetime);
            },function(){
                clearTimeout(timer);
                tipsHtml.hide();
            });
        });
	};

	/**
	 * 填写信息自动高亮提示确认插件
 	 */
	$.fn.wqConfirm = function(opt) {
		var defaults = {
			wrapper: '',		//class || id
			target: ''			//class || id
		},
		opt = $.extend({}, defaults, opt);
		return this.each(function() {
			var _this = $(this),
				val = _this.val(),
				_wrapper = $(opt.wrapper),
				_target = $(opt.target);
			if (val) {
				_target.html(val);
				_wrapper.show();
			}
			
			_this.bind("blur",function(){
			    var value = $.trim(_this.val());
				if (!value) {
					_wrapper.hide();
					return;
				}
				_target.html(value);
				_wrapper.show();
			});
			
			_this.keyup(function() {
				var value = $.trim(_this.val());
				if (!value) {
					_wrapper.hide();
					return;
				}
				_target.html(value);
				_wrapper.show();
			});
		});
	};

	/**
	 * 租车城市选择框
 	 */
 	 $.fn.wqCitySelect = function(opts) {
		var defaults = {
			title: '',
			targetId: '',
			country: '',
			city_arg1: [],
			city_arg2: [],
			callback: $.noop
		},
		convertCityData = [];

		var opts = $.extend({}, defaults, opts);

		return this.each(function() {
			var _this = $(this),
				citySelect = $('<div id="' + opts.targetId + '" class="city_select_wrapper">\
					<div class="city_select_mask hide"></div>\
					<i class="city_select_close_btn"></i>\
					<div class="select_head">\
						<h1 class="select_title">' + opts.title + '</h1>\
						<div class="search_wrapper hide">\
							<a href="javascript:;" class="search_btn"></a>\
							<input id="searchCarInput" type="text" class="search_input" data-original="输入城市(支持中英文)" value="输入城市(支持中英文)" >\
						</div>\
					</div>\
					<div class="select_body wq_clearfix">\
						<ul class="letter_list">\
							<li class="letter_title">城市</li>\
							<li class="letter_tag" data-id="A">A</li>\
							<li class="letter_tag" data-id="B">B</li>\
							<li class="letter_tag" data-id="C">C</li>\
							<li class="letter_tag" data-id="D">D</li>\
							<li class="letter_tag" data-id="E">E</li>\
							<li class="letter_tag" data-id="F">F</li>\
							<li class="letter_tag" data-id="G">G</li>\
							<li class="letter_tag" data-id="H">H</li>\
							<li class="letter_tag" data-id="I">I</li>\
							<li class="letter_tag" data-id="J">J</li>\
							<li class="letter_tag" data-id="K">K</li>\
							<li class="letter_tag" data-id="L">L</li>\
							<li class="letter_tag" data-id="M">M</li>\
							<li class="letter_tag" data-id="N">N</li>\
							<li class="letter_tag" data-id="O">O</li>\
							<li class="letter_tag" data-id="P">P</li>\
							<li class="letter_tag" data-id="Q">Q</li>\
							<li class="letter_tag" data-id="R">R</li>\
							<li class="letter_tag" data-id="S">S</li>\
							<li class="letter_tag" data-id="T">T</li>\
							<li class="letter_tag" data-id="U">U</li>\
							<li class="letter_tag" data-id="V">V</li>\
							<li class="letter_tag" data-id="W">W</li>\
							<li class="letter_tag" data-id="X">X</li>\
							<li class="letter_tag" data-id="Y">Y</li>\
							<li class="letter_tag" data-id="Z">Z</li>\
						</ul>\
						<div class="city_list_wrapper"></div>\
					</div>\
				</div>');
			_this.click(function() {
				var offset = _this.offset(),
					top = offset.top,
					left = offset.left;
				if ($('#' + opts.targetId).length) {
					citySelect = $('#' + opts.targetId);
					if (citySelect.is(':visible')) {
						citySelect.hide();
						return;
					}
					citySelect.css({top: top, left: left}).show();
					return;
				} else {
					citySelect.css({top: top, left: left}).appendTo(doc.body);
				}

				//render html
				citySelect.find('.city_list_wrapper').html(allUlTemplate());
				
				//search input
				citySelect.find('#searchCarInput').focus(function() {
					var _this = $(this),
						original = _this.attr('data-original'),
						value = _this.val();

					if (original == value) {
						_this.val('');
					}
				}).blur(function() {
					var _this = $(this),
						original = _this.attr('data-original'),
						value = _this.val();

					if (value && value != original) {
						return;
					} else if (!value) {
						_this.val(original);
					} 
				}).keyup(function() {
					var value = $(this).val();
					
					//调用后台接口匹配
				});

				//load shop
				citySelect.on('click', '.vertical_city_list li', function() {
					var _this = $(this),
						key = _this.attr('data-key'),
						shopList = _this.find('.vertical_shop_list'),
						city = _this.find('.city_name');

					if (shopList.length) {
						if (shopList.is(':visible')) {
							shopList.slideUp();
							city.removeClass('active');
							return;
						}
						city.addClass('active');
						shopList.slideDown();
						return;
					}
					citySelect.find('.city_select_mask').show(function() {
						$.ajax({
							async : true,
							url: "http://www.woqu.com/vehicle-queryLocation",
							type: "POST",
							data : 'poi=' + key,
							dateType: "json",
							success: function(data) {
								citySelect.find('.city_select_mask').hide(function() {
									city.addClass('active');
									if (data == null || !data.locationArray[0]) {
										shopList = $('<div class="vertical_shop_list" style="display: block;"><span data-value="">暂无门店数据</span></div>');
									} else {
										shopList = renderShopList(data.locationArray);
									}
									_this.append(shopList);
									shopList.slideDown();
								});
							},
							error: function(a,b,c,d){
								city.addClass('active');
								shopList = $('<div class="vertical_shop_list" style="display: block;"><span data-value="">暂无门店数据</span></div>');
								_this.append(shopList);
								shopList.slideDown();
							}
						});
					});
				});

				//hot city position fix
				citySelect.on('click', '.hot_city_table > p', function() {
					var _this = $(this),
						target = citySelect.find('.vertical_city_list li[data-key="' + _this.attr('data-key') + '"]');
					cityListPositionFix(target, citySelect.find('.city_list_wrapper'), true);
				});

				//letter tag position fix
				citySelect.on('click', '.letter_tag', function() {
					var _this = $(this),
						target = $('#' + opts.targetId + _this.attr('data-id'));
					cityListPositionFix(target, citySelect.find('.city_list_wrapper'), false);
				});

				//select shop
				citySelect.on('click', '.vertical_shop_list p', function() {
					_this.attr('data-key',$(this).parent().parent().attr('data-key'));
					_this.attr('data-value',$(this).attr('data-value'));
					$('#' + opts.city_arg1[1]).html($(this).parent().prev().children('.city_en_name').html());
					if($(this).parent().prev().children('.city_cn_name').html() != '') {
						$('#' + opts.city_arg1[1]).html($(this).parent().prev().children('.city_cn_name').html());
					}
					$('#' + opts.city_arg1[2]).html($(this).html());
					if(opts.city_arg2.length != 0) {
						$('#' + opts.city_arg2[0]).attr('data-key',$(this).parent().parent().attr('data-key'));
						$('#' + opts.city_arg2[0]).attr('data-value',$(this).attr('data-value'));
						$('#' + opts.city_arg2[1]).html($(this).parent().prev().children('.city_en_name').html());
						if($(this).parent().prev().children('.city_cn_name').html() != '') {
							$('#' + opts.city_arg2[1]).html($(this).parent().prev().children('.city_cn_name').html());
						}
						$('#' + opts.city_arg2[2]).html($(this).html());
					}
					citySelect.find('.city_list_wrapper').scrollTop(0);
					$(this).parent().removeClass('active');
					$(this).parent().hide(10, function() {
						citySelect.fadeOut();
					});
				});

				//close select
				citySelect.on('click', '.city_select_close_btn', function() {
					close();
				});

			});
			function close() {
				citySelect.hide();
			}
		});

		function cityListPositionFix(target, wrapper, expand) {
			var t_offset_top = target.position().top;

			wrapper.animate({
				scrollTop: t_offset_top + wrapper.scrollTop()
			});

			if (expand) {
				target.click();
			}
		}

		function renderShopList(jsonData) {

			var html = '<div class="vertical_shop_list">';

			for (var i=0; i<jsonData.length; i++) {
				html += '<p data-value="' + jsonData[i][0] + '">' + jsonData[i][1] + '</p>';
			}

			return $(html + '</div>');
		}

		function allUlTemplate() {
			var html = '';
			var _data;
			$.ajax({
				async : false,
				url: "http://www.woqu.com/data/vehicle",
				type: "POST",
				data : 'targetId=' + opts.targetId + "&country=" + opts.country,
				dateType: "text",
				success: function(data) {
					_data = data;
				},
				error: function(a,b,c,d){
					alert("刷取数据异常!");
				}
			});
			return _data;
		}
	};

	/**
	 * 活动说明弹层
 	 */
	$.fn.activityDialog = function(opts) {
		var defaults = {
			width: 300,
			height: 300,
			title: '活动说明',
			content: '活动内容',
			cls: ''
		};

		opts = $.extend({}, defaults ,opts);

		return this.each(function() {
			$(this).click(function() {
				if ($('.' + opts.cls).length) {
					$('.' + opts.cls).remove();
				}
				var width = opts.width,
					height = opts.height,
					_htmlTemplate = $('<div class="activity_mask_wrapper ' + opts.cls + '">\
						<div class="activity_mask"></div>\
						<div class="activity_dialog" style="width:' + width + 'px; margin-top:' + -height/2 + 'px; margin-left:' + -width/2 + 'px;">\
							<h1 class="acd_title"><i></i>' + (function(){
								if(typeof(opts.title) === "function"){
									return opts.title();
								}else{
									return opts.title;
								}
							})() + '<a class="activity_dialog_close_icon" href="javascript:;"></a></h1>\
							<div class="acd_content">' + (function(){
								if(typeof(opts.content) === "function"){
									return opts.content();
								}else{
									return opts.content;
								}
							})() + '</div>\
							<a class="activity_dialog_close_btn" href="javascript:;"></a>\
						</div>\
					</div>').appendTo(doc.body);

				_htmlTemplate.on('click', '.activity_dialog_close_icon, .activity_dialog_close_btn, .activity_mask', function() {
					_htmlTemplate.hide();
				});
			});
		});
	};

}(jQuery, window, document));

/*========================== expose api function ===============================*/

/**
 @plugin : woqu common slider
 @author : Frend
 @date   : 2014-07-09
 **/
var Slider = function(container, options) {
	/*
	options = {
		auto: true,
		time: 3000,
		event: 'hover' | 'click',
		mode: 'slide | fade',
		controller: $(),
		activeControllerCls: 'className',
		exchangeEnd: $.noop
	}
	*/

	"use strict";	//stirct mode not support by IE9-

	if (!container) return;

	var options = options || {},
		currentIndex = 0,
		cls = options.activeControllerCls,
		delay = options.delay,
		isAuto = options.auto,
		controller = options.controller,
		event = options.event,
		interval,
		slidesWrapper = container.children().first(),
		slides = slidesWrapper.children(),
		length = slides.length,
		childWidth = container.width(),
		totalWidth = childWidth * slides.length;

	function init() {
		var controlItem = controller.children();

		if (event == 'hover') {
			controlItem.mouseover(function() {
				stop();
				var index = $(this).index();

				play(index, options.mode);
			}).mouseout(function() {
				if (isAuto) autoPlay();
			});
		} else {
			controlItem.click(function() {
				stop();
				var index = $(this).index();

				play(index, options.mode);
				if (isAuto) autoPlay();
			});
		}

		if (isAuto) {
			autoPlay();
		}
	}

	function config() {
		//slide mode config
		mode();
	}

	function mode() {
		var wrapper = container.children().first();
		if (options.mode == 'slide') {
			wrapper.width(totalWidth);
		}

		if (options.mode == 'fade') {
			wrapper.children().css({
				'position': 'absolute',
				'left': 0,
				'top': 0
			})
			.first().siblings().hide();
		}
	}

	//auto play
	function autoPlay() {
		interval = setInterval(function() {
			triggerPlay(currentIndex);
		}, options.time);
	}

	//trigger play
	function triggerPlay(cIndex) {
		var index;
		if (cIndex == length - 1) {
			index = 0;
		} else {
			index = cIndex + 1;
		}
		play(index, options.mode);
	}

	//play
	function play(index, mode) {
		slidesWrapper.stop(true, true);
		slides.stop(true, true);
		
		if (mode == 'slide') {
			if (index > currentIndex) {
				slidesWrapper.animate({
					left: '-=' + Math.abs(index - currentIndex) * childWidth + 'px'
				}, delay);
			} else if (index < currentIndex) {
				slidesWrapper.animate({
					left: '+=' + Math.abs(index - currentIndex) * childWidth + 'px'
				}, delay);
			} else {
				return;
			}
		}

		if (mode == 'fade') {
			if (slidesWrapper.children(':visible').index() == index) return;
			slidesWrapper.children().fadeOut(delay).eq(index).fadeIn(delay);
		}

		try {
			controller.children('.' + cls).removeClass(cls);
			controller.children().eq(index).addClass(cls);
		} catch(e) {}

		currentIndex = index;

		if (options.exchangeEnd && typeof options.exchangeEnd == 'function') options.exchangeEnd.call(this, currentIndex);
	}

	//stop
	function stop() {
		clearInterval(interval);
	}

	//prev frame
	function prev() {
		stop();
		if (currentIndex == 0) {
			triggerPlay(length - 2);
		} else {
			triggerPlay(currentIndex - 2);
		}
		if (isAuto) autoPlay();
	}

	//next frame
	function next() {
		stop();
		if (currentIndex == length - 1) {
			triggerPlay(-1);
		} else {
			triggerPlay(currentIndex);
		}
		if (isAuto) autoPlay();
	}

	(function() {
		config();
		init();
	})();

	//expose the Slider API
	return {
		prev: function() {
			prev();
		},
		next: function() {
			next();
		}
	}
};