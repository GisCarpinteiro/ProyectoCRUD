<?php 
    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");


    if(isset($_POST['btnEliminarT'])){
        $idUsuario = $_POST['btnEliminarT'];
        $consultaEliminar = "update trabajador set eliminado=1 where id_trabajador=".$idUsuario;
        $resultado = mysqli_query($con, $consultaEliminar);
        
        if($resultado){
        //update trabajador set eliminado=1 where id_trabajador=1;
        echo "Se elimino al usuario con id ".$idUsuario;
        }
    }

    if(isset($_POST['btnEditarT'])){
        $idUsuario = $_POST['btnEditarT'];
        $nombreT = $_POST['nombreT'.$idUsuario];
        $apellidoT = $_POST['apellidoT'.$idUsuario];
        $telefonoT = $_POST['telefonoT'.$idUsuario];
        $contraseniaT = $_POST['contraseniaT'.$idUsuario];
        $puestoT = $_POST['puestoT'.$idUsuario];
        //echo "nombre ".$nombreT.$apellidoT.$telefonoT.$contraseniaT.$puestoT;
        $consultaEditarT = "update trabajador set nombre='".$nombreT."', apellido='".$apellidoT."', telefono='".$telefonoT."', contrasena='".$contraseniaT."', id_puesto=".$puestoT." where id_trabajador=".$idUsuario;
        $resultadoEditarT = mysqli_query($con, $consultaEditarT);

        if($resultadoEditarT){
            // echo "Se edito la informacion del usuario".$idUsuario;
            // echo "<script> alert('Se modifico la info del usuario') </script>";
            // header('Location: trabajador.php');
            echo'<script type="text/javascript">
                alert("Información editada");
                window.location.href="trabajador.php";
                </script>';

        }
        else echo "Hubo un error al editar la informacion";
    }

    if(isset($_POST['btnAgregarT'])){
        $nombreTN = $_POST['nombreTN'];
        $apellidoTN = $_POST['apellidoTN'];
        $telefonoTN = $_POST['telefonoTN'];
        $contraseniaTN = $_POST['contraseniaTN'];
        $puestoTN = $_POST['puestoTN'];
        echo "nombre ".$nombreTN.$apellidoTN.$telefonoTN.$contraseniaTN.$puestoTN;

    }

?>