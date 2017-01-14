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

<form id="add-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
                <h3 id="#param">Paramètre</h3>
                <br>
                <br>
                <div class="form-inline">
                    <div class="col-md-4">
                        <label>Couleur texte:</label>
                    </div>
                    <div>
                        <input type="text" name="texte" value="#FFFFFF" class='form-control input-lg'>
                    </div>
                </div>
                <br><br><br>
                <div class="form-inline">
                    <div class="col-md-4">
                    <label>Couleur bandeau :</label>
                    </div>
                    <div>
                        <input type="text" name="couleur_bandeau" value="#000000" class='form-control input-lg' >
                    </div>
                </div>
                <br><br><br>
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label>Position bandeau :</label>
                    </div>
                    <select  class="form-control input-lg">
                        <option value=gauche >gauche</option>
                        <option value=droite>droite</option>
                        <option value=centre>centre</option>
                    </select>
                </div>
                <br><br><br>
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label>Taille bandeau :</label>
                    </div>
                        <input type="text" name="taille_bandeau" value="20" class='form-control input-lg'><span class="unit">Px</span>
                </div>

                <br><br><br>
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label>Taille texte :</label>
                    </div>
                    <div>
                        <input type="text" name="taille_texte" value="28" class='form-control input-lg'><span class="unit">%</span>
                    </div>
                </div>
    <input type="hidden" value="<?php $this->fValue('id');?>" class="form-control" id="<?php $this->fName('id')?>" name="<?php $this->fName('id')?>">
</form>