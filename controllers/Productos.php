<?php
require('models/ProductosModel.php');

// INSTANCIAMOS LA CLASE PARA MANIPULAR LOS DATOS DE LOS PRODUCTOS
$datos = new ProductosModel();

// OBTENEMOS LOS DATOS A MOSTRAR EN LA TABLA
$tablaProductos = $datos->getProductos();
// OBTENEMOS LOS DATOS DE LA MARCA DE CADA PRODUCTO A AGREGAR
$valores = $datos->getMarcaProducto();

// INCLUIMOS LA VISTA DE LOS PRODUCTOS
require('views/ProductosView.php');

// INSERTAMOS LOS DATOS OBTENIDOS POR POST
if ($_POST && $_POST["nombre"] && $_POST["desc"] && $_POST["precio"]) {
    $idMarca = $_POST["idmarca"];
    $nombreProd = $_POST["nombre"];
    $descProd = $_POST["desc"];
    $precioProd = $_POST["precio"];
    $datos->setProductos($idMarca,$nombreProd,$descProd,$precioProd);
}else{
    echo "Ingrese datos";
}
?>