<?php
session_start();
include_once('dbconnexion.php');

class Topic{

  private $name;
  private $topic;
  private $db;
  private $id_category;

  //constructor
  public function __construct($name, $topic, $id_category){
    $this->setName($name);
    $this->setTopic($topic);
    $this->db = dbase();
    $this->id_category = $id_category;


  }
  //getters creation
  public function getName(){
    return $this->name;
  }

  public function getTopic(){
    return $this->topic;
  }

  //setters creation
  public function setName($name){
    $this->name = $name;
  }

  public function setTopic($topic){
    $this->topic = $topic;
  }


  //set into database function
  public function insert(){
      $request = $this->db->prepare('INSERT INTO topic(name, topic, id_category)
       VALUES(:name, :topic, :id_category)');
      $request->execute(array(
                'name' => $this->name,
                'topic' => $this->topic,
                'id_category' =>$this->id_category
      ));
      return 1;
  }
}
 ?>
