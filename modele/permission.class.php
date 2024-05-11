<?php
    include_once("connexion.php");

    class permission{
        private static $idPerm;
        private static $affich;
        private static $ajout;
        private static $modif;
        private static $suppr;
        private static $idGroup;
        private static $idFonct;

        public function  __construct(){
            self::$idPerm=0;
            self::$affich=0;
            self::$ajout=0;
            self::$modif=0;
            self::$suppr=0;
            self::$idGroup=0;
            self::$idFonct=0;
        }
        //fonction d'ajout des nouvelles permissions
        public static function ajouter($aff, $ajt, $mo, $su, $idGr,$idFon){
            if(con()->exec('INSERT INTO tpermission (affich, ajout, modif, suppr, idGroup, idFonct) VALUES('.$aff.','.$ajt.','.$mo.','.$su.','.$idGr.','.$idFon.')')){
                return true;
            }else{
                return false;
            }

        }
        //Mappage des donnees en provenance de la base sde donnes
        public static function rechercher($idPerm){
            $perm=con()->query('SELECT * FROM tpermission WHERE idPerm='.$idPerm);
            foreach ($perm as $selPerm) {
                self::$idPerm=$selPerm['idPerm'];
                self::$affich=$selPerm['affich'];
                self::$ajout=$selPerm['ajout'];
                self::$modif=$selPerm['modif'];
                self::$suppr=$selPerm['suppr'];
                self::$idGroup=$selPerm['idGroup'];
                self::$idFonct=$selPerm['idFonct'];
            }
            return $perm;
        }

        //suppression des permission pr rapport aux groupes des utilisateurs
        public static function sup_perm_group($idGroup){
            if(con()->exec("DELETE FROM `tpermission` WHERE idGoup=".$idGroup)){
                return true;
            }else{
                return false;
            }


        }

        public static function listePermission(){
            return con()->query('SELECT * FROM tpermission as tp INNER JOIN tgroupe as tg ON tp.idGroup=tg.idGroup INNER JOIN tfonctionnalite as tf ON tp.idFonct = tf.idFonct')-> fetchAll();
        }
        public static function listePermissionIdGroup($idGroup){
            return con()->query('SELECT * FROM tpermission as tp INNER JOIN tgroupe as tg ON tp.idGroup=tg.idGroup INNER JOIN tfonctionnalite as tf ON tp.idFonct = tf.idFonct WHERE tp.idGoup='.$idGroup)-> fetchAll();
        }
        // creation d'une fonction de modifier l'ajout
        public static function setAjouter(){
            if(self::$ajout==0){
                $ajt=1;
            }else{
                $ajt=0;
            }
            if(con()->exec("UPDATE tpermission SET ajout=".$ajt." WHERE idPerm=".self::$idPerm)){
            self::$ajout=$ajt; 
            return true;
            }else{
                return false;
            }
            
        
    }
    // 
    public static function setModifier(){
        if(self::$modif==0){
            $mod=1;
        }else{
            $mod=0;
        }
        if(con()->exec("UPDATE tpermission SET modif=".$mod." WHERE idPerm=".self::$idPerm)){
        self::$modif=$mod; 
        return true;
        }else{
            return false;
        }
}
// 
public static function setAfficher(){
    if(self::$affich==0){
        $af=1;
    }else{
        $af=0;
    }
    if(con()->exec("UPDATE tpermission SET affich=".$af." WHERE idPerm=".self::$idPerm)){
    self::$affich=$af; 
    return true;
    }else{
        return false;
    }
}
//
public static function setSupprimmer(){
    if(self::$suppr==0){
        $sup=1;
    }else{
        $sup=0;
    }
    if(con()->exec("UPDATE tpermission SET suppr=".$sup." WHERE idPerm=".self::$idPerm)){
    self::$suppr=$sup; 
    return true;
    }else{
        return false;
    }
}
//

}
