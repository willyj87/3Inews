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
        <div class="margin ligne">
            <label>En cours de diffusion : 1</label>
            <ul class="button-group clean diff-drop">
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
            </ul>
            <a class="btn btn-lg boutton" id="btn-a" href="?controller=news&action=addnews">Ajouter</a>
        </div>
    </div>
    <div class="container-fluid">
    <div class="col-md-10">
        <table class="table table-responsive diff-tab-principal">
            <?php
            foreach ($this->news as $data){
                ?>
                <tr>
                    <td>
                        <h2><?php echo $data['ordre'];?></h2>
                    </td>
                    <td>
                        <?php
                        if (is_array($data))
                            $texte = $data['texte'];
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" alt="news1" class="img-responsive img-thumbnail diff-img"/>'."<p>".$texte."</p>";
                        ?>
                    </td>
                    <td>
                        <a href="?controller=news&action=editnews"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
                        <a href="?controller=news&action=editnews"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
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
