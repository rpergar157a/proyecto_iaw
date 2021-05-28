<?php
$host='localhost';
$user='root';
$pwd='practica1';
$nombreBD="RUFINO_BD_FINAL";
$enlace=mysqli_connect($host,$user,$pwd,$nombreBD);
if(!$enlace){
    echo "No se ha conectado con la base de datos";
}else{
    mysqli_select_db($enlace,$nombreBD);
if(isset($_POST['enviar'])){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $empresa=$_POST['empresa'];
    $telefono=$_POST['telefono'];
    $comprobar="SELECT usuario FROM usuario_login WHERE usuario like '$nombre'";
    $existe=mysqli_query($enlace,$comprobar);
    if(mysqli_num_rows($existe)>0){
        echo '<script language="javascript"> alert("El usuario ya existe introduce otro nuevo."); </script>';
    }else{

    $insertar="INSERT INTO usuario_login VALUES ('','$nombre','','','','','$apellidos','$correo','$empresa','$telefono','','','','','','','','','');";
    mysqli_query($enlace,$insertar);
    }
        
    

    //Generamos costraseña automaticamente.
    /*function generar_password_complejo($largo){
        $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $cadena_base .= '0123456789' ;
        $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
      
        $password = '';
        $limite = strlen($cadena_base) - 1;
      
        for ($i=0; $i < $largo; $i++)
          $password .= $cadena_base[rand(0, $limite)];
      
        return $password;
      
        
      
      }*/
    $destinatario="rpergar157a@ieslacampina.es";
    $asunto="Mensaje de prueba";
    $cuerpo='
      echo "Usuario:".$nombre;
      echo "Apellidos:".$apellidos;
      echo "Correo:".$correo;
      echo "Empresa:".$empresa;
      echo "Telefono:".$telefono;
      echo "rol:".$rol;
    
    ';

    mail($destinatario,$asunto,$cuerpo);
    

       


}else{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="formulario.css" rel="stylesheet" type="text/css"> 
    <title>Document</title>
</head>
<body>
    <div class="logo">
        <div>
            <img src="logo_web.jpg" alt="">
        </div>
         <div>
            <h1>Formulario de registro</h1>
        </div>
    </div>
    <form action="formulario.php" method="post">
        <div>
            <input type="text" name="nombre" id="" required placeholder="Nombre(*)"> <br><br>
            <input type="text" name="apellidos" id="" required placeholder="Apellidos(*)"> <br><br>
            <input type="email" name="correo" id="" required placeholder="Email(*)"> <br><br>
            <input type="text" name="empresa" id=""required placeholder="Empresa(*)"> <br><br>
            <input type="text" name="telefono" id="" placeholder="Teléfono"> <br><br>
           
            <button type="submit" name="enviar">Enviar</button><br><br>
            
            


        </div>
    </form>
    <a href="principal.php"><button>Volver</button></a>
    <p>Los campos marcados con (*) son obligatorios</p>
</body>
</html>
<?php
}}
?>