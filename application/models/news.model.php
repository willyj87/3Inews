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
}