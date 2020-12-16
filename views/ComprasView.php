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
	<!--FORMULARIO PARA AGREGAR LAS COMPRAS-->
	<div id="hidden" class="container">
		<br>
		<button id="close" class="button is-link is-light">Cancelar</button>
		<form class="level-left" action="" method="POST">
			<div class="field">

				<label for="" class="label">Producto</label>
				<div class="control">
					<div class="select">
						<select name="idlote">
							<option selected>Elija el producto</option>
							<?php
								// ITERAMOS ENTRE LOS DATOS PARA MOSTRAR LOS QUE SE ELEGIRÁN
								foreach ($valores as $productos) {
									// EN EL VALOR AGREGAMOS LOS ID DE LAS MARCAS
									echo '<option value='. $productos['IDLT'] .'>' . $productos['MARCA'] . ' - ' . $productos['NOM'] .'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<label for="fch" class="label">Fecha de compra</label>
				<div class="control has-icons-left has-icons-right">
					<input type="date" name="fecha" class="input is-primary">
					<span class="icon is-small is-left">
						<i class="fas fa-calendar-day"></i>
					</span>
				</div>

				<label for="ctl" class="label">Cantidad de lotes</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="cantlote" id="ctl" class="input is-primary" placeholder="50">
					<span class="icon is-small is-left">
						<i class="fas fa-sort-numeric-up-alt"></i>
					</span>
				</div>

				<label for="ctu" class="label">Cantidad unitaria por lote</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="cantunitaria" id="ctu" class="input is-primary" placeholder="5">
					<span class="icon is-small is-left">
						<i class="fas fa-sort-numeric-up-alt"></i>
					</span>
				</div>

				<label for="" class="label">Precio Total</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="total" class="input is-primary" placeholder="20.40">
					<span class="icon is-small is-left">
						<i class="fas fa-dollar-sign"></i>
					</span>
				</div>
				<br>
				<br>
				<div class="control">
					<input type="submit" class="button is-link" value="Agregar">
				</div>
			</div>
		</form>
		<br>
	</div>

	<!--TABLA PARA MOSTRAR LAS COMPRAS REALIZADAS-->
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>IdCompra</th>
					<th>Producto</th>
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
						echo "<td>" . $compra['PRODUCTO'] . "</td>";
                        echo "<td>" . $compra['FCH'] . "</td>";
                        echo "<td>" . $compra['CNTLT'] . "</td>";
                        echo "<td>" . $compra['CNTU'] . "</td>";
                        echo "<td>" . "$" . $compra['TT'] . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>

<?php
	require('includes/Footers.php');
?>