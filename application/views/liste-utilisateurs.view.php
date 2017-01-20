<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/01/17
 * Time: 12:58
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
use F3il\Messages;
Messages::setMessageRenderer('\inews\MessagesHelper::messagesRenderer');
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
                                     $key !='statut' and $key !='creation' and $key!='connexion' and $key !='prenom')
                                $affiche[] = $key;
                                }
                            }
                            foreach ($affiche as $value){
                            ?>
                            <th>
                                <?php
                                if ($value == 'nom')
                                    echo 'Nom - Prenom';
                                else
                                    echo ucfirst($value);?>
                            </th>
                        <?php
                          }
                            ?>
                            <th>
                                Admin
                            </th>
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
                            <td>
                                <?php echo $user['nom']." ".$user['prenom'];
                                ?>
                            </td>
                            <td>
                                <?php echo $user['login'];
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($user['statut'] == 'administrateur')
                                    echo '<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>';
                                ?>
                            </td>
                            <td>
                                <button name="id" value="<?php echo $user['id']?>" form="edit-form" class="btn btn-default btn-xs" title="editer"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                <button name="id" value="<?php echo $user['id']?>" form="delete-form" class="btn btn-default btn-xs" title="supprimer"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
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
<form id="edit-form" action="/web/3Inews/index.php?controller=utilisateur&action=editer" method="POST">

</form>
<form id="delete-form" action="/web/3Inews/index.php?controller=utilisateur&action=supprimer" method="POST">

</form>

