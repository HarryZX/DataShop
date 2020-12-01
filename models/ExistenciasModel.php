<?php
require('ConnectionDB.php');

/**
 * CLASE PARA LAS EXISTENCIAS
 */
class ExistenciasModel extends ConnectionDB{

	private $idExistencia;
	private $idLote;
	private $disponible;

	public function getExistencias()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function existencia($IDPROD, $NOMBRE, $DESC, $PRECIOU, $CANTIDAD, $DISPONIBLE){
			$EXT = array('IDPROD' => $IDPROD, 'NOM' => $NOMBRE, 'DES' => $DESC, 'PRU' => $PRECIOU, 'CANT' => $CANTIDAD, 'DISP' => $DISPONIBLE);
			return $EXT;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT p.idProducto, p.nombreProducto, p.descripcionProducto, p.precioProducto, l.unidadPorLote, e.disponible FROM existencias AS e JOIN lotes AS l JOIN productos AS p ON e.idLote = l.idLote AND l.idProducto = p.idProducto ;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoExistencias = $query->fetchAll(PDO::FETCH_FUNC,"existencia");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoExistencias;
	}
}
?>