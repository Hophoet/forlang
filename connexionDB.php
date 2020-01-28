<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
$age = 15;
$personne = $bdd->query('SELECT * FROM personne WEHER age=\''.$age.'\'');

while ($person = $personne->fetch()) {
  // code...
  echo '<h2>'.$person['email'].'</h2><hr/>';
}
//fermeture du curseur d'analyse
$personne->closeCursor();
 ?>
