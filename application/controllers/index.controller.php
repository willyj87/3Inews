<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:26
 */
namespace inews;
use F3il\Authentication;
use F3il\Controller;
use F3il\Messages;
use F3il\Messenger;
use F3il\Page;
use F3il\HttpHelper;


defined('3INEWS') or die('Acces Denied');


class IndexController extends Controller
{
    
   public function __construct()
    {
      //  $this->redirectUnauthenticated('?controller=index');
        $this->setDefaultActionName('viewer');
    }
    public function viewerAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('viewer');
        $page->setView('viewer');
        $listnews = new NewsModel();
        $page->news = $listnews->newsdiff();
    }
    public function viewerconnectAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('viewerconnect');
        $page->setView('viewer');
        $listnews = new NewsModel();
        $page->news = $listnews->newsdiff();
    }
    public function viewerconnectredacAction()
    {
        $page = Page::getInstance();
        $page->setTemplate('viewerconnectredac');
        $page->setView('viewer');
        $listnews = new NewsModel();
        $page->news = $listnews->newsdiff();
    }

    public function indexAction()
    {
        $msg = 'Erreur Login/Mot de Passe';
        $page = Page::getInstance();
        $page->setTemplate('index');
        $page->setView('index');
        $login = new LoginForm('?controller=index&action=index');
        $page->login= $login;
        if ($login->isSubmitted() == false){
            return;
        }
        $page->login->loadData(INPUT_POST);
        $valid = $login->isValid();
        if ($valid == false){
            Messages::addMessage($msg,2);
            return;
        }
        $data = $login->getData();
        $lire = new UtilisateurModel();
        $statut = $lire->lirelogin($data['login']);
        $auth = Authentication::getInstance();
        print_r($data);
        if (!$auth->login($data['login'],$data['motdepasse'])){
            Messages::addMessage($msg,2);
            return;
        }
        if ($statut['statut'] == 'administrateur')

            $this->redirectAuthenticated('?controller=news&action=diffusion');
        else
            $this->redirectAuthenticated('?controller=news&action=redac');


    }
}
        