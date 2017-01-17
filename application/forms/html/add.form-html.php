<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/01/17
 * Time: 02:32
 */
namespace inews;
defined("3INEWS") or die("Access Denied");
?>
<form action="<?php echo $this->getAction()?>" method="POST" enctype="multipart/form-data" id="add-form">
    <div class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" id="<?php $this->fName('texte'); ?>" name="<?php $this->fName('texte'); ?>" placeholder="<?php $this->fLabel('texte')?>" value="<?php $this->fValue('texte');?>">
            <?php //$this->fMessages('login');?>
        </div>
    </div>

    <div class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" id="<?php $this->fName('ordre'); ?>" name="<?php $this->fName('ordre'); ?>" placeholder="<?php $this->fLabel('ordre')?>" value="<?php $this->fValue('ordre');?>">
            <?php //$this->fMessages('login');?>
        </div>
    </div>
    <div class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" id="<?php $this->fName('duree'); ?>" name="<?php $this->fName('duree'); ?>" placeholder="<?php $this->fLabel('duree')?>" value="<?php $this->fValue('duree');?>">
            <?php //$this->fMessages('login');?>
        </div>
    </div>
    <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file" ><span class="fileupload-new">Select file</span>
    <span class="fileupload-exists">Change</span>
        <input type="file" id="images" name="images">
    </span>
        <span class="fileupload-preview"></span>
        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
    </div>
    <input type="hidden" class="form-control" id="<?php $this->fName('id'); ?>" name="<?php $this->fName('id'); ?>" placeholder="<?php $this->fLabel('id')?>" value="<?php $this->fValue('id');?>">
    <button type="submit" class="btn btn-default">Creer</button>
</form>
<?php $images = addslashes(file_get_contents($_FILES['images']['tmp_name']));?>

