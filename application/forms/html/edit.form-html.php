<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/01/17
 * Time: 12:29
 */
namespace inews;
defined("3INEWS") or die("Access Denied");
?>
<div class="page-header">
    <div class="container-fluid">
        <h1>Edition de news</h1>
    </div>
</div>
<div   id="super" class="container-fluid">
    <form id="edit-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
        <div class="row" id="button">
            <div class="col-md-8">
                <button id="tester" class="btn btn-default btn-lg">Tester</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-default btn-lg">Annuler</button>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-lg">Enregistrer</button>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6" id="sup-1">

                    <?php
                    /**Capture du Flux images pour l'encoder et l'afficher après*/
                    ob_start();
                    $this->fValue('image');
                    $image = ob_get_contents();
                    ob_end_clean();
                    ?>
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $image).'" alt="news1" class="img-responsive"/>'?>
                    <div class="form-inline">
                        <div>
                            <label>Texte :</label>
                            <input type="text" id="<?php $this->fName('texte'); ?>" name="<?php $this->fName('texte'); ?>" placeholder="<?php $this->fLabel('texte')?>" value="<?php $this->fValue('texte');?>" class='form-control input-lg' >
                        </div>
                    </div>
            </div>
            <input type="hidden" value="<?php $this->fValue('id');?>" class="form-control" id="<?php $this->fName('id')?>" name="<?php $this->fName('id')?>">
</form>
        <div class="col-md-6" id="sup-2">
            <form id="edition" method="POST" action="" class="form-horizontal">
                    <h3 id="#param">Paramètre</h3>
                <div class="form-inline">
                        <label>Couleur texte:</label>
                        <input type="text" name="texte" value="#FFFFFF" class='form-control input-lg'>

                </div>
                <div class="form-inline">
                        <label>Couleur bandeau :</label>
                        <input type="text" name="couleur_bandeau" value="#000000" class='form-control input-lg' >

                </div>
                <div class="form-inline">

                        <label>Position bandeau :</label>
                    <select  class="form-control input-lg">
                        <option value=gauche >gauche</option>
                        <option value=droite>droite</option>
                        <option value=centre>centre</option>
                    </select>
                </div>
                <div class="form-inline">
                        <label>Taille bandeau :</label>
                    <input type="text" name="taille_bandeau" value="20" class='form-control input-lg'><span class="unit">Px</span>

                </div>

                <div class="form-inline">
                        <label>Taille texte :</label>
                        <input type="text" name="taille_texte" value="28" class='form-control input-lg'><span class="unit">%</span>

                </div>
            </form>
        </div>
    </div>
    <br><br>
    <div class="row" id="down">
        <div class="col-md-10">
            <h3>Les images</h3>
        </div>
        <div class="col-md-2" style="border-right:11px;">
            <a id="ajout" href="#" class="btn btn-default btn-lg">Ajouter</a>
        </div>
    </div>
    <br>
</div>
