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

?>