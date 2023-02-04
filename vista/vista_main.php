 <!DOCTYPE html>
<html lang="es"/>
	<head>
		<meta charset="utf-8"/>
		<title>instalaciones padel</title>
		<link rel='stylesheet' href='css/estilosmain.css'/>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<link rel='stylesheet' href='css/imagenes.css'/>
		<link rel='stylesheet' href='css/slide.css'/>
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
						<div class="slider" id="slider">      
							<ul class="slides">       
								<li class="slide" id="slide1">
									<img src='images/padel4.jpg' alt="" />
								</li>
								<li class="slide" id="slide2">
									<img src='images/padel9.jpg' alt="" />	
								</li>
								<li class="slide" id="slide3">
									<img src='images/imagenregistro.jpg' alt="" />	
								</li>
								<li class="slide" id="slide4">
									<img src='images/imagencarro.jpg' alt="" />	
								</li>
							</ul>
						</div>
						<div class='anchura210'>
							<?php
								echo $arTableInstalaciones["data"]; 
							?>
						</div>
								
					</article>

				</section>
			</main>
		</div>
		
	</body>
</html>