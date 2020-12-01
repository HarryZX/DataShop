<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdTipo</th>
					<th>Marca</th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ($tablaMarcas as $marca) {
						echo "<tr>";
						echo "<td>" . $marca['IDTIPO'] . "</td>";
						echo "<td>" . $marca['MARCA'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
    </div>

<?php
	require('includes/Footers.php');
?>