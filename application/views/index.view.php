<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:25
 */
namespace inews;
use F3il\Messages;

defined('3INEWS') or die('Acces Denied');

Messages::setMessageRenderer('\inews\MessagesHelper::messagesRenderer');
?>
