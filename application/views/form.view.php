<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/01/17
 * Time: 03:30
 */

namespace inews;
use F3il\Messages;
defined('3INEWS') or die('Acces Denied');
$this->setPageTitle('Nouvel Utilisateur');
Messages::setMessageRenderer('\inews\MessagesHelper::messagesRenderer');

?>
<?php $this->liste_user->render();?>