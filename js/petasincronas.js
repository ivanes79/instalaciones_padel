 function getPhotoClienteOverlay( idcliente ) {
	 let datos;
	
	 //datos = "accion=getPhotoCliente2&idcliente=" + $( this ).attr( "data-id" );
	 datos = "accion=getPhotoCliente2&idcliente=" + idcliente;
	 console.log( datos );					
	 $.ajax ( {
		 type: "POST",
		 url: "ajax/controladorAJAX.php",
		 data: datos,
		 error: function() {
			 alert ( "Se ha producido un error." );
		 },
		 success: function ( data, textStatus ) {
			 var arDataClientes;	
			 arDataClientes = JSON.parse( data );
			console.log(data);
			 arDataClientes[ "status" ][ "codError" ]
			 arDataClientes[ "data" ][ 0 ][ "nomficherofoto" ]
			
			 switch ( arDataClientes[ "status" ][ "codError" ] ) {
				 case "000":
				 case "001":
					 layer = "<div class='overlay'>";
					 layer+= 	"<div class='subwrapper'>";
					 layer+= 		"<img src='" + arDataClientes[ "data" ][ 0 ][ "nomficherofoto" ] + "' class='anchura100' />";
					 layer+= 	"</div>";
					 layer+= "</div>";
					
					 $( "body" ).append( layer );
			
					 $( ".overlay" ).on( { 
						 "click": function() {
							 $( this ).remove();
						 }	
				  	});
					
					 console.log( "Dentro de getPhotoCliente2" );
				 break;
				 case "002":
				 break;
				 default:
			 }	
		 }   
	 });
	
}

function getPhotoClienteValor( idCliente ) {
	let datos;
	
	//datos = "accion=getPhotoJugador&idJugador=" + $( this ).attr( "data-id" );
	datos = "accion=getPhotoCliente&idcliente=" + idCliente;
	console.log(datos);				
	$.ajax ( {
		type: "POST",
		url: "ajax/controladorAJAX.php",
		data: datos,
		error: function() {
			alert ( "Se ha producido un error." );
		},
		success: function ( data, textStatus ) {
			var arDataCliente;
				console.log( data );
			arDataCliente = JSON.parse( data );
			
			//arDataPlayers[ "status" ][ "codError" ]
			//arDataPlayers[ "data" ][ 0 ][ "photoplayer" ]
			
			switch ( arDataCliente[ "status" ][ "codError" ] ) {
				case "000":
				case "001":
					$( "input[ name='nomficherofoto' ]" ).val( arDataCliente[ "data" ][ 0 ][ "nomficherofoto" ] );
				break;
				case "002":
				break;
				default:
			}	
		}   
	});
	
}
function getinfocurso( idcurso ) {
	let datos;	
	datos = "accion=getinfocurso&idcurso=" + idcurso;
	console.log(datos);	

	$.ajax ( {
		type: "POST",
		url: "ajax/controladorAJAX.php",
		data: datos,
		error: function() {
			alert ( "Se ha producido un error." );
			console.log(data);	
		},
		success: function ( data, textStatus ) {
			let arDataCurso;
			console.log( data );
			arDataCurso = JSON.parse( data );
			console.log( arDataCurso );
			switch ( arDataCurso[ "status" ][ "codError" ] ) {
				case "000":
				case "001":
					table = "<div class='overlay'>";
					table+=		"<div class='subwrapper1'>";
					table+= 		arDataCurso["data"];
					table+= 	"</div>";
					table+= "</div>";
					$( "body" ).append( table );
			
					$( ".overlay" ).on( { 
						"click": function(event) {
							if ( event.target === event.currentTarget ) {
									console.log( "ocultamos" );
									$( this ).remove();
							}		
						}	
					 });
				break;
				case "002":
				break;
				default:
			}
		}   
	});


}