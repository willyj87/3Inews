<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/01/17
 * Time: 16:59
 */
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/accueil.css');
$this->setPageTitle('Mes news');
?>
<h1 class="page-header">Mes News</h1>
<div class="row">
    <div class="col-md-8" id="diff-div">
            <label>En cours de diffusion : 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <small>Dernière mise à jour: 15h00</small>
    </div>
    <div class="col-md-1">
        <button class="btn btn-lg boutton col-md-offset-10">Ajouter</button>
    </div>
</div>
