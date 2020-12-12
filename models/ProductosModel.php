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

	// FUNCIÓN PARA MOSTRAR LOS DATOS DE LA TABLA PRODUCTOS
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

		// DEVOLVEMOS EL VALOR DE LA CONSULTA EN UN ARREGLO
		return $todoProductos;
	}

	// FUNCIÓN PARA INSERTAR DATOS EN LA TABLA PRODUCTOS
	public function setProductos($marca, $nombre, $desc, $precio)
	{
		// REALIZAMOS LA CONSULTA CORRESPONDIENTE
		$query = $this->connect()->prepare('INSERT INTO productos (idTipo, nombreProducto, descripcionProducto, precioProducto) VALUES (:idMarca, :nombreProd, :descriptProd, :precioProd)');
		
		// INSERTAMOS LOS DATOS OBTENIDOS
		$query->execute([':idMarca' => $marca, ':nombreProd' => $nombre, ':descriptProd' => $desc, ':precioProd' => $precio]);

		$query->closeCursor();
	}

	// FUNCIÓN PARA MOSTRAR LOS ID DE CADA MARCA EN EL FORMULARIO PARA AGREGAR PRODUCTOS
	public function getMarcaProducto()
	{
		// FUNCIÓN PARA HACER LA CONSULTA
		function marca($ID, $NAME)
		{
			$MC = array('ID' => $ID, 'NAME' => $NAME);
			return $MC;
		}

		// REALIZAMOS LA CONSULTA PERTINENTE
		$query = $this->connect()->prepare('SELECT t.idTipo, t.marca FROM tipos AS t;');
		$query->execute();

		// OBTENEMOS TODOS LOS DATOS CON FETCH
		$valores = $query->fetchAll(PDO::FETCH_FUNC, "marca");

		$query->closeCursor();

		// DEVOLVEMOS TODOS LOS VALORES EN UN ARREGLO
		return $valores;
	}
}
?>