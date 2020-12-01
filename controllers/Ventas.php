<?php
require('models/VentasModel.php');

$datos = new VentasModel();

$tablaVentas = $datos->getVentas();

require('views/VentasView.php');
?>