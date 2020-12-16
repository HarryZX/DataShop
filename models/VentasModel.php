<?php
require('ConnectionDB.php');

/**
 * CLASE PARA LAS VENTAS
 */
class VentasModel extends ConnectionDB{

	private $idVentas;
	private $idLote;
    private $fechaVenta;
    private $cantidadVenta;
    private $totalVenta;

	public function getVentas()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function venta($IDVENTA, $PRODUCTO, $FECHA, $CANTVENTA, $TOTAL){
			$VNTS = array('IDVENT' => $IDVENTA, 'PRODUCTO' => $PRODUCTO, 'FCH' => $FECHA, 'CNTVNT' => $CANTVENTA, 'TT' => $TOTAL);
			return $VNTS;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT v.idVentas, p.nombreProducto, DATE_FORMAT(v.fechaVenta,"%d/%m/%Y"), v.cantidadVenta, v.totalVenta FROM ventas AS v JOIN productos AS p JOIN lotes AS l ON p.idProducto = l.idProducto AND l.idLote = v.idLote;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoVentas = $query->fetchAll(PDO::FETCH_FUNC,"venta");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoVentas;
	}

	# FUNCIÓN PARA INSERTAR DATOS EN LA TABLA VENTAS
	public function setVentas($idLt, $fecha, $cantVenta, $total)
	{
		// Realizamos la consulta correspondiente
		$query = $this->connect()->prepare('INSERT INTO ventas (idLote, fechaVenta, cantidadVenta, totalVenta) VALUES (:idlt, :fecha, :cantvt, :total);');

		// Insertamos los datos obtenidos
		$query->execute([':idlt' => $idLt, ':fecha' => $fecha, ':cantvt' => $cantVenta, ':total' => $total]);

		// Terminamos la consulta
		$query->closeCursor();
	}

	// FUNCIÓN PARA MOSTRAR LOS DATOS DE LOS PRODUCTOS A ESCOGER PARA VENDER
	public function getLoteProducto()
	{
		// Función para hacer la consulta
		function lote($IDL, $MARCA, $NOMBREPR)
		{
			$LT = array('IDLT' => $IDL, 'MARCA' => $MARCA, 'NOM' => $NOMBREPR);
			return $LT;
		}

		// Realizamos la consulta pertinente
		$query = $this->connect()->prepare('SELECT l.idLote, t.marca, p.nombreProducto FROM lotes AS l JOIN productos AS p JOIN tipos AS t ON p.idProducto = l.idProducto AND t.idTipo = p.idTipo;');
		$query->execute();

		// Obtenemos todos los datos con FETCH
		$lotes = $query->fetchAll(PDO::FETCH_FUNC, "lote");

		$query->closeCursor();

		// Devolvemos todos los valores en un arreglo
		return $lotes;
	}
}
?>