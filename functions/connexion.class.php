<?php
session_start();
include_once('dbconnexion.php');

class Connexion{
  private $name;
  private $password;
  private $db;

  public function __construct($name, $password){
    $this->setName($name);
    $this->setPassword($password);
    $this->db = dbase();

  }

  public function setName($name){
    $this->name = $name;}

  public function setPassword($password){
    $this->password = $password;
  }

  public function getName(){
    return $this->name;
  }

  public function getPassword(){
    return $this->password;
  }

  //verification function
  public function verify(){
    $request = $this->db->prepare('SELECT * FROM register WHERE name = :name');
    $request->execute(array('name'=> $this->name));
    $request = $request->fetch();
    if($request){
      //conditon for the correct set name
      if($this->password == $request['password']){
        return 'ok';
      }
      //condion for the incorrect password
      else {
        $error = 'incorrect password';
        return $error;
      }
    }
    else {
      $error = 'The name is not avalable';
      return $error;
    }
  }

  //set session
  public function session(){
    $request = $this->db->prepare('SELECT id from register where name=:name');
    $request->execute(array('name'=>$this->name));
    $request = $request->fetch();
    $_SESSION['id'] = $request['id'];
    $_SESSION['name'] = $this->name;
    return 1;

  }
}
 ?>
