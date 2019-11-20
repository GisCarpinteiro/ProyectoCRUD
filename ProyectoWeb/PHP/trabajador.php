
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabajador</title>
</head>
<body>
    <?php 
        //include 'conexion.php' ;
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $conMostrarT = "select *from trabajador where eliminado=0";
        $conMostrarId = "select puesto.id_puesto from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto";
        $resultado = mysqli_query($con, $conMostrarT);
        $resId = mysqli_query($con, $conMostrarId);
        //$resultado = mysqli_query($consulta);
        
    ?>

    <form action="eliminar.php" method="post">
    <div >
        <table border="2">
            <tr class="head">
                <td>#</td>
                <td> Nombre </td>
                <td> Apellido </td>
                <td> Telefono </td>
                <td> Contrasenia </td>
                <td> Puesto </td>
                <td> Acciones </td>
            </tr>
            <?php 
                while ($filas=mysqli_fetch_assoc($resultado)){
            ?>
            <tr >
                <td><?php echo $filas['id_trabajador'] ?></td>
                <td> <input value=<?php echo $filas['nombre']?> placeholder="Nombre"> </td>
                <td> <input type="text" value =<?php echo $filas['apellido']?> placeholder="Apellido"> </td>
                <td> <input type="text" value =<?php echo $filas['telefono']?> placeholder="Telefono"> </td>
                <td> <input type="text" value =<?php echo $filas['contrasena']?> placeholder="Contrasenia"> </td>
                <td> <select name="hola">  <option  value = <?php echo $filas['id_puesto']?>> <?php echo $filas['id_puesto']?> </option> </select> </td>
                <td colspan="2">  <button type="submit" name="btnEditar" value=<?php echo $filas['id_trabajador']?>> <a href=""> Editar </a>  </button> <button type="submit"  name="btnEliminar" value=<?php echo $filas['id_trabajador']?>> Eliminar</button> </td>
                    
            </tr>
            <?php 
                } 
                
            ?>
            
            <tr>
                <td> <input type="text" placeholder="id"> </td>
                <td> <input type="text" placeholder="Nuevo nombre"> </td>
                <td> <input type="text" placeholder="Nuevo apellido"> </td>
                <td> <input type="text" placeholder="Nuevo telefono"> </td>
                <td> <input type="text" placeholder="Nueva contrasenia"> </td>
                <td> 
                    <select>
                    <?php while($fila=mysqli_fetch_assoc($resId)){?>
                        <option value=<?php echo $fila['id_puesto']?> > <?php echo $fila['id_puesto']?> </option> 
                    <?php } ?>
                    </select>
                 </td>

                <td> <button type="submit" > Agregar </button></td>
            </tr>
        </table>
    </div>
     </form>
</body>
</html>

