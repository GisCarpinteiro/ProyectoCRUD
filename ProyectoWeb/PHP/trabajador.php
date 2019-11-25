
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/disenioTablas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

    <title>Trabajador</title>
</head>
<body>


    <?php 
        //include 'conexion.php' ;
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $conMostrarT = "select puesto.tipo_puesto, trabajador.id_puesto, trabajador.nombre, trabajador.apellido, trabajador.telefono, trabajador.contrasena, trabajador.id_trabajador from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto where trabajador.eliminado=0;";
        //$conMostrarId = "select puesto.id_puesto from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto";
        $conMostrarId = "select tipo_puesto from puesto where eliminado=0";
        $resultado = mysqli_query($con, $conMostrarT);
        $resId = mysqli_query($con, $conMostrarId);
        //$resultado = mysqli_query($consulta);
        
    ?>
        <form action="eventosTrabajador.php" method="post">
        <ul class="opciones"> 
            <li> <button name="btnJson" type="submit" > <b> JSON </b> </button> </li>
            <li> <button name="btnXml" type="submit" >XML </button> </li>
            <li> <button name="btnJson" type="submit" >XSL </button> </li>
        </ul>
        </form>

    <form action="eventosTrabajador.php" method="post">
    <div class="tabla">
        
        <img src="../img/previous.png" id="regresar"  width="40" height="40" title="Regresar">

        <center>
        <h1> Trabajador </h1>
        <table border="2">
            <tr class="head">
                <td> &nbsp;Id&nbsp; </td>
                <td> Nombre </td>
                <td> Apellido </td>
                <td> Teléfono </td>
                <td> Contraseña </td>
                <td> Puesto </td>
                <td colspan="2"> Acciones </td>
            </tr>
            <?php 
                while ($filas=mysqli_fetch_assoc($resultado)){
                    $consultaTp = "select tipo_puesto as tp from puesto where id_puesto not in(select id_puesto from trabajador where id_trabajador=".$filas['id_trabajador'].")";
                    $res = mysqli_query($con, $consultaTp);

            ?>
            <tr >
                <td><?php echo $filas['id_trabajador'] ?></td>
                <td> <input name=<?php echo 'nombreT'.$filas['id_trabajador']?> value=<?php echo $filas['nombre']?> placeholder="Nombre" rquired> </td>
                <td> <input name=<?php echo 'apellidoT'.$filas['id_trabajador']?> type="text" value =<?php echo $filas['apellido']?> placeholder="Apellido"> </td>
                <td> <input name=<?php echo 'telefonoT'.$filas['id_trabajador']?> type="text" value =<?php echo $filas['telefono']?> placeholder="Telefono"> </td>
                <td> <input name=<?php echo 'contraseniaT'.$filas['id_trabajador']?> type="text" value =<?php echo $filas['contrasena']?> placeholder="Contrasenia"> </td>
                <td> 
                    <select name=<?php echo 'puestoT'.$filas['id_trabajador']?>>
                        <?php while($f=mysqli_fetch_assoc($res)) { ?>
                                <option> <?php echo $f["tp"]?> </option> 
                        <?php } ?>

                    </select> 


                </td>
                <td colspan="2">  <button id="editar" type="submit" name="btnEditarT" value=<?php echo $filas['id_trabajador']?>> &nbsp;&nbsp;Editar&nbsp;&nbsp; </button> <button id="eliminar" type="submit"  name="btnEliminarT" value=<?php echo $filas['id_trabajador']?>> Eliminar</button> </td>
            </tr>

            <?php } ?>
            
            <tr>
                <td> # </td>
                <td> <input type="text" name="nombreTN" type="text" placeholder="Nuevo nombre"> </td>
                <td> <input type="text" name="apellidoTN" type="text" placeholder="Nuevo apellido"> </td>
                <td> <input type="text" name="telefonoTN" type="text" placeholder="Nuevo telefono"> </td>
                <td> <input type="text" name="contraseniaTN" type="text" placeholder="Nueva contrasenia"> </td>
                <td> 
                    <select name="puestoTN">
                    <?php while($fila=mysqli_fetch_assoc($resId)){?>
                        <option value=<?php echo $fila['tipo_puesto']?> > <?php echo $fila['tipo_puesto']?> </option> 
                    <?php } ?>
                    </select>
                 </td>

                <td colspan="2"> <button id="agregar" name="btnAgregarT" type="submit" > Agregar </button></td>

            </tr>
        </table>
        </center>
        

    </div>

    </form>
     <script> 
        $('#regresar').click(function(){
            location.href ="../menu.html";
        })
       

    </script>
</body>
</html>

