<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionSP.php");
session_start();
?>
<div class="container">
    <div class="card" align="center">
        <h1>Sistema Web para el Control de Oficios</h1>
        <h2>Bienvenido</h2>
        <h3><?php echo $_SESSION["nombreEmpleado"]. " " . $_SESSION["apellidoPaternoEmpleado"] . " " . $_SESSION["apellidoMaternoEmpleado"]; ?></h3>
    </div>
</div>
<?php
include ("footer.php");
?>