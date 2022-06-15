<?php
require_once './Config/Database.php';




class User
{
  static public function getAll()
  {
    
    $stmt = Db::connect()->prepare('SELECT * FROM user');
    $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }



  static public function getById($id)
  {
    $stmt = Db::connect()->prepare('SELECT * FROM user WHERE id = ?');
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }



  static public function add($name, $lastname, $tele, $fileName, $email, $password)
  {

    $stmt= Db::connect()->prepare('INSERT INTO user (`name`,`lastname`,`tele`,`image` ,`email` ,`password` ) 
    VALUES (?,?,?,?,?,?)');

    if($stmt->execute([$name, $lastname, $tele, $fileName, $email, $password]))
    {
      return 'success';
    
  }else
  {
    return 'error';
  }

  }

  static public function login($email, $password)
  {

    $stmt= Db::connect()->prepare('SELECT * FROM user where email = ?');
    
    $stmt->execute(array($email));
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if(password_verify($password, $res[0]['password'])){
      return $res;
    }else{
      return false;
    }
  }
  
  static public function getByEmail($email)
  {
    $stmt = Db::connect()->prepare('SELECT email FROM user WHERE email = ?');
    $stmt->execute(array($email));
    if($stmt->rowCount() > 0){
      return 1;
    }
    return 0;

}


}



?>