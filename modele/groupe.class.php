<?php
include_once('connexion.php');

class tgroup
{
    //CONSTRUCTEUR
    public function __construct()
    {
    }
    //GETTEURS
    //METHODES
    public static function ajouter($idGr,$idFon)
    {
      if (con()->query('INSERT INTO tgroup (idGroup) VALUES ('.$idGr.')')) {

                include_once('fonctionnalite.class.php');
                include_once('permission.class.php');
                
                $ListFonct = fonctionnalite::listerFonctionnalite();
                $ajt =0;
                $mo =0;
                $aff = 0;
                $sup = 0;
                
                foreach ($ListFonct as $selFct) {
                    permission::ajouter($aff, $ajt, $mo, $sup, $idGr,$selFct['idFonct']);
                }
                return $idGr;
            } else {
                return false;
            }
    }



    public static  function supprimer($idGp)
    {
        
        if (con()->exec('DELETE FROM tgroup WHERE idGroup=' . $idGp)) {
            include_once('permission.class.php');
            if (permission::sup_perm_group($idGp)) {
                 return true;
            } else {
                return false;
            };
        } else {
            return false;
        }
    }


    public static function listerGroupe()
    {
        return  con()->query('SELECT * FROM tgroup ORDER BY idGroupe')->fetchAll();
    }


    //DESTRUCTEUR
    public static  function __destuct()
    {
    }
}
