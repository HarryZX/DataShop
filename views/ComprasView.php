<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdCompra</th>
					<th>IdLote</th>
                    <th>Fecha de compra</th>
                    <th>Cantidad Lote</th>
                    <th>Cantidad Unitaria</th>
                    <th>Total</th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ($tablaCompras as $compra) {
						echo "<tr>";
						echo "<td>" . $compra['IDCOMP'] . "</td>";
						echo "<td>" . $compra['IDLOT'] . "</td>";
                        echo "<td>" . $compra['FCH'] . "</td>";
                        echo "<td>" . $compra['CNTLT'] . "</td>";
                        echo "<td>" . $compra['CNTU'] . "</td>";
                        echo "<td>" . $compra['TT'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>

<?php
	require('includes/Footers.php');
?>