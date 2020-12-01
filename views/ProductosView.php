<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>idProducto</th>
					<th>Marca</th>
                    <th>Nombre producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ($tablaProductos as $producto) {
						echo "<tr>";
						echo "<td>" . $producto['IDPROD'] . "</td>";
						echo "<td>" . $producto['TP'] . "</td>";
                        echo "<td>" . $producto['NOM'] . "</td>";
                        echo "<td>" . $producto['DES'] . "</td>";
                        echo "<td>" . "$" . $producto['PREC'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
    </div>

<?php
	require('includes/Footers.php');
?>