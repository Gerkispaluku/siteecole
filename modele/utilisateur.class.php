<?php
include_once('connexion.php');
class utilisateur
{ 
    public function __construct()
    {

    }
    //GETTEURS
  
    private static function initialog($nom, $postnom, $prenom)
    {

        $part1 = '';
        $part2 = '';
        $part3 = '';

        $tabNom = array();
        $tabPost = array();
        $tabPre = array();
        if ($nom != '') {
            $tabNom = str_split(strtoupper($nom));
            $part1 = $tabNom[0];
        }
        if ($postnom != '') {
            $tabPost = str_split(strtoupper($postnom));
            $part2 = $tabPost[0];
        }
        if ($prenom != '') {
            $tabPre = str_split(strtoupper($prenom));
            $part3 = $tabPre[0];
        }

        return $part1 . $part2 . $part3 . rand(1, 100);
    }
    
    
    public static function ajouter($nomUtil, $postnomUtil, $prenomUtil, $idSexe, $imageUtil)
    {

        $intiallog = utilisateur::initialog($nomUtil, $postnomUtil, $prenomUtil);
        $nomLog =   $intiallog;
        $passLog =  $intiallog;

        $req = con()->prepare('INSERT INTO utilisateur (nomUtil, postnomUtil, prenomUtil, idSexe,imageUtil, nomLog, passLog) VALUES (?,?,?,?,?,?,?)');
        if ($req->execute(array($nomUtil, $postnomUtil, $prenomUtil, $idSexe, $imageUtil, $nomLog, $passLog))) {
           return true;
        } else {
            return false;
        }
    }

    public static function modifier($idUtil, $nomUtil, $postnomUtil, $prenomUtil, $idSexe, $imageUtil, $nomLog, $passlog)
    {
    if (con()->exec('UPDATE utilisateur SET nomUtil="' . $nomUtil . '",postnomUtil="' . $postnomUtil . '",prenomUtil="' . $prenomUtil . '",idSexe="' . $idSexe . '",imageUtil="' . $imageUtil . '",nomLog="' . $nomLog . '",passlog="' . $passlog . '" WHERE idUtil="' . $idUtil . '"')) {
        return true;
        } else {
            return false;
        }
    }
 
    public static function supprimer($idUtil)
    {
        if (con()->exec('DELETE FROM utilisateur WHERE idUtil="' . $idUtil . '"')) {
           
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return con()->query('SELECT * FROM utilisateur ORDER BY idUtil DESC')->fetchAll();
    }
    public static function selectionnerAdmin()
    {
        return con()->query('SELECT * FROM utilisateur WHERE idUtil<=0 ORDER BY idUtil DESC')->fetchAll();
    }
    public static function selectionnerByIdGroupeRoleActif($idGroupe)
    {
        return con()->query('SELECT pu.idUtil, pu.nomUtil, pu.postnomUtil, pu.prenomUtil, pu.idSexe, pu.imageUtil, rl.idRol, rl.idGroup FROM tutilisateur as pu LEFT JOIN trole as rl ON pu.idUtil=rl.idUtil LEFT JOIN tgroupe as pg ON rl.idGroup=pg.idGroup  WHERE rl.etatRol=1 AND pg.idGroup=' . $idGroupe . ' ORDER BY pu.idUtil DESC')->fetchAll();
    }

  

    public static function rechercher($idUtil)
    {
        return con()->query("SELECT * FROM tutilisateur as pu INNER JOIN tsexe as ts ON ts.idSexe=pu.idSexe WHERE pu.idUtil=".$idUtil)->fetchAll();
       
    }

    public static function log($lg, $ps)
    {
            return con()->query('SELECT * FROM utilisateur as ut LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE nomLog="' . $lg . '"AND passLog="' . $ps . '"')->fetch();
    }
    public function __destuct()
    {
    }
}
