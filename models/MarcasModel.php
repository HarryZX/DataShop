<?php
require('ConnectionDB.php');

/**
 * CLASE PARA LAS MARCAS
 */
class MarcasModel extends ConnectionDB{

	private $idTipo;
	private $marca;

	public function getMarcas()
	{
		# CREAMOS LA FUNCIÓN PARA DEVOLVER TODOS LOS DATOS
		function marca($IDTIPO, $MARCA){
			$MRC = array('IDTIPO' => $IDTIPO, 'MARCA' => $MARCA);
			return $MRC;
		}

		// REALIZAMOS LA CONSULTA
		$query = $this->connect()->prepare('SELECT idTipo, marca FROM tipos;');
		$query->execute();

		// REALIZAMOS LA CONSULTA DE LOS DATOS CON FETCH
		$todoMarcas = $query->fetchAll(PDO::FETCH_FUNC,"marca");

		// CERRAMOS LA CONEXIÓN
		$query->closeCursor();

		return $todoMarcas;
	}
}
?>