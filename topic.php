<?php

include_once('functions/dbconnexion.php');
include_once('functions/topic.class.php');
$db = dbase();

//get the category id in uri
if(isset($_GET['id_category'])){
  $_SESSION['id_category'] = $_GET['id_category'];
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
    <h1>FORUM</h1>
    <?php echo "Welcome : ".$_SESSION['name'].' <a class="btn btn-danger"  href="deconnexion.php">Deconnect</a>'; ?>

    <hr>

    <div class="informations" style="margin:50px;">
      <?php
      if(isset($_POST['name']) AND isset($_POST['topic'])){

        $topic = new Topic($_POST['name'], $_POST['topic'], $_SESSION['id_category']);
        if($topic->insert()){
          header('Location: index.php');
        }
        else {
          echo "error";
        }
      }

      else if (isset($_GET['topic']) AND isset($_GET['topicName'])) {
        echo " work";
        echo $_SESSION['topic'];
        print_r($_SESSION);
      }
      else {
        // code...

       ?>

        <form method="post" action="topic.php">
            <legend>Add topic</legend>
            <hr />

            <label>Name : </labe l>
            <input type="text" name="name" class="form-control" required/>

            <br />

            <label>topic : </label>
            <textarea name="topic" class="form-control" required>  </textarea>

            <br />
            <button class="btn btn-default" type="submit">Validate</button>

        </form>
      <?php
      }
      ?>
    </div>


  </body>
</html>
