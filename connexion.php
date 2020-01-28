<?php

include_once('functions/connexion.class.php');
include_once('functions/dbconnexion.php');
if (isset($_POST['name']) AND isset($_POST['password'])) {

  $connexion = new Connexion($_POST['name'], $_POST['password']);
  $verify = $connexion->verify();
  if ($verify == 'ok') {
    if($connexion->session()){
      header('Location: index.php');
    }
  }
  else {
    // code...
    $error = $verify;
  }
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" type="text/css" />

  </head>
  <body>
    <div style="background:green; color:white">
      <h1>FORUM</h1>
      <?php echo "Partage de connaissance sur les langages de programmation"; ?>

      <hr>
    </div>
    
    <div class="informations" style="margin:50px;">

        <form method="post" action="connexion.php">
            <legend>Connexion</legend>
            <hr />

            <label>Name : </labe l>
            <input type="text" name="name" class="form-control" required/>

            <br />

            <label>Password : </label>
            <input type="text" name="password" class="form-control" required/>

            <br />

            <button class="btn btn-default" type="submit">Validate</button>
            <?php
            if(isset($error)) {
              echo $error;
            }
             ?>
        </form>

    </div>



  </body>
</html>
