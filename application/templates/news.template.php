<?php
/**
 * Created by PhpStorm.
 * User: root
    color: white;
 * Date: 26/12/16
 * Time: 19:13
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
        [%STYLESHEETS%]
    </head>
    <body>
        <header id="head">
            <nav class="navbar navbar-default" id="nav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?controller=index&action=viewerconnect">3Inews</a>
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-left" href="?controller=news&action=diffusion">Diffusion</a></li>
                        <li><a class="nav navbar-nav" href="?controller=news&action=lister">Utilisateurs</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Willy<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="?controller=utilisateur&action=deconnecter">Se déconnecter</a>
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
        <script src="vendors/jquery-3.1.1.js" type="text/javascript"></script>
        <script src='vendors/bootstrap/dist/js/bootstrap.min.js' type="text/javascript"></script>
    </body>
</html>