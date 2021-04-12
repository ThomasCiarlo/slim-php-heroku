<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
include './clases/usuario.php';

require_once '../vendor/autoload.php';



$app = new \Slim\App([]);



$nombre = $_POST["txtnombre"];
$apellido = $_POST["txtapellido"];
$email = $_POST["txtemail"];
$imagen = $_POST["archivo"];

$arrayuser = usuario::LeerJson("./usuario.json");
array_push($arrayuser,usuario::Registrar($nombre,$apellido,$email));

usuario::ToJson($arrayuser);
usuario::MostararUser($arrayuser);


$app->run();

?>