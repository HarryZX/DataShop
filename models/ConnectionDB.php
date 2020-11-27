<?php
/**
 * CONECCIÓN A LA BASE DE DATOS
 */
class ConnectionDB{

	private $hostdb;
	private $database;
	private $userdb;
	private $passworddb;
	private $charset;
	
	// CONSTRUCTOR DE LA CLASE PARA LOS DATOS DE LA CONEXIÓN
	public function __construct()
	{
		$this->hostdb		= 'localhost';
		$this->database 	= 'metricas';
		$this->userdb		= 'root';
		$this->passworddb	= '';
		$this->charset 		= 'utf8mb4';
	}

	// CREAMOS LA CONEXIÓN A LA BASE DE DATOS
	public function connect(){
		try{
			$connection = "mysql:host=" . $this->hostdb . ";dbname=" . $this->database . ";charset=" . $this->charset;
			$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];
			$PDO = new PDO($connection, $this->userdb, $this->passworddb, $options);
			return $PDO;
		}catch(PDOException $exc){
			print_r("Error connection: " . $exc->getMessage());
		}
	}
}
?>