
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/disenioTablas.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <title>Puesto</title>
    
</head>
<body>
    <?php 
        $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
        $consultaMostrar = "select *from puesto where eliminado=0";
        $resultado = mysqli_query($con, $consultaMostrar);
    ?>
    <form action="eventosPuesto.php" method="post">
        <ul class="opciones"> 
            <li> <button name="btnJson" type="submit" > <b> JSON </b> </button> </li>
            <li> <button name="btnJson" type="submit" >XML </button> </li>
            <li> <button name="btnJson" type="submit" >XSL </button> </li>
        </ul>
    </form>
    <form action="eventosPuesto.php" method="post">
     <div class="tabla">
        <img src="../img/previous.png" id="regresar"  width="40" height="40" title="Regresar">

        <center>
        <h1> Puesto </h1>
        <table class="puesto" border="2">
            <tr class="head">
                <td> &nbsp;Id&nbsp; </td>
                <td> Tipo de puesto</td>
                <td> Acciones </td>
            </tr>
            <?php while($filas = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td> <?php echo $filas['id_puesto'] ?> </td>
                <td> <input name=<?php echo 'nombreP'.$filas['id_puesto'] ?>  value =<?php echo $filas['tipo_puesto'] ?> required> </td>
                <td> <button id="editar" value =<?php echo $filas['id_puesto'] ?> name ="btnEditarP" value > &nbsp;&nbsp;Editar&nbsp;&nbsp; </button> <button id="eliminar" value =<?php echo $filas['id_puesto'] ?>  name ="btnEliminarP"> Eliminar </button> </td>
            </tr>
            <?php }?>
      </div>
    </form>
    <form action="eventosPuestos.php" method="post">
            <div>
            <tr>
                <td> # </td>
                <td> <input name="nombrePN" placeholder="Nombre" required> </td>
                <td> <button id="agregar" name="btnAgregarP"> Agregar </button> </td>
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


