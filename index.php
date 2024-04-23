<?php

require_once 'config/helpers.php';
require_once 'config/bootstrap.php';
require_once 'config/fileLoad.php';

    $route = [
        '/' => "login",
        '/apprenant' => 'apprenant',
        '/presence' => 'presence',
        '/promotion' => 'promotion',
        '/referentiel' => 'liste-ref',
        '/dropdown.html.php' => 'dropdown',
    ];
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    require_once "models/".$uri.".model.php";

        require_once 'templates/partial/header.html.php';

        if(array_key_exists($uri, $route)){
            include "templates/".$route[$uri].".html.php" ;
            
        } else {
   
        }

 /* require_once 'templates/partial/footer.html.php';  */      

