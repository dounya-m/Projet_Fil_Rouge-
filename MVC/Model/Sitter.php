<?php
require_once './Config/Database.php';

class Sitter
{

    static public function all()
    {
        $stmt = Db::connect()->prepare('SELECT * FROM petsitters');
        $stmt->execute();
        $result = $stmt->fetchAll((PDO::FETCH_ASSOC));
        return $result;
    }

    static public function creat($nom, $prenom, $email, $phone, $fileName, $ville, $adress, $description, $password)

    {
        $date = date("j F- Y");
        $stmt = Db::connect()->prepare('INSERT INTO petsitters 
        (`date`, `nom`, `prenom`, `email`, `phone`, `ps_profile`, `ville`, `adress`, `description`, `password`)
        VALUES (? , ?, ? , ? , ? , ? , ? , ? , ? , ?)');

        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $prenom);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $phone);
        $stmt->bindParam(6, $fileName);
        $stmt->bindParam(7, $ville);
        $stmt->bindParam(8, $adress);
        $stmt->bindParam(9, $description);
        $stmt->bindParam(10, $password);

        if ($stmt->execute()) {
            return 'success';
        } else {
            return 'error';
        }
    }

    static public function check($nom, $prenom)
    {
        $stmt = Db::connect()->prepare('SELECT nom , prenom FROM petsitters WHERE nom = ? and prenom = ?');
        $stmt->execute(array($nom, $prenom));
        if($stmt->rowCount() > 0){
            return 1;
        }
        return 0;
    
    }


    static public function siter($email, $password)
    {
        $stmt = Db::connect()->prepare('SELECT * FROM petsitters WHERE email = ?');
        $stmt->execute(array($email));
        $result = $stmt->fetchAll((PDO::FETCH_ASSOC));

        if(!empty($result)){
            if(password_verify($password, $result[0]['password'])){
                if( $stmt->execute(array($email))){
                    return $result;
                }
            }
        }else{
            return false;
        }
    }

    static public function delete($email, $password)
    {
        $stmt= Db::connect()->prepare('SELECT * FROM petsitters where email = ?');
    
        $stmt->execute(array($email));
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($res)){
        if(password_verify($password, $res[0]['password'])){
            $stmt2= Db::connect()->prepare('DELETE FROM petsitters where email = ?');
            if( $stmt2->execute(array($email))){
                return true;
            }
        }
        }
        return false;
    }

    static public function oneSitter($id_sitter)
    {
        $stmt = Db::connect()->prepare('SELECT * FROM petsitters WHERE id_sitter = ?');
        $stmt->bindParam(1, $id_sitter);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}