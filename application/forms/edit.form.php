<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/01/17
 * Time: 15:43
 */
namespace inews;
defined("3INEWS") or die("Access Denied");

use F3il\Form;
use F3il\Field;
use F3il\Error;
class EditForm extends Form{
    function __construct($action)
    {
        parent::__construct($action,'edit-form');
        /** @var TYPE_NAME $email */
        Form::addFormField($image = new Field('image', 'Image', null, false));
        Form::addFormField($texte = new Field('texte', 'Texte', null, true));
        Form::addFormField($id = new Field('id', 'Id', null, true));

    }
}