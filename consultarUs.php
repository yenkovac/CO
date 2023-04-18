<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<h1 align="center">Consultar Usuarios</h1>
	</div>
</div>
<div class="container">
	<div class="card">
		<form method="post" action="filtrarUs.php">
			<div class="form-group">
				<label for="validation01">Buscador</label>
				<input name="search" type="text" class="form-control is-valid" id="validation01" placeholder="Buscador" value="" required pattern="[A-Za-z0-9 x0Bf]+">
			</div>
			<div class="form-group row" align="right">
				<div class="col-sm-12">
					<button name="btnBuscar" type="submit" class="btn">Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="container">
	<div class="card">
		<div class="card-body">
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
					$query = "SELECT * FROM empleados JOIN puesto ON puesto.idPuestoEmpleado = empleados.idPuestoEmpleado JOIN area ON empleados.idArea = area.idArea JOIN tipoempleado ON tipoempleado.idTipoEmpleado = empleados.idTipoEmpleado";
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
</div>
<div class="container">
	<div class="card">
		<div class="form-group row" align="right">
			<div class="col-sm-12">
				<br>
				<button onclick="location.href='inicio.php'" name="btnRegresar" type="submit" class="btn">Regresar</button>
			</div>
		</div>
	</div>
</div>
<?php
include ("footer.php");
?>