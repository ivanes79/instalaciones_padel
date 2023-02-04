 <?php
	require ( "mod001_conexion.php" );
	
	/*	 mod002_getInstalaciones()
			
		-- Descripción larga --
			Esta funcion recupera los datos de todas las instalaciones
		-- Argumentos --
			
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getInstalaciones
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod002_getInstalaciones() {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT * ";
		$strSQL.= "FROM 1100_instalacionespadel";
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
			if ( $result ) {
				
				$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
				if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
					
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idinstalacion" ] 		= $row[ "1100_idinstalacion" ];
					$arRetorno[ "data" ][ $i ][ "nominstalacion"] 		= $row[ "1100_nominstalacion" ];
					$arRetorno[ "data" ][ $i ][ "direccion" ] 			= $row[ "1100_direccion" ];
					$arRetorno[ "data" ][ $i ][ "telefono" ] 			= $row[ "1100_telefono" ];
					$arRetorno[ "data" ][ $i ][ "fecapertura" ] 		= $row[ "1100_fecapertura" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}	
			} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}	
			
			
			
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
	
	
	/*	 mod002_getClientes()
			
		-- Descripción larga --
			Esta funcion recupera los datos de todos los clientes
		-- Argumentos --
			
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getClientes
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod002_getClientes() {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT 3100_idcliente, 3100_nomcliente,  3100_numtelefono, 3000_nomnivel ";
		$strSQL.= " FROM 3100_CLIENTES, 3000_NIVELES ";
		$strSQL.= " WHERE 3100_CLIENTES.3000_idnivel = 3000_NIVELES.3000_idnivel ";
		$strSQL.= " ORDER BY 3100_nomcliente ";
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
			if ( $result ) {
				
				$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
				if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
					
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idcliente" ] 		= $row[ "3100_idcliente" ];
					$arRetorno[ "data" ][ $i ][ "nomcliente"] 		= $row[ "3100_nomcliente" ];
					$arRetorno[ "data" ][ $i ][ "numtelefono" ] 	= $row[ "3100_numtelefono" ];
					$arRetorno[ "data" ][ $i ][ "nivel" ] 		= $row[ "3000_nomnivel" ];

					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}	
			} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}	
			
			
			
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
	
	/*	 mod002_getProfesores()
			
		-- Descripción larga --
			Esta funcion recupera los datos de todos los profesores
		-- Argumentos --
			
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getProfesores
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getProfesores() {
		$link = mod001_conectoBD();

		$strSQL = "SELECT DISTINCT( 2000_PROFESORES.2000_idprofesor ),2000_PROFESORES.2000_nomprofesor,2000_PROFESORES.2000_nomfotoprofesor";
		$strSQL.= " FROM 2000_PROFESORES ";
		$strSQL.= " LEFT JOIN 1111_CURSOS ";
		$strSQL.= " ON 2000_PROFESORES.2000_idprofesor = 1111_CURSOS.2000_idprofesor ";

		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
			if ( $result ) {
				
				$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
				if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
					
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idprofesor" ] 		= $row[ "2000_idprofesor" ];
					$arRetorno[ "data" ][ $i ][ "nomprofesor"] 		= $row[ "2000_nomprofesor" ];
					$arRetorno[ "data" ][ $i ][ "fotoprofesor" ] 	= $row[ "2000_nomfotoprofesor" ];
					

					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}	
			} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}	
			
			
			
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
		
	
	/*	 mod002_getCursos()
			
		-- Descripción larga --
			Esta funcion recupera el dato de los cursos que tenemos en la BD
		-- Argumentos --
			
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getCursos
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod002_getCursos() {
		$link = mod001_conectoBD();
		
		
		$strSQL = "SELECT 1110_numpista,1111_idcurso, 1111_preciocurso, 2000_nomprofesor, 3000_nomnivel  ";
		$strSQL.= " FROM 2000_PROFESORES,1111_CURSOS,1110_PISTAS, 3000_NIVELES ";
		$strSQL.= " WHERE 2000_PROFESORES.2000_idprofesor = 1111_CURSOS.2000_idprofesor";
		$strSQL.= " AND 1111_CURSOS.1110_idpista = 1110_PISTAS.1110_idpista";
		$strSQL.= " AND 1111_CURSOS.3000_idnivel = 3000_NIVELES.3000_idnivel";
		$strSQL.= " ORDER BY 1111_idcurso ";
		
		$result = mysqli_query( $link, $strSQL );
			
			$i = 0;
			if ( $result ) {
				
				$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
				if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
					
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					//$arRetorno[ "data" ][ $i ][ "idinstalacion" ] 	= $row[ "1100_idinstalacion" ];
					$arRetorno[ "data" ][ $i ][ "pista"] 			= $row[ "1110_numpista" ];
					$arRetorno[ "data" ][ $i ][ "idcurso" ] 		= $row[ "1111_idcurso" ];
					$arRetorno[ "data" ][ $i ][ "preciocurso" ] 	= $row[ "1111_preciocurso" ];
					$arRetorno[ "data" ][ $i ][ "profesor" ] 		= $row[ "2000_nomprofesor" ];
					$arRetorno[ "data" ][ $i ][ "nivel"] 			= $row[ "3000_nomnivel" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}	
			} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}	
			
			
			
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
	
	/*	 mod002_getCursos2( $idProfesor )
			
		-- Descripción larga --
			Esta funcion recupera los cursos que imparte cada profesor mediante su idprofesor
		-- Argumentos --
			$idProfesor				:numero que nos identifica a cada profesor
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getCursos
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getCursos2( $idProfesor ) {
		$link = mod001_conectoBD();
		
		
		$strSQL = " SELECT 1111_idcurso,1110_numpista, 1111_preciocurso, 2000_nomprofesor, 3000_nomnivel
						FROM 2000_PROFESORES,1111_CURSOS,1110_PISTAS, 3000_NIVELES
						WHERE 2000_PROFESORES.2000_idprofesor = 1111_CURSOS.2000_idprofesor
						AND 1111_CURSOS.1110_idpista = 1110_PISTAS.1110_idpista
						AND 1111_CURSOS.3000_idnivel = 3000_NIVELES.3000_idnivel
						AND 2000_PROFESORES.2000_idprofesor = $idProfesor"; 
						
	
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
			if ( $result ) {
				
				$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
				if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
					
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idcurso"] 			= $row[ "1111_idcurso" ];
					$arRetorno[ "data" ][ $i ][ "pista" ] 			= $row[ "1110_numpista" ];
					$arRetorno[ "data" ][ $i ][ "preciocurso" ] 	= $row[ "1111_preciocurso" ];
					$arRetorno[ "data" ][ $i ][ "profesor" ] 		= $row[ "2000_nomprofesor" ];
					$arRetorno[ "data" ][ $i ][ "nivel"] 			= $row[ "3000_nomnivel" ];
					
					$i++;
				} 
			} else {
			
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}	
			} else {
		
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}	
			
			
			
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
	
	
	/*	 mod002_getPistas2( $idInstalacion )
			
		-- Descripción larga --
			Esta funcion recupera las pistas que corresponden a cada instalacion por medio del id
		-- Argumentos --
			$idInstalacion        	:variable que nos identifica a cada instalacion por su idinstalacion
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getPistas
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/	
	function mod002_getPistas2( $idInstalacion ) {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT 1100_nominstalacion, 1110_numpista, 1110_preciohorapista 
				   FROM 1110_pistas, 1100_instalacionespadel
		 		   WHERE 1110_pistas.1100_idinstalacion = 1100_instalacionespadel. 1100_idinstalacion
				   AND 1100_instalacionespadel.1100_idinstalacion = $idInstalacion ";
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					
					//$arRetorno[ "data" ][ $i ][ "idpista" ] 			= $row[ "1110_idpista" ];
					$arRetorno[ "data" ][ $i ][ "instalacion" ] 		= $row[ "1100_nominstalacion" ];
					$arRetorno[ "data" ][ $i ][ "numpista" ] 			= $row[ "1110_numpista" ];
					$arRetorno[ "data" ][ $i ][ "preciohora" ] 			= $row[ "1110_preciohorapista" ];
				
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}
	
	/*	mod002_getInstalaciones2( $idInstalacion )
			
		-- Descripción larga --
			Esta funcion recupera los datos de la instalacion
		-- Argumentos --
			$idInstalacion          :variable que nos identifica la instalacion por medio del idinstalacion
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getInstalaciones2
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod002_getInstalaciones2() {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT * ";
		$strSQL.= " FROM 1100_instalacionespadel";	
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idinstalacion" ] 		= $row[ "1100_idinstalacion" ];
					$arRetorno[ "data" ][ $i ][ "nominstalacion" ] 		= $row[ "1100_nominstalacion" ];
					$arRetorno[ "data" ][ $i ][ "direccion" ] 			= $row[ "1100_direccion" ];
					$arRetorno[ "data" ][ $i ][ "telefono" ] 			= $row[ "1100_telefono" ];
					$arRetorno[ "data" ][ $i ][ "fecapertura" ] 		= $row[ "1100_fecapertura" ];
					$arRetorno[ "data" ][ $i ][ "idescuela" ] 			= $row[ "1000_idescuela" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}

	/*	mod002_getLogo( $idInstalacion )
			
		-- Descripción larga --
			Esta funcion recupera los logos de las instalaciones de la base de datos 
		-- Argumentos --
			$idInstalacion          :variable que nos identifica la instalacion por medio del idinstalacion  
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getLogo
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getLogo( $idInstalacion ) {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT 1100_idinstalacion, 1100_logoinstalacion
					FROM 1100_instalacionespadel
					WHERE 1100_idinstalacion = $idInstalacion";	
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idinstalacion" ] 		= $row[ "1100_idinstalacion" ];
					$arRetorno[ "data" ][ $i ][ "logoinstalacion" ] 	= $row[ "1100_logoinstalacion" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 	
	

	/*	mod002_insAltaCliente( $nomcliente, $numtelefono, $idnivel )
			
		-- Descripción larga --
			Esta funcion hace un insert into en la tabla CLIENTES mediante un overlay 
		-- Argumentos --
			$nomcliente				:variable que nos recupera el nombre del cliente
			$numtelefono			:variable que nos recupera el numero de telefono del cliente
			$idnivel				:variable que nos recupera el el idnivel
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_insAltaCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/	
	function mod002_insAltaCliente( $nomcliente, $numtelefono, $idnivel ) {
		$link = mod001_conectoBD();
		
		$strSQL = "INSERT INTO `3100_clientes`
					( 3100_idcliente, 3100_nomcliente, 3100_numtelefono, 3000_idnivel )
				   VALUES 
					( null, '$nomcliente', '$numtelefono', $idnivel )";
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRowsAffected" ] = mysqli_affected_rows( $link );
			 
			if ( $arRetorno[ "status" ][ "numRowsAffected" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				$arRetorno[ "data" ][ 0 ][ "idclienteNew" ] = mysqli_insert_id( $link );
				
				
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;	

	}
	
	/*	mod002_getNivel() 

		-- Descripción larga --
			Esta funcion recupera los idnivel y el nombre de cada nivel
		-- Argumentos --
			
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getNivel
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getNivel() {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT *
					FROM 3000_niveles";

		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idnivel" ] 	= $row[ "3000_idnivel" ];
					$arRetorno[ "data" ][ $i ][ "nomnivel" ] 	= $row[ "3000_nomnivel" ];
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}

	/*	mod002_getNameProfesor( $idProfesor ) 
			
		-- Descripción larga --
			Esta funcion recupera el nombre del profesor
		-- Argumentos --
			$idProfesor				:variable que nos identifica a cada profesor por su id
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getNameProfesor
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod002_getNameProfesor( $idProfesor ) {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT 2000_nomprofesor
					FROM 2000_profesores
					WHERE 2000_idprofesor = $idProfesor";

		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "nomprofesor" ] 	= $row[ "2000_nomprofesor" ];
					$i++;
				}
			} else {
			
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	}


	/*	mod002_getPistasPaginacion( $regInicio, $numRegistros ) 
			
		-- Descripción larga --
			Esta funcion recupera la informacion de todas las pistas que tenemos 
		-- Argumentos --
			$regInicio				: Esta variable indica el numero de registro por el que empieza cada pagina mediante una formula realizada en el mod003
			$numRegistros			: Variable que nos indica el numero de registro que nos muestra por pagina
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getPistasPaginacion
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/	
	function mod002_getPistasPaginacion( $regInicio, $numRegistros ) {
		$link = mod001_conectoBD();
	

		$strSQL = "SELECT 1100_nominstalacion, 1110_numpista, 1110_preciohorapista ";
		$strSQL.= " FROM 1100_INSTALACIONESPADEL, 1110_PISTAS ";
		$strSQL.= " WHERE 1100_INSTALACIONESPADEL.1100_idinstalacion = 1110_PISTAS.1100_idinstalacion";
		$strSQL.= " LIMIT $regInicio, $numRegistros";

		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
		
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "nombreinstalacion" ] 	= $row[ "1100_nominstalacion" ];
					$arRetorno[ "data" ][ $i ][ "numpista" ] 			= $row[ "1110_numpista" ];
					$arRetorno[ "data" ][ $i ][ "preciohorapista" ] 	= $row[ "1110_preciohorapista" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 	
	

	/*	mod002_getPistasTotal()
			
		-- Descripción larga --
			Esta funcion cuenta el numero total de pistas que tenemos
		-- Argumentos --
			No hay argumentos
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getPistasTotal
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/	
	function mod002_getPistasTotal() {
		$link = mod001_conectoBD();
		
		$strSQL = "SELECT COUNT( * ) AS totalpistas
					FROM 1110_PISTAS";
		
	
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
			
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
			
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "totalpistas" ] 	= $row[ "totalpistas" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 


	/*	mod002_getPhotoCliente( $idcliente )
			
		-- Descripción larga --
			Esta funcion accede a la base de datos para obtener la foto de cliente
		-- Argumentos --
			$idcliente				: Es un numero que identifica al cliente mediante para actualizar los datos de ese cliente en concreto(univoca)
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getDatosCliente( $idcliente )
			mod003_getPhotoCliente( $idcliente )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getPhotoCliente( $idcliente ){
			$link = mod001_conectoBD();

			$strSQL = "SELECT 3110_nomficherofoto
						FROM 3110_FOTOCLIENTES
						WHERE 3100_idcliente = $idcliente";
		
		
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
		
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "nomficherofoto" ] 	= $row[ "3110_nomficherofoto" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 
	

	/*	mod002_actCliente
			
		-- Descripción larga --
			Es una transacccion entre 3100_CLIENTES y 3110 FOTOCLIENTES. Su funcion es la de actualizar los datos del cliente y la foto. Actualiza primero los datos del clientes y si va bien pasa a actualizar la foto. En caso que alguna query vaya mal, retrocede al comienzo 
		-- Argumentos --
			$idcliente				: Es un numero que identifica al cliente  para actualizar los datos de ese cliente en concreto, de forma univoca
			$nomcliente				: Obtenemos el nombre del clientes por su id y lo recuperamos para actualizarlo
			$numtelefono			: Recuperamos el numero de telefono del clientes para poder actualizarlo
			$idnivel				: Recuperamos el nivel del cliente y lo mostramos para poder actualizar 
			$nomficherofoto			: Recuperamos la ruta de la foto del cliente y lo mostramos para poder actualizar 

		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_actCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/	
	function mod002_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto ) {
		$link = mod001_conectoBD();
		
		$strSQL = "START TRANSACTION";
		$result = mysqli_query( $link, $strSQL );
		
		$strSQL = "UPDATE `3100_CLIENTES` SET
							3100_nomcliente 	 = '$nomcliente',
							3100_numtelefono     = $numtelefono,
							3000_idnivel 		 = $idnivel
							WHERE 3100_idcliente = $idcliente";
		
		$result = mysqli_query( $link, $strSQL );
		
		if ( $result ) {
			// La query es correcta.
			$arRetorno[ "status" ][ "numRowsAffected" ] = mysqli_affected_rows( $link );
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL; 
			if ( $arRetorno[ "status" ][ "numRowsAffected" ] !== 0 ) {
				// La query es correcta CON datos.
				$arRetorno[ "status" ][ "codError" ] = "000";
				
			} else {
				// La query es correcta pero no ha actualizado nada.
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
			
			
			
			
			$strSQL = "UPDATE `3110_FOTOCLIENTES` SET
							3110_nomficherofoto = '$nomficherofoto'
						    WHERE 3100_idcliente = $idcliente";
						   
			$result = mysqli_query( $link, $strSQL );
			
			if ( $result ) {
				// La query es correcta.
				$arRetorno[ "status" ][ "numRowsAffected" ] = mysqli_affected_rows( $link );
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL; 
				if ( $arRetorno[ "status" ][ "numRowsAffected" ] !== 0 ) {
					// La query es correcta CON datos.
					$arRetorno[ "status" ][ "codError" ] = "000";
					
				} else {
					// La query es correcta pero no ha actualizado nada.
					$arRetorno[ "status" ][ "codError" ] = "001";
					$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
				}
				
				$strSQL = "COMMIT";
				$result = mysqli_query( $link, $strSQL );

			} else {
				// Error query erronea o problemas con el servidor.
				$arRetorno[ "status" ][ "codError" ] = "002";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
				$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
				$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
				
				// La segunda query ha ido mal.
				$strSQL = "ROLLBACK";
				$result = mysqli_query( $link, $strSQL );
			}

			
		} else {
			// Error query erronea o problemas con el servidor.
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
			
			// La primera query ha ido mal.
			$strSQL = "ROLLBACK";
			$result = mysqli_query( $link, $strSQL );
			
			
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;	
	}
	
	/*	mod002_getcurso( $idcurso )
			
		-- Descripción larga --
			Esta funcion nos devuelve los datos de un curso en concreto que se identifica mediante idcurso 
		-- Argumentos --
			$idcurso				: Es un numero que identifica el curso de forma univoca
		
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getcurso( $idcurso )
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getcurso( $idcurso ){
		$link = mod001_conectoBD();

		$strSQL = "SELECT 3100_CLIENTES.3100_idcliente, 3100_nomcliente, 1100_nominstalacion, 1111A_fecinicio
					FROM 1111a_REGISTROSCURSOS,3100_CLIENTES, 1100_INSTALACIONESPADEL
					WHERE 1111a_REGISTROSCURSOS.3100_idcliente = 3100_CLIENTES.3100_idcliente
					AND 1111a_REGISTROSCURSOS.1100_idinstalacion = 1100_INSTALACIONESPADEL.1100_idinstalacion
					AND 1111a_REGISTROSCURSOS.1111_IDCURSO = $idcurso";
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
		
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idcliente"] 		= $row[ "3100_idcliente" ];
					$arRetorno[ "data" ][ $i ][ "ALUMNO" ] 			= $row[ "3100_nomcliente" ];
					$arRetorno[ "data" ][ $i ][ "INSTALACION" ] 	= $row[ "1100_nominstalacion" ];
					$arRetorno[ "data" ][ $i ][ "FECHAINICIO" ] 	= $row[ "1111A_fecinicio" ];
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 
	
	/*	mod002_getCliente( $busqueda )
			
		-- Descripción larga --
			Esta funcion nos devuelve los datos que obtenenemos en la busqueda
		-- Argumentos --
			$busqueda				: Es la variable que nos dice que tiene que buscar la query
		
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_actCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getCliente( $busqueda ){
		$link = mod001_conectoBD();



		
		$strSQL = "SELECT 3100_idcliente, 3100_nomcliente,  3100_numtelefono, 3000_nomnivel 
					FROM 3100_CLIENTES, 3000_NIVELES 
					WHERE 3100_CLIENTES.3000_idnivel = 3000_NIVELES.3000_idnivel 
		 			AND 3100_nomcliente LIKE '$busqueda%' ";
		
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
		
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					$arRetorno[ "data" ][ $i ][ "idcliente"] 		= $row[ "3100_idcliente" ];
					$arRetorno[ "data" ][ $i ][ "nomcliente"] 		= $row[ "3100_nomcliente" ];
					$arRetorno[ "data" ][ $i ][ "numtelefono" ] 	= $row[ "3100_numtelefono" ];
					$arRetorno[ "data" ][ $i ][ "idnivel" ] 		= $row[ "3000_nomnivel" ];
					//echo $arRetorno[ "data" ][ $i ][ "nomcliente"] . "###";
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 	

	/*	mod002_getDatosCliente( $idcliente )
			
		-- Descripción larga --
			Esta funcion nos devuelve los datos los datos del cliente
		-- Argumentos --
			$idcliente				: Numero que nos identifica al cliente
		
		-- Variables principales --
			$link					: es la variable que indica el enlace a la base de datos
			$strSQL					: es la query que ejecutamos
			$result					: Contiene el resultado de la query
		-- Retorno:
		    $arRetorno				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod001_conectoBD()  	: Nos conecta con la base de datos para acceder a la informacion
			mod001_desconectoBD		: Nos desconecta de la base de datos una vez que hemos obtenido la informacion
		-- Funciones que la llaman.
			mod003_getDatosCliente
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - May
	*/
	function mod002_getDatosCliente( $idcliente ){
		$link = mod001_conectoBD();

		$strSQL = "SELECT 3100_nomcliente, 3100_numtelefono, 3000_idnivel, 3120_fecregistro, 1100_nominstalacion  
					FROM 3100_CLIENTES
					LEFT JOIN 3120_REGISTROCLIENTES
					ON 3100_clientes.3100_idcliente = 3120_REGISTROCLIENTES.3100_idcliente
					INNER JOIN 1100_INSTALACIONESPADEL
					ON 3120_REGISTROCLIENTES.1100_idinstalacion = 1100_INSTALACIONESPADEL.1100_idinstalacion
					WHERE 3100_clientes.3100_idcliente= $idcliente ";
		
		
		$result = mysqli_query( $link, $strSQL );
		
		$i = 0;
		if ( $result ) {
		
			$arRetorno[ "status" ][ "numRows" ] = mysqli_num_rows( $result );
			
			if ( $arRetorno[ "status" ][ "numRows" ] !== 0 ) {
				
				$arRetorno[ "status" ][ "codError" ] = "000";
				
				while ( $row = mysqli_fetch_array( $result ) ) {
					
					
					$arRetorno[ "data" ][ $i ][ "cliente"] 				= $row[ "3100_nomcliente" ];
					$arRetorno[ "data" ][ $i ][ "telefono" ] 			= $row[ "3100_numtelefono" ];
					$arRetorno[ "data" ][ $i ][ "nivel" ] 				= $row[ "3000_idnivel" ];
					$arRetorno[ "data" ][ $i ][ "fecregistro"] 			= $row[ "3120_fecregistro" ];
					$arRetorno[ "data" ][ $i ][ "instalacion"] 			= $row[ "1100_nominstalacion" ];
				
					
					$i++;
				}
			} else {
				
				$arRetorno[ "status" ][ "codError" ] = "001";
				$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			}
		} else {
			
			$arRetorno[ "status" ][ "codError" ] = "002";
			$arRetorno[ "status" ][ "strSQL" ] = $strSQL;
			$arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
			$arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link ); 
		}
		
		mod001_desconectoBD( $link );
		
		return $arRetorno;
	} 	


	
	
	
	
?>