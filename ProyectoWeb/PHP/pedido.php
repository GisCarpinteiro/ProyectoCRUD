
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido</title>
    
</head>
<body>
    <?php 
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $consultaMostrar = "select pedido.fecha, pedido.hora, pedido.subtotal, pedido.total, pedido.id_trabajador, pedido.id_pedido, trabajador.nombre from pedido inner join trabajador on pedido.id_trabajador = trabajador.id_trabajador where pedido.eliminado = 0";
        $consultaMostrarT = "select nombre from trabajador where eliminado=0";
        $resultado = mysqli_query($con, $consultaMostrar);
        $resultadoT = mysqli_query($con, $consultaMostrarT);
    ?>
    <form action="eventosPedido.php" method="post">
     <div>
        <table border="2">
            <tr>
                <td> # </td>
                <td> Fecha </td>
                <td> Hora </td>
                <td> Total </td>
                <td> Subtotal </td>
                <td> Trabajador</td>
                <td> Acciones </td>
            </tr>
            <?php while($filas = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td> <?php echo $filas['id_pedido'] ?> </td>
                <td> <input name=<?php echo 'fechaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['fecha'] ?>> </td>
                <td> <input name=<?php echo 'horaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['hora'] ?>> </td>
                <td> <input name=<?php echo 'totalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['total'] ?>> </td>
                <td> <input name=<?php echo 'subtotalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['subtotal'] ?>> </td>
                <td> <input name=<?php echo 'trabajadorP'.$filas['id_pedido'] ?>  value =<?php echo $filas['nombre'] ?>> </td>
                <td> <button value =<?php echo $filas['id_pedido'] ?> name ="btnEditarP" value > Editar </button> <button value =<?php echo $filas['id_pedido'] ?>  name ="btnEliminarP"> Eliminar </button> </td>
            </tr>
            <?php }?>
            <tr>
                <td> # </td>
                <!-- <td> <input name="fechaPN" placeholder="Fecha"> </td> -->
                <td> <input type="date" id="txtfecha" name="txtfecha"  value="<?php echo date("Y-n-j"); ?>" required disabled/> </td>
                <td> <input type="time" id="txtfecha" name="txtfecha"  value="<?php   echo date('h:i:s A');?>" required/> </td>
                <!-- <td> <input name="horaPN" placeholder="Hora"> </td> -->
                <td> <input name="totalPN" placeholder="Total"> </td>
                <td> <input name="subtotalPN" placeholder="Subtotal"> </td>
                <td> 
                    <select name="nombreTPN">
                    <?php while($fila=mysqli_fetch_assoc($resultadoT)){?>
                        <option value=<?php echo $fila['nombre']?> > <?php echo $fila['nombre']?> </option> 
                    <?php } ?>
                    </select>
                 </td>
                <td> <button name="btnAgregarP"> Agregar </button> </td>
            </tr>
        </table>
     </div>
    </form>
</body>
</html>