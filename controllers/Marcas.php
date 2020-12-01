<?php
require('models/MarcasModel.php');

$datos = new MarcasModel();

$tablaMarcas = $datos->getMarcas();

require('views/MarcasView.php');
?>