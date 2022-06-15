<?php
require './Model/Comments.php';

header('Access-Control-Allow-Origin:*'); // * OR https://www.reddit.com/
header('Content-Type: application/json');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");



class CommentsController
{

    public function addComment()
    {
        $comment = new Comments();

        $id_us = $_POST['id_us'];
        $id_po = $_POST['id_po'];
        $post_comment = $_POST['post_comment'];

        $json = json_encode($comment->add($id_us, $id_po, $post_comment));
        echo $json;

    }

    public function allComment()
    {
        $comments = new Comments();

        $id_po = $_POST['id_po'];

        $json = json_encode($comments->getAll($id_po));
        echo $json;
    }

    public function countComment()
    {
        $comments = new Comments();

        $id_po = $_POST['id_po'];

        $json = json_encode($comments->count($id_po));
        echo $json;
    }


}