<?php 
    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");
    $ejecutar = mysqli_query($con, $consulta);

    mysql_select_db("helados", $con);
    mysql_query("SET NAME 'utf8'")
?>