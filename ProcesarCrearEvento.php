<?php
 // CONEXION Y VARIABLES
$c = oci_connect("ge", "ge", "localhost/BDMATCHME");
	$titulo = $_POST['titulo_evento'];
	$ciudad = $_POST['combo_CIUDAD'];
	//$fecha = date('D/m/y', strtotime($_POST['fecha_evento']));
	$hora = $_POST['hora_evento'];
	$descripcion = $_POST['descripcion'];

            $result = $_POST['taskOption'];
            $result_explode = explode('|', $result);


	
// Insertar Datos
$query = OCI_Parse($c, "insert into IDIOMA (IDIOMA_ID,NOMBRE) values (:para1, :para2)");
    OCI_Bind_By_Name($query, ":para1", $result_explode[0]); //Ligar los parámetros oracle con variables de PHP 
    OCI_Bind_By_Name($query, ":para2", $result_explode[1]); //Ligar los parámetros oracle con variables de PHP 
//Ejecutar la sentencia para insertar    
$r = OCI_Execute($query);

OCI_Free_Statement($query); //Liberar sentencia
	


	echo $selectOption;

	echo $titulo;

	echo $ciudad;
	
	echo $fecha_evento;

	echo $hora_evento;

	echo $descripcion;

	            echo $result_explode[0]."<br />";
            echo $result_explode[1]."<br />";
?>