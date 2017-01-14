<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/01/17
 * Time: 14:11
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>[%TITLE%]</title>
    <link rel="stylesheet" href= "vendors/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href= "css/3in.css"/>
    <link rel="stylesheet" href= "css/font-awesome.min.css"/>
    <link rel="stylesheet" href= "css/redac.css"/>
    <link rel="stylesheet" href="vendors/lightGallery-master/src/css/lightgallery.css">
    [%STYLESHEETS%]
</head>
<body>
<header>
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="?controller=index">3Inews</a>
            <a class="btn  navbar-right accueil-con" id="acccueil-btn" type="button" href="?controller=index&action=index"> Se connecter</a>
        </div>
    </nav>
</header>
<main>
    [%VIEW%]
</main>
<footer>
</footer>
<script type="text/javascript" src= "vendors/jquery-3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src= "vendors/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script type="text/javascript" src= "vendors/lightGallery-master/src/js/lightgallery.js"></script>
<script src="vendors/lightGallery-master/demo/js/lg-fullscreen.js"></script>
<script type="text/javascript" src="js/carousel_js.js"></script>
<script type="text/javascript" src="js/carousel_method.js"></script>
</body>