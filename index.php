<?php
	if (isset($_GET['view'])) {
		$views = explode("/", $_GET['view']);
		if (is_file('controllers/'.$views[0].'.php')) {
			include 'controllers/'.$views[0].'.php';
		}else{
			include 'views/Welcome.php';
		}
	}else{
		include 'views/Welcome.php';
	}
?>