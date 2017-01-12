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
        $page->utilisateurs = $model->lister();
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
    }

    /**
     *Action principale du redacteur, page d'accueil du redacteur
     */
    public function redacAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('redacteur');
        $page->setView('accueil');
    }
    public function addnewsAction(){
        $page = Page::getInstance();
        $page->setTemplate();
        $page->setView();
        $add = new addForm();
        $page->add = $add;

    }
    public function adduserAction(){

    }
}