<?php
session_start();
$host="localhost";
$user="root";
$pwd="practica1";
$nombreBD="RUFINO_BD_FINAL";

$conectar=mysqli_connect($host,$user,$pwd,$nombreBD);
if(!$conectar){
    echo '<script type="text/javascript">
        alert("No estas conectado");
        </script>';
}else{
    $resutado=mysqli_select_db($conectar,$nombreBD);

    
    if(isset($_POST['enviar'])){
        $_SESSION['usuario']=$_POST['usuario'];

        $usuario=$_POST['usuario'];
        $pass=$_POST['password'];
         if(empty($usuario) || empty($pass)){
            
             echo '<script type="text/javascript">
             alert("Debes introducir el usuario y la contraseña");
             window.location = "principal.php"; 
             </script>';
             
             
         }else{
             $host="localhost";
             $user="root";
             $pwd="practica1";
             $nombreBD="RUFINO_BD_FINAL";
             $enlace=mysqli_connect($host,$user,$pwd);
             if(!$enlace){
                echo '<script type="text/javascript">
                alert("No estas conectado");
                </script>';
             }else{
                $resutado=mysqli_select_db($enlace,$nombreBD); 
                //$hash=password_hash("$pass", PASSWORD_DEFAULT);
                $consulta = "SELECT * FROM usuario_login WHERE usuario='$usuario';"; 
                $resultado1=mysqli_query($enlace,$consulta);
                
                if(mysqli_num_rows($resultado1)>0){
                    
                    while($fila=mysqli_fetch_array($resultado1)){
                       
                        if(password_verify($pass,$fila[2])){
                            if($fila[3]=='administrador'){
                                header('Location:panel_administrador.php');
                            }elseif($fila[3]=='tecnico'){
                                header('Location:panel_tecnico.php');
                                  
                            }else{

                            /*if($fila[1]="$usuario"){
                             $direccion= $fila[3].".php";
                             $host  = $_SERVER['HTTP_HOST'];
                             $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                             //echo $direccion;
                             header("Location: http://$host$uri/$direccion");
                            }*/
                            header('Location:page.php');
                            }
                        }
                    }
                }else{
                    echo '<script type="text/javascript">
                    alert("Contraseña incorrecta insertela de nuevo");
                    </script>'; 
                   
                      
                }  

             }

        }
     }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="imagen">
        <img src="logo_web.jpg" alt="">
        <div class="formulario">
            <form action="" method="post" autocomplete="off">
                <input type="text" name="usuario" id="" placeholder="usuario"><br><br>
                <input type="password" name="password" id="" placeholder="contraseña"><br><br>
                <button type="submit" name="enviar">Enviar</button>
                <p>
                    Registrate
                    <a href="formulario.php">aqui</a>
                </p>
            </form>
        </div>
</div>
    
</body>
</html>