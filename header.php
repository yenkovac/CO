<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Control de Oficios</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="CO.css">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6LeSxoYlAAAAAEW7jW7FudvU-EPfvruicutZROOK"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
			$(document).ready(function() {
				$('#entrar').click(function() {
					grecaptcha.ready(function() {
						grecaptcha.execute('6LeSxoYlAAAAAEW7jW7FudvU-EPfvruicutZROOK', {
							action: 'validarUsuario'
							}).then(function(token) {
							$('#form-login').prepend('<input type="hidden" name="token" value="' + token + '" >');
							$('#form-login').prepend('<input type="hidden" name="action" value="validarUsuario" >');
							$('#form-login').submit();
						});
					});
				});
			});
		</script>
</head>
<body>
