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
        $page->diff =$listnews;
        $page->diffuser = $listnews;
    }

    /**
     * @throws Error
     * Supression des news
     */
    public function deleteAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelsupprimer = new NewsModel();
        $id = $_POST['id'];
        $modelsupprimer->delete($id);
        Messenger::setMessage('Suppression éffectué');
        HttpHelper::redirect('?controller=news&action=redac');
    }

    /**
     * @throws Error
     * @throws \F3il\SqlError
     * Edition des news
     */
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

    /**
     * @throws Error
     * @throws \F3il\SqlError
     * Ajout de news
     */
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
    public function delnewsAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelsupprimer = new NewsModel();
        $id = $_POST['id'];
        $modelsupprimer->deletediff($id);
        Messenger::setMessage('Suppression complète');
       HttpHelper::redirect('?controller=news&action=diffusion');
    }
    public function addAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelinsert = new NewsModel();
        $id = $_POST['id'];
        $modelinsert->addDiff($id);
        Messenger::setMessage('Ajout complet');
        HttpHelper::redirect('?controller=news&action=diffusion');
    }
    public function removeAction(){
        if(!filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) or filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) == null)
            throw new Error("Erreur de formulaire");
        $modelsupprimer = new NewsModel();
        $id = $_POST['id'];
        $modelsupprimer->rmNews($id);
        Messenger::setMessage('Retrait complet');
        HttpHelper::redirect('?controller=news&action=diffusion');
    }

}