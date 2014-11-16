;!function($, win, doc) {

	var index = {
		func: {
			init: function() {
				//show side bar
				$('.nm_side_bar').show();
				$('#allProTag').find('span').css('padding-right', 0).find('i').eq(0).remove();

				//banner slider
				var bannerSlider = new Slider($('#bannerSlider'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: true,
					mode: 'fade',
					controller: $('#bannerCtrl'),
					activeControllerCls: 'active'
				});

				//hover tag exchange
				$(doc.body).on('mouseover', '.local_trip_area_li', function() {
					index.func.tagExchange(this);
				});

				//sale slide
				var saleSlider = new Slider($('#saleSlide'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: false,
					mode: 'slide',
					controller: $(),
					activeControllerCls: ''
				});
				$('.prev_sale').click(function() {
					saleSlider.prev();
					$('#saleSlide').find('.lazy').trigger('sporty');
				});
				$('.next_sale').click(function() {
					saleSlider.next();
					$('#saleSlide').find('.lazy').trigger('sporty');
				});

				//hot slide
				var hotSlider = new Slider($('#hotList'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: false,
					mode: 'fade',
					controller: $(),
					activeControllerCls: ''
				});
				$('.prev_hot').click(function() {
					hotSlider.prev();
					$('#hotList').find('.lazy').trigger('sporty');
				});
				$('.next_hot').click(function() {
					hotSlider.next();
					$('#hotList').find('.lazy').trigger('sporty');
				});

				//guide slide
				var guideSlider = new Slider($('#indexGuideSlider'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: true,
					mode: 'slide',
					controller: $('#guideSC'),
					activeControllerCls: 'active',
					exchangeEnd: function() {
						$('#indexGuideSlider').find('.lazy').trigger('sporty');
					}
				});

				//rentcar slide
				var slider = new Slider($('#rentcarSlider'), {
					time: 5000,
					delay: 400,
					event: 'hover',
					auto: true,
					mode: 'slide',
					controller: $('#rentcarController'),
					activeControllerCls: 'rc_active'
				});

				//new vip dialog
				var hideTimeout = setTimeout(function() {
					$('#newVipDialog').fadeOut();
					clearTimeout(hideTimeout);
				}, 20000);
				$('#closeVipDialog').click(function() {
					$('#newVipDialog').fadeOut();
				});

				//lazy load
				$('img.lazy').lazyload({
					threshold: 400
				});
				$('img.lazy').lazyload({
					event: 'sporty'
				});

				//css3 support fix
				index.func.css3SupportFix();
				
				//count down
				index.func.countDown();
				
			},
			countDown: function(){
				var countDownInterval=null,
				countDownRemainSecondArr=[],
				countDownElems= $("#saleSlide").find("[name='countDown']");
				countDownElems.each(function(index, elem){
					var endTime = $(elem).attr("data-endTime");
					if(endTime!=""){
						var lastMillis = new Date(endTime.substr(0,19).replace(/-/g,"/")).getTime() - new Date().getTime();
						lastMillis = parseInt(lastMillis/1000);
						countDownRemainSecondArr[index] = lastMillis;
					}else{
						countDownRemainSecondArr[index] = 0;
					}
				});
				//console.log("------ countDownRemainSecondArr:" + countDownRemainSecondArr.join(","));
				countDownInterval = setInterval(function(){
					countDownElems.each(function(index, elem){
						var countDownRemainSecond = countDownRemainSecondArr[index];
						var isEnd = true;
						for(var i=0;i<countDownRemainSecondArr.length;i++){
							if(countDownRemainSecondArr[i] > 0) {
								isEnd = false;
								break;
							}
						}
						if(isEnd && countDownInterval!=null){
							//console.log("======end countDown");
							clearInterval(countDownInterval);
							countDownInterval = null;
							return;
						}
						if(countDownRemainSecond <= 0){
							return;
						}
						var lastSecond = countDownRemainSecond-1;
						countDownRemainSecondArr[index] = lastSecond;
						
						var day = parseInt(lastSecond/(24*60*60));
						lastSecond -= day*24*60*60;
						var hour = parseInt(lastSecond/(60*60));
						lastSecond -= hour*60*60;
						var minute = parseInt(lastSecond/60);
						lastSecond -= minute*60;
						var second = parseInt(lastSecond);
						$(elem).find("[name='day']").html(day);
						$(elem).find("[name='hour']").html(hour);
						$(elem).find("[name='minute']").html(minute);
						$(elem).find("[name='second']").html(second);
					});
				}, 1000);
			},
			tagExchange: function(tag) {
				var _this = $(tag),
					index = _this.index(),
					target = _this.data('target'),
					content = $('*[data-content="' + target + index + '"]');

				_this.addClass('active').siblings('.active').removeClass('active');

				content.each(function() {
					var _this_ = $(this);

					_this_.show().siblings('[data-content]').hide();
					_this_.find('.lazy').trigger('sporty');
				});
				
			},
			subProductName: function(obj, length) {
				if (obj.html().length > length) {
					obj.html(obj.html().substring(0, length) + '...');
				}
			},
			imgLazy: function() {
				$('img.first_page').lazyload({
					threshold: 400
				});
				$('img.lazy').lazyload({
					event: 'sporty'
				});
			},
			css3SupportFix: function() {
				var root = $('html'),
					isNeed = root.is('.ie') && /ie[7-9]/.test(root.attr('class'));

				if (!isNeed) return;
				
				$(doc.body).on('mouseover', '.img_slide_animte', function() {
					$('.img_slide_animte').stop(true, true);
					$(this).animate({
						'margin-left': '-10px'
					}, 400);
				}).on('mouseout', '.img_slide_animte', function() {
					$('.img_slide_animte').stop(true, true);
					$(this).animate({
						'margin-left': '0px'
					}, 400);
				});

				$(doc.body).on('mouseover', '.img_scale_animte', function() {
					var _this = $(this),
						offset = 15;
					$('.img_scale_animte').stop(true, true);
					_this.animate({
						'width': _this.width() + offset,
						'height': _this.height() + offset
					}, 400);
				}).on('mouseout', '.img_scale_animte', function() {
					var _this = $(this),
						offset = 15;
					$('.img_scale_animte').stop(true, true);
					_this.animate({
						'width': _this.width() - offset,
						'height': _this.height() - offset
					}, 400);
				});
			}
		}
	};
	win.I=index;

	(function() {
		index.func.init();
	})();
	
}(jQuery, window, document);