<?php
require('models/ProductosModel.php');

$datos = new ProductosModel();

$tablaProductos = $datos->getProductos();

require('views/ProductosView.php');
?>