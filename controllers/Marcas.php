<?php
require('models/MarcasModel.php');

// INSTANCIAMOS LA CLASE PARA MANIPULAR LOS DATOS DE LAS MARCAS
$datos = new MarcasModel();

// OBTENEMOS LOS DATOS A MOSTRAR EN LA TABLA
$tablaMarcas = $datos->getMarcas();

// INCLUIMOS LA VISTA DE LAS MARCAS
require('views/MarcasView.php');

// INSERTAMOS LOS DATOS OBTENIDOS POR POST
if ($_POST["marca"]) {
    $nombreMarca = $_POST["marca"];
    $datos->setMarcas($nombreMarca);
}else{
    echo "<h1>Ingrese una marca</h1>";
}
?>