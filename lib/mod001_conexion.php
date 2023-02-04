<?php

	/*	mod001_conectoBD 
			
		-- Descripción larga --
			Esta funcion nos conecta con la base de datos para accedera los datos
		-- Argumentos --
			
		-- Variables principales --
			$direccion					: Direccion de la base de datos
			$usuario					: Usuario que esta accediendo a la base de datos
			$contrasena					: Contraseña del usuario
			$database					: Nombre de la base de datos a la que se accede
		-- Retorno:
		    $db							: Devuelve la informacion
		-- Funciones a las que llama.
			mysqli_connect				: Conecta con la base de datos
		-- Funciones que la llaman.
			todas las funciones del modelo 002
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod001_conectoBD () {
		$direccion = "localhost";
		$usuario = "root";
		$contrasena = "";
		$database = "instalacionpadel";
		
		$db = mysqli_connect ( $direccion, $usuario, $contrasena, $database );
		if ( !$db ) {
			echo "conexion fallida";
		} 
		
		return $db;
		
	}
	
	/*	mod001_desconectoBD 
			
		-- Descripción larga --
			Esta funcion nos desconecta con la base de datos cuando ya hemos accedido a los datos
		-- Argumentos --
			
		-- Variables principales --
			$link							: Direccion de la base de datos
		-- Retorno:
		    $db								: Devuelve la informacion
		-- Funciones a las que llama.
			mysqli_close					: cierra la conexion con la base de datos
		-- Funciones que la llaman.
			todas las funciones del modelo 002
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod001_desconectoBD ( $link ) {
		
		if ( $link ) {
			mysqli_close( $link );
		}
	}
?>