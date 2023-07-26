<?php

    require 'controller/journalController.php';
    require 'middleware/Authmiddleware.php';
    require 'middleware/Guestmiddleware.php';
    class routers
    {
        public $routes=[];
        public $guest;

        public function middelewares($middleware)
        {
            $this->routes[count($this->routes) - 1]['middleware'] = $middleware;
        }   

        private $controller;

        public function __construct() {
            $this->controller = new UserController();
        }

    
        public function get($uri,$controller)
        {
            $this->routes[]=[
                'uri'=>$uri,
                'controller'=>$controller,
                'method'=>'GET',
                'middleware'=>null,

    
            ];
            return $this;
   
        }
        public function post($uri,$controller)
        {
            $this->routes[]=[
                'uri'=>$uri,
                'controller'=>$controller,
                'method'=>'POST',
                'middleware'=>null,

    
            ];
            return $this;
   
        }
        public function put($uri,$controller)
        {
            $this->routes[]=[
                'uri'=>$uri,
                'controller'=>$controller,
                'method'=>'PUT',
                'middleware'=>null,

    
            ];
            return $this;
   
        }

        public function checking()
        {
            foreach ($this->routes as $router)
            {
                if($router['uri'] == $_SERVER['REQUEST_URI'])
                {
                    if ($router['middleware'] === 'authentication') {
                        $routing = new Authmiddleware();
                        $routing->handler();
                     }
     
                     if ($router['middleware'] === 'guest') {
                         $routing = new Guestmiddleware();
                         $routing->handler();
                      }
     
                    $action = $router['controller'];
                }
             
            }


            
            if($action)
            {
                $this->controller->$action();

            }
            else
            {
               require "error/error.php";
            }
        }

       
    }
