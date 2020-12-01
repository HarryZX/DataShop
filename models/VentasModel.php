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
		function venta($IDVENTA, $IDLOTE, $FECHA, $CANTVENTA, $TOTAL){
			$VNTS = array('IDVENT' => $IDVENTA, 'IDLOT' => $IDLOTE, 'FCH' => $FECHA, 'CNTVNT' => $CANTVENTA, 'TT' => $TOTAL);
			return $VNTS;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT idVentas, idLote, fechaVenta, cantidadVenta,totalVenta FROM ventas;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoVentas = $query->fetchAll(PDO::FETCH_FUNC,"venta");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoVentas;
	}
}
?>