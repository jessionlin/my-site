<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    require_once 'config.php';
    require_once 'frameword/pc.php';
    PC::run($config);