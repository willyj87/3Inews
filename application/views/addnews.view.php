<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/01/17
 * Time: 02:34
 */
defined('3INEWS') or die('Acces Denied');
$this->addStyleSheets('css/accueil.css');
$this->setPageTitle('Nouvelle news');
$this->addForm->render();

$image = addslashes(file_get_contents($_FILES['images']['tmp_name']));

?>
<pre><?php print_r($_POST)?>/pre>

