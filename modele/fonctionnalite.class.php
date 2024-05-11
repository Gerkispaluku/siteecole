<?php
include_once('connexion.php');
    class fonctionnalite {
        public function __construct(){

        }
        public static function listerFonctionnalite(){
            return con()->query('SELECT * FROM tfonctionnalite ')->fetchAll();
        }
    }
