<?php
session_start();
$host='localhost';
$user='root';
$pwd='practica1';
$nombreBD='RUFINO_BD_FINAL';
$enlace=mysqli_connect($host,$user,$pwd);

if(!$enlace){
	echo "No estas conectado";
}else{
    mysqli_select_db($enlace,$nombreBD);
    if(isset($_POST['buscar'])){
        $fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $boletines=$_POST['boletines'];
        $manuales=$_POST['manuales'];
        $softwares=$_POST['softwares'];
        $firmwares=$_POST['firmwares'];
        $multimedia=$_POST['multimedia'];
        $micelania=$_POST['micelania'];

        if(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                
                
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista7="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7);
             if(!$sql2){
                 echo "No conecta la vista7";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table id="tabla" style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista7_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7_1);
             if(!$sql2){
                 echo "No conecta la vista7_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                   <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista7_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7_2);
             if(!$sql2){
                 echo "No conecta la vista7_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista7_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7_3);
             if(!$sql2){
                 echo "No conecta la vista7_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista7_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7_4);
             if(!$sql2){
                 echo "No conecta la vista7_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista7_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            ;";
             $sql2=mysqli_query($enlace,$vista7_5);
             if(!$sql2){
                 echo "No conecta la vista7_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
             <?php
           
        
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista2="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo,b.archivo_b 
             
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines';";
    
            $sql2=mysqli_query($enlace,$vista2);
            if(!$sql2){
                echo "No conecta la vista2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
                <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
            </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista3="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista3);
             if(!$sql2){
                 echo "No conecta la vista3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista2_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista2_2);
            if(!$sql2){
                echo "No conecta la vista2_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
                <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
       
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista4="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista4);
             if(!$sql2){
                 echo "No conecta la vista4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista4_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista4_2);
            if(!$sql2){
                echo "No conecta la vista4_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista4_3="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista4_3);
            if(!$sql2){
                echo "No conecta la vista4_3";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
                <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista5="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista5);
             if(!$sql2){
                 echo "No conecta la vista5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista5_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista5_2);
            if(!$sql2){
                echo "No conecta la vista5_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista5_3="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista5_3);
            if(!$sql2){
                echo "No conecta la vista5_3";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista5_4="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista5_4);
            if(!$sql2){
                echo "No conecta la vista5_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista6="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista6);
             if(!$sql2){
                 echo "No conecta la vista6";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista6_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista6_2);
            if(!$sql2){
                echo "No conecta la vista6_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista6_3="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista6_3);
            if(!$sql2){
                echo "No conecta la vista6_3";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista6_4="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista6_4);
            if(!$sql2){
                echo "No conecta la vista6_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista6_5="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo 
             
            FROM marca m, modelo mo,multimedia mu 
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista6_5);
            if(!$sql2){
                echo "No conecta la vista6_5";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&!empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista7="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista7);
             if(!$sql2){
                 echo "No conecta la vista7";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista7_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista7_2);
            if(!$sql2){
                echo "No conecta la vista7_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista7_3="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista7_3);
            if(!$sql2){
                echo "No conecta la vista7_3";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista7_4="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista7_4);
            if(!$sql2){
                echo "No conecta la vista7_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista7_5="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo 
             
            FROM marca m, modelo mo,multimedia mu 
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista7_5);
            if(!$sql2){
                echo "No conecta la vista7_5";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista7_6="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo 
             
            FROM marca m, modelo mo,micelania mi 
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista7_6);
            if(!$sql2){
                echo "No conecta la vista7_6";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php    
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista8="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista8);
            if(!$sql2){
                echo "No conecta la vista8";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista9="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY s.soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista9);
            if(!$sql2){
                echo "No conecta la vista9";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte_tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista10="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
             
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista10);
            if(!$sql2){
                echo "No conecta la vista10";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista11="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
             
            FROM marca m, modelo mo,multimedia mu 
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista11);
            if(!$sql2){
                echo "No conecta la vista11";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista12="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
             
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista12);
            if(!$sql2){
                echo "No conecta la vista12";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
            </body>
            </html>
            <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista13="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista13);
             if(!$sql2){
                 echo "No conecta la vista13";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista13_2="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares';";
    
            $sql2=mysqli_query($enlace,$vista13_2);
            if(!$sql2){
                echo "No conecta la vista13_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista14="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista14);
             if(!$sql2){
                 echo "No conecta la vista14";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista14_2="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista14_2);
            if(!$sql2){
                echo "No conecta la vista14_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista15="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista15);
             if(!$sql2){
                 echo "No conecta la vista15";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista15_2="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo 
             
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista15_2);
            if(!$sql2){
                echo "No conecta la vista15_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista16="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista16);
             if(!$sql2){
                 echo "No conecta la vista16";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista16_2="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo 
             
            FROM marca m, modelo mo,micelania mi 
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista16_2);
            if(!$sql2){
                echo "No conecta la vista16_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        

        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista17="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista17);
             if(!$sql2){
                 echo "No conecta la vista17";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista17_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista17_2);
            if(!$sql2){
                echo "No conecta la vista17_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista18="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista18);
             if(!$sql2){
                 echo "No conecta la vista18";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista18_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista18_2);
            if(!$sql2){
                echo "No conecta la vista18_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista19="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista19);
             if(!$sql2){
                 echo "No conecta la vista19";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista19_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista19_2);
            if(!$sql2){
                echo "No conecta la vista19_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista20="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista20);
             if(!$sql2){
                 echo "No conecta la vista20";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista20_2="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo 
             
            FROM marca m, modelo mo,micelania mi 
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista20_2);
            if(!$sql2){
                echo "No conecta la vista20_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
            
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista21="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista21);
             if(!$sql2){
                 echo "No conecta la vista21";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista21_2="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares';";
    
            $sql2=mysqli_query($enlace,$vista21_2);
            if(!$sql2){
                echo "No conecta la vista21_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte Tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista22="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista22);
             if(!$sql2){
                 echo "No conecta la vista22";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista22_2="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo 
             
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista22_2);
            if(!$sql2){
                echo "No conecta la vista22_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
            
       }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="table.css" rel="stylesheet" type="text/css">
            <title>Document</title>
        </head>
        <body>
            <nav class="navegador" style="border-bottom:green solid 2px">
                <img src="logo_web.jpg" alt="" style="width:200px;">

            </nav>  
        <?php
        $vista23="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
        FROM marca m, modelo mo,softwares s 
        WHERE id_marca=marca_id
        AND id_modelo=softwares_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND s.id_softwares like '$softwares'
        ;";
         $sql2=mysqli_query($enlace,$vista23);
         if(!$sql2){
             echo "No conecta la vista23";
         }else{
             if(mysqli_num_rows($sql2)>0){
                
                     
                     ?>
                     <h2 style="text-align: center;">SOFTWARES</h2>
                    <table style="width:60%;text-align:center;margin:2% auto;">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>softwares</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           <th>Soporte tecnico</th>
                           <th>Archivo</th>
                       </tr>
                       <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           <td><?php echo $fila[5] ?></td>
                           <td>
                           
                                <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr>
                       <?php } ?> 

                    </table><br><br><br>
                    
                    
                

                    <?php
                 

             }
         }
         $vista23_2="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo 
         
        FROM marca m, modelo mo,micelania mi
        WHERE id_marca=marca_id
        AND id_modelo=micelania_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND mi.id_micelania like '$micelania';";

        $sql2=mysqli_query($enlace,$vista23_2);
        if(!$sql2){
            echo "No conecta la vista23_2";
        }else{
            if(mysqli_num_rows($sql2)>0){
               
                   
                    ?>

                    <h2 style="text-align:center">MICELANIA</h2>
                    <table style="width:60%;text-align:center;margin:2% auto;">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Micelania</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           <th>Archivo</th>
                       </tr>
                       <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           <td>
                           
                                <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                        <?php } ?>
                       </tr> 

                    </table>
                    <?php
                

            }
        }
         ?>
         <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
         </body>
        </html>
         <?php

        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista24="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista24);
             if(!$sql2){
                 echo "No conecta la vista24";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista24_2="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
             
            FROM marca m, modelo mo,multimedia mu 
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista24_2);
            if(!$sql2){
                echo "No conecta la vista24_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
         
            
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista25="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista25);
             if(!$sql2){
                 echo "No conecta la vista25";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista25_2="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
             
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista25_2);
            if(!$sql2){
                echo "No conecta la vista25_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista26="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista26);
             if(!$sql2){
                 echo "No conecta la vista26";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista26_2="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
             
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista26_2);
            if(!$sql2){
                echo "No conecta la vista26_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista27="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista27);
             if(!$sql2){
                 echo "No conecta la vista27";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista27_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista27_2);
            if(!$sql2){
                echo "No conecta la vista27_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            $vista27_4="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista27_4);
            if(!$sql2){
                echo "No conecta la vista27_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista28="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista28);
             if(!$sql2){
                 echo "No conecta la vista28";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista28_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista28_2);
            if(!$sql2){
                echo "No conecta la vista28_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            $vista28_4="SELECT m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo 
             
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia';";
    
            $sql2=mysqli_query($enlace,$vista28_4);
            if(!$sql2){
                echo "No conecta la vista28_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MULTIMEDIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista29="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista29);
             if(!$sql2){
                 echo "No conecta la vista29";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             $vista29_2="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo 
             
            FROM marca m, modelo mo,manuales ma 
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales';";
    
            $sql2=mysqli_query($enlace,$vista29_2);
            if(!$sql2){
                echo "No conecta la vista29_2";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MANUALES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            
            $vista29_4="SELECT m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo 
             
            FROM marca m, modelo mo,micelania mi 
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania';";
    
            $sql2=mysqli_query($enlace,$vista29_4);
            if(!$sql2){
                echo "No conecta la vista29_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">MICELANIA</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista30="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b 
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista30);
             if(!$sql2){
                 echo "No conecta la vista30";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                    
                         
                         ?>
                         <h2 style="text-align: center;">BOLETINES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php  while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr>
                           <?php } ?> 

                        </table><br><br><br>
                        
                        
                    

                        <?php
                     
 
                 }
             }
             
             
            $vista30_3="SELECT m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico 
             
            FROM marca m, modelo mo,softwares s 
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ORDER BY soporte_tecnico;";
    
            $sql2=mysqli_query($enlace,$vista30_3);
            if(!$sql2){
                echo "No conecta la vista30_3";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">SOFTWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
            $vista30_4="SELECT m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo 
             
            FROM marca m, modelo mo,firmwares f 
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares';";
    
            $sql2=mysqli_query($enlace,$vista30_4);
            if(!$sql2){
                echo "No conecta la vista30_4";
            }else{
                if(mysqli_num_rows($sql2)>0){
                   
                       
                        ?>

                        <h2 style="text-align:center">FIRMWARES</h2>
                        <table style="width:60%;text-align:center;margin:2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                           <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                            <?php } ?>
                           </tr> 

                        </table>
                        <?php
                    

                }
            }
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista31="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista31);
             if(!$sql2){
                 echo "No conecta la vista31";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            
            $vista31_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista31_2);
             if(!$sql2){
                 echo "No conecta la vista31_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
           
            $vista31_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista31_4);
             if(!$sql2){
                 echo "No conecta la vista31_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
    
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista32="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista32);
             if(!$sql2){
                 echo "No conecta la vista32";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            
            $vista32_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista32_2);
             if(!$sql2){
                 echo "No conecta la vista32_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
            $vista32_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista32_5);
             if(!$sql2){
                 echo "No conecta la vista32_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            $vista33_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista33_1);
             if(!$sql2){
                 echo "No conecta la vista33_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista33_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista33_2);
             if(!$sql2){
                 echo "No conecta la vista33_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista33_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista33_3);
             if(!$sql2){
                 echo "No conecta la vista33_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
           
            $vista34_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista34_1);
             if(!$sql2){
                 echo "No conecta la vista34_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista34_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista34_2);
             if(!$sql2){
                 echo "No conecta la vista34_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista34_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista34_4);
             if(!$sql2){
                 echo "No conecta la vista34_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            $vista35_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista35_1);
             if(!$sql2){
                 echo "No conecta la vista35_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista35_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista35_2);
             if(!$sql2){
                 echo "No conecta la vista35_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
            $vista35_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista35_5);
             if(!$sql2){
                 echo "No conecta la vista7_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            
            $vista36_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista36_2);
             if(!$sql2){
                 echo "No conecta la vista36_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista36_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista36_3);
             if(!$sql2){
                 echo "No conecta la vista36_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista36_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista36_4);
             if(!$sql2){
                 echo "No conecta la vista36_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
           
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            
            $vista37_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista37_2);
             if(!$sql2){
                 echo "No conecta la vista37_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista37_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista37_3);
             if(!$sql2){
                 echo "No conecta la vista37_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista37_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista37_5);
             if(!$sql2){
                 echo "No conecta la vista37_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista38="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista38);
             if(!$sql2){
                 echo "No conecta la vista38";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            
           
            $vista38_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista38_3);
             if(!$sql2){
                 echo "No conecta la vista38_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
           
            $vista38_5="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista38_5);
             if(!$sql2){
                 echo "No conecta la vista38_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista39="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista39);
             if(!$sql2){
                 echo "No conecta la vista39";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            
            
            $vista39_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista39_3);
             if(!$sql2){
                 echo "No conecta la vista39_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista39_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista39_5);
             if(!$sql2){
                 echo "No conecta la vista39_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista40="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista40);
             if(!$sql2){
                 echo "No conecta la vista40";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista40_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista40_1);
             if(!$sql2){
                 echo "No conecta la vista40_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista40_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista40_2);
             if(!$sql2){
                 echo "No conecta la vista40_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista40_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista40_4);
             if(!$sql2){
                 echo "No conecta la vista40_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista41="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista41);
             if(!$sql2){
                 echo "No conecta la vista41";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista41_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista41_1);
             if(!$sql2){
                 echo "No conecta la vista41_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista41_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista41_2);
             if(!$sql2){
                 echo "No conecta la vista41_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
            $vista41_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista41_5);
             if(!$sql2){
                 echo "No conecta la vista41_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
    

        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            $vista42_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista42_1);
             if(!$sql2){
                 echo "No conecta la vista42_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista42_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista42_2);
             if(!$sql2){
                 echo "No conecta la vista42_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista42_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista42_3);
             if(!$sql2){
                 echo "No conecta la vista42_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista42_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista42_4);
             if(!$sql2){
                 echo "No conecta la vista42_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
   
        }elseif(!empty($fabricante)&&!empty($modelo&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            
            $vista43_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista43_1);
             if(!$sql2){
                 echo "No conecta la vista43_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista43_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista43_2);
             if(!$sql2){
                 echo "No conecta la vista43_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista43_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista43_3);
             if(!$sql2){
                 echo "No conecta la vista43_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista43_4="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista43_4);
             if(!$sql2){
                 echo "No conecta la vista43_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 

        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista44_1="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista44_1);
             if(!$sql2){
                 echo "No conecta la vista44_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista44_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista44_2);
             if(!$sql2){
                 echo "No conecta la vista44_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista44_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista44_3);
             if(!$sql2){
                 echo "No conecta la vista44_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista44_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista44_4);
             if(!$sql2){
                 echo "No conecta la vista44_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php 
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista45_1="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista45_1);
             if(!$sql2){
                 echo "No conecta la vista45_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista45_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista45_2);
             if(!$sql2){
                 echo "No conecta la vista45_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista45_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista45_3);
             if(!$sql2){
                 echo "No conecta la vista45_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista45_4="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista45_4);
             if(!$sql2){
                 echo "No conecta la vista45_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php  
        
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista46_1="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista46_1);
             if(!$sql2){
                 echo "No conecta la vista46_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista46_2="SELECT  distinct m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista46_2);
             if(!$sql2){
                 echo "No conecta la vista46_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
           
            $vista46_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista46_3);
             if(!$sql2){
                 echo "No conecta la vista46_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista46_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista46_4);
             if(!$sql2){
                 echo "No conecta la vista46_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php  
         
        }elseif(!empty($fabricante)&&!empty($modelo&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania))){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista47_1="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista47_1);
             if(!$sql2){
                 echo "No conecta la vista47_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista47_2="SELECT  distinct m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista47_2);
             if(!$sql2){
                 echo "No conecta la vista47_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
           
            $vista47_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista47_3);
             if(!$sql2){
                 echo "No conecta la vista47_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista47_4="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista47_4);
             if(!$sql2){
                 echo "No conecta la vista47_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php   
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&empty($multimedia)&&!empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista48="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista48);
             if(!$sql2){
                 echo "No conecta la vista48";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista48_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista48_1);
             if(!$sql2){
                 echo "No conecta la vista48_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista48_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista48_2);
             if(!$sql2){
                 echo "No conecta la vista48_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista48_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista48_3);
             if(!$sql2){
                 echo "No conecta la vista48_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
                        
                        
                        
            
            $vista48_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista48_5);
             if(!$sql2){
                 echo "No conecta la vista48_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
            <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&!empty($softwares)&&empty($firmwares)&&!empty($multimedia)&&!empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista49="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista49);
             if(!$sql2){
                 echo "No conecta la vista49";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista49_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista49_1);
             if(!$sql2){
                 echo "No conecta la vista49_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista49_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista49_2);
             if(!$sql2){
                 echo "No conecta la vista49_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista49_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista49_4);
             if(!$sql2){
                 echo "No conecta la vista49_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista49_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista49_5);
             if(!$sql2){
                 echo "No conecta la vista49_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&!empty($manuales)&&empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&!empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista50="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista50);
             if(!$sql2){
                 echo "No conecta la vista50";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            $vista50_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
            FROM marca m, modelo mo,manuales ma
            WHERE id_marca=marca_id
            AND id_modelo=manuales_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND ma.id_manuales like '$manuales'
            ;";
             $sql2=mysqli_query($enlace,$vista50_1);
             if(!$sql2){
                 echo "No conecta la vista50_1";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MANUALES</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Manuales</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
            $vista50_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista50_3);
             if(!$sql2){
                 echo "No conecta la vista50_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista50_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista50_4);
             if(!$sql2){
                 echo "No conecta la vista50_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista50_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista50_5);
             if(!$sql2){
                 echo "No conecta la vista50_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
        }elseif(!empty($fabricante)&&!empty($modelo)&&!empty($boletines)&&empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&!empty($micelania)){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="table.css" rel="stylesheet" type="text/css">
                <title>Document</title>
            </head>
            <body>
                <nav class="navegador" style="border-bottom:green solid 2px">
                    <img src="logo_web.jpg" alt="" style="width:200px;">

                </nav>  
            <?php
            $vista51="SELECT m.nombre,mo.nombre,b.nombre,b.nombre_archivo,b.tamaño_archivo
            FROM marca m, modelo mo,boletines b
            WHERE id_marca=marca_id
            AND id_modelo=boletines_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND b.id_boletines like '$boletines'
            ;";
             $sql2=mysqli_query($enlace,$vista51);
             if(!$sql2){
                 echo "No conecta la vista51";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">BOLETINES</h2>
                         <table style="width:60%; text-align:center; margin: 2% auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Boletines</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td>
                               
                                    <a href="boletines/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br>
                        <?php
                 }
                }         
            
            $vista51_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
            FROM marca m, modelo mo,softwares s
            WHERE id_marca=marca_id
            AND id_modelo=softwares_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND s.id_softwares like '$softwares'
            ;";
             $sql2=mysqli_query($enlace,$vista51_2);
             if(!$sql2){
                 echo "No conecta la vista51_2";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">SOFTWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Softwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               <th>Soporte tecnico</th>
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               <td><?php echo $fila[5] ?></td>
                               <td>
                               
                                    <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista51_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
            FROM marca m, modelo mo,firmwares f
            WHERE id_marca=marca_id
            AND id_modelo=firmware_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND f.id_firmwares like '$firmwares'
            ;";
             $sql2=mysqli_query($enlace,$vista51_3);
             if(!$sql2){
                 echo "No conecta la vista51_3";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">FIRMWARES</h2>
                         <table style="width:60%; text-align:center; margin: auto;" >
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Firmwares</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista51_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
            FROM marca m, modelo mo,multimedia mu
            WHERE id_marca=marca_id
            AND id_modelo=multimedia_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mu.id_multimedia like '$multimedia'
            ;";
             $sql2=mysqli_query($enlace,$vista51_4);
             if(!$sql2){
                 echo "No conecta la vista51_4";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MULTIMEDIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Multimedia</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            $vista51_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
            FROM marca m, modelo mo,micelania mi
            WHERE id_marca=marca_id
            AND id_modelo=micelania_id
            AND m.id_marca like '$fabricante'
            AND mo.id_modelo like '$modelo'
            AND mi.id_micelania like '$micelania'
            ;";
             $sql2=mysqli_query($enlace,$vista51_5);
             if(!$sql2){
                 echo "No conecta la vista51_5";
             }else{
                 if(mysqli_num_rows($sql2)>0){
                     
                         

                         ?>
                         <h2 style="text-align:center;">MICELANIA</h2>
                         <table style="width:60%; text-align:center; margin: auto;">
                           <tr>
                               <th>Fabricante</th>
                               <th>Modelo</th>
                               <th>Micelania</th>
                               <th>Nombre del archivo</th>
                               <th>Tamaño del archivo</th>
                               
                               <th>Archivo</th>
                           </tr>
                            <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                           <tr>
                               <td><?php echo $fila[0] ?></td>
                               <td><?php echo $fila[1] ?></td>
                               <td><?php echo $fila[2] ?></td>
                               <td><?php echo $fila[3] ?></td>
                               <td><?php echo $fila[4] ?></td>
                               
                               <td>
                               
                                    <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                            
                               </td>
                           </tr> 
                            <?php } ?>
                        </table><br><br><br> 
                        
                        
                        
                        
                        <?php
                         
                     
 
                 }
            }
            
             
             ?>
             <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
             </div> 
             </body>
            </html>
             <?php
           
    }elseif(!empty($fabricante)&&!empty($modelo)&&empty($boletines)&&!empty($manuales)&&!empty($softwares)&&!empty($firmwares)&&!empty($multimedia)&&!empty($micelania)){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="table.css" rel="stylesheet" type="text/css">
            <title>Document</title>
        </head>
        <body>
            <nav class="navegador" style="border-bottom:green solid 2px">
                <img src="logo_web.jpg" alt="" style="width:200px;">

            </nav>  
        <?php
       
        $vista52_1="SELECT m.nombre,mo.nombre,ma.nombre,ma.nombre_archivo,ma.tamaño_archivo
        FROM marca m, modelo mo,manuales ma
        WHERE id_marca=marca_id
        AND id_modelo=manuales_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND ma.id_manuales like '$manuales'
        ;";
         $sql2=mysqli_query($enlace,$vista52_1);
         if(!$sql2){
             echo "No conecta la vista52_1";
         }else{
             if(mysqli_num_rows($sql2)>0){
                 
                     

                     ?>
                     <h2 style="text-align:center;">MANUALES</h2>
                     <table style="width:60%; text-align:center; margin: auto;">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Manuales</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           <th>Archivo</th>
                       </tr>
                        <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           <td>
                           
                                <a href="manuales/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr> 
                        <?php } ?>
                    </table><br><br><br> 
                    
                    
                    
                    
                    <?php
                     
                 

             }
        }
        $vista52_2="SELECT  distinct m.nombre,mo.nombre,s.nombre,s.nombre_archivo,s.tamaño_archivo,s.soporte_tecnico
        FROM marca m, modelo mo,softwares s
        WHERE id_marca=marca_id
        AND id_modelo=softwares_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND s.id_softwares like '$softwares'
        ;";
         $sql2=mysqli_query($enlace,$vista52_2);
         if(!$sql2){
             echo "No conecta la vista52_2";
         }else{
             if(mysqli_num_rows($sql2)>0){
                 
                     

                     ?>
                     <h2 style="text-align:center;">SOFTWARES</h2>
                     <table style="width:60%; text-align:center; margin: auto">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Softwares</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           <th>Soporte tecnico</th>
                           <th>Archivo</th>
                       </tr>
                        <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           <td><?php echo $fila[5] ?></td>
                           <td>
                           
                                <a href="softwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr> 
                        <?php } ?>
                    </table><br><br><br> 
                    
                    
                    
                    
                    <?php
                     
                 

             }
        }
        $vista52_3="SELECT  distinct m.nombre,mo.nombre,f.nombre,f.nombre_archivo,f.tamaño_archivo
        FROM marca m, modelo mo,firmwares f
        WHERE id_marca=marca_id
        AND id_modelo=firmware_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND f.id_firmwares like '$firmwares'
        ;";
         $sql2=mysqli_query($enlace,$vista52_3);
         if(!$sql2){
             echo "No conecta la vista52_3";
         }else{
             if(mysqli_num_rows($sql2)>0){
                 
                     

                     ?>
                     <h2 style="text-align:center;">FIRMWARES</h2>
                     <table style="width:60%; text-align:center; margin: auto;" >
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Firmwares</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           
                           <th>Archivo</th>
                       </tr>
                        <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           
                           <td>
                           
                                <a href="firmwares/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr> 
                        <?php } ?>
                    </table><br><br><br> 
                    
                    
                    
                    
                    <?php
                     
                 

             }
        }
        $vista52_4="SELECT  distinct m.nombre,mo.nombre,mu.nombre,mu.nombre_archivo,mu.tamaño_archivo
        FROM marca m, modelo mo,multimedia mu
        WHERE id_marca=marca_id
        AND id_modelo=multimedia_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        AND mu.id_multimedia like '$multimedia'
        ;";
         $sql2=mysqli_query($enlace,$vista52_4);
         if(!$sql2){
             echo "No conecta la vista52_4";
         }else{
             if(mysqli_num_rows($sql2)>0){
                 
                     

                     ?>
                     <h2 style="text-align:center;">MULTIMEDIA</h2>
                     <table style="width:60%; text-align:center; margin: auto;">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Multimedia</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           
                           <th>Archivo</th>
                       </tr>
                        <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           
                           <td>
                           
                                <a href="multimedia/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr> 
                        <?php } ?>
                    </table><br><br><br> 
                    
                    
                    
                    
                    <?php
                     
                 

             }
        }
        $vista52_5="SELECT  distinct m.nombre,mo.nombre,mi.nombre,mi.nombre_archivo,mi.tamaño_archivo
        FROM marca m, modelo mo,micelania mi
        WHERE id_marca=marca_id
        AND id_modelo=micelania_id
        AND m.id_marca like '$fabricante'
        AND mo.id_modelo like '$modelo'
        and mi.id_micelania like '$micelania'
        ;";
         $sql2=mysqli_query($enlace,$vista52_5);
         if(!$sql2){
             echo "No conecta la vista52_5";
         }else{
             if(mysqli_num_rows($sql2)>0){
                 
                     

                     ?>
                     <h2 style="text-align:center;">MICELANIA</h2>
                     <table style="width:60%; text-align:center; margin: auto;">
                       <tr>
                           <th>Fabricante</th>
                           <th>Modelo</th>
                           <th>Micelania</th>
                           <th>Nombre del archivo</th>
                           <th>Tamaño del archivo</th>
                           
                           <th>Archivo</th>
                       </tr>
                        <?php while($fila=mysqli_fetch_row($sql2)){ ?>
                       <tr>
                           <td><?php echo $fila[0] ?></td>
                           <td><?php echo $fila[1] ?></td>
                           <td><?php echo $fila[2] ?></td>
                           <td><?php echo $fila[3] ?></td>
                           <td><?php echo $fila[4] ?></td>
                           
                           <td>
                           
                                <a href="micelania/<?php echo $fila[3] ?>"><button type="submit">VER ARCHIVO</button></a>
                        
                           </td>
                       </tr> 
                        <?php } ?>
                    </table><br><br><br> 
                    
                    
                    
                    
                    <?php
                     
                 

             }
        }
        
         
         ?>
         <div style="text-align:center;">
             <button style="background-color:green;border:green solid 5px;text-decoration:none;"><a href="page.php">Volver</a></button>
        </div> 
         </body>
        </html>
         <?php
       
        
        
           
           

        
        
        }
            
       
        
    }else{
        
            

       

        





      

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="page.css" rel="stylesheet" type="text/css">
    <script src="page.js" language="javascript" type="text/javascript"></script>
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
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
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getBoletines.php", { id_modelo: id_modelo }, function(data){
							$("#boletines").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getManuales.php", { id_modelo: id_modelo }, function(data){
							$("#manuales").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getSoftwares.php", { id_modelo: id_modelo }, function(data){
							$("#softwares").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getFirmwares.php", { id_modelo: id_modelo }, function(data){
							$("#firmwares").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getMultimedia.php", { id_modelo: id_modelo }, function(data){
							$("#multimedia").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#modelo").change(function () {
					$("#modelo option:selected").each(function () {
						id_modelo = $(this).val();
						$.post("includes/getMicelania.php", { id_modelo: id_modelo }, function(data){
							$("#micelania").html(data);
						});            
					});
				})
			});
    </script>
    <title>Document</title>

</head>
<body>

<form action="" method="post" target="_blank">   
<nav id="cbp-hrmenu" class="cbp-hrmenu">
	<ul>
        <img src="logo_web.jpg" alt="" style="width:200px;">
		
		<li><label>Fabricante</label><br class="borrar">
       
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
               $user=$_SESSION['usuario'];
               $a="SELECT rol,rol2,rol3,rol4,rol5,rol6,rol7,rol8,rol9,rol10 FROM usuario_login WHERE usuario like '$user';";
               $b=mysqli_query($conectar,$a);
                   if(mysqli_num_rows($b)>0){
                       while($rol=mysqli_fetch_array($b)){
                        


			        $consulta1="SELECT id_marca,nombre FROM marca WHERE nombre IN('$rol[0]','$rol[1]','$rol[2]','$rol[3]','$rol[4]','$rol[5]','$rol[6]','$rol[7]','$rol[8]','$rol[9]'); ";
			        $resultado1=mysqli_query($conectar,$consulta1);
			        if(mysqli_num_rows($resultado1) > 0){
			        ?>
               
			        <select name="fabricante" class="opciones" id="fabricante" style="width:120px" required>
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
            }    
        }     
	   ?>
	   </select>
		   
	   </li>
		<li>
        <?php //Desplegamos modelo ?>
		<label for="">Modelo</label><br class="borrar">
                    <select name="modelo" id="modelo" class="opciones" style="width:120px" required>
                    </select>
        </li>
		<li>
        <?php //Desplegamos boletines ?>
		<label for="">Boletines</label><br class="borrar">
                    <select name="boletines" id="boletines" style="width:120px">
                    </select>        
        </li>
        <li>
		<label for="">Manuales</label><br class="borrar">
                <?php //Desplegable de manuales ?>
                                <select name="manuales" id="manuales" style="width:120px">
                                </select>
        </li>
        <li>
		<label for="">Softwares</label><br class="borrar">
                <?php //Desplegable de software ?>
                
                        <select name="softwares" id="softwares" style="width:120px"> 
                        </select>    
                       
                    
        </li>
        <li>
		<label for="">firmwares</label><br class="borrar">
                <?php //Desplegable de firmware. ?>
                        <select name="firmwares" id="firmwares" style="width:120px">
                       </select> 
                        
        </li>
        <li>
		<label for="">Multimedia</label><br class="borrar">
                <?php //Desplegable de multimedia. ?>
                        <select name="multimedia" id="multimedia" style="width:120px">
                        </select>
                       
        </li>
        <li>
		<label for="">Miscelania</label><br class="borrar">
        <?php //Desplegable micelania. ?>
                        <select name="micelania" id="micelania" style="width:120px">  
                        </select>
        </li>
        <button name="buscar">Buscar</button>
        <a href="index.php" style="margin-right: none;">Area privada</a>
        

		
	</ul>
    
</nav>
</form>
</body>
</html>

<?php
    }}
?>
        