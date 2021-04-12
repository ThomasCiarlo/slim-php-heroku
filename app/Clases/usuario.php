<?php 

class usuario
{

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $fecharegistro;
    public $imagen;


    public function __construct($nombre,$apellido,$email)
    {
        $this->id = random_int(1,10000);
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fecharegistro = date("d.m.Y");  
        $this->imagen =$_FILES["archivo"]["name"];
        $destino = "./Usuario/Fotos/".$_FILES["archivo"]["name"];
        move_uploaded_file($_FILES["archivo"]["tmp_name"],
        $destino);
    }

  public static function Registrar($nombre,$apellido,$email)
  {
    if(isset($nombre))
      if(isset($apellido))
        if(isset($email))
      {
        $user = new usuario($nombre,$apellido,$email);
        echo "Se registro correctamente";
     }
      else
      { 
        echo "Falto ingresar un dato";
      }

      return $user;
    }

    public static function LeerArchivos($rutaArchivo)
    {
      $datos = "";
      $array = array();
      $file = fopen($rutaArchivo,'r');

      while(!feof($file))
      {
            $array = json_decode(fgets($file));
      }
      
      return $array;
    }

    public static function ToJson($vec)
    {
        $todoOk = false;

        try{
            $json_string = json_encode($vec); 
            file_put_contents("./usuario.json",$json_string."\n");
            $todoOk = true;
        }
        catch(Exception $e){

        }
        return $todoOk;

    }

    public static function LeerJson($ruta)
    {

      try
      {
        $datos_clientes = file_get_contents($ruta);
        $json_clientes = json_decode($datos_clientes);
        $arrayuser = array();

        if($json_clientes != null){
          foreach($json_clientes as $user)
          {
              array_push($arrayuser,$user);
          }
        }
      }
      catch(Exception $e)
      {
        $arrayuser = array();
      }
      
        return $arrayuser;

    }

    public static function MostararUser($arrayuser)
    {
        foreach ($arrayuser as $cliente)
        {    
        
          echo "<ul>
              <li>".$cliente->nombre."</li>
              <li>".$cliente->apellido."</li>
              <li>".$cliente->email."</li>
            </ul>";
        }
    }


}





?>