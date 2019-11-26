<?php 
    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
    //echo "hola";


    if(isset($_POST['btnEliminarT'])){
        $idUsuario = $_POST['btnEliminarT'];
        $consultaEliminar = "update trabajador set eliminado=1 where id_trabajador=".$idUsuario;
        $resultado = mysqli_query($con, $consultaEliminar);
        
        if($resultado){
            //update trabajador set eliminado=1 where id_trabajador=1;
            echo'<script type="text/javascript">
            alert("Se elimino al usuario");
            window.location.href="trabajador.php";
            </script>';        
        }
        else{
            echo'<script type="text/javascript">
                alert("No se pudo eliminar al usuario");
                window.location.href="trabajador.php";
                </script>';
        }
    }

    if(isset($_POST['btnEditarT'])){
        $idUsuario = $_POST['btnEditarT'];
        $nombreT = $_POST['nombreT'.$idUsuario];
        $apellidoT = $_POST['apellidoT'.$idUsuario];
        $telefonoT = $_POST['telefonoT'.$idUsuario];
        $contraseniaT = $_POST['contraseniaT'.$idUsuario];
        $nombrePuesto= $_POST['puestoT'.$idUsuario];
        //consulta checar id_puesto
        //$puestoT 
        // echo $idUsuario.$nombreT.$apellidoT.$telefonoT.$contraseniaT.$nombrePuesto;

        $consultaIdPuesto ="select id_puesto from puesto where tipo_puesto='".$nombrePuesto."'";
        $resP = mysqli_query($con, $consultaIdPuesto) or die(mysqli_error($con));
        while ($puestoT=mysqli_fetch_assoc($resP)){

            //echo "id puesto es ".$puestoT['id_puesto'];
            $consultaEditarT = "update trabajador set nombre='".$nombreT."', apellido='".$apellidoT."', telefono='".$telefonoT."', contrasena='".$contraseniaT."', id_puesto=".$puestoT['id_puesto']." where id_trabajador=".$idUsuario;
            $resultadoEditarT = mysqli_query($con, $consultaEditarT) or die(mysqli_error($con));

            if($resultadoEditarT){
                // echo "Se edito la informacion del usuario".$idUsuario;
                // echo "<script> alert('Se modifico la info del usuario') </script>";
                // header('Location: trabajador.php');
                
                echo'<script type="text/javascript">
                    alert("Información editada");
                    window.location.href="trabajador.php";
                    </script>';

            }
            else {
                echo'<script type="text/javascript">
                alert("No se pudo editar la informacion");
                window.location.href="trabajador.php";
                </script>';
            }
        }
  
    }

    if(isset($_POST['btnAgregarT'])){
        $nombreTN = $_POST['nombreTN'];
        $apellidoTN = $_POST['apellidoTN'];
        $telefonoTN = $_POST['telefonoTN'];
        $contraseniaTN = $_POST['contraseniaTN'];
        $nombrePuestoN = $_POST['puestoTN']; //puestoTN
        $consultaIdPuestoN ="select id_puesto from puesto where tipo_puesto='".$nombrePuestoN."'";
        $resPN = mysqli_query($con, $consultaIdPuestoN);
        while ($puestoTN=mysqli_fetch_assoc($resPN)){
            echo "id puesto es ".$puestoTN['id_puesto'];
            $consultaInsertarT = "insert into trabajador values ('".$nombreTN."', '".$apellidoTN."', '".$telefonoTN."', '".$contraseniaTN."', null, ".$puestoTN['id_puesto'].", 0)";
            $resultadoInsertarT = mysqli_query($con, $consultaInsertarT) or die(mysqli_error($con));
            if($resultadoInsertarT){
                echo'<script type="text/javascript">
                        alert("Se agrego al usuario");
                        window.location.href="trabajador.php";
                        </script>';
            }
        else{
            echo'<script type="text/javascript">
                alert("No se pudo agregar al usuario");
                window.location.href="trabajador.php";
                </script>';
            //echo "No se puedo insertar ".$resultadoInsertarT;
            }
        }

     
        //echo "nombre ".$nombreTN.$apellidoTN.$telefonoTN.$contraseniaTN.$puestoTN;
       
        




    }

    if(isset($_POST['btnJson'])){
        $conMostrarT = "select puesto.tipo_puesto, trabajador.nombre, trabajador.apellido, trabajador.telefono, trabajador.contrasena, trabajador.id_trabajador from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto where trabajador.eliminado=0";
        $usuarios = mysqli_query ($con, $conMostrarT);
        foreach($usuarios as $usuario){
            $usuario = json_encode($usuario);
            echo $usuario."<br>";
        }

    }

    if(isset($_POST['btnXml'])){
        $conMostrarT = "select puesto.tipo_puesto, trabajador.nombre, trabajador.apellido, trabajador.telefono, trabajador.contrasena, trabajador.id_trabajador from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto where trabajador.eliminado=0";
        $usuarios = mysqli_query ($con, $conMostrarT);
        $trabajador = new domdocument("1.0");
        $raiz = new domelement("trabajadores");
        $raiz = $trabajador->appendChild($raiz);

       
            foreach ($usuarios as $usuario){
                $usuario_gift = new domelement("trabajador");
                $usuario_gift = $raiz->appendChild($usuario_gift);
                $idtrabajador = new DOMElement("id",$usuario['id_trabajador']);
                $idtrabajador = $usuario_gift->appendChild($idtrabajador);
                $nombre = new DOMElement("nombre",$usuario['nombre']);
                $nombre = $usuario_gift->appendChild($nombre);
                $apellido = new DOMElement("apellido",$usuario['apellido']);
                $apellido = $usuario_gift->appendChild($apellido);
                $telefono = new DOMElement("telefono",$usuario['telefono']);
                $telefono = $usuario_gift->appendChild($telefono);
                $contrasena = new DOMElement("contrasena",$usuario['contrasena']);
                $contrasena = $usuario_gift->appendChild($contrasena);
                $tipo_puesto = new DOMElement("tipo_puesto",$usuario['tipo_puesto']);
                $tipo_puesto = $usuario_gift->appendChild($tipo_puesto);
            }
         
        
        $trabajador->save("../XML/trabajador.xml");
        // $trabajador = simplexml_load_file("trabajador.xml");
        $trabajadorXml = "../XML/trabajador.xml";
        $trabajadorXsl = "../XSL/trabajador.xsl";
        
        $doc = new DOMDocument();
        $xsl = new XSLTProcessor();

        $doc->load($trabajadorXsl);
        $xsl->importStyleSheet($doc);


        $doc->load($trabajadorXml);
        echo $xsl->transformToXML($doc);
    }
?>