<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/11/16
 * Time: 22:43
 */
namespace inews;
defined("3INEWS") or die("Access Denied");
use F3il\Application;
use F3il\Authentication;
use F3il\Configuration;
use F3il\Controller;
use F3il\Error;
use F3il\HttpHelper;
use F3il\Messages;
use F3il\Messenger;
use F3il\Page;
use F3il\Form;

class UtilisateurController extends Controller{

    public function __construct()
    {   
        $this->redirectUnauthenticated('?controller=index');
    }

    public function listerAction(){
        $page = Page::getInstance();
        $page->setTemplate("news");
        $page->setView("liste-utilisateurs");
        $model = new UtilisateurModel();
        $page->users = $model->lister();
        $message = Messenger::getMessage();
        if($message!=false)
            Messages::addMessage($message,0);

    }

    /**
     * @throws Error
     */
    public function editerAction(){
        $page = Page::getInstance();
        $listeModel = new UtilisateurModel();
        $page->setTemplate('news');
        $page->setView('form');
        $user = new UserForm('?controller=utilisateur&action=editer');
        $id = $_POST['id'];
        $page->liste_user = $user;
        $conf = $user->getField('confirmation');
        $conf->required = false;
        $mdp = $user->getField('motdepasse');
        $mdp->required = false;
        $model = $listeModel->lire($id);
        if ($user->isSubmitted() == false){
            $page->liste_user->loadData($model);
            $user->motdepasse = '';
            $user->confirmation = '';
            return;
        }
        $page->liste_user->loadData(INPUT_POST);
        $valid = $page->liste_user->isValid();
        if ($valid == false) {
            return;
        }
        $token = CsrfHelper::checkToken();
        if ($token == false){
            $page->message = 'Donnée de formulaire refusé';
            return;
        }
        $data = $user->getData();
        $listeModel->mettreAJour($data);
        Messenger::setMessage("les données de l'utilisateur ".$data['nom']." ".$data['prenom']." ont bien été modifié");
        HttpHelper::redirect('?controller=utilisateur&action=lister');
    }
    public function supprimerAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelsupprimer = new UtilisateurModel();
        $id = $_POST['id'];
        $modelsupprimer->supprimer($id);
        Messenger::setMessage('Suppression éffectué');
        HttpHelper::redirect('?controller=utilisateur&action=lister');
    }

    /**
     * Acion formulaire pour  la création utilisateur
     * @throws Error
     */
    public function creerAction(){
        $page = Page::getInstance();
        $creerModel = new UtilisateurModel();
        $page->setTemplate('news');
        $page->setView('form');
        $userform = new UserForm('?controller=utilisateur&action=creer');
        $userform->id = 0;
        $page->liste_user = $userform;
        if ($userform->isSubmitted()==false)
        {
            return;
        }
        $page->liste_user->loadData(INPUT_POST);
        $valid = $userform->isValid();
        if ($valid == false){
            return;
        }
        $data = $userform->getData();
        if (key($data) != 'id' || key($data) != 'creation')
            $creerModel->creer($data);
        Messenger::setMessage("L'utilisateur ".$data['nom']." ".$data['prenom']." a bien été enregistré");
        HttpHelper::redirect('?controller=utilisateur&action=lister');
    }
    public function deconnecterAction(){
        $auth = Authentication::getInstance();
        $auth->logout();
        HttpHelper::redirect('?controller=index');
    }
  
}