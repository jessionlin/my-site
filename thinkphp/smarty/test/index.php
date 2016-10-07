<?php
    mysql_connect("localhost","root","") or die("数据库连接错误:Error:".mysql_errno().":".mysql_error());
    mysql_set_charset("utf8");
    mysql_select_db("myproject") or die("指定数据库打开失败!");
    $sql="select *from user";
    $result=mysql_query($sql);
    echo mysql_num_rows($result);