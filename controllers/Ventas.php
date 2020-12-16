<?php
require('models/VentasModel.php');

// INSTANCIAMOS LA CLASE PARA MANIPULAR LOS DATOS DE LAS VENTAS
$datos = new VentasModel();

// OBTENEMOS LOS DATOS A MOSTRAR EN LA TABLA
$tablaVentas = $datos->getVentas();

// OBTENEMOS LOS DATOS DE LOS LOTES DE CADA PRODUCTO A AGREGAR
$valores = $datos->getLoteProducto();

require('views/VentasView.php');

// INSERTAMOS LOS DATOS OBTENIDOS POR POST
if ($_POST) {
    $idLote = $_POST["idlote"];
    $fecha = $_POST["fecha"];
    $cantidadVenta = $_POST["cantVenta"];
    $totalVenta = $_POST["totalVenta"];
    // INSERTAMOS LOS DATOS EN LA BASE DE DATOS
    $datos->setVentas($idLote,$fecha,$cantidadVenta,$totalVenta);
}else{
    echo "Ingrese datos";
}
?>