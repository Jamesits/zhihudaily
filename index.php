<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>知乎日报</title>
<meta name="apple-itunes-app" content="app-id=639087967">
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
<a href="/" target="_self" title="知乎日报"><i class="web-logo"></i></a>
</div>
</div>

<div class="main-wrap content-wrap">
<div class="headline">

<div class="img-wrap">
    
<?php 

if(!$_GET["before"]){
    if(is_file('saestor://zhihudaily/' .date('Ymd'). '.txt')){
  	$webcode = json_decode(file_get_contents('saestor://zhihudaily/' .date('Ymd'). '.txt'), 1);
    }else{
		$webcode = json_decode(file_get_contents('http://news.at.zhihu.com/api/1.2/news/latest'), 1);
    }
}else{
    $beforeday = date('Ymd',strtotime($_GET["before"]) - 3600*24);
    if(is_file('saestor://zhihudaily/' .$beforeday. '.txt')){
        $webcode = json_decode(file_get_contents('saestor://zhihudaily/' .$beforeday. '.txt'), 1);
    }else{
    	$resource = file_get_contents('http://news.at.zhihu.com/api/1.2/news/before/' . $_GET["before"]);
        if(!strstr($resource ,'<html><title>404: Not Found</title><body>404: Not Found</body></html>') and $resource != '{}'){
    		$webcode = json_decode($resource, 1);
    		file_put_contents('saestor://zhihudaily/' .$webcode['date']. '.txt',$resource);
        }else{
            $url = "http://zhihudaily.sinaapp.com/";  
			echo '<script type="text/javascript">';  
			echo "window.location.href='$url'";  
			echo "</script>"; 
        }
    }
}

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
    echo '<div class="headline-background">'."\n";
    echo '<a href="' .$webcode['news'][$i]['share_url']. '" class="headline-background-link">'."\n";
    echo '<div class="heading-content">' .$webcode['news'][$i]['title']. '</div>'."\n";
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
echo '<a target="_self" href="http://zhihudaily.sinaapp.com/index.php?before=' .$webcode['date']. '" class="download-btn">前一天</a>'."\n";

?>
</div>
<br>
<br>
&copy; 2013 知乎 &middot; Powered by <a href="http://www.faceair.net/">faceair</a>&nbsp;
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
