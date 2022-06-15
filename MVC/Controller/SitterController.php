<?php

require_once './Model/Sitter.php';

header('Access-Control-Allow-Origin:*'); // * OR https://www.reddit.com/
header('Content-Type: application/json');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");


class SitterController
{

    public function allSitters()
    {

        $allsitter = new Sitter();
        $json = json_encode($allsitter->all());
        echo $json;

    }


    public function addSitter()
    {
        $newSitter = new Sitter();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fileName = $_FILES['ps_profile']['name'];
        $tempPath = $_FILES['ps_profile']['tmp_name'];
        $fileSize = $_FILES['ps_profile']['size'];
        $ville = $_POST['ville'];
        $adress = $_POST['adress'];
        $description = $_POST['description'];
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);


        if(empty($fileName))
    {
        $errorMSG = json_encode(array('error' => 'Please select an image', 'status' => false));
        echo $errorMSG;
    }else
    {
        $upload_path = 'C:\xampp\htdocs\bestFriendB\file_rouge\public\sittersProfile/';
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
        if($newSitter->check($nom, $prenom) == 0)
        {
            $json= json_encode($newSitter->creat($nom, $prenom, $email, $phone, $fileName, $ville, $adress, $description, $hashedPassword));
            $successMSG = json_encode(true);
            echo $successMSG;
            
        }else     
            {
                $json= json_encode(false);
                echo $json;
            }
        }


            
    }

    public function login()
    {
        $login = new Sitter();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $json = json_encode($login->siter($email, $password));
        echo $json;
    }

    public function deletSitter()
    {
        $delete = new Sitter();
        $email = $_POST['email'];
        $password = $_POST['password'];

        $json = json_encode($delete->delete($email, $password));
        // $json = json_encode('true');
        echo $json;
    }

    public function profile()
    {
        $profile = new Sitter();
        $id_sitter = $_POST['id_sitter'];
        $json = json_encode($profile->oneSitter($id_sitter));
        echo $json;
    }

    


}