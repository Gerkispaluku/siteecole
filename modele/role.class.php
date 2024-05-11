<?php
include_once('connexion.php');
class role
{
  //CONSTRUCTEUR
    public function __construct()
    {

    }
    //METHODES
    public static function ajouter($idGroup, $idUtil)
    {
       
        if (con()->query('INSERT INTO trole (idGroup, idUtil) VALUES ('.$idGroup.'.'.$idUtil.')')) {
            return true;
        } else {
            return false;
        }
    }
    public function desactiverPrecRlEcole($idUtil)
    {
        if (con()->exec('UPDATE trole SET etatRol=0 WHERE idUtil =' . $idUtil)) {
            return true;
        } else {
            return false;
        }
    }

    public static function selectionnerDerRoleUti($idUti)
    {
        return  con()->query('SELECT * FROM trole WHERE etatRol=1 AND idUtil=' . $idUti . ' ORDER BY idRol DESC LIMIT 1')->fetchAll();
    }

     public function __destuct()
    {
    }
}
