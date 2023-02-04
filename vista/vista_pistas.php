 <!DOCTYPE html>
<html lang="es"/>
	<head>
		<meta charset="utf-8"/>
		<title>instalaciones padel</title>
		<link rel='stylesheet' href='css/estiloscursos.css'/>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<link rel='stylesheet' href='css/imagenes.css'/>
		<link rel='stylesheet' href='css/overlay.css'>
		<script src='jquery/jquery-3.6.0.js'></script>
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
						<div class='anchura190'>
						<?php
							echo $arTablePistas[ 1 ];
							  
						?>
						</div>
						<div class='anchura200'>
						<?php
							
							echo $arTablePistas[ 2 ];  
						?>
						</div>
					</article>	
				</section>
			</main>
		</div>
	</body>
</html>