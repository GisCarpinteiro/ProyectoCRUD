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
        echo "nombre ".$nombreT."idUsuario ".$idUsuario;
        // $consultaEditarT = "";
        // $resultadoEditarT = mysqli_query($con, $consultaEditarT);

        // if($resultadoEditarT){
        //     echo "Se edito la informacion del usuario".$idUsuario;
        // }
        // else echo "Hubo un error al editar la informacion";
    }

?>