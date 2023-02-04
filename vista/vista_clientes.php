 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Listado Equipos</title>
		<link rel='stylesheet' href='css/estilosclientes.css'>
		<link rel='stylesheet' href='css/overlay.css'>
		<link rel='stylesheet' href='css/formularios.css'>
		<link rel='stylesheet' href='css/overlayclientes.css'>
		<link rel='stylesheet' href='css/overlayupdate.css'>
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<link rel='stylesheet' href='css/imagenes.css'/>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
		<script src="jquery/jquery-3.6.0.js"></script>
		<script src="js/petasincronas.js"></script>
		<script src='js/loadPage.js'></script>
		<script>
	
			window.onload = loadPage; 
		
		</script>
		<script>
		
			$( function() {
				declararEventoEditar();

				$( "div.overlayupdate" ).on( { 
					"click": function( event ) {
						console.log( event );
						console.log( $( this ) );
						
						//if ( event.target === this ) {
						if ( event.target === event.currentTarget ) {
							console.log( "ocultamos" );
							$( this ).removeClass( "visible" );
						}
						
					}
				});
				
				$( "#listclientes tbody td:nth-child( 1 )" ).on( { 
					"click": function() {
						let  idcliente = $( this ).html();	
						
						getPhotoClienteOverlay( idcliente ) ;
						
						
						
						console.log( "Despues de getPhotoCliente2" );
					}
					
				})
				
				// clickNomEquipo();			
				$( "a[ href='#altacliente' ]" ).on( { 
					"click": function( event ) {
						event.preventDefault(); // Evita que la etiqueta a se vaya al controlador.
						
						$( ".wrapper" ).removeClass( "ocultoDI" );
					}
					
				});
				
				
				
				$( ".wrapper" ).on( { 
					"click": function( event ) {
						event.stopPropagation();
						$( this ).addClass( "ocultoDI" );
					}
					
				});
				
				$( ".wrapper .formulario" ).on( { 
					"click": function( event ) {
						event.stopPropagation();
					}
					
				});
				
				// Alta cliente.
				$( ".wrapper .formulario input[ type='button' ] " ).on( { 
					"click": function( event ) {
						
						let retorno = true;
						let mensaje = "";				
						let nomcliente 		= $( ".wrapper .formulario input[ name='nomcliente' ]" ).val();
						let numtelefono 	= $( ".wrapper .formulario input[ name='numtelefono' ]" ).val();
						let idnivel 		= $( ".wrapper .formulario select[ name='idnivel' ]" ).val();
						// let nomConferencia  = $( "select[ name='idconferencia' ] option:selected" ).text();
											
						if ( nomcliente.length === 0 ) {
							mensaje+= "<p>El nombre está vacío.</p>";
							retorno = false;
						}
						if ( nomcliente.trim().length === 0 ) {
							mensaje+= "<p>No puedes teclear solo espacios en blanco en el nombre.</p>";
							retorno = false;
						}
						if ( numtelefono.length === 0 ) {
							mensaje+= "<p>El el numero de telefono no puede quedar vacío.</p>";
							retorno = false;
						} 
						if ( idnivel === "-1" ) {
							mensaje+= "<p>Debe de seleccionar un nivel.Utilice el desplegable.</p>";
							retorno = false;
						} 
						
						if ( !retorno ) {
							layermsg.innerHTML = mensaje;
						}
						
						
						if ( retorno ) {
							// La validación es correcta.
							// Hay que mandar los datos al servidor. $.ajax.
							
							datos =	{	"accion" : "insCliente", 
										"nomcliente" : nomcliente, 
										"numtelefono" : numtelefono,  
										"idnivel" : idnivel };
									 // "nomconferencia" : nomConferencia };
							
							$.ajax ( {
								type: "POST",
								url: "ajax/controladorAJAX.php",
								data: datos,
								error: function() {
									alert ( "Se ha producido un error." );
								},
								success: function ( data, textStatus ) {
									
									console.log( "#" + data.trim() + "#" );
									
									//location.reload(); Cuando no sabes como insertar en el lugar adecuada. Carga la ventana de nuevo.
									//$( "table#teams tbody" ).append( data.trim() );
									
									
									/* for ( i = 0; i < $( "table#teams tbody tr td:nth-child( 2 ) a" ).length - 1; i++ ) {
										console.log( $( "table#teams tbody tr td:nth-child( 2 ) a" ).eq( i ) );
									} */
									let bInsertado = false;
									$( "table#listclientes tbody tr td:nth-child( 2 )"  ).each( function( index ) {
										//console.log( $( this ).text() );
										
										if ( $( this ).text().toUpperCase() > nomcliente.toUpperCase() && !bInsertado ) {
											//console.log( "Insertar delante de " + $( this ).text() );
											//console.log( $( this ) );
											nodoPadre = $( this ).parent();
											$( data.trim() ).insertBefore( nodoPadre );
											
											declararEventoEditar();
											bInsertado = true;
										}
										
										
									});
									
									//$( "table#teams tbody tr:last-child" )
									//$( "table#teams tbody tr" ).last();
									if ( !bInsertado ) { // inserto.
										$( data.trim() ).insertBefore( "table#clientes tbody tr:last-child" );
									}
									
									
									// Limpiar los campos del formulario.
									$( ".wrapper .formulario input[ name='nomcliente' ]" ).val( "" );
									$( ".wrapper .formulario input[ name='numtelefono' ]" ).val( "" );
									$( ".wrapper .formulario select[ name='idnivel' ]" ).val( "-1" );
									
									//$( ".wrapper" ).addClass( "ocultoDI" );
									$( ".wrapper" ).trigger( "click" );
									
									// clickNomEquipo();
									
								}   
							});
						} else {
						
						}
						
						return false;
				
					}
					
				});
				
								
				// Click en el botón actualizar del formulario actualizar.
				$( ".overlayupdate input[ type='button' ]" ).on( { 
					"click": function( event ) {
						console.log( $( ".overlayupdate div.form1 input[ name='nomcliente' ]" ).val() );
						console.log( $( ".overlayupdate div.form1 input[ name='numtelefono' ]" ).val() );
						console.log( $( ".overlayupdate div.form1 input[ name='idnivel' ]" ).val() );
						// console.log( $( ".overlayupdate select[ name='idequipo' ]" ).val() );	

						// NOS FALTA VALIDAR EL FORMULARIO.
						
						datos =	{	"accion" : "actCliente", 
									"idcliente"	 : 		$( ".overlayupdate div.form1 input[ name='nomcliente' ]" ).attr( "data-id" ),
									"nomcliente" : 		$( ".overlayupdate div.form1 input[ name='nomcliente' ]" ).val(), 
									"numtelefono" : 	$( ".overlayupdate div.form1 input[ name='numtelefono' ]" ).val(),  
									"idnivel" : 		$( ".overlayupdate div.form1 input[ name='idnivel' ]" ).val(),
									"nomficherofoto" : 	$( ".overlayupdate div.form1 input[ name='nomficherofoto' ]" ).val()};
									// "idequipo" : $( ".overlayupdate select[ name='idequipo' ]" ).val() };

						console.log( datos );
						$.ajax ( {
							type: "POST",
							url: "ajax/controladorAJAX.php",
							data: datos,
							error: function() {
								alert ( "Se ha producido un error." );
							},
							success: function ( data, textStatus ) {
								let arData;
								let nodoSig;
								let dataId;
								console.log( data );
								arData = JSON.parse( data );
							console.log( arData );
							
							switch ( arData[ "status" ][ "codError" ] ) { // Este codError es el de la última query o la primera incorrecta.
									case "000": // El update ha ido bien.
									case "001": // El update ha ido bien en la última no hubo actualización.
										// Vamos a cambiar el contenido de la fila del jugador.
										$( "table#listclientes tbody tr td:nth-child( 1 )" ).each( function( index ) {
											
											console.log( this );
											dataId = $( this ).html();
											
											
											if ( dataId === $( ".overlayupdate div.form1 input[ name='nomcliente' ]" ).attr( "data-id" ) ) {
												nodoSig = $( this ).next();
												$( nodoSig ).html(  $( ".overlayupdate div.form1 input[ name='nomcliente' ]" ).val()  );
												nodoSig = $( nodoSig ).next();
												
												$( nodoSig ).html( $( ".overlayupdate div.form1 input[ name='numtelefono' ]" ).val() );
												
												nodoSig = $( nodoSig ).next();
												$( nodoSig ).html( $( ".overlayupdate div.form1 input[ name='idnivel' ]" ).val() );
											}
										} );
										
										$( "div.overlayupdate" ).trigger( "click" );
									break;
									case "002":
										// Mensaje de error.
									break;
									default:
									break;
								}
								
								
								
							}	
						});
					}
				});
				
			} );


			function declararEventoEditar() {
				// Enlace Editar. Abre un overlay de tipo formulario.
				$( "#listclientes tbody td:last-child" ).off( "click" );
				$( "#listclientes tbody td:last-child" ).on( { 
					"click": function( event ) {
						let idcliente, nomcliente, numtelefono, idnivel;
						console.log( "event" );
						console.log( event );
						nodoP = $( this ).parent();
						//nodoP = event.currentTarget.parentNode; // Equivalente en JS empleando event.currentTarget.
						$( nodoP ).children( "td" ).each( function( index ) {							
							switch ( index ) {
								case 0:
									idcliente = $( this ).html();			
								break;
								case 1:
									nomcliente = $( this ).html();
								break;
								case 2:
									numtelefono = $( this ).html();
								break;
								case 3:
									idnivel = $( this ).html();
								break;
							}
						});
						
						getPhotoClienteValor( idcliente );
						
						// Crearlo de la nada overlay o Mostrarlo.
						$( "div.form1 input[ name='nomcliente' ]" ).attr( "data-id", idcliente );
						$( "div.form1 input[ name='nomcliente' ]" ).val( nomcliente );
						$( "div.form1 input[ name='numtelefono' ]" ).val( numtelefono );
						$( "div.form1 input[ name='idnivel' ]" ).val( idnivel );
						
						
						
						
						$( ".overlayupdate" ).addClass( "visible" );
					}	
				} );			
			} 
		</script>
	</head>
	<body>
		<main>
			<header></header>
			<section>
				</br>
				<h1> registrate y ven a disfrutar del padel </h1>	
					</br>
					<article>
						<div class='anchura80'>
							<?php
							echo $arTableClientes[ 1 ];
							?>
						</div>
						</br>
						<div class='registro'>
								<a href='#altacliente'>  REGISTRARSE  </a>
						</div>
						
						</br></br>
						<div class='wrapper ocultoDI'>
							<div class='formulario'>
								<h3>Alta de Cliente</h3>
								<!--<form name='altaequipo' onsubmit='return validacion();'>-->		
								<div class='form'>
									<div> 
										<input type='text' name='nomcliente' placeholder='Nombre del cliente' maxlength='30' />
									</div>
									<div> 
										<input type='text' name='numtelefono' placeholder='numero de telefono' maxlength='50' />
									</div>
									<div> 
										<?php
											echo $layerSelect;
										?>
									</div>
										
									<div>
										<input type="button" value="Grabar" />
									</div>
									</div>
									<!--</form>-->
									<div id='layermsg'></div>
								</div>
							</div>
								
							<div class='overlayupdate'>
								<div class='formulario1'>
									<h3>Actualización jugador</h3>	
									<div class='form1'>
										<div> 
											<input type='text' name='nomcliente' placeholder='Nombre del cliente' maxlength='50' />
										</div>
										<div> 
											<input type='text' name='numtelefono' placeholder='numero de telefono' maxlength='11'  />
										</div>
										<div> 
											<input type='number' name='idnivel' placeholder='nivel' max='7' min='1' step="1.00" />
										</div>
										<div> 
											<input type='text' name='nomficherofoto' placeholder='Foto cliente' maxlength='100' />
										</div>
										<div>
											<input type="button" value="Actualizar" />
										</div>
									</div>
									<div id='layermsg'></div>
								</div>
							</div>
						</div>
					</article>
			</section>

		</main>
	</body>
</html>