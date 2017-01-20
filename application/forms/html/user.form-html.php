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
        <?php $action = $this->getAction(); ?>
        <form id="user-form" method="POST" action="<?php echo $action;?>" class="form-horizontal">
                <?php FormHelper::input($this,'nom','text');?>
                <?php FormHelper::input($this,'prenom','text');?>
                <?php FormHelper::input($this,'login','text');?>
                <?php FormHelper::input($this,'motdepasse','text');?>
                <?php FormHelper::input($this,'confirmation','text');?>
            <div class="form-group">
                <label for="<?php $this->fName('statut'); ?>" class="col-sm-2 control-label"><?php $this->fLabel('statut') ;?> :</label>

                <?php
                    if ($action == '?controller=utilisateur&action=editer')
                    {
                        $disable = 'disabled = "disabled"' ;
                    }
                    else{
                        $disable= '';
                    }
                ?>
                <div class="col-sm-10">
                    <select <?php echo $disable;?> class="form-control" name="<?php $this->fName('statut')?>">
                        <?php
                            if ($disable != '')
                                echo '<option>'.$this->fValue('statut').'</option>';
                            else
                            echo '<option>Redacteur</option><option>Administrateur</option>';
                        ?>
                    </select>
                </div>
            </div>
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


