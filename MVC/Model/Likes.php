<?php

require_once './Config/Database.php';


class Likes
{


    static public function add($user_id, $post_id)
    {
        $stmt = Db::connect()->prepare('INSERT INTO likes (`user_id`,`post_id`) VALUE (?,?)');
        
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $post_id);

        if($stmt->execute())
        {
            return true;
        }else
        {
            return false;
        }
}

    static public function check($user_id,$post_id)
    {
    
        $stmt = Db::connect()->prepare('SELECT `user_id` , `post_id` FROM likes WHERE user_id = ? and post_id = ? ');
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $post_id);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return 1;
        }
            return 0;

    }

    static public function count($post_id)
    {
        $stmt = Db::connect()->prepare('SELECT COUNT(*) FROM likes WHERE post_id = ?');
        $stmt->bindParam(1, $post_id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    static public function delete($user_id,$post_id)
    {
        $stmt = Db::connect()->prepare('DELETE FROM likes WHERE user_id = ? and post_id = ? ');
        // $stmt->bindParam(1, $id_like);
        // $stmt->bindParam(1, $user_id);
        // $stmt->bindParam(2, $post_id);
        if($stmt->execute([$user_id,$post_id]))
        {
            return true;
        }  else
        {
            return false;
        }
    }










}

?>