<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/12/16
 * Time: 21:26
 */
namespace inews;
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

defined('3INEWS') or die('Access Denied');

Class NewsController extends Controller{
    
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
     * Fonction de modification des news
     */
    public function editerAction(){
        $page = Page::getInstance();
        $page->setTemplate('redacteur');
        $page->setView('edition');
    }

    /**
     * Méthode permettant de visualiser les diffusion
     */
    public function diffusionAction(){
        $page = Page::getInstance();
        $page->setTemplate('news');
        $page->setView('diffusion');
        $listnews = new NewsModel();
        $page->news = $listnews->liste();
        $page->diff = $listnews;
        $page->usernews = $listnews;
    }

    /**
     *Action principale du redacteur, page d'accueil du redacteur
     */
    public function redacAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('redacteur');
        $page->setView('accueil');
        $listnews = new NewsModel();
        $page->news = $listnews;
    }
    public function diffusionnews()
    {
        $page = Page::getInstance();
        $page->setTemplate('news');
        $page->setView('diffusion');
        $listnews = new NewsModel();
        $page->news = $listnews->liste();
        $page->usernews = $listnews;

    }
    public function editnewsAction(){
        $page = Page::getInstance();
        $model = new NewsModel();
        $page->sesnews = $model;
        $page->setTemplate('redacteur');
        $page->setView('edition');
        $edit = new EditForm('?controller=news&action=editnews');
        $id = $_POST['id'];
        $page->editionForm = $edit;
        $editmo = $model->listenews($id);
        if ($edit->isSubmitted()==false){
            $page->editionForm->loadData($editmo);
            return;
        }
        $page->editionForm->loadData(INPUT_POST);
        $valid = $page->editionForm->isValid();
        if ($valid == false) {
            return;
        }
        $data = $edit->getData();
        $model->update($data);
        Messenger::setMessage("La news a bien été modifié");
        HttpHelper::redirect('?controller=news&action=redac');

    }
    public function addnewsAction(){
        $page = Page::getInstance();
        $createModel = new NewsModel();
        $page->setTemplate('redacteur');
        $page->setView('addnews');
        $add = new AddForm('?controller=news&action=addnews');
        $add->id = 0;
        $page->addForm = $add;
        if ($add->isSubmitted()==false){
            return;
        }
        $page->addForm->loadData(INPUT_POST);
        $valid = $add->isValid();
        if ($valid == false) {
            return;
        }
        $data = $add->getData();
        if (key($data) != 'id' || key($data) != 'creation')
            $createModel->add($data);
        Messenger::setMessage("La news ".$data['texte']." a bien été enregistré");
        HttpHelper::redirect('?controller=news&action=redac');

    }

}