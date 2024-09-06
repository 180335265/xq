<?php
// 判断是否为移动设备
function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileKeywords = array("Android", "webOS", "iPhone", "iPad", "iPod", "BlackBerry", "Windows Phone");
    
    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    
    return false;
}

// 在页面中使用条件判断
if (isMobileDevice()) {
    // 移动端显示的内容
    echo '<p class="main-tagline xuancai">我一直相信释迦牟尼说的一句话：“无论你遇见谁,他都是你生命该出现的人,绝非偶然,他一定会教会你一些什么”.<br />所以我也相信：“无论我走到哪里,那都是我该去的地方,经历一些我该经历的事,遇见我该遇见的人”.</p>';
} else {
    // 电脑端显示的内容
    echo '<p class="main-tagline xuancai">我一直相信释迦牟尼说的一句话：“无论你遇见谁,他都是你生命该出现的人,绝非偶然,他一定会教会你一些什么”.<br />所以我也相信：“无论我走到哪里,那都是我该去的地方,经历一些我该经历的事,遇见我该遇见的人”.</p>';
}
?>
<div class="flex">
    <span onclick="openlianxi('QQ')">QQ客服</span>
    <span onclick="openlianxi('PD')">官方频道</span>
    <span onclick="openlianxi('QUN')">官方群聊</span>
    <span onclick="openlianxi('Zans')">打赏作者</span>
</div>
<script>
// 打开联系弹窗
function openlianxi(content) {
  var lianxi = document.getElementById('lianxi');
  var lianxiContent = document.getElementById('lianxiContent');
  var backgroundLayer = document.getElementById('background-layer');
  switch (content) {
    case 'QQ':
      lianxiContent.innerHTML = '<img src="<?php echo $host; ?>/ikunpage/images/qqma.webp" alt="QQ二维码"><p>手机 QQ 扫描二维码添加好友</p>';
      break;
    case 'PD':
      lianxiContent.innerHTML = '<img src="<?php echo $host; ?>/ikunpage/images/qqpd.webp" alt="频道二维码"><p>手机 QQ 扫描二维码添加官方频道</p>';
      break;
    case 'QUN':
      lianxiContent.innerHTML = '<img src="<?php echo $host; ?>/ikunpage/images/qqun.webp" alt="Q群二维码"><p>手机 QQ 扫描二维码添加QQ交流群</p>';
      break;
    case 'Zans':
      lianxiContent.innerHTML = '<img src="<?php echo $host; ?>/ikunpage/images/zans.webp" alt="微信赞赏码"><p>手机 微信 扫描二维码微信打赏</p>';
      break;
    default:
      lianxiContent.innerHTML = '';
  }
  lianxi.style.display = 'block';
  backgroundLayer.style.display = 'block'; // 显示背景层
}

// 关闭联系弹窗
function closelianxi() {
  var lianxi = document.getElementById('lianxi');
  var backgroundLayer = document.getElementById('background-layer');
  lianxi.style.display = 'none';
  backgroundLayer.style.display = 'none'; // 隐藏背景层
}
</script>