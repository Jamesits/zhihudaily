<?php
file_put_contents('saestor://zhihudaily/' .date('Ymd'). '.txt',file_get_contents('http://news.at.zhihu.com/api/1.2/news/latest'));
