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
        $idPedido = $_POST['btnEditarP'];
        $fechaP = $_POST['fechaP'.$idPedido];
        $horaP = $_POST['horaP'.$idPedido];
        $totalP = $_POST['totalP'.$idPedido];
        $subtotalP = $_POST['subtotalP'.$idPedido];
        $nombreTP = $_POST['trabajadorP'.$idPedido];
        //echo "valores".$fechaP.$horaP.$totalP.$subtotalP.$nombreTP;
        $consultanombre = "select id_trabajador from trabajador where nombre='".$nombreTP."'";
        $resNombreT = mysqli_query($con, $consultanombre) or die(mysqli_error($con));
    
        while($filita=mysqli_fetch_assoc($resNombreT)){
            $consultaEditarP = "update pedido set fecha='".$fechaP."', hora='".$horaP."', total=".$totalP.", subtotal=".$subtotalP.", id_trabajador=".$filita['id_trabajador']." where id_pedido=".$idPedido;
            $resEditar =mysqli_query($con, $consultaEditarP);
            if($resEditar){
                echo'<script type="text/javascript">
                alert("Se edito el pedido");
                window.location.href="pedido.php";
                </script>';
            }
            else{
                echo'<script type="text/javascript">
                alert("No se pudo editar el pedido");
                window.location.href="pedido.php";
                </script>';
            }
        }
        //sacar id_trabajador
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
           //echo "id trabajador".$fila['id_trabajador'];
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

    if(isset($_POST['btnJson'])){
        $consultaMostrar = "select pedido.fecha, pedido.hora, pedido.subtotal, pedido.total, pedido.id_trabajador, pedido.id_pedido, trabajador.nombre from pedido inner join trabajador on pedido.id_trabajador = trabajador.id_trabajador where pedido.eliminado = 0";
        $usuarios = mysqli_query ($con, $consultaMostrar);
        foreach($usuarios as $usuario){
            $usuario = json_encode($usuario);
            echo $usuario."<br>";
        }

    }
?>