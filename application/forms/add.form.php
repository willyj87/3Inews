<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/01/17
 * Time: 02:26
 */
namespace inews;
defined("3INEWS") or die("Access Denied");

use F3il\Form;
use F3il\Field;
use F3il\Error;
class AddForm extends Form{
    function __construct($action)
    {
        parent::__construct($action,'add-form');

        Form::addFormField($texte = new Field('texte', 'Texte', null, true));
        Form::addFormField($ordre= new Field('ordre', 'Ordre', null, true));
        Form::addFormField($duree = new Field('duree', 'Duree', null, true));
        Form::addFormField($id = new Field('id', 'Id', null, true));

    }
}