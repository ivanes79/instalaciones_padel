<?php
	require ( "lib/mod004_presentacion.php" );
	
	/*	Vercliente.php
		
		-- Descripción larga --
			este controlador recoge la informacion, gestiona los errores y se la manda a la Vista_vercliente para mostrarla.
		
		-- Argumentos --
			$idcliente								: Numero que nos identifica al cliente
		-- Variables principales --
			
		-- Retorno:
			$arTableDatosClientes					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod004_getDatosCliente
		-- Vista que la llaman.
			Vista_vercliente.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	if ( isset( $_GET[ "idcliente" ] ) ) { 
		// Si la variable existe.
		$idcliente = $_GET[ "idcliente" ];
	} else {
		// No existe.
		header( 'Location: main' );
	}
	
    $arTableDatosClientes = mod004_getDatosCliente( $idcliente );
    if ( $arTableDatosClientes["status"] === "002" ) {
        $dataError = $arTableDatosClientes[ "data" ];
        require ( "vista/vista_gesterror.php" );
    
    } else {
        require ( "vista/vista_vercliente.php" );
    }
?>