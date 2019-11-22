<?php 
    $con = mysqli_connect("localhost", "root", "", "helados");
    if(isset($_POST['btnEliminarP'])){
        $idPedido = $_POST['btnEliminarP'];
        $consultaEliminarP = "update pedido set eliminado=1 where id_pedido=".$idPedido;
        $resultadoEliminarP = mysqli_query($con, $consultaEliminarP);
        if($resultadoEliminarP){
            echo'<script type="text/javascript">
            alert("Se elimino el pedido");
            window.location.href="pedido.php";
            </script>';  
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo eliminar el pedido");
            window.location.href="pedido.php";
            </script>';
        }
    }

    if(isset($_POST['btnEditarP'])){

    }

    if(isset($_POST['btnAgregarP'])){
        
        $fecha = $_POST['fechaPN'];
        $hora = $_POST['horaPN'];
        $total = $_POST['totalPN'];
        $subtotal = $_POST['subtotalPN'];
        $nombreTPN = $_POST['nombreTPN'];
        $consultanombre = "select id_trabajador from trabajador where nombre='".$nombreTPN."'";
        $resNT = mysqli_query($con, $consultanombre) or die(mysqli_error($con));
        while($fila=mysqli_fetch_assoc($resNT)){
            echo "id trabajador".$fila['id_trabajador'];
          $consultaAP = "insert into pedido values ('".$fecha."', '".$hora."', ".$subtotal.", ".$total.", ".$fila['id_trabajador'].", null, 0)"; //Utilizando inputs
          //$consultaAP = "insert into pedido values (curdate(), time(now()), ".$subtotal.", ".$total.", ".$fila['id_trabajador'].", null, 0)"; //dia y hora actual
           
            $resConsultaAP = mysqli_query($con, $consultaAP)or die(mysqli_error($con));
             if($resConsultaAP){
                echo'<script type="text/javascript">
                alert("Se agrego el pedido");
                window.location.href="pedido.php";
                </script>';
            }
            else{
                echo'<script type="text/javascript">
                alert("No se pudo agregar el pedido");
                window.location.href="pedido.php";
                </script>';
            }
        }
    }

?>