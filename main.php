<?php
	require( "lib/mod004_presentacion.php");
	

    /*	Main.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la vista_main para mostrarla
		-- Argumentos --
		
		-- Variables principales --
			
		-- Retorno:
			$arTableInstalaciones					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getInstalaciones
		-- Vista que la llaman.
			Vista_main.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	$arTableInstalaciones = mod004_getInstalaciones();
	
	if ( $arTableInstalaciones["status"] === "002" ) {
        $dataError = $arTableInstalaciones[ "data" ];
        require ( "vista/vista_gesterror.php" );
    
    } else {
        require ( "vista/vista_main.php" );
    }

	
	
?>