<?php
session_start();
include_once('dbconnexion.php');

class Post{

  private $id_topic;
  private $author;
  private $db;
  private $post;

  //constructor
  public function __construct($id_topic, $author, $post){
    $this->setAuthor($author);
    $this->setIdTopic($id_topic);
    $this->setPost($post);
    $this->db = dbase();



  }
  //getters creation
  public function getAuthor(){
    return $this->author;
  }

  public function getIdTopic(){
    return $this->id_topic;
  }

  public function getPost(){
    return $this->post;
  }

  //setters creation
  public function setAuthor($author){
    $this->author = $author;
  }

  public function setIdTopic($id_topic){
    $this->id_topic = $id_topic;
  }

  public function setPost($post){
    $this->post = $post;
  }


  //set into database function
  public function insert(){
      $request = $this->db->prepare('INSERT INTO post(id_topic, author, post)
       VALUES(:id_topic, :author, :post)');
      $request->execute(array(
                'id_topic' => $this->id_topic,
                'author' => $this->author,
                'post' =>$this->post
      ));
      return 1;
  }
}
 ?>
