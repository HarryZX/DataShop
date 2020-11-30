<?php
require('ConnectionDB.php');

/**
 * CLASE PARA CONTROLAR EL ACCESO DEL USUARIO
 */
class ComprasModel extends ConnectionDB{

	private $idCompra;
	private $idLote;
    private $fechaCompra;
    private $cantidadLote;
    private $cantidadUnitaria;
    private $totalCompra;

	public function getCompras()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function compra($IDCOMPRA, $IDLOTE, $FECHA, $CANTLOTE, $CANTUNIT, $TOTAL){
			$CMPR = array('IDCOMP' => $IDCOMPRA, 'IDLOT' => $IDLOTE, 'FCH' => $FECHA, 'CNTLT' => $CANTLOTE, 'CNTU' => $CANTUNIT, 'TT' => $TOTAL);
			return $CMPR;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT idCompra, idLote, fechaCompra, cantidadLote, cantidadUnitaria, totalCompra FROM compras;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoCompras = $query->fetchAll(PDO::FETCH_FUNC,"compra");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoCompras;
	}
}
?>