<?php
include_once('connexion.php');
class publication
{
  //CONSTRUCTEUR
    public function __construct()
    {

    }
    //METHODES
    public static function ajouter($resumePub, $imagePrefacePub, $detailPub, $idUtil)
    {
       
        if (con()->query('INSERT INTO tpublication (resumePub, imagePrefacePub, detailPub, idUtil) VALUES ("'.$resumePub.'","'. $imagePrefacePub.'","'. $detailPub.'","'. $idUtil.'")')) {
            return true;
        } else {
            return false;
        }
    }
  

    public static function listerPublication()
    {
        return  con()->query('SELECT * FROM tpublication as tp INNER JOIN tutilisateur as tu ON tp.idUtil=tu.idUtil')->fetchAll();
    }

     public function __destuct()
    {
    }
}
