<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/01/17
 * Time: 23:42
 */
namespace inews;
defined("3INEWS") or die("Access Denied");
?>
<div class="col-sm-10">
    <div class="form-group">
        <form id="user-form" method="POST" action="<?php echo $this->getAction();?>" class="form-horizontal">
                <?php FormHelper::input($this,'nom','text');?>
                <?php FormHelper::input($this,'prenom','text');?>
                <?php FormHelper::input($this,'login','text');?>
                <?php FormHelper::input($this,'motdepasse','text');?>
                <?php FormHelper::input($this,'confirmation','text');?>
                <span><?php $this->flabel('statut')."\t";?></span><select name="<?php $this->fname('statut')?>">
                    <option value="<?php $this->fValue('statut')?>">Administrateur</option>
                    <option value="<?php $this->fValue('statut')?>">Redacteur</option>
                </select>
                <?php CsrfHelper::csrf();?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </div>
            </div> 
            <input type="hidden" value="<?php $this->fValue('id');?>" class="form-control" id="<?php $this->fName('id')?>" name="<?php $this->fName('id')?>">
        </form>
    </div>
</div>


