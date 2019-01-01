<?php

/* 
 * Database connections
 */
function acmeConnect(){
   $server = 'localhost';
   $dbname = 'acme';
   $username = 'iClient';
   $password = '1heXHKwRhOAvH5kn';
   $dsn = "mysql:host=$server;dbname=$dbname";
   $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
   
   try{
      $link = new PDO($dsn, $username, $password, $options);
      return $link;
   } catch (Exception $ex) {
      header('Location: /acme/view/500.php');
      exit;
   }
}


