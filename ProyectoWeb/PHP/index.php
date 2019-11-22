<?php

    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
    
            
            if(isset($_POST['btnEnviar'])){
                $usuario = $_POST['inputId'];
                $contrasena = $_POST['inputContra'];
                //echo "us".$usuario."contra".$contrasena;
                $consulta = "select *from trabajador where id_trabajador=".$usuario." and contrasena='".$contrasena."'";
                //$consulta = "select *from trabajador where id_trabajador=".$usuario;
                $ejecutar = mysqli_query($con, $consulta);
                
                //echo get_resource_type($ejecutar) . "\n";          
                if(mysqli_num_rows($ejecutar)){
                    $mostrarNombre = "select nombre from trabajador where id_trabajador=".$usuario;
                    $resMostrarN = mysqli_query($con, $mostrarNombre) or die(mysqli_error($con));
                    while($filas = mysqli_fetch_assoc($resMostrarN)){
                        
                            //  echo'<script type="text/javascript">
                            //         alert("Bienvenido "'.$filas["nombre"].');
                            //         window.location.href="trabajador.php";
                            //  </script>';
                            echo'<script type="text/javascript">
                                     alert("Bienvenido ");
                                     window.location.href="trabajador.php";
                              </script>';
                            //echo "ok ".$filas['nombre'];
                    }

                }
                else{
                    echo'<script type="text/javascript">
                    alert("No existe tu cuenta");
                    window.location.href="../index.html";
                    </script>';
                }
            }
?>
