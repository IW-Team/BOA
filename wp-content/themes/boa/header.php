<?php
require_once WP_CONTENT_DIR . '/themes/boa/class/Blog.php';
require_once WP_CONTENT_DIR . '/themes/boa/class/Post.php';
$blog = new Blog();
$POST = new Post(get_post());
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title></title>

    <?php wp_head(); ?>

    <?php require "class/requirements.php"; ?>

</head>
<body>

<div id="container">

    <header class="header _container-flex _p-t-20 _p-b-20 _p-r-40 _p-l-20" id="main-header">
        <div class="_box-10 _align-center  _pull-left">
            <span class="f-c-white logo-font"><b>BOA</b></span>
        </div>
        <div class="_box-90 _480-hide _768-show _992-show _1200-show">
            <?php drawMenu(); ?>

        </div>
        <div class="_box-90 _480-show-block pos-relative _text-right _hide">
            <i class="fa fa-bars f-c-white _f-s-30 burger" aria-hidden="true"></i>
            <?php drawBurger(); ?>
        </div>
    </header>

    <main id="main-content">










