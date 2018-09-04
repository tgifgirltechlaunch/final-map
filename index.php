<?php

// get page and action from the url
$page = isset($_GET['page']) ? $_GET['page'] : "home";
$action = isset($_GET['action']) ? $_GET['action'] : "index";

// check if the page exist
if(file_exists("controller/$page.php")) 
{
    //add the vendor autoload file
    include "vendor/autoload.php";

    // connect to the database
    include "classes/Database.php";

    $db = new Database();
    $db->connect();

    // include the page
    include "controller/$page.php";

    // create a new Controller object
    $controller = new $page();

    // check if the action exists on the controller
    if( ! method_exists($controller, $action)) $action = 'index';
    
    // execute my action
    try {
        $controller->$action();
    }catch(Exception $e) {
        $msg = "[" . date('Y-m-d') . "] $e" . PHP_EOL;
        file_put_contents('logs/app_errors.log', $msg);
        echo ("We found an error, please try again later");
    }finally{
        //disconnect from database
        $db->disconnect();
    }
} 
else 
{
    // send to 404 page
    include "view/404.php";
}