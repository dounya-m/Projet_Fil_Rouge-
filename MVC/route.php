<?php


    // var_dump($_GET);

    // if(isset($_GET['url'])){
        
    //     $url = $_GET['url'];
    //     $url = explode('/',($_GET['url']));
        
    //     // echo (print_r($url));

    //     if(file_exists('Controller/' . ucfirst($url[0]) . '.php' )){
    //         require_once ('Controller/' . ucfirst($url[0]) . '.php');
    //         $curentController = ucfirst($url[0]);
    //         $curentController = new $curentController();
    //         unset($url[0]);

    //         if(method_exists($curentController, $url[1])){

    //             $curentmethode = $url[1];
    //             unset($url[1]);

    //             $params = $url ? array_values($url) : [];

    //             call_user_func_array([$curentController, $curentmethode], $params);


    //         }


    //     }else{
    //         echo 'Not Found';
    //     }

    // } 
    // if($url == ''){
    //     echo "Page d'acceuille";
    // }elseif($url[0]== 'article' AND !empty($url[1])){
    //     echo "ARTICLE " . $url[1];
    // }else{
    //     echo "Erro 404";
    // }


$params=explode("/", $_GET['p']);

if (isset($params[0])&&!empty($params[0])) 
{
	$controller=ucfirst($params[0])."Controller";
	if (file_exists("controller/".$controller.".php")) 
	{
		require_once "controller/".$controller.".php";
		$obj=new $controller();
        
		if (isset($params[1])&&!empty($params[1])) 
		{
			$action=$params[1];
			if(method_exists($obj,$action))
			{
				if (isset($params[2])&&!empty($params[2])) 
				{
					$obj->$action($params[2]);

				}
				else
				{
					$obj->$action();
				}
			}else
			{
				echo "page not found";
				exit();
			}
		}else
		{
			$action="index";
			$obj->$action();
		}
	}else
	{
		echo "page not found";
	}
}

?>

