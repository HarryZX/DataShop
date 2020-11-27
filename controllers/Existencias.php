<?php
require('models/ExistenciasModel.php');

$datos = new ExistenciasModel();

$tablaExistencias = $datos->getExistencias();

require('views/ExistenciasView.php');
?>