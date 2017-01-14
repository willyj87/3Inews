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
                <a class="btn btn-lg right" href="?controller=utilisateur&action=creer">Ajouter</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <?php
                            $affiche=array();
                            foreach ($this->users as $user => $content){
                                foreach ($content as $key =>$value){
                                    if (!in_array($key,$affiche) and $key !='motdepasse' and
                                     $key !='login' and $key !='statut' and $key !='creation' and $key!='connexion')
                                $affiche[] = $key;
                                }
                            }
                            foreach ($affiche as $value){
                            ?>
                            <th>
                                <?php echo ucfirst($value);?>
                            </th>
                        <?php
                          }
                            ?>
                            <th>
                                Commande
                            </th>
                        </tr>
                        <?php
                        foreach ($this->users as $user){
                        ?>
                        <tr>
                            <td>
                                <?php echo $user['id'];
                                ?>
                            </td>
                            <td> <?php echo $user['nom']."\t".$user['prenom'];
                                ?>
                            </td>
                            <td>
                                <?php echo $user['login'];
                                ?>
                            </td>
                            <td>
                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
