<?php
session_start( );
//data base inclusion
include_once('dbconnexion.php');
//creation for the register class
class Register{

  private $name;
  private $email;
  private $password;
  private $db;

  //constructor
  public function __construct($name, $email, $password){
    $this->setName($name);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->db = dbase();

  }
  //getters creation
  public function getName(){
    return $this->name;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPassword(){
    return $this->password;
  }

  //setters creation
  public function setName($name){
    $this->name = $name;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setPassword($password){
    $this->password = $password;
  }

  //set into database function
  public function inscription(){
      $request = $this->db->prepare('INSERT INTO register(name,
      email, password) VALUES(:name, :email, :password)');
      $request->execute(array(
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
      ));
      return 1;
  }

//set session
public function session(){
  $request = $this->db->prepare('SELECT id from register where name=:name');
  $request->execute(array('name'=>$this->name));
  $request = $request->fetch();
  $_SESSION['id'] = $request['id'];
  $_SESSION['name'] = $this->name;
  $_SESSION['email'] = $this->email;
  return 1;

}

}


 ?>
