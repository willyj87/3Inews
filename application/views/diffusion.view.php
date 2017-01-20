<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/12/16
 * Time: 19:18
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
use F3il\Messages;
Messages::setMessageRenderer('\inews\MessagesHelper::messagesRenderer');
$this->addStyleSheets('css/diffusion.css');
$this->setPageTitle('Diffusion de News');
?>

<div class="page-header">
    <div class="container-fluid">
        <h1>Diffusion</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-7" id="diff-div">
        <form class="form-inline" id="diff-haut">
            <label>En cours de diffusion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Dernière mise à jour: 15h00</small></label>
            <?php $diff = $this->diff->diff();?>
            <button name="id" value="<?php echo $diff['id'];?>" class="btn btn-lg btn-default boutton col-md-offset-10" form="delall-form" >Tout effacer</button>
        </form>
        <div class="col-md-12" id="drop">
            <table class="table table-responsive diff-tab-principal" id="tab-1">
                <?php
                $imagediff = $this->diff->newsdiff();
                foreach ($imagediff as $data) {
                    ?>
                    <tr>
                        <td>
                            <h2><?php echo $data['ordre']?></h2>
                        </td>
                        <td>
                            <?php
                            if (is_array($data))
                                $texte = $data['texte'];
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" alt="news1" class="img-responsive img-thumbnail diff-img"/>'."<p>".$texte."</p>";
                            ?>
                        </td>
                        <td>
                        <table class="diff-tab-secondaire">
                            <tr>
                                <td><a href="#">
                                        <?php
                                            $nomuser = $this->usernews->newsuser($data['id']);
                                        foreach ($nomuser as $nom){
                                            echo 'Par : '.$nom['nom'].' '.$nom['prenom'];
                                        }
                                        ?>
                                    </a></td>
                            </tr>
                            <tr>
                                <td><p>Le : <?php echo $data['date']?></p></td>
                            </tr>
                        </table>
                        </td>
                        <td>
                            <h2><?php echo $data['duree'].'s';?></h2>
                        </td>
                        <td>
                            <button><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i></button>
                        </td>
                        <td>
                            <button name="id" value="<?php echo $data['id']; ?>" form="remove-form"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="col-md-4 right diff-border">
        <h2>News disponibles</h2>
        <div class="margin ligne">
                <div class="button-group clean diff-drop">
                    <a class="btn-clean button-dropdown btn" href="#" data-toggle="dropdown">
                        Trier par <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu clean">
                        <li class="dropdown-header diff-drop-head"><p>Ordre alphabetique</p></li>
                        <li><a href="#">Croissant</a></li>
                        <li><a href="#">Decroissant</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header diff-drop-head"><p>Ordre Chronologique</p></li>
                        <li><a href="#">Croissant</a></li>
                        <li><a href="#">Decroissant</a></li>
                    </ul>
                </div>
            </div>
        <table class="table table-responsive diff-tab-bord" id="tab-2">
            <?php
            foreach ($this->news as $data){
            ?>
                <tr>
                    <td>
                        <?php
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" alt="news1" class="img-responsive img-thumbnail diff-img"/>';
                        ?>

                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <?php  $nomuser = $this->usernews->newsuser($data['id']);
                                    foreach ($nomuser as $nom){
                                        echo 'Par : '.$nom['nom'].' '.$nom['prenom'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Le : <?php echo $data['date']?></p>
                                </td>
                            </tr>
                            <?php foreach ($imagediff as $img){
                                if ($img['id'] ==$data['id']){
                                    echo "<span id='diff'>Diff</span>";
                                }
                            }?>
                        </table>
                    </td>
                    <td>
                        <button name="id" value="<?php echo $data['id']; ?>" form="addnews-form"><span class="glyphicon glyphicon-plus-sign bottom-right" aria-hidden="true"></span></button>
                    </td>

                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<form id="delall-form" action="/web/3Inews/index.php?controller=news&action=delnews" method="POST">

</form>
<form id="addnews-form" action="/web/3Inews/index.php?controller=news&action=add" method="POST">

</form>
<form id="remove-form" action="/web/3Inews/index.php?controller=news&action=remove" method="POST">

</form>