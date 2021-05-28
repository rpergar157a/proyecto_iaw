<?php
$host='localhost';
$user='root';
$pwd='practica1';
$nombreBD='RUFINO_BD_FINAL';

$conectar=mysqli_connect($host,$user,$pwd,$nombreBD);
if(!$conectar){
    echo "La base de dato no esta conectado";
}else{
    mysqli_select_db($conectar,$nombreBD);
    if(isset($_POST['enviar'])){
        
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE nombre like '$fabricante';";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "";
        }else{
            
            //Si no existe el fabricante introducimos el fabricante
            $insertar_fabricante="INSERT INTO marca VALUES('','$fabricante');";
            mysqli_query($conectar,$insertar_fabricante);
            //$tabla="ALTER TABLE usuario_login ADD($fabricante VARCHAR(20) NOT NULL);";
            //mysqli_query($conectar,$tabla);
            
        }
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE nombre like '$modelo';";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "";
        }else{
            echo "";
            //Introducimos el modelo.
            $id_marca="SELECT id_marca FROM marca WHERE nombre like '$fabricante';";
            $ver=mysqli_query($conectar,$id_marca);
            while($pk=mysqli_fetch_array($ver)){
                $mod="INSERT INTO modelo VALUES('','$modelo',$pk[0]);";
                mysqli_query($conectar,$mod);
            }
        }
        
    }
    elseif(isset($_POST['enviar_boletin'])){
    
       //comprobamos que existe el fabricante.
       $fabricante=$_POST['fabricante'];
       $modelo=$_POST['modelo'];
       $comp_fabricante="SELECT nombre FROM marca WHERE id_marca = $fabricante;";
       $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
       if(mysqli_num_rows($ver_fabricante)>0){
           echo "";
       }else{
        //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
        echo "El fabricante no existe.";
         
           
       } 
       //Comprobamos que existe el modelo.
       $fabricante=$_POST['fabricante'];
       $modelo=$_POST['modelo'];
       $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo = $modelo;";
       $ver_modelo=mysqli_query($conectar,$comp_modelo);
       if(mysqli_num_rows($ver_modelo)>0){
           echo "";
       }else{
        echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
        header('Location:panel_administrador.php');   
       }
       //comprobamos que existe el boletin. 
       $fabricante=$_POST['fabricante'];
       $modelo=$_POST['modelo'];
       $boletines=$_POST['boletines'];
       
       $file_nombre=$_FILES['file_boletines']['name'];
       $file_tipo=$_FILES['file_boletines']['type'];
       $file_tamano=$_FILES['file_boletines']['size'];
       $file_tmp=$_FILES['file_boletines']['tmp_name'];

       $comp_boletines="SELECT nombre FROM boletines WHERE nombre like '$boletines';";
       $ver_boletines=mysqli_query($conectar,$comp_boletines);
       if(mysqli_num_rows($ver_boletines)>0){
            echo '<script language="javascript"> 
            alert("El boletin ya  existe en la base de datos."); 
           </script>';
            //header('Location:panel_administrador2.php');   
       }else{
           echo "";
           //Introducimos los boletines.
                $directorio = 'boletines/';
                $subir_archivo = $directorio.basename($_FILES['file_boletines']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_boletines']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                    echo"";
               $insertar_boletin="INSERT INTO boletines VALUES('','$boletines','file_boletines','$file_nombre','$file_tipo','$file_tamano','$file_tmp',$modelo);";
               mysqli_query($conectar,$insertar_boletin);
           
       }

    }elseif(isset($_POST['mandar'])){
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE id_marca = $fabricante;";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "";
        }else{
         //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
         echo "";
          
            
        } 
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo = $modelo;";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "";
        }else{
         echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
            
        }
        //comprobamos que existe el firmwares. 
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $firmwares=$_POST['firmwares'];
        $file_nombre=$_FILES['file_firmwares']['name'];
        $file_tipo=$_FILES['file_firmwares']['type'];
        $file_tamano=$_FILES['file_firmwares']['size'];
        $file_tmp=$_FILES['file_firmwares']['tmp_name'];
 
        $comp_firmwares="SELECT nombre FROM firmwares WHERE nombre like '$firmwares';";
        $ver_firmwares=mysqli_query($conectar,$comp_firmwares);
        if(mysqli_num_rows($ver_firmwares)>0){
         //echo '<script language="javascript"> alert("El boletin ya  existe en la base de datos."); </script>';
         echo "";
          
        }else{
            echo "";
            //Introducimos los firmwares.
                $directorio = 'firmwares/';
                $subir_archivo = $directorio.basename($_FILES['file_firmwares']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_firmwares']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                $insertar_firmwares="INSERT INTO firmwares VALUES('','$firmwares','$file_nombre','$file_tipo','$file_tamano','$file_tmp','file_firmwares',$modelo);";
                mysqli_query($conectar,$insertar_firmwares);
        }
    }elseif(isset($_POST['enviar_manuales'])){
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE id_marca = $fabricante;";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "";
        }else{
         //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
         echo "";
         header('Location:panel_administrador2.php');  
            
        } 
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo = $modelo;";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "";
        }else{
         echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
         header('Location:panel_administrador2.php');   
        }
        //comprobamos que existe el manual. 
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $manuales=$_POST['manuales'];
        $file_nombre=$_FILES['file_manuales']['name'];
        $file_tipo=$_FILES['file_manuales']['type'];
        $file_tamano=$_FILES['file_manuales']['size'];
        $file_tmp=$_FILES['file_manuales']['tmp_name'];
 
        $comp_manuales="SELECT nombre FROM manuales WHERE nombre like '$manuales';";
        $ver_manuales=mysqli_query($conectar,$comp_manuales);
        if(mysqli_num_rows($ver_manuales)>0){
         //echo '<script language="javascript"> alert("El boletin ya  existe en la base de datos."); </script>';
         echo "";
        header('Location:panel_administrador2.php');   
        }else{
            echo "";
            //Introducimos los manuales.
                $directorio = 'manuales/';
                $subir_archivo = $directorio.basename($_FILES['file_manuales']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_manuales']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                    echo"";
                $insertar_manuales="INSERT INTO manuales VALUES('','$manuales','$file_nombre','$file_tipo','$file_tamano','$file_tmp','file_manuales',$modelo);";
                mysqli_query($conectar,$insertar_manuales);
        }
    }elseif(isset($_POST['enviar_micelania'])){
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE id_marca = $fabricante;";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "el fabricante existe";
        }else{
         //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
         echo "";
         header('Location:panel_administrador2.php');  
            
        } 
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo = $modelo;";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "el modelo existe";
        }else{
         echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
         header('Location:panel_administrador2.php');   
        }
        //comprobamos que existe el micelania. 
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $micelania=$_POST['micelania'];
        $file_nombre=$_FILES['file_micelania']['name'];
        $file_tipo=$_FILES['file_micelania']['type'];
        $file_tamano=$_FILES['file_micelania']['size'];
        $file_tmp=$_FILES['file_micelania']['tmp_name'];
 
        $comp_micelania="SELECT nombre FROM micelania WHERE nombre like '$micelania';";
        $ver_micelania=mysqli_query($conectar,$comp_micelania);
        if(mysqli_num_rows($ver_micelania)>0){
         //echo '<script language="javascript"> alert("El boletin ya  existe en la base de datos."); </script>';
         echo "MIcelania existe";
        //header('Location:panel_administrador2.php');   
        }else{
            echo "Introducimos micelania";
            //Introducimos los micelania.
                $directorio = 'micelania/';
                $subir_archivo = $directorio.basename($_FILES['file_micelania']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_micelania']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                $insertar_micelania="INSERT INTO micelania VALUES('','$micelania','$file_nombre','$file_tipo','$file_tamano','$file_tmp','file_micelania',$modelo);";
                mysqli_query($conectar,$insertar_micelania);
            
        }
    }elseif(isset($_POST['enviar_multimedia'])){
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE id_marca = $fabricante;";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "";
        }else{
         //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
         echo "El fabricante no existe.";
         header('Location:panel_administrador2.php');  
            
        } 
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo like '$modelo';";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "";
        }else{
         echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
         header('Location:panel_administrador2.php');   
        }
        //comprobamos que existe multimedia. 
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $multimedia=$_POST['multimedia'];
        $file_nombre=$_FILES['file_multimedia']['name'];
        $file_tipo=$_FILES['file_multimedia']['type'];
        $file_tamano=$_FILES['file_multimedia']['size'];
        $file_tmp=$_FILES['file_multimedia']['tmp_name'];
 
        $comp_multimedia="SELECT nombre FROM multimedia WHERE nombre like '$multimedia';";
        $ver_multimedia=mysqli_query($conectar,$comp_multimedia);
        if(mysqli_num_rows($ver_multimedia)>0){
         //echo '<script language="javascript"> alert("El boletin ya  existe en la base de datos."); </script>';
         echo "El firmware existe";
        header('Location:panel_administrador2.php');   
        }else{
            echo "";
            //Introducimos los multimedia.
                $directorio = 'multimedia/';
                $subir_archivo = $directorio.basename($_FILES['file_multimedia']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_multimedia']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                $insertar_multimedia="INSERT INTO multimedia VALUES('','$multimedia','$file_nombre','$file_tipo','$file_tamano','$file_tmp','file_multimedia',$modelo);";
                mysqli_query($conectar,$insertar_multimedia);
        }
    }elseif(isset($_POST['enviar_softwares'])){
        //comprobamos que existe el fabricante.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_fabricante="SELECT nombre FROM marca WHERE id_marca like '$fabricante';";
        $ver_fabricante=mysqli_query($conectar,$comp_fabricante);
        if(mysqli_num_rows($ver_fabricante)>0){
            echo "";
        }else{
         //echo '<script language="javascript"> alert("El fabricante no  existe en la base de datos."); </script>'; 
         
         header('Location:panel_administrador2.php');  
            
        } 
        //Comprobamos que existe el modelo.
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $comp_modelo="SELECT nombre FROM modelo WHERE id_modelo like '$modelo';";
        $ver_modelo=mysqli_query($conectar,$comp_modelo);
        if(mysqli_num_rows($ver_modelo)>0){
            echo "";
        }else{
         echo '<script language="javascript"> alert("El modelo no  existe en la base de datos."); </script>';   
         header('Location:panel_administrador2.php');   
        }
        //comprobamos que existe softwares. 
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $soporte=$_POST['soporte'];
        $softwares=$_POST['softwares'];
        $file_nombre=$_FILES['file_softwares']['name'];
        $file_tipo=$_FILES['file_softwares']['type'];
        $file_tamano=$_FILES['file_softwares']['size'];
        $file_tmp=$_FILES['file_softwares']['tmp_name'];
 
        $comp_softwares="SELECT nombre FROM softwares WHERE nombre like '$softwares';";
        $ver_softwares=mysqli_query($conectar,$comp_softwares);
        if(mysqli_num_rows($ver_softwares)>0){
         //echo '<script language="javascript"> alert("El boletin ya  existe en la base de datos."); </script>';
         echo "";
        header('Location:panel_administrador2.php');   
        }else{
            
            //Introducimos los softwares.
            
                $directorio = 'softwares/';
                $subir_archivo = $directorio.basename($_FILES['file_softwares']['name']);
                echo "<div>";
                if (move_uploaded_file($_FILES['file_softwares']['tmp_name'], $subir_archivo)) {
                    echo '<script language="javascript"> alert("El archivo es valido y se cargo correctamente."); </script>';       
                    //echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                } else {
                    echo "La subida ha fallado";
                }
                $insertar_softwares="INSERT INTO softwares VALUES('','$softwares','$soporte','file_softwares','$file_nombre','$file_tipo','$file_tamano','$file_tmp',$modelo);";
                mysqli_query($conectar,$insertar_softwares);
            
        }
    }elseif(isset($_POST['eliminar'])){
        $modelo=$_POST['modelo'];
        $eliminar_modelo="DELETE FROM modelo where nombre like '$modelo';";
        $ver=mysqli_query($conectar,$eliminar_modelo);

    }elseif(isset($_POST['modificar_boletin'])){
        $modelo=$_POST['modelo'];
        $boletines=$_POST['boletines'];
        $nombre_archivo=$_FILES['file_boletines']['name'];
        $sq="SELECT id_boletines FROM boletines WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
           
            $modificar_boletin="UPDATE boletines SET nombre='$boletines' WHERE id_boletines = $fila[0];";
            mysqli_query($conectar,$modificar_boletin);
            echo '<script language="javascript"> alert("El boletin se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El boletin no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_boletin'])){
        $modelo=$_POST['modelo'];
        $boletines=$_POST['boletines'];
        $nombre_archivo=$_FILES['file_boletines']['name'];
        $sq="SELECT id_boletines FROM boletines WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_boletin="DELETE FROM boletines  WHERE id_boletines = $fila[0];";
            mysqli_query($conectar,$eliminar_boletin);
            echo '<script language="javascript"> alert("El boletin se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El boletin no existe."); </script>';
        }
    }elseif(isset($_POST['modificar_firmwares'])){
        $modelo=$_POST['modelo'];
        $firmwares=$_POST['firmwares'];
        $nombre_archivo=$_FILES['file_firmwares']['name'];
        $sq="SELECT id_firmwares FROM firmwares WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
           
            $modificar_firmwares="UPDATE firmwares SET nombre='$firmwares' WHERE id_firmwares = $fila[0];";
            mysqli_query($conectar,$modificar_firmwares);
            echo '<script language="javascript"> alert("El firmware se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El firmware no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_firmwares'])){
        $modelo=$_POST['modelo'];
        $firmwares=$_POST['firmwares'];
        $nombre_archivo=$_FILES['file_firmwares']['name'];
        $sq="SELECT id_firmwares FROM firmwares WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_firmwares="DELETE FROM firmwares  WHERE id_firmwares = $fila[0];";
            mysqli_query($conectar,$eliminar_firmwares);
            echo '<script language="javascript"> alert("El firmware se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El firmware no existe."); </script>';
        }
    }elseif(isset($_POST['modificar_manuales'])){
        $modelo=$_POST['modelo'];
        $manuales=$_POST['manuales'];
        $nombre_archivo=$_FILES['file_manuales']['name'];
        $sq="SELECT id_manuales FROM manuales WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            
            $modificar_manuales="UPDATE manuales SET nombre='$manuales' WHERE id_manuales = $fila[0];";
            mysqli_query($conectar,$modificar_manuales);
            echo '<script language="javascript"> alert("El manual se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El manual no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_manuales'])){
        $modelo=$_POST['modelo'];
        $manuales=$_POST['manuales'];
        $nombre_archivo=$_FILES['file_manuales']['name'];
        $sq="SELECT id_manuales FROM manuales WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_manuales="DELETE FROM manuales  WHERE id_manuales = $fila[0];";
            mysqli_query($conectar,$eliminar_manuales);
            echo '<script language="javascript"> alert("El manual se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El manual no existe."); </script>';
        }
    } elseif(isset($_POST['modificar_micelania'])){
        $modelo=$_POST['modelo'];
        $micelania=$_POST['micelania'];
        $nombre_archivo=$_FILES['file_micelania']['name'];
        $sq="SELECT id_micelania FROM micelania WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
           
            $modificar_micelania="UPDATE micelania SET nombre='$micelania' WHERE id_micelania = $fila[0];";
            mysqli_query($conectar,$modificar_micelania);
            echo '<script language="javascript"> alert("El archivo se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_micelania'])){
        $modelo=$_POST['modelo'];
        $micelania=$_POST['micelania'];
        $nombre_archivo=$_FILES['file_micelania']['name'];
        $sq="SELECT id_micelania FROM micelania WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_micelania="DELETE FROM micelania  WHERE id_micelania = $fila[0];";
            mysqli_query($conectar,$eliminar_micelania);
            echo '<script language="javascript"> alert("El archivo se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
    } elseif(isset($_POST['modificar_multimedia'])){
        $modelo=$_POST['modelo'];
        $multimedia=$_POST['multimedia'];
        $nombre_archivo=$_FILES['file_multimedia']['name'];
        $sq="SELECT id_multimedia FROM multimedia WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
           
            $modificar_multimedia="UPDATE multimedia SET nombre='$multimedia' WHERE id_multimedia = $fila[0];";
            mysqli_query($conectar,$modificar_multimedia);
            echo '<script language="javascript"> alert("El archivo se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_multimedia'])){
        $modelo=$_POST['modelo'];
        $multimedia=$_POST['multimedia'];
        $nombre_archivo=$_FILES['file_multimedia']['name'];
        $sq="SELECT id_multimedia FROM multimedia WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_multimedia="DELETE FROM multimedia  WHERE id_multimedia = $fila[0];";
            mysqli_query($conectar,$eliminar_multimedia);
            echo '<script language="javascript"> alert("El archivo se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
    }elseif(isset($_POST['modificar_softwares'])){
        $modelo=$_POST['modelo'];
        $softwares=$_POST['softwares'];
        $nombre_archivo=$_FILES['file_softwares']['name'];
        $sq="SELECT id_softwares FROM softwares WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
           
            $modificar_softwares="UPDATE softwares SET nombre='$softwares' WHERE id_softwares = $fila[0];";
            mysqli_query($conectar,$modificar_softwares);
            echo '<script language="javascript"> alert("El archivo se modifico correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
        
        
    }elseif(isset($_POST['eliminar_softwares'])){
        $modelo=$_POST['modelo'];
        $softwares=$_POST['softwares'];
        $nombre_archivo=$_FILES['file_softwares']['name'];
        $sq="SELECT id_softwares FROM softwares WHERE nombre_archivo like '$nombre_archivo';";
        $sqQ=mysqli_query($conectar,$sq);
        if($fila=mysqli_fetch_array($sqQ)){
            $eliminar_softwares="DELETE FROM softwares  WHERE id_softwares = $fila[0];";
            mysqli_query($conectar,$eliminar_softwares);
            echo '<script language="javascript"> alert("El archivo se elimino correctamente."); </script>';
        }else{
            echo '<script language="javascript"> alert("El archivo no existe."); </script>';
        }
    }elseif(isset($_POST['enviar_usuario'])){
     $usuario=$_POST['usuario'];
     $nuevo=$_POST['nuevo_usuario'];
     $password=$_POST['password'];
     $rol=$_POST['rol'];
     $hash=password_hash("$password", PASSWORD_DEFAULT, array ( "cost" => 12 ));
    
    
       $ver_usuario="SELECT usuario FROM usuario_login WHERE id_usuario like '$nuevo';";
       $verUs=mysqli_query($conectar,$ver_usuario);
       if(mysqli_num_rows($verUs)>0){
           $modificar="UPDATE usuario_login SET contrasena='$hash', rol='$rol' WHERE id_usuario=$nuevo;";
           mysqli_query($conectar,$modificar);
           
       }else{
        echo '<script language="javascript"> alert("No existe usuario nuevo"); </script>';
           
       }
       //$modificar="UPDATE usuario_login SET contrasena='$password', rol='$rol'";
       //mysqli_query($conectar,$modificar);
    }elseif(isset($_POST['modificar'])){
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $password=$_POST['password'];
        /*$string="";
        function roles($string){
            if(!empty($_POST['rol'])){
                foreach($_POST['rol'] as $role){
                    $string .= ''.$role;
                       
                }
                return $string; 
            }
           
               
        }
        $rol=roles($string);*/
        if((isset($_POST['user']))&&((isset($_POST['sindoh']))||(isset($_POST['canon']))||(isset($_POST['konica-minolta']))||(isset($_POST['kyocera']))||(isset($_POST['olivetti']))||(isset($_POST['panasonic']))||(isset($_POST['ricoh']))||(isset($_POST['riso']))||(isset($_POST['samsung']))||(isset($_POST['toshiba'])))){
            echo '<script language="javascript"> alert("Opcion no valida"); </script>';
        }else{
        
        $apellidos=$_POST['apellidos'];
        $email=$_POST['correo'];
        $empresa=$_POST['empresa'];
        $telefono=$_POST['telefono'];
        $hash=password_hash($password, PASSWORD_DEFAULT, array ( "cost" => 12 ));
        if(isset($_POST['user'])){
            $rol_adm_tecn=$_POST['user'];
           
            $ver_usuario="SELECT usuario FROM usuario_login WHERE usuario like '$nombre';";
            $verUs=mysqli_query($conectar,$ver_usuario);
            if(mysqli_num_rows($verUs)>0){
                
                $modificar="UPDATE usuario_login SET contrasena='$hash', rol='', apellidos='$apellidos', email='$email',empresa='$empresa',telefono='$telefono', rol2='', rol3='',rol4='', rol5='', rol6='',rol7='',rol8='',rol9='',rol10='',rol_adm_tecn='$rol_adm_tecn' WHERE usuario like '$nombre';";
               mysqli_query($conectar,$modificar);
                
            }else{
                echo '<script language="javascript"> alert("El usuario no existe."); </script>'; 
            }
        }else{
            
            
        
       
        if(isset($_POST['sindoh'])){
            $rol2=$_POST['sindoh'];
        }else{
            $rol2="";
        }
        if(isset($_POST['canon'])){
            $rol3=$_POST['canon'];
        }else{
            $rol3="";
        }
        if(isset($_POST['konica-minolta'])){
            $rol4=$_POST['konica-minolta'];
        }else{
            $rol4="";
        }
        if(isset($_POST['kyocera'])){
            $rol5=$_POST['kyocera'];
        }else{
            $rol5="";
        }
        if(isset($_POST['olivetti'])){
            $rol6=$_POST['olivetti'];
        }else{
            $rol6="";
        }
        if(isset($_POST['panasonic'])){
            $rol7=$_POST['panasonic'];
        }else{
            $rol7="";
        }
        if(isset($_POST['ricoh'])){
            $rol8=$_POST['ricoh'];
        }else{
            $rol8="";
        }
        if(isset($_POST['riso'])){
            $rol9=$_POST['riso'];
        }else{
            $rol9="";
        }
        if(isset($_POST['samsung'])){
            $rol10=$_POST['samsung'];
        }else{
            $rol10="";
        }
        if(isset($_POST['toshiba'])){
            $rol=$_POST['toshiba'];
            //echo $rol;
        }else{
            $rol="";
        }
    
        /*$new_marca="SELECT LOWER(nombre) FROM marca WHERE id_marca=(SELECT MAX(id_marca) FROM marca);";
        $new=mysqli_query($conectar,$new_marca);

       while($ne=mysqli_fetch_array($new)){
        $modificar="INSERT INTO usuario_login VALUES('','$rol','$apellidos','$email','$empresa','$telefono','$rol2','$rol3','$rol4','$rol5','$rol6','$rol7','$rol8','$rol9','$rol10','$ne[0]');";
        mysqli_query($conectar,$modificar);
            
            
        }*/
        
        $ver_usuario="SELECT usuario FROM usuario_login WHERE usuario like '$nombre';";
        $verUs=mysqli_query($conectar,$ver_usuario);
        if(mysqli_num_rows($verUs)>0){
            $modificar="UPDATE usuario_login SET contrasena='$hash', rol='$rol', apellidos='$apellidos', email='$email',empresa='$empresa',telefono='$telefono', rol2='$rol2', rol3='$rol3',rol4='$rol4', rol5='$rol5', rol6='$rol6',rol7='$rol7',rol8='$rol8',rol9='$rol9',rol10='$rol10',rol_adm_tecn='' WHERE usuario like '$nombre';";
           mysqli_query($conectar,$modificar);
            
        }else{
            echo '<script language="javascript"> alert("El usuario no existe."); </script>'; 
        }}}
    //}
    }elseif(isset($_POST['eliminar_usuario'])){
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $borrar="DELETE FROM usuario_login WHERE usuario like '$nombre';";
        mysqli_query($conectar,$borrar);
        echo '<script language="javascript"> alert("El usuario se borro correctamente"); </script>';
    }
        
}
                                                 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="panel_administrador.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
    <script language="javascript" src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script language="javascript">
        $(document).ready(function(){
				$("#fabricante").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricante option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModelo.php", { id_marca: id_marca }, function(data){
							$("#modelo").html(data);
						});            
					});
				})
			});
    </script>
    <script language="javascript">
         $(document).ready(function(){
				$("#fabricanteF").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricanteF option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModeloF.php", { id_marca: id_marca }, function(data){
							$("#modeloF").html(data);
						});            
					});
				})
			});

    </script>  
    <script language="javascript">
         $(document).ready(function(){
				$("#fabricanteM").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricanteM option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModeloM.php", { id_marca: id_marca }, function(data){
							$("#modeloM").html(data);
						});            
					});
				})
			});

    </script>  
    <script language="javascript">
         $(document).ready(function(){
				$("#fabricanteMi").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricanteMi option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModeloMi.php", { id_marca: id_marca }, function(data){
							$("#modeloMi").html(data);
						});            
					});
				})
			});

    </script>  
    <script language="javascript">
         $(document).ready(function(){
				$("#fabricanteMu").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricanteMu option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModeloMu.php", { id_marca: id_marca }, function(data){
							$("#modeloMu").html(data);
						});            
					});
				})
			});

    </script> 
    <script language="javascript">
         $(document).ready(function(){
				$("#fabricanteS").change(function () {
 
					//$('#boletines').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#fabricanteS option:selected").each(function () {
						id_marca = $(this).val();
						$.post("includes/getModeloS.php", { id_marca: id_marca }, function(data){
							$("#modeloS").html(data);
						});            
					});
				})
			});

    </script>   
    

    <title>Document</title>
</head>
<body>
    <nav class="navegador">
            <img src="logo_web.jpg" alt="" style="width:200px;">

    </nav>
    <a href="index.php"><button style="margin:10px;">Volver Principal</button></a>
    <div class="container">
        <H1 style="color:green; margin:2% auto; text-align:center;">PANEL DE ADMINISTRADOR</H1>
        <div class="form1">
            <h2>Fabricante y Modelo</h2>
        <form action="" method="post">
            <label for="">Fabricante</label><br>
            <input type="text" name="fabricante" id="" required><br><br>
            <label for="">Modelo</label><br>
            <input type="text" name="modelo" id="" required><br><br>
            <button name="enviar">Enviar</button>
            
            <button name="eliminar">Eliminar</button>
        </form>
        </div>






        <div class="form2">
            <h2>Boletines</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
        <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricante" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
	   
                
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modelo" style="width:177px" required>
                    </select>
                    <br><br>

            <label for="">Boletines</label><br>
            <input type="text" name="boletines" id="" required><br><br>
            <input type="file" name="file_boletines" id="" required><br><br>
            <button name="enviar_boletin">Enviar</button> 
            <button name="modificar_boletin">Modificar</button>
            <button name="eliminar_boletin">Eliminar</button>  
        </form>
        </div>







        <div class="form3">
            <h2>Firmwares</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
            <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricanteF" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modeloF" style="width:177px" required>
                    
                    </select>
            <br><br>
            <label for="">Firmware</label><br>
            <input type="text" name="firmwares" id=""required><br><br>
            <input type="file" name="file_firmwares" id="" required><br><br>
            <button name="mandar">Enviar</button>
            <button name="modificar_firmwares">Modificar</button>
            <button name="eliminar_firmwares">Eliminar</button>   
        </form>
        </div>




        <div class="form4">
            <h2>Manuales</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
            <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricanteM" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modeloM" style="width:177px" required>
                    </select> 
            <br><br>
            <label for="">Manuales</label><br>
            <input type="text" name="manuales" id=""><br><br>
            
            <input type="file" name="file_manuales" id="" ><br><br>
            <button name="enviar_manuales">Enviar</button>
            <button name="modificar_manuales">Modificar</button>
            <button name="eliminar_manuales">Eliminar</button>   
        </form>
        </div>
        <div class="form4">
            <h2>Miscelánea</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
            <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricanteMi" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modeloMi" style="width:177px" required>
                    </select>
            <br><br>
            <label for="">Miscelánea</label><br>
            <input type="text" name="micelania" id=""><br><br>
            <input type="file" name="file_micelania" id="" ><br><br>
            <button name="enviar_micelania">Enviar</button>
            <button name="modificar_micelania">Modificar</button>
            <button name="eliminar_micelania">Eliminar</button>   
        </form>
        </div>
        <div class="form5">
            <h2>Multimedia</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
            <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricanteMu" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modeloMu" style="width:177px" required>
                    </select>
            <br><br>
            <label for="">Multimedia</label><br>
            <input type="text" name="multimedia" id=""><br><br>
            <input type="file" name="file_multimedia" id="" ><br><br>
            <button name="enviar_multimedia">Enviar</button>
            <button name="modificar_multimedia">Modificar</button>
            <button name="eliminar_multimedia">Eliminar</button>  
        </form>
        </div>
        <div class="form5">
            <h2>Softwares</h2>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="">Fabricante</label><br>
            <?php
	        //Desplegable fabricante
		   $host='localhost';
		   $user='root';
		   $pwd='practica1';
		   $nombreBD='RUFINO_BD_FINAL';
		   $conectar=mysqli_connect($host,$user,$pwd);
		   if(!$conectar){
			   echo "No hay conexion";
		   }else{
			   mysqli_select_db($conectar,$nombreBD);
			   $consulta1="SELECT id_marca,nombre FROM marca; ";
			   $resultado1=mysqli_query($conectar,$consulta1);
			   if(mysqli_num_rows($resultado1) > 0){
			   ?>
			   <select name="fabricante" class="opciones" id="fabricanteS" style="width:177px" required>
			   <option value=""></option>
               <?php
				   while($fila=mysqli_fetch_array($resultado1)){
					   
				   ?>
				   <option value="<?php echo $fila[0] ?>"><?php echo $fila[1]; ?></option>
				   }
					   }
				   <?php    
				   }
			   ?>
			   </select>
			   <?php
			   }   
		   }      
	   ?>
            <br><br>
            <label for="">Modelo</label><br>
            <?php //Desplegable de modelo ?>
                    <select name="modelo" class="opciones" id="modeloS" style="width:177px" required>
                    
                    </select>
            <br><br>
            <label for="">Softwares</label><br>
            <input type="text" name="softwares" id=""><br><br>
            <label for="">Soporte</label><br>
            <input type="text" name="soporte" id=""><br><br>
            <input type="file" name="file_softwares" id="" ><br><br>
            <button name="enviar_softwares">Enviar</button> 
            <button name="modificar_softwares">Modificar</button>
            <button name="eliminar_softwares">Eliminar</button>  
        </form>
        </div>
        
       
        <div class=form5>
        
           <h2>Control de usuarios</h2>
           
           <form action="" method="post" enctype="multipart/form-data" autocomplete="on">
                <label for="">Usuario</label><br>
                <select name="usuario" id="" style="width:177px">
                <option value=""></option>
                <?php 
                    $ver_usuario="SELECT id_usuario,usuario FROM usuario_login;";
                    $compr_usuario=mysqli_query($conectar,$ver_usuario);
                    if(mysqli_num_rows($compr_usuario)>0){
                        while($fila=mysqli_fetch_array($compr_usuario)){
                            ?>
                            <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
                            <?php
                        }
                    }
                ?>
                </select><br><br>
                <?php
                if(isset($_POST['autocompletar'])){
                    $usuario=$_POST['usuario'];
                    $complete="SELECT usuario FROM usuario_login WHERE id_usuario=$usuario; ";
                    $autocomplete=mysqli_query($conectar,$complete);
                    if(mysqli_num_rows($autocomplete)>0){
                        while($row=mysqli_fetch_array($autocomplete)){
                            
                            ?>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $row[0]; ?>"><br><br>
                            <?php
                        }
                    }
                }else{
                ?>

                <input type="text" name="nombre" id="nombre"><br><br>
                <?php
                }
                ?>
                <button name="autocompletar">Autocompletar</button><br><br>
                
                <label for="">Contraseña</label><br>
                
               <input type="text" name="password" id=""><br><br>
               
                <label for="">ROLES</label><br>
                <div>
                <label for=""><input  type="radio" name="user" id="administrador" value="administrador">ADMINISTRADOR</label>
                <label for=""><input  type="radio" name="user" id="tecnico" value="tecnico">TECNICO</label><br><br>
                </div>
                <div>
                <?php
                    $checkbox="SELECT LOWER(nombre) FROM marca;";
                    $check=mysqli_query($conectar,$checkbox);
                    if(mysqli_num_rows($check)>0){
                        while($c=mysqli_fetch_array($check)){
                            ?>
                            <div style=" text-align:left; margin-left:120px">
                            <label for=""><input  type="checkbox" name="<?php echo $c[0]; ?>" id="<?php echo $c[0]; ?>" value="<?php echo $c[0]; ?>" ><?php echo $c[0]; ?></label><br>
                            </div>
                            <?php
                        }
                    }
                ?>
                
                </div><br>
                <?php
                if(isset($_POST['autocompletar'])){
                $usuario=$_POST['usuario'];
                $complete="SELECT  apellidos FROM usuario_login WHERE id_usuario=$usuario;";
                $autocomplete=mysqli_query($conectar,$complete);
                    if(mysqli_num_rows($autocomplete)>0){
                        while($row=mysqli_fetch_array($autocomplete)){
                            ?>
                            <label for="">Apellidos</label><br>
                            <input type="text" name="apellidos" id="" value="<?php echo $row[0]; ?>"><br><br>
                            <?php
                        }
                    }
                }else{
                ?>
                <label for="">Apellidos</label><br>
                <input type="text" name="apellidos" id="" value="<?php  ?>"><br><br>
                <?php
                }
                ?>
                <?php
                 if(isset($_POST['autocompletar'])){
                $usuario=$_POST['usuario'];
                $complete="SELECT  email FROM usuario_login WHERE id_usuario=$usuario;";
                $autocomplete=mysqli_query($conectar,$complete);
                    if(mysqli_num_rows($autocomplete)>0){
                        while($row=mysqli_fetch_array($autocomplete)){
                            ?>
                          <label for="">Email</label><br>
                          <input type="email" name="correo" id="" value="<?php echo $row[0];  ?>"><br><br> 
                          <?php
                        }
                    }
                }else{
                ?>
                <label for="">Email</label><br>
                <input type="email" name="correo" id="" value="<?php  ?>"><br><br>
                <?php
                }
                ?>
                <?php
                 if(isset($_POST['autocompletar'])){
                $usuario=$_POST['usuario'];
                $complete="SELECT  empresa FROM usuario_login WHERE id_usuario=$usuario;";
                $autocomplete=mysqli_query($conectar,$complete);
                    if(mysqli_num_rows($autocomplete)>0){
                        while($row=mysqli_fetch_array($autocomplete)){
                            ?>
                           <label for="">Empresa</label><br>
                           <input type="text" name="empresa" id="" value="<?php echo $row[0];  ?>"><br><br>
                          <?php
                        }
                    }
                }else{
                ?>
                <label for="">Empresa</label><br>
                <input type="text" name="empresa" id="" value="<?php  ?>"><br><br>
                <?php
                }
                ?>
                <?php
                 if(isset($_POST['autocompletar'])){
                $usuario=$_POST['usuario'];
                $complete="SELECT  telefono FROM usuario_login WHERE id_usuario=$usuario;";
                $autocomplete=mysqli_query($conectar,$complete);
                    if(mysqli_num_rows($autocomplete)>0){
                        while($row=mysqli_fetch_array($autocomplete)){
                            ?>
                            <label for="">Telefono</label><br>
                            <input type="tel" name="telefono" id="" value="<?php echo $row[0];  ?>"><br><br>
                          <?php
                        }
                    }
                }else{
                ?>
                <label for="">Telefono</label><br>
                <input type="tel" name="telefono" id="" value="<?php   ?>"><br><br>
                <?php
                }
                ?>
               
                <button name="modificar">Modificar</button>
                <button name="eliminar_usuario">Eliminar</button>
               
                    
                
                

           </form>
        </div>
    </div>
    
</body>
</html>
  