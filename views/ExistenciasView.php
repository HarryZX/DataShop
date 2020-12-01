<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdProducto</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio unitario</th>
					<th>Cantidad en stock</th>
					<th>Disponibilidad</th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ($tablaExistencias as $existe) {
						echo "<tr>";
						echo "<td>" . $existe['IDPROD'] . "</td>";
						echo "<td>" . $existe['NOM'] . "</td>";
						echo "<td>" . $existe['DES'] . "</td>";
						echo "<td>" . "$" . $existe['PRU'] . "</td>";
						echo "<td>" . $existe['CANT'] . "</td>";
						echo "<td>" . $existe['DISP'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>

<?php
	require('includes/Footers.php');
?>