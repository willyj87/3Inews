<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/01/17
 * Time: 16:08
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/edition.css');
$this->setPageTitle('Edition de News');

?>
<div class="page-header">
    <div class="container-fluid">
        <h1>Edition de news</h1>
    </div>
</div>
<div   id="super" class="container-fluid">
    <div class="row" id="button">
        <div class="col-md-8">
            <button class="btn btn-default btn-lg">Tester</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-default btn-lg">Annuler</button>
        </div>

        <div class="col-md-2">
            <button class="btn btn-lg">Enregistrer</button>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <img    class="img-responsive" src="images/Mimi.jpg" alt="mer" style="width: 70%;"/>
            <br><br><br>
            <div class="form-inline">
                <div class="col-md-2">
                    <label>Texte :</label>
                </div>
                <div>
                    <input type="text" name="texte" value="On s'en fiche"  class='form-control input-lg' >
                </div>
            </div>
        </div>
        <div class="col-md-6" id="sup-2">
          
        </div>
    </div>
    <br><br>
    <div class="row" id="down">
        <div class="col-md-10">
            <h3>Les images</h3>
        </div>
        <div class="col-md-2" style="border-right:11px;">
            <button class="btn btn-default btn-lg">Ajouter</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class = "col-md-1">
            <img class="img-responsive" src="images/Mimi.jpg" style="width: 120%;" alt="mer"/>
        </div>
        <div class = "col-md-1">
            <img class="img-responsive" src="images/poisson1.jpg" style="width: 120%;" alt="mer"/>
        </div>
        <div class = "col-md-1">
            <img class="img-responsive" src="images/poisson1.jpg" style="width: 120%;" alt="mer"/>
        </div>
        <div class = "col-md-1">
            <img class="img-responsive" src="images/poisson1.jpg" style="width: 120%;" alt="mer"/>
        </div>
    </div>
</div>

