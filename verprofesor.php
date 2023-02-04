 <?php
	require ( "lib/mod004_presentacion.php" );
	

	/*	Verprofesor.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la Vista_verprofesor para mostrarla.
		
		-- Argumentos --
			$idProfesor							: Numero que nos identifica al profesor
		-- Variables principales --
			
		-- Retorno:
			$arTableCursos						: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
			$cabecera							: Devuelve  la informacion del nombre del profesor
		-- Funciones a las que llama.
			mod004_getCursos
			mod004_getNameProfesor
		-- Vista que la llaman.
			Vista_verprofesor.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	if ( isset( $_GET[ "idprofesor" ] ) ){
		$idProfesor =  $_GET[ "idprofesor" ];
	} else {
		header( 'Location: main' );
	}
	

	
	$arTableCursos = mod004_getCursos( $idProfesor );
	
	if ( $idProfesor === "All" ) {
		$cabecera = "<h3>Nuestros Profesores</h3>";
	} else {
		$cabecera = mod004_getNameProfesor( $idProfesor );
	}
	
	
	if ( $arTableCursos [ 0 ] !== "002" ){
		require ( "vista/vista_verprofesor.php" );
	} else {
		$dataError = $arTableCursos[ 1 ];
		require ( "vista/vista_gesterror.php" );
	}
