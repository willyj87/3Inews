<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/01/17
 * Time: 12:58
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/liste.css');
$this->setPageTitle('Les utilisateurs');

?>
<div class="container-fluid">
    <h1 class="page-header">Utilisateurs</h1>
    <div>
        <div class="row" id="liste-entete">
            <div class="col-md-9" >
            </div>
            <div class="col-md-3" >
                <button class="btn btn-lg right">Ajouter</button>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th> id</th>
                            <th>Nom - Prénom</th>
                            <th>Admin</th>
                            <th>Login</th>
                            <th>Commande</th>
                        </tr>
                        <tr >
                            <td>4</td>
                            <td>Gaudin Hervé</td>
                            <td></td>
                            <td>gaudinh</td>
                            <td>
                                <a href="#"><span class="glyphicon glyphicon-pencil liste-edit" id="icone-test" ></span></a>
                                <a href="#"><span class="glyphicon glyphicon-trash liste-edit" id="icone-test"></span></a>
                            </td>
                        </tr>
                        <tr id="bordure-ligne">
                            <td>2</td>
                            <td>Oulad Moussa</td>
                            <td><span class="glyphicon  glyphicon-ok-sign"></span> </td>
                            <td id="bordure-col">mom</td>
                            <td>
                                <a href="#">   <span class="glyphicon glyphicon-pencil liste-edit"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-trash liste-edit"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Ruchaud William</td>
                            <td></td>
                            <td>ruchaudw</td>
                            <td>
                                <a href="#"><span class="glyphicon glyphicon-pencil liste-edit"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-trash liste-edit"></span></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>
