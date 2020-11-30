<?php require('configs/config.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
</head>
<body>
	<div class="level">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <li class="navbar-item"><a href="<?php echo SERVERURL; ?>">Inicio</a></li>
		    <li class="navbar-item"><a href="<?php echo SERVERURL; ?>Existencias">Existencias</a></li>
            <li class="navbar-item"><a href="<?php echo SERVERURL; ?>Compras">Compras realizadas</a></li>
            <li class="navbar-item"><a href="<?php echo SERVERURL; ?>Ventas">Ventas realizadas</a></li>
            <li class="navbar-item"><a href="<?php echo SERVERURL; ?>Productos">Mis productos</a></li>
            <li class="navbar-item"><a href="<?php echo SERVERURL; ?>Marcas">Marcas</a></li>
        </nav>
	</div>