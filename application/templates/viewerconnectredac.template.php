<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/17
 * Time: 16:45
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
    <link rel="stylesheet" href="css/full-slider.css">
    <link rel="stylesheet" href= "css/redac.css"/>
    [%STYLESHEETS%]
</head>
<body>
<header>
    <nav class="navbar navbar-default" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="?controller=index&action=viewerconnectredac">3Inews</a>
            <ul class="nav navbar-nav">
                <li><a class="nav navbar-nav" href="?controller=news&action=redac">Mes news</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Willy<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?controller=utilisateur&action=deconnecter" >Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
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