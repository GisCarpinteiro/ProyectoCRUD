<?php 

    $con = mysqli_connect("localhost", "root", "", "helados") or die ("Error");

    if(isset($_POST['btnEliminarP'])){
        $idPuesto = $_POST['btnEliminarP'];
        $consultaEliminarP = "update puesto set eliminado=1 where id_puesto=".$idPuesto;
        $resultadoConsultaE = mysqli_query($con, $consultaEliminarP);
        if($resultadoConsultaE){
            echo'<script type="text/javascript">
            alert("Se elimino el puesto");
            window.location.href="puesto.php";
            </script>';      
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo eliminar el puesto");
            window.location.href="puesto.php";
            </script>';
        }
    }

    if(isset($_POST['btnEditarP'])){
        $idPuesto = $_POST['btnEditarP'];
        $tipo_puesto = $_POST['nombreP'.$idPuesto];
        //echo "edit = ".$tipo_puesto;
        $consultaEditarP = "update puesto set tipo_puesto='".$tipo_puesto."' where id_puesto=".$idPuesto;
        $resConsultaEP = mysqli_query($con, $consultaEditarP);
        if($resConsultaEP){
            echo'<script type="text/javascript">
            alert("Se modifico el puesto");
            window.location.href="puesto.php";
            </script>';   
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo modificar el puesto");
            window.location.href="puesto.php";
            </script>';
        }
    }

    if(isset($_POST['btnAgregarP'])){
        $tipo_puestoN = $_POST['nombrePN'];
        $consultaAgregarP = "insert into puesto values (null, '".$tipo_puestoN."', 0)";
        $resConsultaAP = mysqli_query($con, $consultaAgregarP);
        if($resConsultaAP){
            echo'<script type="text/javascript">
            alert("Se agrego el puesto");
            window.location.href="puesto.php";
            </script>';   
        }
        else{
            echo'<script type="text/javascript">
            alert("No se pudo agregar el puesto");
            window.location.href="puesto.php";
            </script>';
        }
    }

    if(isset($_POST['btnJson'])){
        $consultaMostrar = " select id_puesto, tipo_puesto from puesto where eliminado=0;";
        $usuarios = mysqli_query ($con, $consultaMostrar);
        foreach($usuarios as $usuario){
            $usuario = json_encode($usuario);
            echo $usuario."<br>";
        }

    }

    if(isset($_POST['btnXml'])){
        $consultaMostrar = "select *from puesto where eliminado=0";
        $puestos = mysqli_query ($con, $consultaMostrar);
        $domPuesto = new domdocument("1.0");
        $raiz = new domelement("puestos");
        $raiz = $domPuesto->appendChild($raiz);

       
            foreach ($puestos as $puesto){
                $puestosXML = new domelement("puesto");
                $puestosXML = $raiz->appendChild($puestosXML);
                $id_puesto = new DOMElement("id_puesto",$puesto['id_puesto']);
                $id_puesto = $puestosXML->appendChild($id_puesto);
                $tipo_puesto = new DOMElement("tipo_puesto",$puesto['tipo_puesto']);
                $tipo_puesto = $puestosXML->appendChild($tipo_puesto);
            }
         
        
        $domPuesto->save("../XML/puesto.xml");
        // $trabajador = simplexml_load_file("trabajador.xml");
        $puestoXml = "../XML/puesto.xml";
        $puestoXsl = "../XSL/puesto.xsl";
        
        $doc = new DOMDocument();
        $xsl = new XSLTProcessor();

        $doc->load($puestoXsl);
        $xsl->importStyleSheet($doc);


        $doc->load($puestoXml);
        echo $xsl->transformToXML($doc);
    }
    
?>