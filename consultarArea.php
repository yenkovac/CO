<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<h1 align="center">Consultar Áreas</h1>
	</div>
</div>
<div class="container">
	<div class="card">
		<form method="post" action="filtrarArea.php">
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
						<td>Id Área</td>
						<td>Nombre Área</td>
						<td>Nombre Completo del Titular</td>
						<td>Modificar</td>
						<td>Eliminar</td>
					</tr>
					<?php
					$query = "SELECT * FROM area";
					$stmt = $conn->prepare($query);
					$stmt->execute();
					while($result = $stmt->fetch()){ 
					?>
					<tr>
						<td><?php echo $result->idArea ?></td>
						<td><?php echo $result->nombreArea ?></td>
						<td><?php echo $result->nombreTitular?> <?php echo $result->apellidoPaternoTitular ?><?php echo " " . $result->apellidoMaternoTitular ?></td>
						<td><a href="<?php echo "modificarArea.php?idArea=" . $result->idArea?>">Modificar</a></td>
						<td><a href="<?php echo "eliminarArea.php?idArea=" . $result->idArea?>">Eliminar</a></td>
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