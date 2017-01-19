<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/01/17
 * Time: 10:15
 */
$host = 'localhost';
$dbname = '3inews';
$login = 'root';
$password = 'admin';

try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,$login,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erreur connexion BDD ".$ex->getMessage());
}
        $sql = "SELECT DISTINCT id,date,ordre,duree,texte FROM news INNER JOIN news_diff ON news.id = news_diff.id_n WHERE id_n=news.id ORDER BY ordre";
        try {
            $req  = $db->prepare($sql);
            $req->execute();

        } catch (\PDOException $ex) {
            throw new \F3il\SqlError($sql,$req,$ex);
        }
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($result);

