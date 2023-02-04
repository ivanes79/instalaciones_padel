 <?php
	require ( "lib/mod004_presentacion.php" );
	
	/*	clientes.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la vista_cliente para mostrarla
		-- Argumentos --
		
		-- Variables principales --
			
		-- Retorno:
			$arTableClientes				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
			$layerSelect					: Devuelve un layer con las opciones de nivel
		-- Funciones a las que llama.
			mod004_getClientes				
			mod004_getNivel
		-- Vista que la llaman.
			Vista_clientes.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	$arTableClientes = mod004_getClientes();
	$layerSelect = mod004_getNivel();

	if ( $arTableClientes[ 1 ] !== "002" ) {
		require ( "vista/vista_clientes.php" );
	} else {
		$dataError = $arTableClientes[ 0 ];
		require ( "vista/vista_gesterror.php" );
	}


	
?>