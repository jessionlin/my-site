<?php
    header("Content-type:text/html;charset=utf-8");
    date_default_timezone_set('Asia/Shanghai');
    require_once 'configs.php';
    require_once 'framework/pc.php';
    PC::run($configs);