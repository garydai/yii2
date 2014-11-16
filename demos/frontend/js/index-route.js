;
! function($, win, doc) {

	var index_usa = {
		config:{
		},
		func: {
			init: function() {
				//load block: promotion_localjoin
				$.ajax({
					url: "/home/get_route",
					dataType: "text",
					type: "POST",
					data: {
					},
					success: function(_html) {
						$("#localjoin_wrapper").append(_html);
						$('.local_trip_txt_s').each(function() {
							I.func.subProductName($(this), 33);
						});

						//lazy load
						I.func.imgLazy();
					}
				});
				//load block: promotion_mustactive
				var usa_mustactive_codes = ["US-FP-MA-NY", "US-FP-MA-LA", "US-FP-MA-LV", "US-FP-MA-Hawaii", "US-FP-MA-SF", "US-FP-MA-Orlando", "US-FP-MA-Miami", "US-FP-MA-Washington"];
				$.ajax({
					url: "http://www.woqu.com/show-home-promotion",
					dataType: "text",
					type: "POST",
					data: {
						groupCodes: usa_mustactive_codes.join(","),
						template: "promotion_mustactive"
					},
					success: function(_html) {
						$("#trip_play_main").append(_html);

						//lazy load
						I.func.imgLazy();
					}
				});
				//load block: recommend_hotel
				var usaHotelCitys = "USNYC,USSFO,USWAS,USSEA,USLAX,USHNL";
				$.ajax({
					url: 'http://www.woqu.com/recommend-hotel-by-city?country=usa&cityCodes=' + usaHotelCitys,
					dataType: "text",
					type: "POST",
					success: function(_html) {
						$("#recommend_hotel_wrapper").append(_html);
						//lazy load
						I.func.imgLazy();
					},
					error: function() {
						$("#recommend_hotel_wrapper").append("服务异常，请刷新页面重试");
					}
				});

				//load block: colorful_theme
				$.ajax({
					url: "http://www.woqu.com/usa-colorful-theme",
					beforeSend:function(){
						//$("#colorful_theme").html("加载中...");
					},
					success: function(_html) {
						$("#colorful_theme").html(_html);
						//lazy load
						I.func.imgLazy();
					},
					error: function() {
						$('#colorful_theme').html("服务异常，请刷新页面重试");
					}
				});

				//load block: common_qa
				var country = "usa";
				$.get("http://www.woqu.com/homepage/queryFaq?country=" + country + "&pageSize=9", function(data) {
					if (data.rs == 1 && data.list != null) {
						var common_qa_ul = $("#common_qa_ul");
						for (var i = 0; i < data.list.length; i++) {
							var item = data.list[i];
							var _html = '<li><a target="_blank" href="http://www.woqu.com/' + country + '/homepage/faq-list#li_faqItem_' + item.faqId + '">. ' + item.question + '</a></li>';
							common_qa_ul.append(_html);
						}
					}
				});
			}
		}
	};

	index_usa.func.init();

}(jQuery, window, document);
