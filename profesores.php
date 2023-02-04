<?php
	require ( "lib/mod004_presentacion.php" );
	

    /*	Profesores.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la Vista_profesores para mostrarla.
		
		-- Argumentos --
			
		-- Variables principales --
			
		-- Retorno:
			$arTableProfesores					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getProfesores
		-- Vista que la llaman.
			Vista_profesores.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	$arTableProfesores = mod004_getProfesores();
	
    if ( $arTableProfesores["status"] === "002" ) {
        $dataError = $arTableProfesores[ "data" ];
        require ( "vista/vista_gesterror.php" );
    
    } else {
        require ( "vista/vista_profesores.php" );
    }

	


	
?>