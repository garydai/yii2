
<footer class="wq_footer_wrapper">


	<div class="wq_footer_wrapper_container">
		<div class="wq_partner_wrapper">


           <div class="shiplogo">
                <div class="shiplist">

			 <a class="btn_prev" href="javascript:void(0);"></a>
                    <div class="shiplogo_show">
                        <ul class="shiplogo_list cear">
                            <li><a target="_blank" href="#">
                                <img alt="皇家加勒比邮轮" class="lazy" src="" data-original="/images/partner/jialebi.jpg" /></a></li>
                            <li><a target="_blank" href="#">
                                <img alt="歌诗达邮轮" class="lazy" src="" data-original="/images/partner/geshida.jpg" /></a></li>
                            <li><a target="_blank" href="#">
                                <img alt="地中海邮轮" class="lazy" src="" data-original="/images/partner/dizhonghai.jpg" /></a></li>
                            <li><a target="_blank" href="#">
                                <img alt="丽星邮轮" class="lazy" src="" data-original="/images/partner/lixing.jpg" /></a></li>
                            <li><a target="_blank" href="/nclyoulun/">
                                <img alt="挪威邮轮" class="lazy" src="" data-original="/images/partner/nuowei.jpg" /></a></li>
                            <li><a target="_blank" href="/gongzhu/">
                                <img alt="公主邮轮" class="lazy" src="" data-original="/images/partner/gongzhu.jpg" /></a></li>
                            <li><a target="_blank" href="/hemeiyl/">
                                <img alt="荷美邮轮" class="lazy" src="" data-original="/images/partner/hemei.jpg" /></a></li>
                            <li><a target="_blank" href="/jingzhi/">
                                <img alt="精致邮轮" class="lazy" src="" data-original="/images/partner/jingzhi.jpg" /></a></li>
                            <li><a target="_blank" href="/chuanqiyl/">
                                <img alt="保罗高更号" class="lazy" src="" data-original="/images/partner/baoluogaogeng.jpg" /></a></li>
                            <li><a target="_blank" href="/haidalu/">
                                <img alt="海达路德" class="lazy" src="" data-original="/images/partner/haidalude.jpg" /></a></li>
                            <li><a target="_blank" href="/pangluo/">
                                <img alt="庞洛邮轮" class="lazy" src="" data-original="/images/partner/pangluo.jpg" /></a></li>
                            <li><a target="_blank" href="/shengli/">
                                <img alt="50年胜利号" class="lazy" src="" data-original="/images/partner/50nianshenglihao.jpg" /></a></li>
                        </ul>
                    </div>
                    <a class="btn_next" href="javascript:void(0);"></a>
                </div>
            </div>




		</div>
		
	

			<div class="wq_friendly_link">
				<a href="http://dujia.qunar.com" target="_blank">去哪儿度假</a>
				<a href="http://www.mafengwo.cn" target="_blank">蚂蜂窝</a>
				<a href="http://www.ly.com" target="_blank">同程网</a>
				<a href="http://www.qyer.com" target="_blank">穷游网</a>
				<a href="http://trip.taobao.com" target="_blank">淘宝旅游</a>
				<a href="http://www.17u.net" target="_blank">游交汇</a>
				<a href="http://www.daodao.com" target="_blank">到到网</a>
				<a href="http://www.kuxun.cn" target="_blank">酷讯旅游</a>
				<a href="http://www.uzai.com" target="_blank">悠哉旅游网</a>
				<a href="http://www.lotour.com" target="_blank">乐途旅游</a>
				<a href="http://www.mangocity.com" target="_blank">芒果网</a>
				<a href="http://www.qmango.com" target="_blank">青芒果旅游</a>
				<a href="http://www.uuyoyo.com" target="_blank">悠游网</a>
				<a href="http://lvyou.baidu.com" target="_blank">百度旅游</a>
				<a href="http://www.ctcnn.com" target="_blank">劲旅网</a>
				<a href="http://www.trip-per.com" target="_blank">TRIPPER</a>
				<a href="http://www.zhubaijia.com" target="_blank">民宿短租</a>
			</div>


	
		<div class="wq_footer_bottom wq_clearfix">
			<p class="wq_copyright"><span>会玩邮轮带您体验非凡邮轮之旅!</span><br/>
			<span title="10-7-22-223">&copy;2013-2014 www.wyoulun.com All Rights Reserved </span>
			<span class="wq_copyright_span">会玩邮轮旅行网&nbsp;&nbsp;&nbsp;&nbsp;版权所有</span>
			<a href="#" target="_blank" rel="nofollow"></a></p>
			<ul class="wq_cert_list wq_clearfix">
			</ul>
		</div>

	</div>
</footer>
    <script type="text/javascript">
        $(function () {
            var $cur = 1; //初始化显示的版面
            var $i = 5; //每版显示数
            var $len = $('.shiplogo_list>li').length; //计算列表总长度(个数)
            var $pagecount = $len; //计算展示版面数量
            var $showbox = $('.shiplogo_list');
            var $w = $('.shiplogo_list>li').width() + 5; //取得展示区外围宽度
            var $pre = $('.btn_prev');
            var $next = $('.btn_next');

            $showbox.width($w * $len);

            //向前滚动
            $pre.click(function () {
                if (!$showbox.is(':animated')) { //判断展示区是否动画
                    if ($cur == 1) { //在第一个版面时,再向前滚动无动作
                    }
                    else {
                        $showbox.animate({ left: '+=' + $w * 3 }, 600); //改变left值,切换显示版面
                        $cur--; //版面累减
                    }
                }
            });
            //向后滚动
            $next.click(function () {
                if (!$showbox.is(':animated')) { //判断展示区是否动画
                    if ($cur > ($pagecount - 5) / 3) { //在最后一个版面时,再向后滚动无动作
                    }
                    else {
                        $showbox.animate({ left: '-=' + $w * 3 }, 600); //改变left值,切换显示版面
                        $cur++; //版面数累加
                    }
                }
            });

            $("img.lazy").lazyload({ skip_invisible: false, effect: "fadeIn" });

            setInterval(function () {
                if (parseInt($(".index_pinglun .zxlb").css("top")) > 210 - $(".index_pinglun .zxlb").height()) {
                    $(".index_pinglun .zxlb").animate({ top: '-=' + 100 }, 600);
                }
                else {
                    $(".index_pinglun .zxlb").css("top", 0);
                }
            }, 4000);
        });

    </script>




</body>
</html>
