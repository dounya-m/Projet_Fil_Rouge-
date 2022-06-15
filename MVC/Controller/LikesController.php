<?php
require_once './Model/Likes.php';

header('Access-Control-Allow-Origin:*'); // * OR https://www.reddit.com/
header('Content-Type: application/json');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");
// header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");


class LikesController
{

    public function addLike()
    {
        $likes = new Likes();

        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];

        if($likes->check($user_id,$post_id) == 0){

            $add = json_encode($likes->add($user_id,$post_id));
            $json = json_encode($likes->check($user_id,$post_id));
            echo $json;
            
        }else
        {
            $json = json_encode($likes->check($user_id,$post_id));
            echo $json;
        }

    }

    public function checklike()
    {
        $likes = new Likes();

        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];

        $json = json_encode($likes->check($user_id,$post_id));
        echo $json;
    }

    public function deletLikes()
    {
        $delete = new Likes();
        // $id_like = file_get_contents('php://input');
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];

        $json = json_encode($delete->delete($user_id,$post_id));
        echo $json;

    }

    public function countLikes()
    {
        $count = new Likes();
        $post_id = $_POST['post_id'];
        $json = json_encode($count->count($post_id));
        echo $json;
    }

    public function deletLike()
    {
        $delete = new Likes();
        // $id_like = file_get_contents('php://input');
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];

        $json = json_encode($delete->delete($user_id,$post_id));
        echo $json;

    }





















}
?>