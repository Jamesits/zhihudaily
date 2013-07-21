<?php 
if(!$_GET["before"]){
    $resource = file_get_contents('http://news.at.zhihu.com/api/1.2/news/latest');
} else {
	$resource = file_get_contents('http://news.at.zhihu.com/api/1.2/news/before/' . $_GET["before"]);
}
$webcode = json_decode($resource, 1);
$date=date("Y-m-d",strtotime($webcode["date"]));
$mysql = new SaeMysql();
foreach ($webcode["news"] as $key){
    $id=intval($key["id"]);
    $title=$key["title"];
    $url=$key["url"];
    $image=$key["image"];
    $share_url=$key["share_url"];
    $ga_prefix=intval($key["ga_prefix"]);
    $share_image=$key["share_image"];
    $image_source=$key["image_source"];
    $thumbnail=$key["thumbnail"];
    $sql="INSERT IGNORE INTO zhihudaily_contents (id, title, url, image, share_url, ga_prefix, share_image, image_source, thumbnail, date) VALUES ('$id', '$title', '$url', '$image', '$share_url', '$ga_prefix', '$share_image', '$image_source', '$thumbnail', '$date');";
 	$mysql->runSQL( $sql );

}
if($webcode["is_today"]==1){
foreach ($webcode["top_stories"] as $key){
    $id=intval($key["id"]);
    $title=$key["title"];
    $url=$key["url"];
    $image=$key["image"];
    $share_url=$key["share_url"];
    $ga_prefix=intval($key["ga_prefix"]);
    $share_image=$key["share_image"];
    $image_source=$key["image_source"];
    $sql="INSERT IGNORE INTO zhihudaily_top_stories (id, title, url, image, share_url, ga_prefix, share_image, image_source, date) VALUES ('$id', '$title', '$url', '$image', '$share_url', '$ga_prefix', '$share_image', '$image_source', '$date');";
 	$mysql->runSQL( $sql );

}
}
    $mysql->closeDb();
?>