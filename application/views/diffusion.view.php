<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/12/16
 * Time: 19:18
 */
namespace inews;
defined('3INEWS') or die('Acces Denied');
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
            <button class="btn btn-lg btn-default boutton col-md-offset-10">Tout effacer</button>
        </form>
        <div class="col-md-12">
            <table class="table table-responsive diff-tab-principal">
                <?php
                $image = $this->diff->newsdiff();
                foreach ($image as $data) {
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
                            <a href="#"><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
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
        <table class="table table-responsive diff-tab-bord">
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
                            <?php foreach ($image as $img){
                                if ($img['id'] ==$data['id']){
                                    echo "<span id='diff'>Diff</span>";
                                }
                            }?>
                        </table>
                    </td>
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-plus-sign bottom-right" aria-hidden="true"></span></a>
                    </td>

                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
