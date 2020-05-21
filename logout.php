<?php

    session_start();
    session_unset();
    session_destroy();
    require_once('config.php');
    header('Location: '.$path.'/login.php');
    exit;

?>