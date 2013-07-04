<?php 
$resource = file_get_contents('http://news.at.zhihu.com/api/1.2/news/latest');
$webcode = json_decode($resource, 1);
file_put_contents('saestor://zhihudaily/' .$webcode['date']. '.txt',$resource);
