<?php
require_once './Model/Post.php';
header('Access-Control-Allow-Origin:*'); // * OR https://www.reddit.com/
header('Content-Type: application/json');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");
// header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

class PostController
{

    public function index()
    {
        $posts = Post::getAll();
        echo json_encode($posts);
    }

    public function getAllPost()
    {
        $posts = new Post();
        $json= json_encode($posts->getAll());
        echo $json;
    }

    public function UserPostes()
    {
        $posts = new Post();
        $id_user = $_POST['id_user'];
        // $id_user = $_GET['id_user'];
        $json= json_encode($posts->getId($id_user));
        echo $json;
    }

    public function newPost()
    {

        $newPost = new Post();

        $fileName = $_FILES['image_post']['name'];
        $tempPath = $_FILES['image_post']['tmp_name'];
        $fileSize = $_FILES['image_post']['size'];

        $type = $_POST['type'];
        $animalName = $_POST['animalName'];
        $ville = $_POST['ville'];
        $discription = $_POST['discription'];
        $id_user = $_POST['id_user'];

    
        if(empty($fileName))
        {
            $errorMSG = json_encode(array('error' => 'Please select an image', 'status' => false));
            echo $errorMSG;
        }else
        {
            $upload_path = 'C:/xampp/htdocs/bestFriendB/file_rouge/public/images/';
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileName = uniqid().'.'.$fileExt;
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
    
            if(in_array($fileExt, $valid_extensions))
            {
                if(!file_exists($upload_path . $fileName)){
                    if($fileSize < 5000000)
                    {
                        move_uploaded_file($tempPath, $upload_path . $fileName);
                    }else
                    {
                        $errorMSG = json_encode(array('error' => 'Your file is too large', 'status' => false));
                        echo $errorMSG;
                    }
                }else
                {
                    $errorMSG = json_encode(array('error' => 'File already exists', 'status' => false));
                    echo $errorMSG;
                }
            }else {
                $errorMSG = json_encode(['error' => 'Invalid file type', 'status' => false]);
                echo $errorMSG;
            }
        
        }
    
        if(!isset($errorMSG))
        {
                $json= json_encode($newPost->add($fileName,$type,$animalName,$ville,$discription,$id_user));
                $successMSG = json_encode(array('success' =>'User added successfully', 'status' => true));
                echo $json . $successMSG;
            }else     
                {
                    $json= json_encode('false');
                    echo $json;
                }


    }

    public function geAlltPosts()
    {
        $post = new Post();
        $json= json_encode($post->getPosts());
        echo $json;
    }

    public function deletePost()
    {
        $delete = new Post();

        $id_p = $_POST['id_p'];

        $json= json_encode($delete->delete($id_p));
        echo $json;
    }

    public function updatePost()
    {
        $update = new Post();

        $animalName = $_POST['animalName'];
        $discription = $_POST['discription'];
        $id_p = $_POST['id_p'];

        $json= json_encode($update->update($animalName,$discription,$id_p));
        $successMSG = json_encode(array('success' =>'User updated', 'status' => true));
        echo $json . $successMSG; ;


    }

    public function lastPost()
    {
        $last = new Post();
        $json= json_encode($last->last());
        echo $json;
    }

    public function dogPost()
    {
        $dog = new Post();
        $json= json_encode($dog->dog());
        echo $json;
    }

    public function catPost()
    {
        $cat = new Post();
        $json= json_encode($cat->cat());
        echo $json;
    }

    public function otherPost()
    {
        $other = new Post();
        $json= json_encode($other->other());
        echo $json;
    }










    }

?>