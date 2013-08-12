<?php if($_GET["refresh"]==1){include_once "fetch.php";}?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>知乎日报</title>
<?php if(!$_GET["disableappstore"]==1){echo '<meta name="apple-itunes-app" content="app-id=639087967">';}?>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="http://daily.zhihu.com/css/share.css">
<script src="http://upcdn.b0.upaiyun.com/libs/modernizr/modernizr-2.6.2.min.js"></script>
<base target="_blank">
</head>
<body>
<div class="global-header">
<div class="main-wrap">
<div class="download">
<a href="https://itunes.apple.com/cn/app/id639087967?mt=8" class="button" data-device="ios"><i class="sprite-ico-Button_iPhone2x"></i> <span>iPhone</span></a>
<a href="http://daily.zhihu.com/download/android" class="button" data-device="android-local"><i class="sprite-ico-Button_Android2x"></i> <span>Android</span></a>
</div>
    <a href="/lab/zhihudaily/index_sql.php" target="_self" title="知乎日报"><i class="web-logo"></i></a>
</div>
</div>

<div class="main-wrap content-wrap">
<div class="headline">

<div class="img-wrap">
    
<?php 
$mysql=new SaeMysql();
if(!$_GET["search"]){
    
if(!$_GET["before"]){
    $date=date("Ymd");
} else {
    $date=date("Ymd",(strtotime($_GET["before"])));
}
$sql="SELECT * FROM zhihudaily_contents WHERE date=$date ORDER BY ga_prefix DESC";
} else {//search
    $search=!$_GET["search"];
    $sql="SELECT * FROM zhihudaily_contents WHERE title LIKE $search ORDER BY ga_prefix DESC";
}
$webcode_raw=$mysql->getData($sql);
$webcode["news"]=$webcode_raw;
$srttime=date("w");
$array=array('日','一','二','三','四','五','六');
$webcode["display_date"]=date("Y.m.d 星期{$array[$srttime]}",strtotime($date));
$webcode['date']=date("Ymd",(strtotime($date) - 3600*24));

echo '<h1 class="headline-title">' .$webcode['display_date']. '</h1>'."\n";
if($webcode['news']['0']['image_source']){
	echo '<span class="img-source">图片：' .$webcode['news']['0']['image_source']. '</span>'."\n";
}
echo "\n";
echo '<img src="' .$webcode['news']['0']['image']. '" alt="">'."\n";
echo '<div class="img-mask"></div>'."\n";
echo '</div>'."\n";
echo "\n\n";

for($i=0;$i<count($webcode['news']);$i++){
    echo '<div class="headline-background" style="height:114px;">'."\n";
    echo '<img src="'.$webcode['news'][$i]['thumbnail'].'" style="height:114px;weight:114px;float:left;margin-top:auto;margin-bottom:auto;">';
    echo '<a href="' .$webcode['news'][$i]['share_url']. '" target="_blank" class="headline-background-link" style="height:114px;">'."\n";
    echo '<div class="heading-content" style="height:114px;padding-left:90px;">' .$webcode['news'][$i]['title']. '</div>'."\n";
    echo '<i class="icon-arrow-right"></i>'."\n";
    echo '</a>'."\n";
    echo '</div>'."\n";
    echo "\n";
}
echo '</div>'."\n";

echo '</div>'."\n";
echo '</div>'."\n";

echo '<div class="footer">'."\n";
echo '<div class="f">'."\n";
echo '<a target="_self" href="?before=' .$webcode['date']. '" class="download-btn">前一天</a>'."\n";

?>
</div>
<br>
<br>
    &copy; 2013 <a href="http://www.zhihu.com">知乎</a> &middot; Powered by <a href="http://www.faceair.net/">faceair</a>&nbsp;and <a href="/">zhj</a>&nbsp;&middot;&nbsp;<a href="readme.htm">可选参数说明</a>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a13705bcaca5f671b8a02a8a5d2ee39d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>
<script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-1.9.1.min.js"></script>
<script src="http://daily.zhihu.com/js/share.js"></script>
</body>
</html>
