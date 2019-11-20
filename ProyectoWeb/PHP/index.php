


<?php

    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
    
            
            if(isset($_POST['btnEnviar'])){
                $usuario = $_POST['inputId'];
                $contrasena = $_POST['inputContra'];
                echo "us".$usuario."contra".$contrasena;
                $consulta = "select *from trabajador where id_trabajador=".$usuario." and contrasena='".$contrasena."'";
                //$consulta = "select *from trabajador where id_trabajador=".$usuario;
                $ejecutar = mysqli_query($con, $consulta);
                
                //echo get_resource_type($ejecutar) . "\n";          
                if(mysqli_num_rows($ejecutar)){
                    echo"Bienvenido";
                    echo "<script>alert('Bienvenido');</script>";

                }
                else
                    echo"No existe tu cuenta";
            }
?>
