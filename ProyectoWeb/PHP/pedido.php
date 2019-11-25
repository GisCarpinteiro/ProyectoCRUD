
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/disenioTablas.css">
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
    <form action="eventosPuesto.php" method="post">
        <ul class="opciones"> 
            <li> <button name="btnJson" type="submit" > <b> JSON </b> </button> </li>
            <li> <button name="btnJson" type="submit" >XML </button> </li>
            <li> <button name="btnJson" type="submit" >XSL </button> </li>
        </ul>
        </form>

    <form action="eventosPedido.php" method="post">
     <div class="tabla">
        <table border="2">
            <tr class="header">
                <td> &nbsp;Id&nbsp; </td>
                <td> Fecha </td>
                <td> Hora </td>
                <td> Subtotal </td>
                <td> Total </td>
                <td> Trabajador</td>
                <td> Acciones </td>
            </tr>
            <?php while($filas = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td> <?php echo $filas['id_pedido'] ?> </td>
                <td> <input type="date" name=<?php echo 'fechaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['fecha'] ?> required> </td>
                <td> <input type="time" name=<?php echo 'horaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['hora'] ?> required > </td>
                <td> <input type="number" name=<?php echo 'subtotalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['subtotal'] ?> required> </td>
                <td> <input type="number" name= <?php echo 'totalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['total'] ?>  > </td>
                <td> <input name=<?php echo 'trabajadorP'.$filas['id_pedido'] ?>  value =<?php echo $filas['nombre'] ?> required> </td>
                <td> <button value =<?php echo $filas['id_pedido'] ?> name ="btnEditarP" id="editar" > &nbsp;&nbsp;Editar&nbsp;&nbsp; </button> <button id="eliminar" value =<?php echo $filas['id_pedido'] ?>  name ="btnEliminarP"> Eliminar </button> </td>
            </tr>
            <?php }?>
     </div>
    </form>
    <form action="eventosPedido.php" method="post">
     <div>
            <tr>
                <td> # </td>
                <!-- <td> <input name="fechaPN" placeholder="Fecha"> </td> -->
                <td> <input type="date" id="txtfecha" name="fechaPN"  value="<?php echo date("Y-n-j"); ?>"  required/> </td>
                <td> <input type="time" id="txtfecha" name="horaPN"  value="<?php   echo date('h:i:s A');?>" required/> </td>
                <!-- <td> <input name="horaPN" placeholder="Hora"> </td> -->
                <td> <input type="number" name="subtotalPN" placeholder="Subtotal" required> </td>
                <td> <input type="number" name="totalPN" placeholder="Total" required disabled> </td>

                <td> 
                    <select name="nombreTPN">
                    <?php while($fila=mysqli_fetch_assoc($resultadoT)){?>
                        <option value=<?php echo $fila['nombre']?> > <?php echo $fila['nombre']?> </option> 
                    <?php } ?>
                    </select>
                 </td>
                <td> <button name="btnAgregarP" id="agregar"> Agregar </button> </td>
            </tr>
        </table>
     </div>
    </form>
</body>
</html>