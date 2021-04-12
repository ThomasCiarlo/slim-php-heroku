<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include "clases\usuario.php";

require_once '../vendor/autoload.php';



$app = new \Slim\App([]);



echo "hola";


$app->run();

?>