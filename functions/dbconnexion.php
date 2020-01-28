<?php
function dbase(){
  try {

        $db = new PDO('mysql:hostname=localhost;dbname=forumdb',
         'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  } catch (Exception $e) {
    die('Errotr: '.$e->getMessage());
  }

  return $db;
}


 ?>
