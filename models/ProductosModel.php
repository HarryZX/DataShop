<?php
require('ConnectionDB.php');

/**
 * CLASE PARA LOS PRODUCTOS
 */
class ProductosModel extends ConnectionDB{

	private $idProducto;
	private $idTipo;
    private $nombreProducto;
    private $descripcionProduto;
    private $precioProduto;

	public function getProductos()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function producto($IDPROD, $TIPO, $NOMBRE, $DESC, $PRECIO){
			$PROD = array('IDPROD' => $IDPROD, 'TP' => $TIPO, 'NOM' => $NOMBRE, 'DES' => $DESC, 'PREC' => $PRECIO);
			return $PROD;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT p.idProducto, t.marca, p.nombreProducto, p.descripcionProducto, p.precioProducto FROM productos AS p JOIN tipos AS t ON p.idTipo = t.idTipo ;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoProductos = $query->fetchAll(PDO::FETCH_FUNC,"producto");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoProductos;
	}
}
?>