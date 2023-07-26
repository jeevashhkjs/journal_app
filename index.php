<?php
// require 'connection.php';
require "router.php";
// $conn = [];

// $conn['db'] = (new Database())->db;


session_start();


$router = new routers();

$router->get('/','home')->middelewares('authentication');

$router->get('/writing','writing')->middelewares('authentication');

$router->post('/store','store')->middelewares('authentication');

$router->get('/getdata','getdata')->middelewares('authentication');

$router->post('/starring','starring')->middelewares('authentication');

$router->post('/deleted','deleted')->middelewares('authentication');

$router->post('/starred','starreds')->middelewares('authentication');

$router->post('/trash','trashview')->middelewares('authentication');

$router->post('/deletedDatas','deletedDatas')->middelewares('authentication');

$router->post('/restore','restore')->middelewares('authentication');

$router->post('/restoreAll','restoreAll')->middelewares('authentication');

$router->post('/deleteAll','deleteAll')->middelewares('authentication');

$router->post('/PermanentDelete','PermanentDelete')->middelewares('authentication');

$router->get('/registration','registration')->middelewares('guest');

$router->post('/registrationLogic','registrationLogic')->middelewares('guest');

$router->get('/login','login')->middelewares('guest');

$router->post('/loginLogic','loginLogic')->middelewares('guest');

$router->post('/logout','logout')->middelewares('authentication');







 $router->checking();
