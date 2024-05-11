<?php
include_once("connexion.php");
    class sexe {
        private static $idSexe;
        private static $nomSexe;
        public function __construct(){
            self::$idSexe=0;
            self::$nomSexe="AUCUN";
        }
        public static function getIdSexe(){
            return self::$idSexe;
        }
        public static function getNomSexe(){
            return self::$nomSexe;
        }
        public static function setIdSexe($idSexe){
            return self::$idSexe;
        }
        public static function setNomSexe(){
            return self::$nomSexe;
        }
        public static function listeSexe(){
            return con()->query('SELECT * FROM tsexe')->fetchAll();
        }
        public static function ajouterSexe($nomSexe){
            return con()->exec('INSERT INTO tsexe (nomSexe) VALUES ("'.$nomSexe.'")');
       }
       public static function modifSexe($idSexe,$nomSexe){
        return con()->exec('UPDATE `tsexe` SET `nomSexe`="'.$nomSexe.'" WHERE idSexe='.$idSexe);
        }
        public static function supSexe($idSexe){
            return con()->exec('DELETE FROM `tsexe` WHERE idSexe='.$idSexe);
        }
        public static function rechercheSexe($nomSexe){
            return con()->query('SELECT * FROM tsexe   WHERE nomSexe like "%'.$nomSexe.'%"' )->fetchAll();
        }
    function __destruct(){

    }

    }
    sexe::listeSexe();