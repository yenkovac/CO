<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<form method="post" action="busquedaAdmin.php">
			<div class="form-group">
				<h1 align="center">Búsqueda de Oficios</h1>
				<label for="validation01">Ingresa los Datos del Oficio</label>
				<input name="search" type="text" class="form-control is-valid" id="validation01" placeholder="Datos" value="" required pattern="[A-Za-z0-9 x0Bf /-]+">
			</div>
			<div class="form-group row" align="right">
				<div class="col-sm-12">
					<button name="btnBuscar" type="submit" class="btn">Buscar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
include ("footer.php");
?>