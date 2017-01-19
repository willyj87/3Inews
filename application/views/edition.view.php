<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/01/17
 * Time: 16:08
 */
namespace inews;
use F3il\Authentication;
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/edition.css');
$this->setPageTitle('Edition de News');
$this->editionForm->render();
$auth = Authentication::getInstance();
$user = $auth->getLoggedUser();
?>
<div class="container-fluid">
    <div class="row">
        <?php
        $image = $this->sesnews->imguser($user['id']);
        foreach ($image as $data){
            ?>
            <div class = "col-md-1">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'" alt="news1" class="img-responsive img-thumbnail" style="width: 120%;"/>';?>
            </div>
        <?php
                }
        ?>
    </div>
</div>

