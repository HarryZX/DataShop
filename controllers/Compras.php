<?php
require('models/ComprasModel.php');

$datos = new ComprasModel();

$tablaCompras = $datos->getCompras();

require('views/ComprasView.php');
?>