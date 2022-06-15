<?php 
require_once './Config/Database.php';


class Post
{

    static public function getAll()
    {
        $stmt = Db::connect()->prepare('SELECT * FROM post');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getId($id_user)
    {
        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id  WHERE id_user = ? ORDER BY post.id_p DESC');
        // $stmt->bindParam(1, $id_user);
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getPosts()
    {

        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id ORDER BY post.id_p DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    static public function add($fileName,$type,$animalName,$ville,$discription,$id_user)
    {
        $date = date("j F, Y, H:i");
        $stmt = Db::connect()->prepare('INSERT INTO post (`date`,`image_post`, `type`, `animalName`, `ville`, `discription`, `id_user`) 
        VALUES (?,?,?,?,?,?,?)');
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $fileName);
        $stmt->bindParam(3, $type);
        $stmt->bindParam(4, $animalName);
        $stmt->bindParam(5, $ville);
        $stmt->bindParam(6, $discription);
        $stmt->bindParam(7, $id_user);

        if($stmt->execute())
        {
            return 'success';
        }else
        {
            return 'error';
        }
    }

    static public function delete($id_p)
    {
        $stmt = Db::connect()->prepare('DELETE FROM post WHERE id_p = ?');
        $stmt->bindParam(1, $id_p);
        if($stmt->execute())
        {
            return 'success';
        }else
        {
            return 'error';
        }

    }

    static public function update($animalName,$discription,$id_p)
    {
        $stmt = Db::connect()->prepare('UPDATE `post` SET 
        animalName = ?,  discription = ? 
        WHERE id_p = ?');
        // $stmt->bindParam(1, $fileName);
        // $stmt->bindParam(2, $animalName);
        // $stmt->bindParam(3, $discription);
        // $stmt->bindParam(4, $id_p);
        if($stmt->execute([$animalName,$discription,$id_p]))
        {
            return 'success';
        }else
        {
            return 'error';
        }
    }

    static public function last()
    {
        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id ORDER BY post.id_p DESC LIMIT 5');
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function dog()
    {
        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id 
        WHERE type = "dog" ORDER BY post.id_p DESC ');
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function cat()
    {
        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id 
        WHERE type = "cat" ORDER BY post.id_p DESC ');
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function other()
    {
        $stmt = Db::connect()->prepare('SELECT post.* , user.id as id_user, user.name, user.lastname, user.image, user.email, user.tele 
        FROM post INNER JOIN user ON post.id_user = user.id 
        WHERE type = "other" ORDER BY post.id_p DESC ');
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}












?>