<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdVentas</th>
					<th>IdLote</th>
                    <th>Fecha de venta</th>
                    <th>Cantidad ventas</th>
                    <th>Total</th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ($tablaVentas as $venta) {
						echo "<tr>";
						echo "<td>" . $venta['IDVENT'] . "</td>";
						echo "<td>" . $venta['IDLOT'] . "</td>";
                        echo "<td>" . $venta['FCH'] . "</td>";
                        echo "<td>" . $venta['CNTVNT'] . "</td>";
                        echo "<td>" . $venta['TT'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
    </div>

<?php
	require('includes/Footers.php');
?>