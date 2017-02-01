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

<div id="container" class="_container">

    <header id="main-header">
        <?php drawMenu() ?>
    </header>

    <main id="main-content">











