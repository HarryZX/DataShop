<?php
	require('includes/Headers.php');
?>
	<div class="container">
		<div class="columns is-gapless">
			<div class="column is-1"><button id="add" class="button is-success">Agregar</button></div>
		</div>
	</div>

	<!--ESTILO PARA OCULTAR EL FORMULARIO-->
	<style>
		#hidden{ display: none; }
	</style>
	<!--FORMULARIO PARA AGREGAR LAS VENTAS-->
	<div id="hidden" class="container">
		<br>
		<button id="close" class="button is-link is-light">Cancelar</button>
		<form class="level-left" action="" method="POST">
			<div class="field">

				<label for="" class="label">Marca</label>
				<div class="control">
					<div class="select">
						<select name="idlote">
							<option selected>Elija el producto</option>
							<?php
								// ITERAMOS ENTRE LOS DATOS PARA MOSTRAR LOS QUE SE ELEGIRÁN
								foreach ($valores as $productos) {
									// EN EL VALOR AGREGAMOS LOS ID DE LAS MARCAS
									echo '<option value='. $productos['IDLT'] .'>' . $productos['MARCA'] . " - " . $productos['NOM'] . '</option>';
								}
							?>
						</select>
					</div>
				</div>

				<label for="fch" class="label">Fecha de venta</label>
				<div class="control has-icons-left has-icons-right">
					<input type="date" name="fecha" class="input is-primary">
					<span class="icon is-small is-left">
						<i class="fas fa-calendar-day"></i>
					</span>
				</div>

				<label for="" class="label">Número de ventas</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="cantVenta" id="" class="input is-primary" placeholder="5">
					<span class="icon is-small is-left">
						<i class="fas fa-sort-numeric-up-alt"></i>
					</span>
				</div>

				<label for="" class="label">Total venta</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="totalVenta" class="input is-primary" placeholder="2.40">
					<span class="icon is-small is-left">
						<i class="fas fa-dollar-sign"></i>
					</span>
				</div>
				<br>
				<div class="control">
					<input type="submit" class="button is-link" value="Agregar">
				</div>
			</div>
		</form>
		<br>
	</div>

	<!--TABLA PARA MOSTRAR LAS VENTAS REALIZADAS-->
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdVentas</th>
					<th>Producto</th>
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
						echo "<td>" . $venta['PRODUCTO'] . "</td>";
                        echo "<td>" . $venta['FCH'] . "</td>";
                        echo "<td>" . $venta['CNTVNT'] . "</td>";
                        echo "<td>" . "$" . $venta['TT'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
    </div>

<?php
	require('includes/Footers.php');
?>