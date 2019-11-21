<?php 

    if(isset($_POST['btnEliminar'])){
        $idUsuario = $_POST['btnEliminar'];
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $consultaEliminar = "update trabajador set eliminado=1 where id_trabajador=".$idUsuario;
        $resultado = mysqli_query($con, $consultaEliminar);
        
        if($resultado){
        //update trabajador set eliminado=1 where id_trabajador=1;
        echo "Se elimino al usuario con id ".$idUsuario;
        }
    }

?>