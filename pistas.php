<?php
	require ( "lib/mod004_presentacion.php" );

	 /*	Pistas.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la Vista_pistas para mostrarla.
		
		-- Argumentos --
			$pag							: numero que nos indica en el numero de pagina en la que estamos
			$numRegistros					: Numero que nos identifica el numero de registros que queremos ver en pantalla
		-- Variables principales --
			
		-- Retorno:
			$arTablePistas					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getPistasPaginacion
		-- Vista que la llaman.
			Vista_pistas.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	if ( isset( $_GET[ "pag" ] ) ) {
		$pag = floatval( $_GET[ "pag" ] );	
	} else {
		$pag = floatval( 1 );		
	}
	
	if ( isset( $_GET[ "t" ] ) ) {
		$numRegistros = $_GET[ "t" ];
	} else {		
		$numRegistros = 5;
	}
	
	
	$arTablePistas = mod004_getPistasPaginacion( $pag, $numRegistros );

	if ( $arTablePistas[ 0 ] !== "002" ) {
		require ( "vista/vista_pistas.php" );
	} else {
		$dataError = $arTablePistas[ 1 ];
		require ( "vista/vista_gesterror.php" );
	}
?>
