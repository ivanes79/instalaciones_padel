<!DOCTYPE html>
<html lang="es"/>
	<head>
		<meta charset="utf-8"/>
		<title>instalaciones padel</title>
		<link rel='stylesheet' href='css/rowinstalaciones.css'>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<link rel='stylesheet' href='css/imagenes.css'/>
		<link rel='stylesheet' href='css/overlay.css'>
		<script src="jquery/jquery-3.6.0.js"></script>
		<!--<link rel='stylesheet' href='css/slide.css'/>-->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
		<!--<script src='js/fncomunes.js'></script>-->
		<script src='js/loadPage.js'></script>
		<script>
	
			window.onload = loadPage; 
		
		</script>
		<script>
			
			
			$( function() {
				
				//$( ".instalaciones p:nth-child( 1 )" ).on( { 
				 $( ".instalaciones p[ data-idinstalacion ]" ).on( { 
					"click": function() {
						//let nodoP = $( this );
						let nodoPadre = $( this ).parent().parent(); 
						
						console.log( "nodoPadre = " + $( nodoPadre )) 
						console.log ( $( nodoPadre ) );
						
						console.log( "length = " + $( nodoPadre ).find( "div.imagen" ).length );
						if ( $( nodoPadre ).find( "div.imagen" ).length === 0 ) {
							
							// Anadiendo .remove() sobre el elemento div.imagen me borra todos los div.imagen que hubiera. Evidentemente solo hay uno o ninguno.
							$( "div.imagen" ).remove();
							
							//datos = "accion=getLogo&id-equipo=" + $( this ).attr( 'data-idequipo' );
							datos =	{ "accion" : "getLogo", "id-instalacion" : $( this ).attr( 'data-idinstalacion' ) };
								$.ajax ( {
									type: "POST",
									url: "ajax/controladorAJAX.php",
									data: datos,
									error: function() {
										alert ( "Se ha producido un error." );
									},
								success: function ( data, textStatus ) {
									var arDataLogo;

									arDataLogo = JSON.parse( data );
									
									switch ( arDataLogo[ "status" ][ "codError" ] ) {
									
										case "000":
											let layer;
											
											layer = "<div class='imagen'>";
											layer+= 	"<img src='" + arDataLogo[ "data" ][ 0 ][ "logoinstalacion" ] + "'>";
											layer+= "</div>";
											
											$( nodoPadre ).append( layer );
										break;
										case "001":
										break;
										case "002":
											
										break;
										default:
									}	
								}   
							});
						} else {
							$( nodoPadre ).find( "div.imagen" ).remove();
						} 
					}
					
				});
				
			
			});
			
			
		</script>
		
	</head>
	<body>
		<div class='wrapper'>
			<main>
				<header></header>
				<section>
					<article>
						<div>
							<?php 
								echo $layerInstalaciones;
							?>
						</div>
					</article>
				</section>
			</main>
		</div>			
	</body>
</html>