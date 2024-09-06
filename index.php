<?php
if ($_SERVER['HTTPS'] == 'on' || $_SERVER['SERVER_PORT'] == 443) {
  $protocol = "https://";
} else {
  $protocol = "http://";
}
$domain = $_SERVER['HTTP_HOST'];
$domain_uri = $_SERVER['REQUEST_URI'];
$host = $protocol . $domain;
function getGreetingMessage() {
    $currentHour = date('G');
    if ($currentHour >= 6 && $currentHour < 9) {
        return '早上好，新的一天开始了，加油。';
    } elseif ($currentHour >= 9 && $currentHour < 12) {
        return '上午好，又是一个充满活力和成功的上午。';
    } elseif ($currentHour >= 12 && $currentHour < 14) {
        return '中午好，午餐时间到啦，记得补充能量哦。';
    } elseif ($currentHour >= 14 && $currentHour < 18) {
        return '下午好，精力充沛，加油完成剩下的任务。';
    } elseif ($currentHour >= 18 && $currentHour < 20) {
        return '傍晚好，太阳西下，一天的努力即将收获。';
    } elseif ($currentHour >= 20 && $currentHour < 24) {
        return '晚上好，天色已晚，享受宁静的夜晚。';
    } elseif ($currentHour >= 0 && $currentHour < 6) {
        return '深夜了，万籁俱静，祝你安心睡眠哦。';
    } else {
        return '时间获取失败';
    }
}
?>
<!--
                      _ooOoo_
                     o8888888o
                     88" . "88
                     (| -_- |)
                     O\  =  /O
                  ____/`---'\____
                .'  \\|     |//  `.
               /  \\|||  :  |||//  \
              /  _||||| -:- |||||-  \
              |   | \\\  -  /// |   |
              | \_|  ''\---/''  |   |
              \  .-\__  `-`  ___/-. /
            ___`. .'  /--.--\  `. . __
         ."" '<  `.___\_<|>_/___.'  >'"".
        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
        \  \ `-.   \_ __\ /__ _/   .-` /  /
    ======`-.____`-.___\_____/___.-`____.-'======
                      `=---='
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
-希望各位模仿者手下留情，望佛祖保佑永远无BUG!
-iKun主页 iKunWl.Com QQ：2126245521
-iKun 一直被模仿 从未被超越 iKun爱生活
-->
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta name="language" content="zh-CN" />
    <meta http-equiv="content-language" content="zh-CN">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>iKun主页</title>
    <meta name="keywords" content="iKun,个人主页,iKun主页">
    <meta name="description" content="iKun爱生活，文字活得比我们更久远，永久网址：iKunWl.com">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="https://www.ikunwl.com/ikunpage/images/icon.webp" />
    <link rel="stylesheet" href="<?php echo $host; ?>/ikunpage/style/Jack.css" />
    <!--[if lt IE 9]>
        <script src="https://www.ikunwl.com/ikunpage/script/ie/html5shiv.js"></script>
        <script src="https://www.ikunwl.com/ikunpage/script/ie/respond.min.js"></script>
    <![endif]-->
    <style>
        @font-face {
            font-family: "UnidreamLED";
            src: url('<?php echo $host; ?>/ikunpage/font/UnidreamLED.ttf') format('truetype');
        }
        .main::before {
            background-image: url('https://www.ikunwl.com/ikunpage/images/bj.webp');
        }
    </style>
</head>

<body>
    <div class="loading">
      <span class="loading-text">正在加载...</span>
    </div>
    <section class="main">
        <div class="main-content">
            <div class="time">
                <span id="chinaTime"></span>
            </div>
            <div class="yinyue">
                <meting-js
                    server="netease"
                    type="playlist"
                    id="3778678">
                </meting-js>
                <script>
                    ap = null
                    Object.defineProperty(document.querySelector('meting-js'),"aplayer",{
                        set: function(aplayer) {
                            ap=aplayer
                            ready();
                        }
                    });
                    isRecover = false;
                    function ready(){
                        ap.on('canplay', function () {
                            if(!isRecover){
                                if(localStorage.getItem("musicIndex") != null){
                                    musicIndex = localStorage.getItem("musicIndex");
                                    musicTime = localStorage.getItem("musicTime");
                                    if(ap.list.index != musicIndex){
                                        ap.list.switch(musicIndex);
                                    }else{
                                        ap.seek(musicTime);
                                        ap.play();
                                        localStorage.clear();
                                        isRecover = true;
                                    }
                                }else{
                                    isRecover = true;
                                }
                            }
                        });
                    }
                    window.onbeforeunload = function(event) {
                        if(!ap.audio.paused){
                            musicIndex = ap.list.index;
                            musicTime = ap.audio.currentTime;
                            localStorage.setItem("musicIndex",musicIndex);
                            localStorage.setItem("musicTime",musicTime);
                        }
                    };
                </script>
            </div>
            <p class="main-top"></p>
            <div class="tips">
                <?php echo getGreetingMessage(); ?>
            </div>
        </div>
        <div class="tab-container">
            <div class="main-content">
                <h1 class="main-name">
                    <img src="<?php echo $host; ?>/ikunpage/images/logo.gif" alt="iKun主页">
                    <a id="pageLink" href="#home">iKun主页</a>
                </h1>
            </div>
            <div class="main-content nav-item active">
                <div class="main-home">
                    <?php include 'home.php'; ?>
                </div>
                <div class="main-homead">
                    广告：亚太高防CDN【智慧云】限8折优惠，折扣券：zhy666，防CC 99%+ 支持泛解析 低至4月 宽带不限量~ 网址：<a href="https://idc.luoca.net/aff/TMZXBNKU" target="_blank">立即前往</a>
                </div>
                <div class="main-footer">
                    <p>Copyright © 2023 <a href="https://ikunwl.com" target="_blank">iKun主页</a>. All rights reserved.</p>
                    <p>练习时长<time id="wztime"></time> | <time id="loadTime">页面加载时长：加载中...</time></p>
                </div>
            </div>
            <div class="main-content nav-item">
                <div class="main-zuopin">
                    <?php include 'zuopin.php'; ?>
                </div>
            </div>
            <div class="main-content nav-item">
                <div class="main-links">
                    <?php include 'links.php'; ?>
                </div>
            </div>
            <div class="main-content nav-item">
                <div class="main-meinv">
                    <?php include 'meinv.php'; ?>
                </div>
            </div>
        </div>
    </section>
    <div class="main-tab">
        <div class="main-nav">
            <button data-href="#home" class="nav-button active" onclick="NavTab(0)" >
                <svg t="1725128707701" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1756" width="16" height="16"><path d="M256 896a128 128 0 0 1-128-128v-321.408A128 128 0 0 1 177.408 345.6L407.210667 166.826667a170.666667 170.666667 0 0 1 209.578666 0l229.802667 178.773333A128 128 0 0 1 896 446.549333V768a128 128 0 0 1-128 128h-85.333333a85.333333 85.333333 0 0 1-85.333334-85.333333v-170.666667a42.666667 42.666667 0 0 0-42.666666-42.666667h-85.333334a42.666667 42.666667 0 0 0-42.624 40.405334L426.666667 637.653333h-0.042667L426.666667 640a42.666667 42.666667 0 1 1-85.290667-2.346667A128 128 0 0 1 469.333333 512h85.333334a128 128 0 0 1 128 128v128a42.666667 42.666667 0 0 0 42.666666 42.666667h42.666667a42.666667 42.666667 0 0 0 42.666667-42.666667v-321.408a42.666667 42.666667 0 0 0-16.469334-33.706667L564.394667 234.24a85.333333 85.333333 0 0 0-104.789334 0L229.802667 412.928a42.666667 42.666667 0 0 0-16.469334 33.706667V768a42.666667 42.666667 0 0 0 42.666667 42.666667h64a21.333333 21.333333 0 0 0 21.333333-21.333334 42.666667 42.666667 0 1 1 85.333334 0v21.333334a85.333333 85.333333 0 0 1-85.333334 85.333333H256z" fill="#ffffff" p-id="1757"></path></svg>
                首页
            </button>
            <button data-href="#zuopin" class="nav-button" onclick="NavTab(1)">
                <svg t="1725128839484" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2844" width="16" height="16"><path d="M660.010667 213.333333H363.946667a85.333333 85.333333 0 0 0-84.650667 74.752l-33.664 354.389334A42.666667 42.666667 0 0 1 160.426667 640c0-1.28 0.170667-3.882667 0.170666-3.882667l34.048-358.613333A170.666667 170.666667 0 0 1 364.032 128h295.978667a170.666667 170.666667 0 0 1 169.344 149.504l42.666666 426.666667A170.666667 170.666667 0 0 1 702.634667 896H321.365333a170.24 170.24 0 0 1-141.653333-75.52 42.666667 42.666667 0 0 1 32.426667-70.4c23.509333 0 37.333333 21.205333 37.333333 21.205333 15.061333 23.552 41.429333 39.381333 71.893333 39.381334h381.354667a85.333333 85.333333 0 0 0 84.650667-95.914667l-42.666667-426.666667A85.333333 85.333333 0 0 0 660.053333 213.333333zM426.666667 341.333333a42.666667 42.666667 0 0 0-85.333334 0v42.666667a170.666667 170.666667 0 0 0 341.333334 0V341.333333a42.666667 42.666667 0 1 0-85.333334 0v42.666667a85.333333 85.333333 0 1 1-170.666666 0V341.333333z" fill="#ffffff" p-id="2845"></path></svg>
                作品
            </button>
            <button data-href="#links" class="nav-button" onclick="NavTab(2)">
                <svg t="1725128761667" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2479" id="mx_n_1725128761668" width="16" height="16"><path d="M442.278957 581.721043a44.521739 44.521739 0 0 0 62.99826-62.99826c-52.179478-52.134957-50.576696-121.188174-16.784695-154.980174l150.928695-150.928696c33.792-33.836522 102.845217-35.394783 154.980174 16.784696 52.179478 52.134957 50.576696 121.188174 16.784696 154.980174L719.026087 476.827826a44.521739 44.521739 0 0 0 62.953739 62.953739l92.204522-92.204522c77.334261-77.334261 60.727652-203.464348-16.740174-280.932173-77.467826-77.512348-203.642435-94.118957-280.932174-16.784696l-150.928696 150.928696c-77.334261 77.289739-60.727652 203.464348 16.740174 280.932173z m151.017739-151.017739a44.521739 44.521739 0 0 0-62.953739 62.953739c52.134957 52.179478 50.532174 121.232696 16.740173 155.024696L366.85913 828.994783c-33.836522 33.836522-102.845217 35.394783-155.024695-16.784696-52.179478-52.134957-50.576696-121.188174-16.784696-155.024696l121.544348-121.544348a44.521739 44.521739 0 1 0-62.953739-62.953739l-121.544348 121.544348c-77.334261 77.334261-60.727652 203.464348 16.740174 280.932174 77.467826 77.467826 203.642435 94.118957 280.932174 16.784696l180.313043-180.268522c77.289739-77.289739 60.68313-203.464348-16.784695-280.932174z" fill="#ffffff" p-id="2480"></path></svg>
                朋友
            </button>
            <button data-href="#meinv" class="nav-button" onclick="NavTab(3)">
                <svg t="1725128745011" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2006" width="16" height="16"><path d="M256 256h298.666667a85.333333 85.333333 0 0 1 85.333333 85.333333c0 41.984 41.130667 71.637333 80.938667 58.368L768 384v0.469333l70.357333-26.368A42.666667 42.666667 0 0 1 896 398.037333v227.925334a42.666667 42.666667 0 0 1-57.642667 39.936l-85.333333-32a42.666667 42.666667 0 0 1-27.690667-39.936V512a42.666667 42.666667 0 1 0-85.333333 0v170.666667a85.333333 85.333333 0 0 1-85.333333 85.333333H256a85.162667 85.162667 0 0 1-66.730667-32.170667 42.666667 42.666667 0 1 0-76.544 37.077334l-1.194666 0.682666A170.538667 170.538667 0 0 0 256 853.333333h298.666667a170.709333 170.709333 0 0 0 167.850666-139.733333l85.888 32.213333c83.626667 31.36 172.928-30.464 172.928-119.850666V398.037333c0-89.386667-89.258667-151.210667-172.928-119.850666l-85.888 32.213333A170.709333 170.709333 0 0 0 554.666667 170.666667H256a170.666667 170.666667 0 0 0-170.666667 170.666666v256a42.666667 42.666667 0 1 0 85.333334 0V341.333333a85.333333 85.333333 0 0 1 85.333333-85.333333z" fill="#ffffff" p-id="2007"></path></svg>
                视频
            </button>
            <span onclick="window.open('https://www.ikunwl.com/love/','_blank')">
                <svg t="1725128798138" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2594" width="16" height="16"><path d="M799.872 485.461333h1.92a3.157333 3.157333 0 0 1 0.128 1.749334c-5.973333 30.634667-11.648 63.232-16.981333 93.909333-3.157333 18.218667-6.229333 35.712-9.130667 51.754667-8.405333 45.994667-16.213333 82.474667-24.746667 108.16-6.272 18.730667-12.672 32.085333-19.84 40.32a23.68 23.68 0 0 1-7.424 6.101333 28.928 28.928 0 0 1-12.757333 2.389333l-175.616-0.256h-0.042667l-193.962666-0.213333H341.333333l-0.085333-0.128h-0.042667a1.237333 1.237333 0 0 1-0.256-0.384v-0.085333l-0.042666-0.256c-0.469333-47.872-1.237333-93.482667-1.962667-138.410667-0.896-53.76-1.792-106.410667-2.133333-160.554667 86.186667-40.533333 146.218667-130.56 155.306666-224.853333 5.248-21.888 13.781333-32.725333 19.669334-37.930667 6.485333-5.717333 14.08-8.533333 22.186666-8.874666 18.816-0.768 32.554667 10.496 36.266667 23.552 9.173333 32.128 15.445333 97.621333 13.098667 155.178666l-3.669334 88.832h88.917334c19.029333 0 34.645333-0.042667 49.194666-0.128 26.282667-0.085333 49.066667-0.213333 82.090667 0.128z m-264.704 389.461334l176.213333 0.256C789.333333 874.666667 817.749333 810.666667 832 768c14.72-44.202667 25.685333-107.178667 37.290667-173.866667 5.205333-29.866667 10.538667-60.544 16.384-90.581333a88.490667 88.490667 0 0 0-51.370667-98.048 106.410667 106.410667 0 0 0-33.578667-5.376c-17.664-0.170667-32.64-0.213333-46.72-0.213333l-37.333333 0.085333c-14.506667 0.085333-29.866667 0.128-48.085333 0.128 0.768-18.773333 0.768-38.613333 0-58.453333-1.749333-46.506667-7.466667-92.8-16.256-123.605334-31.744-111.402667-211.669333-127.658667-244.736 33.834667-5.888 83.413333-69.034667 159.146667-144.938667 172.501333-9.173333 1.621333-11.306667 5.12-11.306667 14.421334-0.042667 72.832 1.109333 142.933333 2.261334 213.973333 0.768 44.8 1.493333 90.026667 1.962666 136.533333 0.426667 47.146667 38.656 85.333333 85.76 85.333334l193.706667 0.256h0.128zM213.333333 490.666667a42.666667 42.666667 0 1 0-85.333333 0v341.333333a42.666667 42.666667 0 1 0 85.333333 0v-341.333333z m123.306667-51.797334v-0.042666z" fill="#ffffff" p-id="2595"></path></svg>
                情书
            </span>
        </div>
    </div>
    <div id="lianxi" class="lianxi">
        <div class="close">
            <span>联系站长</span>
            <button onclick="closelianxi()">关闭</button>
        </div>
        <div id="lianxiContent"></div>
    </div>
    <?php include 'zuopin-tanchuang.php'; ?>
    <div id="background-layer"></div>
    <div class="youjian">
    	<ul>
            <li><a href="<?php echo $host; ?>">首页</a></li>
            <li><a href="javascript:void(0);" onclick="getSelect();">复制</a></li>
            <li><a href="javascript:void(0);" onclick="toRefresh()">刷新</a></li>
            <li><a href="javascript:void(0);" onclick="baiduSearch();">百度搜索</a></li>
    		<hr>
    		<li><a href="https://www.xkwo.com">官方博客</a></li>
            <li><a href="javascript:alert('iKun主页是个平凡人的网站，网站记录着iKun的作品和朋友，尽管我与大神们比起来有相当大的差距，但会尽我最大的努力去学习，我坚信只要我坚持与努力我也可以做到最好。本站链接信息：&lt;a herf=&quot;https://iKunWl.com/&quot;&gt;iKun主页&lt;/a&gt;');">友情链接</a></li>
    	</ul>
    </div>
    <link rel="stylesheet" href="https://www.ikunwl.com/ikunpage/music/APlayer.min.css">
    <script type="text/javascript" src="https://www.ikunwl.com/ikunpage/music/APlayer.min.js"></script>
    <script type="text/javascript" src="https://www.ikunwl.com/ikunpage/music/Meting.min.js"></script>
    <script type="text/javascript" src="https://www.ikunwl.com/ikunpage/script/Jack.js"></script>
    <script type="text/javascript" src="<?php echo $host; ?>/ikunpage/script/navtab.js"></script>
    <script type="text/javascript" src="//api.tongjiniao.com/c?_=593536847951941632" async></script>
</body>

</html>