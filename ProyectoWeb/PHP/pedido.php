
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/disenioTablas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
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
        <ul class="opciones"> 
            <li> <button name="btnJson" type="submit" > <b> JSON </b> </button> </li>
            <!-- <li> <button name="btnJson" type="submit" >XML </button> </li> -->
            <!-- <li> <button name="btnJson" type="submit" >XSL </button> </li> -->
        </ul>
        </form>

    <form action="eventosPedido.php" method="post">
     <div class="tabla">
     <img src="../img/previous.png" id="regresar"  width="40" height="40" title="Regresar">
        <center>
         <h1> Pedido </h1>

        <table class="pedido" border="2">
            <tr class="header">
                <td> &nbsp;Id&nbsp; </td>
                <td> Fecha </td>
                <td> Hora </td>
                <td> Subtotal </td>
                <td> Total </td>
                <td> Trabajador</td>
                <td> Acciones </td>
            </tr>
            <?php 
                while($filas = mysqli_fetch_assoc($resultado)) { 
                    $conSelect = "select nombre as nombreT from trabajador where id_trabajador not in(select id_trabajador from pedido where id_trabajador=".$filas['id_trabajador']." ) and eliminado=0";
                    $resconSelect = mysqli_query($con, $conSelect);
            ?>
            <tr>
                <td> <?php echo $filas['id_pedido'] ?> </td>
                <td> <input type="date" name=<?php echo 'fechaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['fecha'] ?> required> </td>
                <td> <input type="time" name=<?php echo 'horaP'.$filas['id_pedido'] ?>  value =<?php echo $filas['hora'] ?> required > </td>
                <td> <input id="subtotal" type="number" name=<?php echo 'subtotalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['subtotal'] ?> required> </td>
                <!-- <?php 
                    $subtotal = $filas['subtotal'];
                    $total = $subtotal + ($subtotal*.16);
                    echo '<td> <input type="number" name= "totalP"'.$filas["id_pedido"].' value ='.$total.' readonly > </td>';

                ?> -->
                <td> <input id="total" type="number" name= <?php echo 'totalP'.$filas['id_pedido'] ?>  value =<?php echo $filas['total'] ?> readonly > </td>
                
                <td> 
                    <select name=<?php echo 'trabajadorP'.$filas['id_pedido'] ?>>
                        <?php 
                                $verTE = "select eliminado from trabajador where id_trabajador=".$filas['id_trabajador'];
                                $verTrabajadorE = mysqli_query($con, $verTE);
                                while($uno = mysqli_fetch_assoc($verTrabajadorE)){
                                    if($uno['eliminado']==0){
                                        echo '<option value="0"> '.$filas['nombre'].'</option>';
                                    }
                                    else
                                        echo '<option value="0"> ND </option>';

                                }
                        ?>
                      
                       <?php while($f = mysqli_fetch_assoc($resconSelect)){ ?>
                            <option> <?php echo $f['nombreT']?> </option>
                        <?php } ?>
                    </select>
                    
                <!-- <input  name=<?php echo 'trabajadorP'.$filas['id_pedido'] ?>  value =<?php echo $filas['nombre'] ?> required >  -->
                </td>
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
                <td> <input id="subtotalN" type="number" name="subtotalPN" placeholder="Subtotal" required> </td>
                <td> <input id="totalN" type="number" name="totalPN" placeholder="Total" readonly> </td>

                <td> 
                    <select name="nombreTPN">
                    <?php while($fila=mysqli_fetch_assoc($resultadoT)){ ?>
                        <option value=<?php echo $fila['nombre']?> > <?php echo $fila['nombre']?> </option> 
                    <?php } ?> 
                    </select>
                 </td>
                <td> <button name="btnAgregarP" id="agregar"> Agregar </button> </td>
            </tr>
        </table>
        </center>
     </div>
    </form>
    <script> 
        $('#regresar').click(function(){
            location.href ="../menu.html";
        })

        $('#subtotal').change(function(){
            var nombre = $('#subtotal').attr("name");
            alert("name " + nombre);
            var subtotal = $('#subtotal').val();
            var total = parseFloat(subtotal) + parseFloat(subtotal * .16);
            $('#total').val(total);
        })
       
        $('#subtotalN').change(function(){
            var subtotal = $('#subtotalN').val();
            var total = parseFloat(subtotal) + parseFloat(subtotal * .16);
            $('#totalN').val(total);
        })

    </script>
</body>
</html>