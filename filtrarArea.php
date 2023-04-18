<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<h1 align="center">Búsqueda de Área</h1>
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
				$search = $_POST["search"];
				$query="SELECT * FROM area WHERE nombreArea LIKE '%$search%' OR nombreTitular LIKE '%$search%' OR idArea LIKE '$search'";
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
<div class="container">
	<div class="card">
		<div class="form-group row" align="right">
			<div class="col-sm-12">
				<br>
				<button onclick="location.href='consultarArea.php'" name="btnRegresar" type="submit" class="btn">Regresar</button>
			</div>
		</div>
	</div>
</div>
<?php
include ("footer.php");
?>