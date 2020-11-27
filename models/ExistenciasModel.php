<?php
require('ConnectionDB.php');

/**
 * CLASE PARA CONTROLAR EL ACCESO DEL USUARIO
 */
class ExistenciasModel extends ConnectionDB{

	private $idExistencia;
	private $idLote;
	private $disponible;

	public function getExistencias()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function existencia($IDEXISTENCIA, $IDLOTE, $DISPONIBLE){
			$EXT = array('IDEXIST' => $IDEXISTENCIA, 'IDLT' => $IDLOTE, 'DISP' => $DISPONIBLE);
			return $EXT;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT idExistencia, idLote, disponible FROM existencias;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoExistencias = $query->fetchAll(PDO::FETCH_FUNC,"existencia");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoExistencias;
	}
}
?>