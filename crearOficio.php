<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<form action="crearOficio.php" method="post">
			<div align="center">
				<h1>Ingresa los datos del Oficio</h1>
			</div>
			<div class="form-group">
				<label for="validation01">Folio</label>
				<input name="folioOficio" type="text" class="form-control is-valid" id="validation01" placeholder="Folio" value="" required pattern="[A-Za-z0-9/-]+">
			</div>
			<div class="form-group">
				<label for="validation02">Fecha del Documento</label>
				<input name="fechaOficio" type="date" class="form-control is-valid" id="validation02" placeholder="Fecha del Documento" value="" required>
			</div>
			<div class="form-group">
				<label for="validation03">Fecha de Ingreso</label>
				<input name="fechaIngresoOficio" type="date" class="form-control is-valid" id="validation03" placeholder="Fecha de Ingreso" value="" required>
			</div>
			<div class="form-group">
				<label for="validation04">Fecha Registro</label>
				<input name="fechaRegistroOficio" type="date" class="form-control is-valid" id="validation04" placeholder="Fecha Registro Oficio" value="" required>
			</div>
			<div class="form-group">
				<label for="validation05">Folio Externo</label>
				<input name="folioOficioExterno" type="text" class="form-control is-valid" id="validation05" placeholder="Folio Externo" value="" required pattern="[A-Za-z0-9/- x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation06">Asunto</label>
				<input name="asuntoOficio" type="text" class="form-control is-valid" id="validation06" placeholder="Asunto" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation07">Nombre de la Empresa Promovente</label>
				<input name="nombreEmpresa" type="text" class="form-control is-valid" id="validation07" placeholder="Nombre de la Empresa Promovente" value="" required pattern="[A-Za-z / x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation08">Nombre del Promovente</label>
				<input name="nombrePromovente" type="text" class="form-control is-valid" id="validation08" placeholder="Nombre del Promovente" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation09">Apellido Paterno del Promovente</label>
				<input name="apellidoPaternoPromovente" type="text" class="form-control is-valid" id="validation09" placeholder="Apellido Paterno del Promovente" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation10">Apellido Materno del Promovente</label>
				<input name="apellidoMaternoPromovente" type="text" class="form-control is-valid" id="validation10" placeholder="Apellido Materno del Promovente" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation11">Anexos</label>
				<input name="anexoOficio" type="text" class="form-control is-valid" id="validation11" placeholder="Anexos" value="" required pattern="[A-Za-z / x0Bf]+">
			</div>
			<div class="form-group">
			<?php
				$query = "SELECT * FROM tipodocumento";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation12">Tipo de Documento</label>
				<select name="idTipoDocumento" id="validation12" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idTipoDocumento ?>"><?php echo $value->idTipoDocumento ?> <?php echo $value->tipoDocumento ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM tipopromovente";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation13">Tipo Promovente</label>
				<select name="idTipoPromovente" id="validation13" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idTipoPromovente ?>"><?php echo $value->idTipoPromovente ?> <?php echo $value->tipoPromovente ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM empleados";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation15">Empleado que Capturo</label>
				<select name="idEmpleado" id="validation15" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idEmpleado ?>"><?php echo $value->idEmpleado ?> <?php echo $value->nombreEmpleado ?> <?php echo $value->apellidoPaternoEmpleado ?> <?php echo $value->apellidoMaternoEmpleado ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM area";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation15">Área a Turnar</label>
				<select name="idArea" id="validation15" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idArea ?>"><?php echo $value->idArea ?> <?php echo $value->nombreArea ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM estatus";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation16">Estatus</label>
				<select name="idEstatus" id="validation16" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idEstatus ?>"><?php echo $value->idEstatus ?> <?php echo $value->tipoEstatus ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<br>
					<button onclick="location.href='inicio.php'" name="btnCancelar" type="submit" class="btn">Cancelar</button>
					<button name="btnEnviar" type="submit" class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
try {
	if(isset($_POST["btnEnviar"])){
		$idOficio;
		$folioOficio = $_POST['folioOficio'];
		$fechaOficio = $_POST['fechaOficio'];
		$fechaIngresoOficio = $_POST['fechaIngresoOficio'];
		$fechaRegistroOficio = $_POST['fechaRegistroOficio'];
		$folioOficioExterno = $_POST['folioOficioExterno'];
		$asuntoOficio = $_POST['asuntoOficio'];
		$nombreEmpresa = $_POST['nombreEmpresa'];
		$nombrePromovente = $_POST['nombrePromovente'];
		$apellidoPaternoPromovente = $_POST['apellidoPaternoPromovente'];
		$apellidoMaternoPromovente = $_POST['apellidoMaternoPromovente'];
		$anexoOficio = $_POST["anexoOficio"];
		$idTipoDocumento = $_POST["idTipoDocumento"];
		$idTipoPromovente = $_POST["idTipoPromovente"];
		$idEmpleado = $_POST["idEmpleado"];
		$idArea = $_POST["idArea"];
		$idEstatus = $_POST["idEstatus"];
		if ($conn != null) {
			$query = "SELECT * FROM oficio WHERE folioOficio = :folioOficio";
			$consult = $conn->prepare($query);
			$consult->bindParam(":folioOficio", $folioOficio);
			$consult->execute();
			if($consult ->rowCount()>=1){
				echo "<script> alert('Este oficio ya ha sido registrado');
				location.href = 'crearOficio.php';
				</script>";
			}else{
				$query = "INSERT INTO oficio (idOficio, folioOficio, fechaOficio, fechaIngresoOficio, fechaRegistroOficio, folioOficioExterno, asuntoOficio, nombreEmpresa, nombrePromovente, apellidoPaternoPromovente, apellidoMaternoPromovente, anexoOficio, idTipoDocumento, idTipoPromovente, idEmpleado, idArea, idEstatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$idOficio);
				$stmt->bindParam(2,$folioOficio);
				$stmt->bindParam(3,$fechaOficio);
				$stmt->bindParam(4,$fechaIngresoOficio);
				$stmt->bindParam(5,$fechaRegistroOficio);
				$stmt->bindParam(6,$folioOficioExterno);
				$stmt->bindParam(7,$asuntoOficio);
				$stmt->bindParam(8,$nombreEmpresa);
				$stmt->bindParam(9,$nombrePromovente);
				$stmt->bindParam(10,$apellidoPaternoPromovente);
				$stmt->bindParam(11,$apellidoMaternoPromovente);
				$stmt->bindParam(12,$anexoOficio);
				$stmt->bindParam(13,$idTipoDocumento);
				$stmt->bindParam(14,$idTipoPromovente);
				$stmt->bindParam(15,$idEmpleado);
				$stmt->bindParam(16,$idArea);
				$stmt->bindParam(17,$idEstatus);
				$stmt->execute();			
				if($stmt){
					echo "<script> alert('Registrado correctamente');
					location.href = 'inicio.php';
					</script>";
				}else{
					echo "<script> alert('Error al registrar');
					location.href = 'crearOficio.php';
					</script>";
				}
			}
		}else{
			echo "<script> alert('No hay conexion a base de datos');
			location.href = 'crearOficio.php';
			</script>";
		}
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>
<?php
include ("footer.php");
?>