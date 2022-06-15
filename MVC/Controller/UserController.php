<?php
require_once './Model/User.php';
header('Access-Control-Allow-Origin:*'); // * OR https://www.reddit.com/
header('Content-Type: application/json');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");
// header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");
class UserController
{
    public function index()
    {
        $users = User::getAll();
        echo json_encode($users);
    }

    public function getAlluser()
    {
        $users = new User();
        $json= json_encode($users->getAll());
        echo $json;
    }


    public function getOneUser($id)
    {
        
        $client = new User();
        $json= json_encode($client->getById($id));
        echo $json;
    }


    public function addUsers()
    {
        
    $newUser = new User();
    $name= $_POST['name']; 
    $lastname = $_POST['lastname']; 
    $tele = $_POST['tele']; 
    $fileName = $_FILES['image']['name'];
    $tempPath = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $email = $_POST['email']; 
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    if(empty($fileName))
    {
        $errorMSG = json_encode(array('error' => 'Please select an image', 'status' => false));
        echo $errorMSG;
    }else
    {
        $upload_path = 'C:/xampp/htdocs/bestFriendB/file_rouge/public/uploads/';
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
        if($newUser->getByEmail($email) == 0)
        {
            $json= json_encode($newUser->add($name, $lastname, $tele, $fileName, $email, $hashedPassword));
            $successMSG = json_encode(true);
            echo $successMSG;
        }else     
            {
                $json= json_encode(false);
                echo $json;
            }
    }
    }


    public function loginUser()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $email = $data['email'];
            $password = $data['password'];
            $userLogin = new User();
            $userLogin->login($email, $password);
            if($userLogin->login($email, $password)){
                $json = json_encode($userLogin->login($email, $password));
                echo $json;
            }else{
                $json= json_encode( false);
                echo $json;
            }
        }

    }









}

?>

