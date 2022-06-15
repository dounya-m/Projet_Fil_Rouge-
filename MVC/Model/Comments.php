<?php
require_once './Config/Database.php';

class Comments
{

    static public function add($id_us, $id_po, $post_comment)
    {
        $date = date("j F, Y, H:i");
        $stmt = Db::connect()->prepare('INSERT INTO comment (`date_comment`, `id_us`, `id_po`,`post_comment`) VALUES (?,?,?,?)');

        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $id_us);
        $stmt->bindParam(3, $id_po);
        $stmt->bindParam(4, $post_comment);

        if($stmt->execute())
        {
            return true;
        }else
        {
            return false;
        }

}

static public function getAll($id_po)
{

    $stmt = Db::connect()->prepare('SELECT comment.* , user.id as id_us, user.name, user.lastname, user.image, user.email, user.tele
    FROM user INNER JOIN comment WHERE id_po = ? and id_us = user.id');
    $stmt->bindParam(1, $id_po);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

static public function count($id_po)
{
    $stmt = Db::connect()->prepare('SELECT COUNT(*) FROM comment WHERE id_po = ?');
    $stmt->bindParam(1, $id_po);
    $stmt->execute();
    return $stmt->fetchColumn();
}










}