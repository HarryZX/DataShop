<?php
require('models/ComprasModel.php');

// INSTANCIAMOS LA CLASE PARA MANIPULAR LOS DATOS DE LAS COMPRAS
$datos = new ComprasModel();

// OBTENEMOS LOS DATOS A MOSTRAR EN LA TABLA
$tablaCompras = $datos->getCompras();

// OBTENEMOS LOS DATOS DE LOS LOTES DE CADA PRODUCTO A AGREGAR
$valores = $datos->getLoteProducto();

require('views/ComprasView.php');

// INSERTAMOS LOS DATOS OBTENIDOS POR POST
if ($_POST) {
    $idLote = $_POST["idlote"];
    $fecha = $_POST["fecha"];
    $cantidadLote = $_POST["cantlote"];
    $cantidadUnitaria = $_POST["cantunitaria"];
    $totalCompra = $_POST["total"];
    // INSERTAMOS LOS DATOS EN LA BASE DE DATOS
    $datos->setCompras($idLote,$fecha,$cantidadLote,$cantidadUnitaria,$totalCompra);
}else{
    echo "Ingrese datos";
}
?>