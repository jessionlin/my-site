<?php
    mysql_connect("localhost","root","") or die("���ݿ����Ӵ���:Error:".mysql_errno().":".mysql_error());
    mysql_set_charset("utf8");
    mysql_select_db("myproject") or die("ָ�����ݿ��ʧ��!");
    $sql="select *from user";
    $result=mysql_query($sql);
    echo mysql_num_rows($result);