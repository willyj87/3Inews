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
        $model = new NewsModel();
        $page->news = $model->liste();
        $page->usernews = $model;
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
        $page->news = $listnews->liste();
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
        $creerModel = new UtilisateurModel();
        $page->setTemplate('redacteur');
        $page->setView('edition');
        $edit = new EditForm('?controller=news&action=editnews');
        $edit->id = 0;
        $page->editionForm = $edit;
        if ($edit->isSubmitted()==false){
            return;
        }
        $page->editionForm->loadData(INPUT_POST);
        $valid = $edit->isValid();
        if ($valid == false) {
            return;
        }
        $data = $edit->getData();
        if (key($data) != 'id' || key($data) != 'creation')
            $creerModel->creer($data);
        Messenger::setMessage("News ".$data['nom']." ".$data['prenom']." a bien été modifié");
        HttpHelper::redirect('?controller=utilisateur&action=lister');

    }
    public function addnewsAction(){
        $page = Page::getInstance();
        $creerModel = new NewsModel();
        $page->setTemplate('redacteur');
        $page->setView('addnews');
        $add = new AddForm('?controller=news&action=addnews');
        $add->id = 0;
        $page->addForm = $add;
        $page->image = '';
        if ($add->isSubmitted()==false){
            return;
        }
        $page->addForm->loadData(INPUT_POST);
        $valid = $add->isValid();
        if ($valid == false) {
            return;
        }
        $data = $add->getData();
        $data['image'] = $page->image;
        print_r($data);
        $creerModel->add($data);
        //HttpHelper::redirect('?controller=news&action=redac');

    }
}