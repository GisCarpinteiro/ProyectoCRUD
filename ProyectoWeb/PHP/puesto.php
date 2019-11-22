
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puesto</title>
    
</head>
<body>
    <?php 
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $consultaMostrar = "select *from puesto where eliminado=0";
        $resultado = mysqli_query($con, $consultaMostrar);
    ?>
    <form action="eventosPuesto.php" method="post">
     <div>
        <table border="2">
            <tr>
                <td> # </td>
                <td> Tipo de puesto</td>
                <td> Acciones </td>
            </tr>
            <?php while($filas = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td> <?php echo $filas['id_puesto'] ?> </td>
                <td> <input name=<?php echo 'nombreP'.$filas['id_puesto'] ?>  value =<?php echo $filas['tipo_puesto'] ?> required> </td>
                <td> <button value =<?php echo $filas['id_puesto'] ?> name ="btnEditarP" value > Editar </button> <button value =<?php echo $filas['id_puesto'] ?>  name ="btnEliminarP"> Eliminar </button> </td>
            </tr>
            <?php }?>
      </div>
    </form>
    <form action="eventosPuestos.php" method="post">
            <div>
            <tr>
                <td> # </td>
                <td> <input name="nombrePN" placeholder="Nombre" required> </td>
                <td> <button name="btnAgregarP"> Agregar </button> </td>
            </tr>
        </table>
     </div>
    </form>
</body>
</html>


