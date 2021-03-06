<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/01/17
 * Time: 19:04
 */
namespace inews;
defined("3INEWS") or die("Access Denied");

use F3il\Form;
use F3il\Field;
use F3il\Error;
class UserForm extends Form{
    function __construct($action)
    {
        parent::__construct($action, 'user-form');

        /** @var TYPE_NAME $email */
        Form::addFormField($login = new Field('login','Login',null,true));
        Form::addFormField($nom = new Field('nom', 'Nom', null, true));
        Form::addFormField($prenom = new Field('prenom', 'Prenom', null, true));
        Form::addFormField($motdepasse = new Field('motdepasse', 'Mot de passe', null, true));
        Form::addFormField($id = new Field('id', 'Id', null, true));
        Form::addFormField($confirmation = new Field('confirmation', 'Confirmation', null, true));
        Form::addFormField($statut = new Field('statut','Statut',null,true));
    }
    /**
     * @param $message
     */
    function messageRenderer($message){
        ?>
        <p class="alert alert-danger">
            <i class="glyphicon glyphicon-remove-sign"></i> <?php echo $message;?>
        </p>
        <?php
    }
    /**
     * @param Field $field
     * @return TYPE_NAME|string
     */
    function missingFieldMessageRenderer(Field $field){
        $message = "Veuillez remplir le champ suivant ".strtolower($field->label);
        /** @var TYPE_NAME $message */
        return $message;
    }


    /**
     * @param $value
     * @return mixed
     */
    function nomFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function prenomFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }
    /**
     * @param $value
     * @return mixed
     */
    function loginFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function motdepasseFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }

    /**
     * @param $value
     * @return mixed
     */
    function confirmationFilter($value){
        return filter_var($value,FILTER_SANITIZE_STRING);
    }
    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function loginValidator($value){
        $loginValidator = new UtilisateurModel();
        if (strlen($value) < 6){
            $this->addMessage('login',$value.' login trop cours');
        }elseif ($loginValidator->loginExistant($this->login, $this->id) == true){
            $this->addMessage('login','Ce login existe déjà veuillez en choisir un autre');
        }
        else{
            return $value;
        }
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function motdepasseValidator($value){
        if (strlen($value) < 4)
            $this->addMessage('motdepasse','Mot de passe trop court');
        else
            return $value;
    }

    /**
     * @param $value
     * @return mixed
     * @throws Error
     */
    function confirmationValidator($value){
        if ($this->_field['confirmation']->value != $this->_field['motdepasse']->value)
            $this->addMessage('confirmation','Non identique au mot de passe');
        else
            return $value;
    }
    /**
     * @return bool
     */
    function isValid()
    {
        $valid = parent::isValid();
        if($this->id == 0)
            return $valid;
        if ($this->motdepasse != '' && $this->confirmation ==''){
            $valid = $this->confirmationValidator($this->confirmation) && $valid;
        }
        return $valid;
    }

}