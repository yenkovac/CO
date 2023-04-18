<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<form action="crearUs.php" method="post">
			<div align="center">
				<h1>Ingresa los datos del Servidor Público</h1>
			</div>
			<div class="form-group">
				<label for="validation01">Nombre</label>
				<input name="nombreEmpleado" type="text" class="form-control is-valid" id="validation01" placeholder="Nombre" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation02">Apellido Paterno</label>
				<input name="apellidoPaternoEmpleado" type="text" class="form-control is-valid" id="validation02" placeholder="Apellido Paterno" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation03">Apellido Materno</label>
				<input name="apellidoMaternoEmpleado" type="text" class="form-control is-valid" id="validation03" placeholder="Apellido Materno" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation04">Numero de Empleado</label>
				<input name="numeroEmpleado" type="number" class="form-control is-valid" id="validation04" placeholder="Numero de Empleado" value="" required pattern="[0-9]+">
			</div>
			<div class="form-group">
				<label for="validation05">Usuario</label>
				<input name="userEmpleado" type="text" class="form-control is-valid" id="validation05" placeholder="Usuario" value="" required pattern="[a-z]+">
			</div>
			<div class="form-group">
				<label for="validation06">Contraseña</label>
				<input name="passEmpleado" type="password" class="form-control is-valid" id="validation06" placeholder="Contraseña" value="" required pattern="[A-Za-z0-9/-@#]+{8,12}">
			</div>
			<div class="form-group">
				<label for="validation06">Confirma Contraseña</label>
				<input name="confirmPass" type="password" class="form-control is-valid" id="validation06" placeholder="Confirma Contraseña" value="" required pattern="[A-Za-z0-9/-@#]+{8,12}">
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
				<label for="validation07">Puesto</label>
				<select name="idPuestoEmpleado" id="validation07" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idPuestoEmpleado ?>"><?php echo $value->idPuestoEmpleado ?> <?php echo $value->puestoEmpleado ?></option>
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
				<label for="validation08">Área adscrito</label>
				<select name="idArea" id="validation08" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idArea ?>"><?php echo $value->idArea ?> <?php echo $value->nombreArea ?></option>
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
				<label for="validation09">Tipo de usuario</label>
				<select name="idTipoEmpleado" id="validation09" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idTipoEmpleado ?>"><?php echo $value->idTipoEmpleado ?> <?php echo $value->tipoEmpleado ?></option>
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
		$idEmpleado;
		$confirmPass = $_POST['confirmPass'];
		$nombreEmpleado = $_POST['nombreEmpleado'];
		$apellidoPaternoEmpleado = $_POST['apellidoPaternoEmpleado'];
		$apellidoMaternoEmpleado = $_POST['apellidoMaternoEmpleado'];
		$numeroEmpleado = $_POST['numeroEmpleado'];
		$userEmpleado = $_POST['userEmpleado'];
		$passEmpleado = $_POST['passEmpleado'];
		$idPuestoEmpleado = $_POST['idPuestoEmpleado'];
		$idArea = $_POST['idArea'];
		$idTipoEmpleado = $_POST['idTipoEmpleado'];
		if ($conn != null) {
			if ($confirmPass === $passEmpleado) {
				$query = "SELECT * FROM empleados WHERE numeroEmpleado = :numeroEmpleado";
				$consult = $conn->prepare($query);
				$consult->bindParam(":numeroEmpleado", $numeroEmpleado);
				$consult->execute();
				$query2 = "SELECT * FROM empleados WHERE userEmpleado = :userEmpleado";
				$consult2 = $conn->prepare($query2);
				$consult2->bindParam(":userEmpleado", $userEmpleado);
				$consult2->execute();
				if($consult ->rowCount()>=1){
					echo "<script> alert('Este numero de empleado ya existe');
					location.href = 'inicio.php';
					</script>";
				}else if($consult2 ->rowCount()>=1){
					echo "<script> alert('Este Usuario ya existe');
					location.href = 'inicio.php';
					</script>";
				}else{
					$query = "INSERT INTO empleados (idEmpleado, nombreEmpleado, apellidoPaternoEmpleado, apellidoMaternoEmpleado, numeroEmpleado, userEmpleado, passEmpleado, idPuestoEmpleado, idArea, idTipoEmpleado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$idEmpleado);
					$stmt->bindParam(2,$nombreEmpleado);
					$stmt->bindParam(3,$apellidoPaternoEmpleado);
					$stmt->bindParam(4,$apellidoMaternoEmpleado);
					$stmt->bindParam(5,$numeroEmpleado);
					$stmt->bindParam(6,$userEmpleado);
					$stmt->bindParam(7,$passEmpleado);
					$stmt->bindParam(8,$idPuestoEmpleado);
					$stmt->bindParam(9,$idArea);
					$stmt->bindParam(10,$idTipoEmpleado);
					$stmt->execute();			
					if($stmt){
						echo "<script> alert('Registrado correctamente');
						location.href = 'inicio.php';
						</script>";
					}else{
						echo "<script> alert('Error al registrar');
						location.href = 'crearUs.php';
						</script>";
					}
				}
			}else{
				echo "<script> alert('La contraseña no coindicide');
				location.href = 'crearUs.php';
				</script>";
			}
		}else{
			echo "<script> alert('No hay conexion a base de datos');
			location.href = 'crearUs.php';
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