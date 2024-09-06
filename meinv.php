<div class="btn">
  <a rel="noopener noreferrer" href="<?php echo $host; ?>/mimi/" target="_blank" class="ad">高端社交 匿名小秘密</a>
  <a rel="noopener noreferrer" href="#" target="_blank">此处广告位招租</a>
  <span id="refreshButton">点击看下一条视频</span>
</div>
<video id="myVideo" src="https://hefollo.com/apis.php?type=%E5%B0%8F%E5%A7%90%E5%A7%90%E8%A7%86%E9%A2%91" controls playsinline></video>
<style>
  .main-meinv {
    padding: 10px;
    width: calc(100% - 20px);
    text-align: center;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    overflow: hidden;
  }

  .main-meinv .btn {
    display: flex;
    margin-bottom: 10px;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
  }

  .main-meinv .btn .ad {
    margin-bottom: 10px;
    width: 100%;
    clear: both;
  }

  .main-meinv .btn a,
  .main-meinv .btn span {
    padding: 1% 2%;
    width: 45%;
    color: #fff;
    background: rgb(255 255 255 / 10%);
    border-radius: 4px;
  }

  .main-meinv #myVideo {
    width: 100%;
    height: 500px;
    border: 0;
  }

  .main-meinv #myVideo::-webkit-media-controls-timeline/**用于控制进度条的样式。**/,
  .main-meinv #myVideo::-webkit-media-controls-progress-bar/**用于控制进度条背景的样式。**/,
  /**.main-meinv #myVideo::-webkit-media-controls-current-time-display 用于控制当前播放时间显示的样式。**/
  /**.main-meinv #myVideo::-webkit-media-controls-time-remaining-display 用于控制剩余播放时间显示的样式。**/
  .main-meinv #myVideo::-webkit-media-controls-fullscreen-button/**用于控制全屏按钮的样式。**/,
  /**.main-meinv #myVideo::-webkit-media-controls-play-button 控制播放按钮的样式。**/
  .main-meinv #myVideo::-webkit-media-controls-overflow-button/**控制溢出按钮的样式。**/ {
      display: none;
  }
</style>
<script>
  // 获取刷新按钮和myVideo元素
  var refreshButton = document.getElementById('refreshButton');
  var myVideo = document.getElementById('myVideo');

  // 绑定按钮的点击事件
  refreshButton.addEventListener('click', function () {
    // 设置myVideo的src属性为要加载的内容
    myVideo.src = 'https://hefollo.cn/apis.php?type=%E5%B0%8F%E5%A7%90%E5%A7%90%E8%A7%86%E9%A2%91';
    // 播放视频
    myVideo.play();
  });
</script>