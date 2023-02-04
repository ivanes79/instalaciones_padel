 <!DOCTYPE html>
<html lang="es"/>
	<head>
		<meta charset="utf-8"/>
		<title>instalaciones padel</title>
		<link rel='stylesheet' href='css/estilosprofesores.css'>
		<link rel='stylesheet' href='css/overlay.css'>
		<link rel='stylesheet' href='css/imagenes.css'>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
		<script src="jquery/jquery-3.6.0.js"></script>
		<script src='js/loadPage.js'></script>
		<script>
	
			window.onload = loadPage; 
		
		</script>
		<!--<script src='js/fncomunes.js'></script>-->
		<script>
			
			$( function() {
				
				$( "table#listprofesores tbody td:nth-child( 3 )" ).on( { 
					"click": function( event ) {
						
						$( "#nameprofesor" ).html( $( this ).html() );
						// Copiar en <span id='nameprofesor' el nombre del profesor.
						console.log($( "#nameprofesor" ).html( $( this ).html() ));
						$( "#nomprofesor" ).html( $( this ).html() );
						// Copiar en <span id='nameprofesor' el nombre del profesor.
						console.log($( "#nameprofesor" ).html( $( this ).html() ));
						// Quitar la clase ocultoD al overlay.
						( $( ".overlay" ).removeClass( "ocultoD" ));
						
						// De momento el evento puede estar definido en el mismo nivel que el click sobre el tr.
						// Definir el evento de cierre( click ) del overlay. Lo que significa es añadir la clase ocultoD.
					
						
					
					
					}/*, Si necesitas declarar en un elemento más de un evento.
					"dblclick": function() {
						alert( "dblclick" );
					}*/
				});
				/*ahora se hace el evento de cierre o de ocultar el overlay*/
				$( ".overlay" ).on( { 
					"click": function() {
						$( this ).addClass( "ocultoD" );
						// Es lo mismo que la anterior. $( ".overlay" ).addClass( "ocultoD" );
					}
					
				});
				
			} );	
		</script>		
	</head>
	<body>
		<div class='wrapper'>
			<main>
				<header></header>
				<section>
					<article>
						<div class=cabecera>
							<h1> NUESTROS PROFESORES </h1>
						</div>
						
						<!--<h3> Nuestros Profesores </h3>-->
						<div class='anchura200'>
						<?php
							echo $arTableProfesores["data"]; 
						?>
						</div>
					</article>
				</section>
			</main>
		</div>
	</body>
</html>