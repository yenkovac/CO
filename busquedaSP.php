<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionSP.php");
?>
<div class="container">
	<div class="card">
	<h1 align="center">Búsqueda de Oficio</h1>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<td>Folio Oficio</td>
					<td>Fecha Oficio</td>
					<td>Fecha Ingreso</td>
					<td>Fecha Registro</td>
					<td>Folio Externo</td>
					<td>Asunto</td>
					<td>Tipo de Documento</td>
					<td>Tipo de Promovente</td>
					<td>Nombre Empresa Promovente</td>
					<td>Nombre Completo Promovente</td>
					<td>Capturado por</td>
					<td>Turnado a</td>
					<td>Estatus</td>
					<td>Anexos</td>
					<td>Modificar</td>
				</tr>
				<?php
				if(isset($_POST["btnBuscar"])){
					$search = $_POST["search"];
					$query="SELECT * FROM oficio JOIN tipodocumento ON tipodocumento.idTipoDocumento = oficio.idTipoDocumento JOIN tipopromovente ON tipopromovente.idTipoPromovente = oficio.idTipoPromovente JOIN empleados ON empleados.idEmpleado = oficio.idEmpleado JOIN area ON area.idArea = oficio.idArea JOIN estatus ON estatus.idEstatus = oficio.idEstatus WHERE folioOficio LIKE '$search' OR fechaOficio LIKE '$search' OR nombreArea LIKE '$search' OR tipoEstatus LIKE '$search' OR CONCAT_WS(' ', nombrePromovente, apellidoPaternoPromovente, apellidoMaternoPromovente) LIKE '%$search%'";
					$stmt = $conn->prepare($query);
					$stmt->execute();
					while($result = $stmt->fetch()){
					?>
					<tr>
						<td><?php echo $result->folioOficio ?></td>
						<td><?php echo $result->fechaOficio ?></td>
						<td><?php echo $result->fechaIngresoOficio ?></td>
						<td><?php echo $result->fechaRegistroOficio ?></td>
						<td><?php echo $result->folioOficioExterno ?></td>
						<td><?php echo $result->asuntoOficio ?></td>
						<td><?php echo $result->tipoDocumento ?></td>
						<td><?php echo $result->tipoPromovente ?></td>
						<td><?php echo $result->nombreEmpresa ?></td>
						<td><?php echo $result->nombrePromovente ?> <?php echo $result->apellidoPaternoPromovente ?> <?php echo $result->apellidoMaternoPromovente ?></td>
						<td><?php echo $result->nombreEmpleado ?> <?php echo $result->apellidoPaternoEmpleado ?> <?php echo $result->apellidoMaternoEmpleado ?></td>
						<td><?php echo $result->nombreArea ?></td>
						<td><?php echo $result->tipoEstatus ?></td>
						<td><?php echo $result->anexoOficio ?></td>
						<td><a href="<?php echo "modificarOficioSP.php?idOficio=" . $result->idOficio?>">Modificar</a></td>
					</tr>
				<?php
				}
				}
				?>
			</table>
	</div>
</div>
<div class="container">
	<div class="card">
		<div class="form-group row" align="right">
			<div class="col-sm-12">
				<br>
				<button onclick="location.href='busquedaOficioSP.php'" name="btnRegresar" type="submit" class="btn">Regresar</button>
			</div>
		</div>
	</div>
</div>
<?php
include ("footer.php");
?>