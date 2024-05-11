<?php
   function con(){
    try {
        $host="localhost";
        $db="site_ecole";
        $user="root";
        $pwd="";
        $con = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
        return $con;
    } catch (PDOException $e) {
        echo 'CONNEXION A LA BASE DE DONNEES A ECHOUE';
    }
       
   }
   