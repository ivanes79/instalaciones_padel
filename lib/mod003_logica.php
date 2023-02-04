<?php
	require ("mod002_accesoadatos.php");
	
	/*	mod003_getInstalaciones()
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen , da formato a la fecha de fecapertura y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			ninguna
		-- Retorno:
			$arDataInstalaciones			: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getInstalaciones()     	:
		-- Funciones que la llaman.
			mod004_getInstalaciones()
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/	
	function mod003_getInstalaciones(){
		$arDataInstalaciones = mod002_getInstalaciones();
		for ( $i = 0; $i < count ( $arDataInstalaciones["data"] ); $i++ ) {
			$arDataInstalaciones["data"][ $i ][ "fecapertura" ] = date( "d-M-Y" , strtotime($arDataInstalaciones["data"][ $i ][ "fecapertura" ]) );
		}
		return $arDataInstalaciones;
	
	}
	
	/*	mod003_getClientes()
			
		-- Descripción larga --
			Esta funcion recoge los datos y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataClientes					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getClientes()
		-- Funciones que la llaman.
			mod004_getClientes()
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getClientes() {
		$arDataClientes = mod002_getClientes();
		
		return $arDataClientes;
	}
	
	/*	mod003_getProfesores()
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
		
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataProfesores		: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getProfesores()
		-- Funciones que la llaman.
			mod004_getProfesores
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getProfesores() {
		$arDataProfesores = mod002_getProfesores();
		
		return $arDataProfesores;
	}
	
	/*	mod003_getCursos( $idProfesor )
			
		-- Descripción larga --
			Esta funcion recoge la informacion de dos funciones distintas selecionandolas con el idprofesor. Da formato al numero de preciocurso
			 y devuelve la informacion seleccionada
		-- Argumentos --
			$idProfesor					: Es el numero que identifica a un profesor
		-- Variables principales --
			$arDataCursos				: Es la variable donde se almacena y se da formato a la informacion
		-- Retorno:
		    $arDataCursos				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getCursos2
			mod002_getCursos
		-- Funciones que la llaman.
			mod004_getCursos( $idProfesor )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getCursos( $idProfesor ) {
		if ( $idProfesor !== "All" ){
			$arDataCursos = mod002_getCursos2( $idProfesor );
		}else{
			$arDataCursos = mod002_getCursos();
		}

		if ( $arDataCursos[ "status" ][ "codError" ] === "000" ) {
			for ( $i = 0; $i < count ( $arDataCursos[ "data" ] ); $i++ ) {
				$arDataCursos[ "data" ][ $i ][ "preciocurso"] = number_format( $arDataCursos[ "data" ][ $i ][ "preciocurso" ], 2, ",", "." );
				$arDataCursos[ "data" ][ $i ][ "preciocurso" ].= " euros.";
			}
		}else {
			
		}
		return $arDataCursos;
	}
	
	/*	mod003_getPistas( $idInstalacion )
			
		-- Descripción larga --
			Esta funcion recoge la informacion, da formato al numero de preciohora y devuelve la informacion
		-- Argumentos --
			$idInstalacion				: Es el numero que identifica a una instalacion
		-- Variables principales --
			$arDataPistas				: Es la variable donde se almacena y se da formato a la informacion
		-- Retorno:
		    $arDataPistas				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getPistas2( $idInstalacion )
		-- Funciones que la llaman.
			mod004_getPistas( $idInstalacion )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getPistas( $idInstalacion ) {
		$arDataPistas = mod002_getPistas2( $idInstalacion );
		
		
		if ( $arDataPistas[ "status" ][ "codError" ] === "000" ) {
			for ( $i = 0; $i < count ( $arDataPistas[ "data" ] ); $i++ ) {
				$arDataPistas[ "data" ][ $i ][ "preciohora"] = number_format( $arDataPistas[ "data" ][ $i ][ "preciohora" ], 2, ",", "." );
				$arDataPistas[ "data" ][ $i ][ "preciohora" ].= " euros.";
			}
		}else {
			
		}	

		return $arDataPistas;
	}
	
	/*	mod003_getInstalaciones2()
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
		
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataInstalaciones2		: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getInstalaciones2
		-- Funciones que la llaman.
			mod004_getInstalaciones2
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getInstalaciones2() {
		$arDataInstalaciones2 = mod002_getInstalaciones2();
		
		return $arDataInstalaciones2;
	}
	
	/*	mod003_getLogo( $idInstalacion )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			$idInstalacion				:numero que nos identifica una instalacion especifica
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataLogo					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getLogo( $idInstalacion )
		-- Funciones que la llaman.
			mod004_getLogo( $idInstalacion )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getLogo( $idInstalacion ) {
		$arDataLogo = mod002_getLogo( $idInstalacion );
		
		return $arDataLogo;
	}
	
	/*	mod003_insAltaCliente( $nomcliente, $numtelefono, $idnivel )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			$nomcliente					:nombre del cliente
			$numtelefono				:numero de telefono
			$idnivel					:numero que nos identifica el nivel
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arInsAltaCliente			: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_insAltaCliente

		-- Funciones que la llaman.
			mod004_insAltaCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_insAltaCliente( $nomcliente, $numtelefono, $idnivel ) {
		
		
		$arInsAltaCliente = mod002_insAltaCliente( $nomcliente, $numtelefono, $idnivel );
		
		return $arInsAltaCliente;
		
	}
	
	/*	mod003_getNivel()
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataNivel				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getNivel
		-- Funciones que la llaman.
			mod004_getNivel
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod003_getNivel() {
		$arDataNivel = mod002_getNivel();
		
		return $arDataNivel;
	}
	
	/*	mod003_getNameProfesor( $idProfesor )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			$idProfesor					:numero que nos identifica a un profesor especifico
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataNameProfesor			: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getNameProfesor
		-- Funciones que la llaman.
			mod004_getNameProfesor
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getNameProfesor( $idProfesor ) {
		$arDataNameProfesor = mod002_getNameProfesor( $idProfesor );
		
		return $arDataNameProfesor;
	}
	
	/*	mod003_getPistasPaginacion( $pag, $numRegistros )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan, gestiona la informacion, da formato al numero de preciohorapista y la devuelve
		-- Argumentos --
			$numRegistros						: Numero que indica el numero de registros que quiero ver en pantalla
			$pag								: Numero que indica el numero de pagina en la que nos encontramos
		-- Variables principales --
			$regInicio							: Variable que nos indica el registro por el que debe empezar cada pagina 
			$arDataPistasPaginacion				: Variable que almacena la informacion y su modificacion
		-- Retorno:
		    $arDataPistasPaginacion				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getPistasPaginacion
		-- Funciones que la llaman.
			mod004_getPistasPaginacion
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getPistasPaginacion( $pag, $numRegistros ) {
		$regInicio = ( $pag - 1 ) * $numRegistros;
		$arDataPistasPaginacion = mod002_getPistasPaginacion( $regInicio, $numRegistros );
		if ( $arDataPistasPaginacion[ "status" ][ "codError" ] === "000" ) {
			for ( $i = 0; $i < count ( $arDataPistasPaginacion[ "data" ] ); $i++ ) {
				$arDataPistasPaginacion[ "data" ][ $i ][ "preciohorapista"] = number_format( $arDataPistasPaginacion[ "data" ][ $i ][ "preciohorapista" ], 2, ",", "." );
				$arDataPistasPaginacion[ "data" ][ $i ][ "preciohorapista" ].= " euros.";
			}
		}else {
			
		}
		return $arDataPistasPaginacion;
	}
	
	/*	mod003_getPistasTotal( $numRegistros )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan, gestiona la informacion y la devuelve
		-- Argumentos --
			$numRegistros					: Numero que indica el numero de registros que quiero ver en pantalla
		-- Variables principales --
			$arDataPistasTotal				: Variable que nos trae la informacion
			$totalPaginas					: Variable que creamos y almacenamos la informacion modificada
		-- Retorno:
		    $totalPaginas					: Devuelve un numero obtenido en la modificacion realizada
		-- Funciones a las que llama.
			mod002_getPistasTotal
		-- Funciones que la llaman.
			mod004_getPistasPaginacion
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getPistasTotal( $numRegistros ) {
		$arDataPistasTotal = mod002_getPistasTotal();
		
		if ( $arDataPistasTotal[ "status" ][ "codError" ] === "000" ) {
			$totalPaginas = ceil( $arDataPistasTotal[ "data" ][ 0 ][ "totalpistas" ] / $numRegistros ); 
			
		} else  { 
		}
		
		
		
		return $totalPaginas;
	}
	
	/*	mod003_getPhotoCliente( $idcliente )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan, gestiona el error 001 y devuelve la informacion
		-- Argumentos --
			$idcliente						:numero que identifica al cliente
		-- Variables principales --
			$arDataPhotoCliente				:variable que nos trae la foto del cliente
		-- Retorno:
		    $arDataPhotoCliente				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getPhotoCliente( $idcliente )
		-- Funciones que la llaman.
			mod004_getPhotoCliente( $idcliente )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getPhotoCliente( $idcliente ){
		$arDataPhotoCliente = mod002_getPhotoCliente( $idcliente );

		if ( $arDataPhotoCliente[ "status" ][ "codError" ] === "001" ) {
			$arDataPhotoCliente[ "data" ][ 0 ][ "nomficherofoto" ] = "images/clientes/generico.jpg";
		}
		return $arDataPhotoCliente; 
	}
	
	/*	mod003_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			$idcliente					:numero que identifica al cliente
			$nomcliente					:nombre del cliente
			$numtelefono				:numero de telefono del cliete
			$idnivel					:numero que identifica el nivel del cliente
			$nomficherofoto				:ruta de la foto del cliente
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataCliente				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_actCliente
		-- Funciones que la llaman.
			mod004_actCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto ) {
		$arDataCliente = mod002_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto );
		
		return $arDataCliente;
	}
	
	/*	mod003_getcurso( $idcurso )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan, formatea la fecha de FECHAINICIO y los devuelve 
		-- Argumentos --
			$idcurso					:numero que identifica el curso
		-- Variables principales --
			$arDataCurso				:Variable donde se almacena la informacion
		-- Retorno:
		    $arDataCurso				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getcurso( $idcurso )
		-- Funciones que la llaman.
			mod004_getcurso( $idcurso )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getcurso( $idcurso ){
		$arDataCurso = mod002_getcurso( $idcurso );
		for ( $i = 0; $i < count ( $arDataCurso[ "data" ] ); $i++ ) {
			$arDataCurso[ "data" ][ $i ][ "FECHAINICIO"] = date( "d-M-Y" , strtotime($arDataCurso[ "data" ][ $i ][ "FECHAINICIO" ]) );
		}
		return $arDataCurso;
	}


	/*	mod003_getCliente( $busqueda )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan y los devuelve sin modificar
		-- Argumentos --
			$busqueda					: Recoge el valor obtenido en el input busqueda
		-- Variables principales --
			ninguna
		-- Retorno:
		    $arDataBusqueda				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getCliente( $busqueda )
		-- Funciones que la llaman.
			mod004_getCliente( $busqueda )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getCliente( $busqueda ){
		$arDataBusqueda = mod002_getCliente( $busqueda );
		
		return $arDataBusqueda;
	}

	/*	mod003_getDatosCliente( $idcliente )
			
		-- Descripción larga --
			Esta funcion recoge los datos que le llegan de dos funciones distintas y las almacena en un array. Gestiona el 
			el error 001 y 000 y le asigna la imagen que correponde. Tambien da formato a la fecha de fecregistro. 
		-- Argumentos --
			$idcliente					:numero que identifica al cliente
		-- Variables principales --
			$arDataPhotoCliente			:variable que nos trae la foto del cliente
			$arDataCliente				:variable que almacena toda la informacion
		-- Retorno:
		    $arDataCliente				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod002_getDatosCliente( $idcliente )
			mod002_getPhotoCliente( $idcliente )
		-- Funciones que la llaman.
			mod004_getDatosCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
		*/
	function mod003_getDatosCliente( $idcliente ){
		$arDataCliente = mod002_getDatosCliente( $idcliente );

		$arDataPhotoCliente = mod002_getPhotoCliente( $idcliente );
		
	
		if ( $arDataPhotoCliente[ "status" ][ "codError" ] === "001" ) {
			$arDataCliente[ "data" ][ 0 ][ "nomficherofoto" ] = "images/clientes/generico.jpg";
		} else if ( $arDataCliente[ "status" ][ "codError" ] === "000" && $arDataPhotoCliente[ "status" ][ "codError" ] === "000" ) {
			$arDataCliente[ "data" ][ 0 ][ "nomficherofoto" ] = $arDataPhotoCliente[ "data" ][ 0 ][  "nomficherofoto" ];
		}

		for ( $i = 0; $i < count ( $arDataCliente[ "data" ] ); $i++ ) {
			$arDataCliente[ "data" ][ $i ][ "fecregistro" ] = date( "d-M-Y" , strtotime($arDataCliente[ "data" ][ $i ][ "fecregistro" ]) );
		}
		

		return $arDataCliente;
	}




?>




