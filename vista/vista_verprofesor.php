 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Listado Cursos</title>
		<link rel='stylesheet' href='css/estilosprofesores.css'>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
		<script src='js/fncomunes.js'></script>
		<script src="jquery/jquery-3.6.0.js"></script>
		<script src='js/loadPage.js'></script>
		<script>
	
			window.onload = loadPage; 
		
		</script>
	</head>
	<body>
		<div class='wrapper'>
			<main>
				<header></header>
				<section>
					<article>
						<div class=cabecera>
							<?php
								echo $cabecera;
							?>
						</div>
						</br>
						<div class='anchura80'>
							<?php
								echo $arTableCursos[ 1 ];
							?>
						</div>
					</article>	
				</section>
			</main>
		</div>		
	</body>

</html>