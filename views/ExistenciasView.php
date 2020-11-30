<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdExistencia</th>
					<th>IdLote</th>
					<th>Disponible</th>
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
	</div>

<?php
	require('includes/Footers.php');
?>