 <?php
	require ( "lib/mod004_presentacion.php" );
	

	/*	instalaciones2.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la vista_instalaciones2 para mostrarla
		-- Argumentos --
		
		-- Variables principales --
			
		-- Retorno:
			$layerInstalaciones					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getInstalaciones2
		-- Vista que la llaman.
			Vista_instalaciones2.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	$layerInstalaciones = mod004_getInstalaciones2();

	if ( $layerInstalaciones !== "002" ) {
		require ( "vista/vista_instalaciones2.php" );
	} else {
		$dataError = $arTableCursos[ 0 ];
		require ( "vista/vista_gesterror.php" );
	}


	
?>