<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
if(!isset($_GET["idEmpleado"])) exit();
$idEmpleado = $_GET["idEmpleado"];
$stmt = $conn->prepare("SELECT * FROM empleados WHERE idEmpleado = ?;");
$stmt->execute([$idEmpleado]);
$empleado = $stmt->fetch(PDO::FETCH_OBJ);
if($empleado === FALSE){
	echo "<script> alert('No Existe este Registro');
	location.href = 'consultarUs.php';
	</script>";
	exit();
}
?>
<div class="container">
	<div class="card">
		<form action="updateUs.php" method="post">
			<div align="center">
				<h1>Modifica los datos del Servidor Público</h1>
			</div>
			<div class="form-group">
				<input name="idEmpleado" type="hidden" class="form-control is-valid" id="validation01" placeholder="Usuario" required value="<?php echo $empleado->idEmpleado; ?>">
			</div>
			<div class="form-group">
				<label for="validation02">Nombre</label>
				<input name="nombreEmpleado" type="text" class="form-control is-valid" id="validation02" required pattern="[A-Za-z x0Bf]+" placeholder="Nombre" value="<?php echo $empleado->nombreEmpleado; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation03">Apellido Paterno</label>
				<input name="apellidoPaternoEmpleado" type="text" class="form-control is-valid" id="validation03" required pattern="[A-Za-z x0Bf]+" placeholder="Apellido Paterno" value="<?php echo $empleado->apellidoPaternoEmpleado; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation04">Apellido Materno</label>
				<input name="apellidoMaternoEmpleado" type="text" class="form-control is-valid" id="validation04" required pattern="[A-Za-z x0Bf]+" placeholder="Apellido Materno" value="<?php echo $empleado->apellidoMaternoEmpleado; ?>" required>
			</div>
			<div class="form-group">
				<input name="numeroEmpleado" type="hidden" class="form-control is-valid" id="validation05" placeholder="Numero de Empleado" required value="<?php echo $empleado->numeroEmpleado; ?>" required>
			</div>
			<div class="form-group">
				<input name="userEmpleado" type="hidden" class="form-control is-valid" id="validation06" placeholder="Usuario" required value="<?php echo $empleado->userEmpleado; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation07">Contraseña</label>
				<input name="passEmpleado" type="password" class="form-control is-valid" id="validation07" required pattern="[A-Za-z0-9]+{8,12} placeholder="Contraseña" value="<?php echo $empleado->passEmpleado; ?>" required>
			</div>
			<div class="form-group">
			<?php
				$query = "SELECT * FROM puesto";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				//var_dump($resultArea[0]->idArea);
				foreach ($result as $row) {
					//echo $row->idArea;
				}
				?>
				<label>Puesto</label>
				<select name="idPuestoEmpleado" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $empleado) : ?>
						<option value="<?php echo $empleado->idPuestoEmpleado ?>"><?php echo $empleado->idPuestoEmpleado ?> <?php echo $empleado->puestoEmpleado ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM area";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				//var_dump($resultArea[0]->idArea);
				foreach ($result as $row) {
					//echo $row->idArea;
				}
				?>
				<label>Área adscrito</label>
				<select name="idArea" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $empleado) : ?>
						<option value="<?php echo $empleado->idArea ?>"><?php echo $empleado->idArea ?> <?php echo $empleado->nombreArea ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
			<?php
				$query = "SELECT * FROM tipoempleado";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				//var_dump($resultArea[0]->idArea);
				foreach ($result as $row) {
					//echo $row->idArea;
				}
				?>
				<label>Tipo de usuario</label>
				<select name="idTipoEmpleado" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $empleado) : ?>
						<option value="<?php echo $empleado->idTipoEmpleado ?>"><?php echo $empleado->idTipoEmpleado ?> <?php echo $empleado->tipoEmpleado ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button name="btnEnviar" type="submit" class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>