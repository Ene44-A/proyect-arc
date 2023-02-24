<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de contacto</title>
	<link rel="stylesheet" href="estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrap">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:" value="">

			<input type="text" class="form-control" name="correo" id="correo" placeholder="Correo:" value="">

			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje:"></textarea>

			<input type="submit" name="submit" class="btn btn-primary" value="Enviar Correo">
			<?php if(!empty($errores)):?>
				<div class="alert error" role="alert">
					<?php echo $errores; ?>
				</div>
			<?php endif; ?>
		</form>
	</div>
</body>