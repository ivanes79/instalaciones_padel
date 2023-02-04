<?php
	require ( "lib/mod004_presentacion.php" );
	

	/*	cursos.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la vista_cursos para mostrarla
		-- Argumentos --
		
		-- Variables principales --
			
		-- Retorno:
			$arTableCursos					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getCursos
		-- Vista que la llaman.
			Vista_cursos.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	$arTableCursos = mod004_getCursos("All");
	
	if ( $arTableCursos[ 1 ] !== "002" ) {
		require ( "vista/vista_cursos.php" );
	} else {
		$dataError = $arTableCursos[ 0 ];
		require ( "vista/vista_gesterror.php" );
	}



?>