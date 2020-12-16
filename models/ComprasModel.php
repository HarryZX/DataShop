<?php
require('ConnectionDB.php');

/**
 * CLASE PARA LAS COMPRAS
 */
class ComprasModel extends ConnectionDB{

	private $idCompra;
	private $idLote;
    private $fechaCompra;
    private $cantidadLote;
    private $cantidadUnitaria;
    private $totalCompra;

	# FUNCIÓN PARA MOSTRAR LOS DATOS DE LA TABLA COMPRAS
	public function getCompras()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function compra($IDCOMPRA, $PRODUCTO, $FECHA, $CANTLOTE, $CANTUNIT, $TOTAL){
			$CMPR = array('IDCOMP' => $IDCOMPRA, 'PRODUCTO' => $PRODUCTO, 'FCH' => $FECHA, 'CNTLT' => $CANTLOTE, 'CNTU' => $CANTUNIT, 'TT' => $TOTAL);
			return $CMPR;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT c.idCompra, p.nombreProducto, DATE_FORMAT(c.fechaCompra,"%d/%m/%Y"), c.cantidadLote, c.cantidadUnitaria, c.totalCompra FROM compras AS c JOIN productos AS p JOIN lotes AS l ON p.idProducto = l.idProducto AND l.idLote = c.idLote;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoCompras = $query->fetchAll(PDO::FETCH_FUNC,"compra");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoCompras;
	}

	# FUNCIÓN PARA INSERTAR DATOS EN LA TABLA COMPRAS
	public function setCompras($idLt, $fecha, $cantLt, $cantUnit, $total)
	{
		// Realizamos la consulta correspondiente
		$query = $this->connect()->prepare('INSERT INTO compras (idLote, fechaCompra, cantidadLote, cantidadUnitaria, totalCompra) VALUES (:idlt, :fecha, :cantlt, :cantunt, :total);');

		// Insertamos los datos obtenidos
		$query->execute([':idlt' => $idLt, ':fecha' => $fecha, ':cantlt' => $cantLt, ':cantunt' => $cantUnit, ':total' => $total]);

		// Terminamos la consulta
		$query->closeCursor();
	}

	// FUNCIÓN PARA MOSTRAR LOS DATOS DE LOS PRODUCTOS A ESCOGER PARA COMPRAR
	public function getLoteProducto()
	{
		// Función para hacer la consulta
		function lote($IDL, $IDP, $MARCA, $NOMBREPR)
		{
			$LT = array('IDLT' => $IDL, 'IDPR' => $IDP, 'MARCA' => $MARCA, 'NOM' => $NOMBREPR);
			return $LT;
		}

		// Realizamos la consulta pertinente
		$query = $this->connect()->prepare('SELECT l.idLote, l.idProducto, t.marca, p.nombreProducto FROM lotes AS l JOIN productos AS p JOIN tipos AS t ON p.idProducto = l.idProducto AND t.idTipo = p.idTipo;');
		$query->execute();

		// Obtenemos todos los datos con FETCH
		$lotes = $query->fetchAll(PDO::FETCH_FUNC, "lote");

		$query->closeCursor();

		// Devolvemos todos los valores en un arreglo
		return $lotes;
	}
}
?>