<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<h1 align="center">Búsqueda de Oficio por Fecha</h1>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<td>Id Empleado</td>
					<td>Nombre Completo</td>
					<td>Numero de Empleado</td>
					<td>Usuario del Empleado</td>
					<td>Puesto del Empleado</td>
					<td>Área del Empleado</td>
					<td>Tipo de Empleado</td>
					<td>Modificar</td>
					<td>Eliminar</td>
				</tr>
				<?php
				$search = $_POST["search"];
				$query="SELECT * FROM empleados JOIN puesto ON puesto.idPuestoEmpleado = empleados.idPuestoEmpleado JOIN area ON area.idArea = empleados.idArea JOIN tipoempleado ON tipoempleado.idTipoEmpleado = empleados.idTipoEmpleado WHERE nombreArea LIKE '%$search%' OR numeroEmpleado LIKE '$search' OR puestoEmpleado LIKE '%$search%' OR tipoEmpleado LIKE '$search' OR userEmpleado LIKE '$search' OR idEmpleado LIKE '$search' OR CONCAT_WS(' ', nombreEmpleado, apellidoPaternoEmpleado, apellidoMaternoEmpleado) LIKE '%$search%'";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				while($result = $stmt->fetch()){
				?>
				<tr>
					<td><?php echo $result->idEmpleado ?></td>
					<td><?php echo $result->nombreEmpleado ?> <?php echo $result->apellidoPaternoEmpleado ?><?php echo " " . $result->apellidoMaternoEmpleado ?></td>
					<td><?php echo $result->numeroEmpleado ?></td>
					<td><?php echo $result->userEmpleado ?></td>
					<td><?php echo $result->puestoEmpleado ?></td>
					<td><?php echo $result->nombreArea ?></td>
					<td><?php echo $result->tipoEmpleado ?></td>
					<td><a href="<?php echo "modificarUs.php?idEmpleado=" . $result->idEmpleado?>">Modificar</a></td>
					<td><a href="<?php echo "eliminarUs.php?idEmpleado=" . $result->idEmpleado?>">Eliminar</a></td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>
<div class="container">
	<div class="card">
		<div class="form-group row" align="right">
			<div class="col-sm-12">
				<br>
				<button onclick="location.href='consultarUS.php'" name="btnRegresar" type="submit" class="btn">Regresar</button>
			</div>
		</div>
	</div>
</div>
<?php
include ("footer.php");
?>