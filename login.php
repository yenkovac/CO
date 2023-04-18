<?php
include ("conn.php");
include ("header.php");
include ("nav_index.php");
?>
<div class="container">
	<div class="card">
		<h1 align="center">Inicio Sesión</h1>
		<form id="form-login" method="post" action="validar.php">
			<div class="form-group">
				<label for="validation01">Usuario</label>
				<input name="userEmpleado" type="text" class="form-control is-valid" id="validation01" placeholder="Usuario" value="" required>
			</div>
			<div class="form-group">
				<label for="inputPass">Contraseña</label>
				<input name="passEmpleado" type="password" class="form-control is-valid" id="inputPass" placeholder="Contraseña" value="" required>
			</div>
			<div class="form-group" align="right">
				<div class="col-sm-12">
					<button id="entrar" name="btningresar" type="button" class="btn">Iniciar</button>
				</div>
			</div>
		</form>
	</div>
</div>