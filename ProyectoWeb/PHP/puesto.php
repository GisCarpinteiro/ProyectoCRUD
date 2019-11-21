
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
        $consultaMostrar = "select *from puesto";
        $resultado = mysqli_query($con, $consultaMostrar);
    ?>
    <form action="eventosTrabajador.php" method="post">
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
                <td> <?php echo $filas['tipo_puesto'] ?> </td>
                <td> <button> Editar </button> <button> Eliminar </button> </td>
            </tr>
            <?php }?>
            <tr>
                <td> # </td>
                <td> <input placeholder="Nombre"> </td>
                <td> <button> Agregar </button> </td>
            </tr>
        </table>
     </div>
    </form>
</body>
</html>


