<?php
include ("conn.php");
include ("header.php");
include ("nav_index.php");
?>
<section>
	<div class="container">
		<div class="card" align="center">
			<h1>Búsqueda de Oficios</h1>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="card">
			<form method="post" action="busquedaP.php">
				<div class="form-group">
					<label for="validation01">Ingresa el Folio del Oficio</label>
					<input name="search" type="text" class="form-control is-valid" id="validation01" placeholder="Folio" value="" required pattern="[A-Za-z0-9/-]+">
				</div>
				<div class="form-group row" align="right">
					<div class="col-sm-12">
						<button name="btnBuscar" type="submit" class="btn">Buscar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php
include ("footer.php");
?>