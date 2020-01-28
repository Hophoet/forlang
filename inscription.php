<?php

include_once('functions/register.class.php');

if(isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirmation'])){
  if ($_POST['password'] == $_POST['confirmation']) {
    $register = new Register($_POST['name'], $_POST['email'], $_POST['password']);
    if($register->inscription()){
      if($register->session()){
        echo "incription successfully";
        header('Location:index.php');
      }
    }

  }
  else {
    echo "incorrect password";
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

        <form method="post" action="inscription.php">
            <legend>Inscription</legend>
            <hr />

            <label>Name : </label>
            <input type="text" name="name" class="form-control" required/>

            <br />

            <label>Email : </label>
            <input type="text" name="email" class="form-control" required/>

            <br />

            <label>Password : </label>
            <input type="text" name="password" class="form-control" required/>

            <br />

            <label>Confirmation : </label>
            <input type="text" name="confirmation" class="form-control" required/>

            <br />

            <button class="btn btn-default" type="submit">Validate</button>
            <a class="btn btn-default" type="button" href='connexion.php'>sign In</a>

        </form>

    </div>



  </body>
</html>
