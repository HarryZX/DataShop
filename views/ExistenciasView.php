<?php require('configs/config.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Productos en existencias</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table>
		<thead>
			<tr>
				<td>IdExistencia</td>
				<td>IdLote</td>
				<td>Disponible</td>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach ($tablaExistencias as $existe) {
					echo "<tr>";
					echo "<td>" . $existe['IDEXIST'] . "</td>";
					echo "<td>" . $existe['IDLT'] . "</td>";
					echo "<td>" . $existe['DISP'] . "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

	<div><a href="<?php echo SERVERURL;?>">Volver</a></div>
</body>
</html>