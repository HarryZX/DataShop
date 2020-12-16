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
	<!--FORMULARIO PARA AGREGAR LAS MARCAS-->
	<div id="hidden" class="container">
		<br>
		<button id="close" class="button is-link is-light">Cancelar</button>
		<form class="level-left" action="" method="POST">
			<div class="field">
				<label for="mc" class="label">Inserte nueva marca</label>
				<div class="control">
					<input type="text" name="marca" id="mc" class="input is-primary">
				</div>
				<br>
				<div class="control">
					<input type="submit" class="button is-link" value="Agregar">
				</div>
			</div>
		</form>
		<br>
	</div>

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
					// ITERAMOS ENTRE LOS DATOS A MOSTRAR
					foreach ($tablaMarcas as $marca) {
						echo "<tr>";
						echo "<td>" . $marca['IDTIPO'] . "</td>";
						echo "<td>" . $marca['MARCA'] . "</td>";
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