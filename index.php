<?php

include_once('functions/dbconnexion.php');
include_once('functions/post.class.php');
$db = dbase();
if(!isset($_SESSION['id'])){
  header('Location: inscription.php');
}
else {

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- include of the bootstrap file for the style need-->

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="./css/index.css" type="text/css" />

  </head>
  <body>
    <!--the header body for the forum main display -->
    <div style="background:green; color:white">
      <h1>FORUM</h1>
      <?php echo "Welcome : ".$_SESSION['name'].' <a class="btn btn-danger"  href="deconnexion.php">Deconnect</a>'; ?>

      <hr>
    </div>

      <?php
      //condition for the set of name and id category for the
      //category chosed
      if ((isset($_GET['name']) AND isset($_GET['id_category'])) ) {
        //inside one of the categories

        //Condition for adding q new post for the topic
        if(isset($_POST['post'])){
          if (strlen($_POST['post']) >= 5) {
            // code...
            $post = new Post($_GET['id_topic'], $_SESSION['name'], $_POST['post']);
            if($post->insert()){
              //
              header("Location: index.php?name=".$_GET['name']."&id_category=".$_GET['id_category']);
            }
          }
          //condition to output the error when the post is too short
          else if(isset($_GET['id'])){

            $postError = 'Post too short';
            $postId = $_GET['id'];
            ?>
            <p style="color:red"><?php echo $postError; ?></p>
            <?php
          }


        }
      ?>
      <div class="topic_header">
        <a class="btn btn-success"  href=<?php echo "topic.php?id_category=".$_GET['id_category'] ?>>Add topic</a>
        <h2>
          <?php
            ?>
           <strong><?php echo $_GET['name'];?></strong><br><br>

             <?php
          ?>
        </h2>
        <p>
      </div>

<div class="container-fluid">


        <?php
        //request to select all topic in the data base
        $request2 = $db->query('SELECT * FROM topic WHERE id_category='.$_GET['id_category']);
        while ($response = $request2->fetch()){

          //loop to display the topic for the category with his open button
          ?>
          <div style="background:aqua">
            <strong><?php echo $response['name']; ?></strong><br>
            <p><?php echo $response['topic']; ?></p>
          </div>

          <?php

          //set the topic opended information in session
          $request3 = $db->query('SELECT * FROM post WHERE id_topic ='.$response['id'] );
          //loop for the display for the posts for evrey topic add
          while ($resp = $request3->fetch()){
            echo '['.$resp['date'].'] ';
            echo '<strong>'.$resp['author'].'</strong><br/>';
            echo $resp['post'].'<br/><br/>';
          }

           ?>

           <form class="" action=<?php echo "index.php?name=".$_GET['name'].'&id_category='.$_GET['id_category'].'&id_topic='.$response['id'].'&id='.$response['id'];?> method="post">
             <textarea name="post" class="form-control" required>  </textarea>

             <input type="submit" class="btn btn-success" value="Validate post" required/>
             <?php
             //output of the error when the post is too short
             // if (isset($postError) ) {
             //   echo $postError;
             //   echo $postId;
             //   print_r($request3);
             // } ?>
             <br/><br/><br/>
           </form>


          <?php
      //end of the if scope
        }
       ?>
     </p>


</div>
      <?php

      }
      else {
        // inside the normal page (categories)
      ?>
       <div class="container">
         <h3>Categories</h3>
         <?php
           $request = $db->query('SELECT * FROM category');
           while ($response = $request->fetch()) {
             //loop to display the differents category in the application
          ?>
             <a href=<?php echo "index.php?name=".$response['name'].'&id_category='.$response['id']?>><br>
               <?php
               echo $response['name'];
               //$request2 = $db->query('SELECT * FROM topic WHERE id_category=')


                ?>
             </a><br/>
          <?php
           }
          ?>


      <?php
      //close of else scope
      }
      ?>





    </div>
  </body>
</html>
<?php
}
 ?>
