<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/01/17
 * Time: 23:34
 */

namespace inews;

defined('3INEWS') or die("Access Denied");

use F3il\Database;

class NewsModel
{
    public function liste(){
        $db = Database::getInstance();

        $sql = "SELECT * FROM news ORDER BY 'date'";
        try {
            $req  = $db->prepare($sql);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \F3il\Error
     * @throws \F3il\SqlError
     * REcuperer les informations d'une news à partir de son id
     */
    public function listenews($id){
        $db = Database::getInstance();

        $sql = "SELECT * FROM news WHERE id=:id";
        try {
            $req  = $db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }
    /** Selection de l'utilisateur ayant crée une news */
    public function newsuser($id)
    {
        $db = Database::getInstance();
        $sql = "SELECT nom,prenom From utilisateur JOIN user_news ON utilisateur.id = user_news.id_u JOIN news ON user_news.id_n = news.id WHERE user_news.id_n =:id";
        try {
            $req  = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();

        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**Selection des news encours de diffusion*/
    public function newsdiff(){
        $db = Database::getInstance();
        $sql = "SELECT DISTINCT id,image,date,ordre,duree,texte FROM news INNER JOIN news_diff ON news.id = news_diff.id_n WHERE id_n=news.id ORDER BY ordre";
        try {
            $req  = $db->prepare($sql);
            $req->execute();

        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    /** Selection des images d'un utilisateurs */
    public function imguser($id){
        $db = Database::getInstance();
        $sql = 'SELECT news.id,image,texte,ordre FROM news INNER JOIN user_news ON news.id = user_news.id_n INNER JOIN utilisateur ON user_news.id_u = utilisateur.id WHERE id_u=:id';
        try {
            $req  = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();

        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function insertuser_n(){
        $auth = \F3il\Authentication::getInstance();
        $user = $auth->getLoggedUser();
        $id = 13;
        $db = Database::getInstance();
        $sql = "INSERT INTO user_news SET id_u=:id_u,id_n=:id_n";
        try{
            $req = $db->prepare($sql);
            $req->bindValue(':id_u',$user['id']);
            $req->bindValue(':id_n',$id);
        }catch (\PDOException $ex){
            throw new SqlError($sql,$req,$ex);
        }
    }
    public function add($data){
        $sqlTime = date('Y-m-d H:i:s');
        $db = Database::getInstance();
        $sql = "INSERT INTO news SET 'texte'=':texte', 'ordre'=':ordre', 'image'=':image', 'duree'=':duree','date'=':date'";
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':texte', $data['texte']);
            $req->bindValue(':ordre', $data['ordre']);
            $req->bindValue(':image', $data['image']);
            $req->bindValue(':duree', $data['duree']);
            $req->bindValue(':date',$sqlTime);
            $req->execute();
        } catch (PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        $this->insertuser_n();
    }
    public function update($data)
    {
        $db = Database::getInstance();
        $sql = "UPDATE news SET texte=:texte WHERE id=:id";
        try{
            $req = $db->prepare($sql);
            $req->bindValue(':texte',$data['texte']);
            $req->bindValue(':id',$data['id']);
            $req->execute();
        }catch (\PDOException $ex){
            throw new \F3il\SqlError($sql,$req,$ex);
        }
    }

}