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
	<!--FORMULARIO PARA AGREGAR LOS PRODUCTOS-->
	<div id="hidden" class="container">
		<br>
		<button id="close" class="button is-link is-light">Cancelar</button>
		<form class="level-left" action="" method="POST">
			<div class="field">

				<label for="nm" class="label">Marca</label>
				<div class="control">
					<div class="select">
						<select name="idmarca" id="nm">
							<?php
								// ITERAMOS ENTRE LOS DATOS PARA MOSTRAR LOS QUE SE ELEGIRÁN
								foreach ($valores as $marcas) {
									// EN EL VALOR AGREGAMOS LOS ID DE LAS MARCAS
									echo '<option value='. $marcas['ID'] .'>' . $marcas['NAME'] . '</option>';
								}
							?>
						</select>
					</div>
				</div>

				<label for="np" class="label">Nombre del producto</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="nombre" id="np" class="input is-primary" placeholder="Golosina">
					<span class="icon is-small is-left">
						<i class="fas fa-candy-cane"></i>
					</span>
				</div>

				<label for="dc" class="label">Descripción</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="desc" id="dc" class="input is-primary" placeholder="Hecho a base de caramelo">
					<span class="icon is-small is-left">
						<i class="fas fa-info"></i>
					</span>
				</div>

				<label for="pc" class="label">Precio</label>
				<div class="control has-icons-left has-icons-right">
					<input type="text" name="precio" id="pc" class="input is-primary">
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

	<!--TABLA QUE MOSTRARÁ LOS PRODUCTOS-->
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
					// ITERAMOS ENTRE LOS DATOS A MOSTRAR
					foreach ($tablaProductos as $producto) {
						echo "<tr>";
						echo "<td>" . $producto['IDPROD'] . "</td>";
						echo "<td>" . $producto['TP'] . "</td>";
                        echo "<td>" . $producto['NOM'] . "</td>";
                        echo "<td>" . $producto['DES'] . "</td>";
						echo "<td>" . "$" . $producto['PREC'] . "</td>";
						echo '<td><div class="column is-1"><button class="button is-danger">Eliminar</button></div></td>';
						echo '<td><div class="column is-1"><button class="button is-primary">Editar</button></div></td>';
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
    </div>

<?php
	require('includes/Footers.php');
?>