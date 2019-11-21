<?php 

    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");

    if(isset($_POST['btnEliminarP'])){
        $idPuesto = $_POST['btnEliminarP'];
        $consultaEliminarP = "update puesto set eliminado=1 where id_puesto=".$idPuesto;
        $resultadoConsultaE = mysqli_query($con, $consultaEliminarP);
        if($resultadoConsultaE){
            echo'<script type="text/javascript">
            alert("Se elimino el puesto");
            window.location.href="puesto.php";
            </script>';      
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo eliminar el puesto");
            window.location.href="trabajador.php";
            </script>';
        }
    }

    if(isset($_POST['btnEditarP'])){
        $idPuesto = $_POST['btnEditarP'];
        $tipo_puesto = $_POST['nombreP'.$idPuesto];
        //echo "edit = ".$tipo_puesto;
        $consultaEditarP = "update puesto set tipo_puesto='".$tipo_puesto."' where id_puesto=".$idPuesto;
        $resConsultaEP = mysqli_query($con, $consultaEditarP);
        if($resConsultaEP){
            echo'<script type="text/javascript">
            alert("Se modifico el puesto");
            window.location.href="puesto.php";
            </script>';   
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo modificar el puesto");
            window.location.href="trabajador.php";
            </script>';
        }
    }
?>