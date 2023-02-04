function loadPage() {
	
	// Para cargar el contenido del pie de página y de la cabecera
	// $( 'footer' ).load( 'plantillas/footer.html' , function() {
		 //console.log( "Se ha cargado el footer." );
		
	
	$( 'header' ).load( 'plantillas/header.html', function() {
		console.log( "Se ha cargado el header." );
		// Cualquier evento de cualquier elemento del menú.
		// $( "header nav ul.menu li:last-child" ).on( { 
			//"click": function( event ) {
				// $( ".overlay" ).addClass( "visible" );	
				// $( "html").scrollTop( 0 );
				// $( "html" ).addClass( "overflowhidden" );
			// }
	});
		
		// $( "input.busqueda" ).on( { 
			 //"keypress": function( event ) {
				// console.log( event.keyCode );
				 //if ( event.keyCode === 13 ) {
					// console.log( "Vamos a buscar: " + $( this ).val() );
					// $.ajax ...
				// }
			// }
		 //});
 
   
	
	
	
	
	// Un enlace para abrir el overlay fuera del menu prinicipal.
	// $( "span#over" ).on( { 
		// "click": function( event ) {
			// $( ".overlay" ).addClass( "visible" );	
			// $( "html" ).scrollTop( 0 );
			// $( "html" ).addClass( "overflowhidden" );
		// }
	// });
	
	// Para cerrar el overlay.
	// $( ".overlay" ).on( { 
		// "click": function( event ) {
			// console.log( event );
		
			// if ( event.target === this ) {
			// if ( event.target === event.currentTarget ) {
				// console.log( "ocultamos" );
				// $( this ).removeClass( "visible" );
			// }
			
		// }
	// });
	
	// 
	 $( window ).on( { 
		 "scroll": function( event ) {
			 if ( $( "html" ).scrollTop() > 40 ) {
				 $( "header" ).addClass( "fondoheader" );
			 } else {
				// $( "header" ).removeClass( "fondoheader" );
			 }
			
		 }
	 });
 }