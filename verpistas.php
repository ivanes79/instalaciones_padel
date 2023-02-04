 <?php
	require ( "lib/mod004_presentacion.php" );
	

	/*	Verpistas.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la Vista_verpistas para mostrarla.
		
		-- Argumentos --
			$idInstalacion							: Numero que nos identifica a la instalacion
		-- Variables principales --
			
		-- Retorno:
			$arTablePistas							: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getPistas
		-- Vista que la llaman.
			Vista_verpistas.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	if ( isset( $_GET[ "idinstalacion" ] ) ) { 
		// Si la variable existe.
		$idInstalacion = $_GET[ "idinstalacion" ];
	} else {
		// No existe.
		header( 'Location: main' );
	}
	

	
	$arTablePistas = mod004_getPistas( $idInstalacion );
	
		if ( $arTablePistas[ 0 ] !== "002" ) {
				require ( "vista/vista_verpistas.php" );
			} else {
				$dataError = $arTablePistas[ 1 ];
				require ( "vista/vista_gesterror.php" );
			}
?>
