<?php
	require ( "mod003_logica.php" );
	

	/*	mod004_getInstalaciones()
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			$tableInstalaciones				: Variable que almacena la informacion de la tabla
			$arDataInstalaciones			: Variable que contiene la informacion			
		-- Retorno:
			$arTableInstalaciones			: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getInstalaciones			
		-- Controladores que la llaman.
			Main.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getInstalaciones() {
		$arDataInstalaciones = mod003_getInstalaciones();
		
		switch ( $arDataInstalaciones[ "status" ][ "codError" ] ) {
			case "000":
				$tableInstalaciones = "<table id='instalaciones'>
									<thead>
										<tr>
											<th>
												instalacion
											</th>
											<th>
												nominstalacion
											</th>
											<th>	
												direccion
											</th>
											<th>	
												telefono
											</th>	
											<th>	
												fecapertura
											</th>
											
										</tr>
									</thead>
								<tbody>";
		
				for ( $i = 0; $i < count ( $arDataInstalaciones[ "data" ] ); $i++ ){
					$tableInstalaciones.= "<tr>";
					foreach ( $arDataInstalaciones[ "data" ][ $i ] as $clave => $valor ) {
						$tableInstalaciones.= "<td>";
						$idinstalacion=$arDataInstalaciones[ "data" ][ $i ]["idinstalacion"];
							if ( $clave === "nominstalacion" ) {
								$tableInstalaciones.= "<a href='verpistas.php?idinstalacion=" . $idinstalacion . "'>";
								$tableInstalaciones.= $valor;
								$tableInstalaciones.= "</a>";
							}else {
								$tableInstalaciones.= $valor;
							}
						
						$tableInstalaciones.= "</td>";
					}	
					$tableInstalaciones.= "</tr>";
				}
					$tableInstalaciones.= "</tbody>";
				$tableInstalaciones.= "</table>";
				
			break;
			case "001":
				$tableInstalaciones =  "<table id='instalaciones'>
									<thead>
										<tr>
											<th>
												instalacion
											</th>
											<th>
												nominstalacion
											</th>
											<th>	
												direccion
											</th>
											<th>	
												telefono
											</th>	
											<th>	
												fecapertura
											</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan=''>
											Sin Datos.
											</td>
										</tr>
									</tbody></table>";
			break;
			case "002":
				$tableInstalaciones = "<div>query: " . $arDataInstalaciones[ "status" ][ "strSQL" ] . "</div>";
				$tableInstalaciones.= "<div>Cod.error: " . $arDataInstalaciones[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableInstalaciones.= "<div>Des.error: " . $arDataInstalaciones[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}
		$arTableInstalaciones[ "status" ] = $arDataInstalaciones[ "status" ][ "codError" ];
		$arTableInstalaciones[ "data" ] = $tableInstalaciones;
			
		return $arTableInstalaciones;
	}		
		
	/*	mod004_getClientes()
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			$tableClientes					: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arTableClientes				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getClientes
		-- Controladores que la llaman.
			clientes.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getClientes() {
		$arDataClientes = mod003_getClientes();
		
			switch ( $arDataClientes[ "status" ][ "codError" ] ) {
			case "000":
				$tableClientes = "<table id='listclientes'>
									<thead>
										<tr>
											<th>idcliente</th>
											<th>nomcliente</th>
											<th>numtelefono</th>
											<th>nivel</th>
											<th>Acción</th>
										</tr>
									</thead>
								<tbody>";
							
				for ( $i = 0; $i < count ( $arDataClientes[ "data" ] ); $i++ ){
					$tableClientes.= "<tr>";
					foreach ( $arDataClientes[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave === "idprofesor" ) {
								$idCliente = $valor;
							}else{
								$tableClientes.= "<td>";
								$tableClientes.= $valor;
							
							}
							
							$tableClientes.= "</td>";
					
					}	
						$tableClientes.= "<td>";
							$tableClientes.= "Editar";
						$tableClientes.= "</td>";
					$tableClientes.= "</tr>";
				}
					$tableClientes.= "</tbody>";
				$tableClientes.= "</table>";
			break;
			case "001":
			$tableClientes = "<table id='clientes'>
									<thead>
										<tr>
											<th>3100_idcliente</th>
											<th>3100_nomcliente</th>
											<th>3100_numtelefono</th>
											<th>3000_idnivel</th>
											<th>Acción</th>
										</tr>
									</thead>
								<tbody>
									<tr>
								<td colspan='5'>
								Sin Datos.
								</td>
									</tr>
								</tbody></table>";
			break;
			case "002":
				$tableClientes = "<div>query: " . $arDataClientes[ "status" ][ "strSQL" ] . "</div>";
				$tableClientes.= "<div>Cod.error: " . $arDataClientes[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableClientes.= "<div>Des.error: " . $arDataClientes[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
			}
			$arTableClientes[ 0 ] = $arDataClientes[ "status" ][ "codError" ];
			$arTableClientes[ 1 ] = $tableClientes;
			
			return $arTableClientes;
	}

	
	/*	mod004_getProfesores()
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			$tableProfesores					: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arTableProfesores			: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getProfesores
		-- Controladores que la llaman.
			profesores.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getProfesores() {
		$arDataProfesores = mod003_getProfesores();

		switch ( $arDataProfesores[ "status" ][ "codError" ] ) {
			case "000":
			$tableProfesores = "<table id='listprofesores'><thead>
										<tr>
											<th>
												nomprofesor
											</th>
											<th> 
												fotoprofesor
											</th>						
										</tr>
									</thead>
									<tbody>";
				
				for ( $i = 0; $i < count ( $arDataProfesores[ "data" ] ); $i++ ){
					$tableProfesores.= "<tr>";
					foreach ( $arDataProfesores[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave === "idprofesor" ) {
							$idprofesor=$valor;
						} else {	
							if ( $clave === "nomprofesor" ) {
								$tableProfesores.= "<td>";
								$tableProfesores.= "<a href='verprofesor.php?idprofesor=" . $idprofesor . "'>";
								$tableProfesores.= $valor;
								$tableProfesores.= "</a>";
							}else if( $clave === "fotoprofesor" ){
								$tableProfesores.= "<td>";
								$tableProfesores.="<img src='".$arDataProfesores[ "data" ][ $i ][ "fotoprofesor" ]."' class='anchura150'>";
							};
						
						}
						$tableProfesores.= "</td>";
					}	
					$tableProfesores.= "</tr>";
				}
					$tableProfesores.= "</tbody>";
				$tableProfesores.= "</table>";
				
			break;
			case "001":
				$tableProfesores = "<table id='listprofesores'><thead>
										<tr>
											<th>
												nomprofesor
											</th>
											<th> 
												nomfotoprofesor
											</th>						
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan=''>
											Sin Datos.
											</td>
										</tr>
									</tbody></table>";
			break;
			case "002":
				$tableProfesores = "<div>query: " . $arDataProfesores[ "status" ][ "strSQL" ] . "</div>";
				$tableProfesores.= "<div>Cod.error: " . $arDataProfesores[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableProfesores.= "<div>Des.error: " . $arDataProfesores[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}
		$arTableProfesores[ "status" ] = $arDataProfesores[ "status" ][ "codError" ];
		$arTableProfesores[ "data" ] = $tableProfesores;
			
		return $arTableProfesores;
	}
	
	/*	mod004_getCursos( $idProfesor )
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
			$idProfesor						: Numero que nos identifica al profesor
		-- Variables principales --
			$tableCursos					: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arTableCursos					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getCursos( $idProfesor )
		-- Controladores que la llaman.
			verprofesor.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getCursos( $idProfesor ) {
		$arDataCursos = mod003_getCursos( $idProfesor );

		switch ( $arDataCursos[ "status" ][ "codError" ] ) {
			case "000":
				$tableCursos = "<table id='listcursos'>
						<thead>
							<tr>
								<th>pista</th>
								<th>preciocurso</th>
								<th>profesor</th>
								<th>nivel</th>
							</tr>
						</thead>
						<tbody>";
							
				for ( $i = 0; $i < count ( $arDataCursos[ "data" ] ); $i++ ) {

					$idCurso = $arDataCursos[ "data" ][ $i ][ "idcurso" ];
					$tableCursos.= "<tr data-id='$idCurso'>";
					foreach ( $arDataCursos[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave === "idcurso" ) {
								$idCurso = $valor;
						
						} else {
							if ( $clave === "preciocurso" ){
								$tableCursos.= "<td>";
								$tableCursos.= "<strong>$valor</strong>";
					
							}else{
								$tableCursos.= "<td>";
								$tableCursos.= $valor;
							
								
							}
							$tableCursos.= "</td>";
						}
					}	
					$tableCursos.= "</tr>";
				}
					$tableCursos.= "</tbody>";
				$tableCursos.= "</table>";
			break;
			case "001":
				$tableCursos =  "<table>
								<thead>
									<tr>
									<th>pista</th>
									<th>idcurso</th>
									<th>preciocurso</th>
									<th>profesor</th>
									<th>nivel</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan='5'>
										Sin Datos.
										</td>
									</tr>
								</tbody></table>";
			break;
			case "002":
				$tableCursos = "<div>query: " . $arDataCursos[ "status" ][ "strSQL" ] . "</div>";
				$tableCursos.= "<div>Cod.error: " . $arDataCursos[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableCursos.= "<div>Des.error: " . $arDataCursos[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}
		$arTableCursos[ 0 ] = $arDataCursos[ "status" ][ "codError" ];
		$arTableCursos[ 1 ] = $tableCursos;
		
		return $arTableCursos;
	}

	/*	mod004_getPistas( $idInstalacion )
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
			$idInstalacion					: Numero que nos identifica a la instalacion
		-- Variables principales --
			$tablePistas					: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arTablePistas					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getPistas( $idInstalacion )
		-- Controladores que la llaman.
			verpistas.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getPistas( $idInstalacion ) {
		$arDataPistas = mod003_getPistas( $idInstalacion );
		switch ( $arDataPistas[ "status" ][ "codError" ] ) {
			case "000":
				$tablePistas = "<table><thead><tr>
											
											<th>instalacion</th>
											<th>numpista</th>
											<th>preciohora</th>
								</tr></thead>
								<tbody>";
				for ( $i = 0; $i < count( $arDataPistas[ "data" ] ); $i++ ) {
					 $tablePistas.= "<tr>";
					foreach ( $arDataPistas[ "data" ][ $i ] as $clave => $valor ) {
					 $tablePistas.= "<td>";
						 if ( $clave === "preciohora" ) {
							$tablePistas.= "<strong>$valor</strong>";
						} else {	
							$tablePistas.= $valor;
						}
						$tablePistas.= "</td>";	
					}
					$tablePistas.="</tr>";
				}
				$tablePistas.= "</tbody>";
				$tablePistas.= "</table>";
			break;
			case "001":
			
				$tablePistas = "<table><thead><tr>
											<th>idpista</th>
											<th>idinstalacion</th>
											<th>numpista</th>
											<th>preciohorapista</th>
								</tr></thead>
								<tbody><tr><td colspan='5'>Sin datos.</td></tr></tbody></table>";
			
			break;
			case "002":
			
				$tablePistas = "<div>query: " . $arDataPistas[ "status" ][ "strSQL" ] . "</div>";
				$tablePistas.= "<div>Cod.Error: " . $arDataPistas[ "status" ][ "codErrorSQL" ] . "</div>";
				$tablePistas.= "<div>Des.Error:" . $arDataPistas[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
			
		}
		
		$arTablePistas[ 0 ] = $arDataPistas[ "status" ][ "codError" ];
		$arTablePistas[ 1 ] = $tablePistas;
		
		
		
		
		return $arTablePistas;
	}		


	/*	mod004_getPistasPaginacion( $pag, $numRegistros )
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen, crea una tabla, crea una paginacion y devuelve toda la informacion 
		-- Argumentos --
			$pag							: numero que nos indica en el numero de pagina en la que estamos
			$numRegistros					: Numero que nos identifica el numero de registros que queremos ver en pantalla
		-- Variables principales --
			$tablePistas					:variable en la que se crea la tabla
		-- Retorno:
			$arTablePistas					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getPistasPaginacion( $pag, $numRegistros )
			mod003_getPistasTotal( $numRegistros )
		-- Controladores que la llaman.
			pistas.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getPistasPaginacion( $pag, $numRegistros ) {
		$arDataPistas = mod003_getPistasPaginacion( $pag, $numRegistros );
		
		switch ( $arDataPistas[ "status" ][ "codError" ] ) {
			case "000":
				$tablePistas = "<table><thead><tr>
											<th>nombreinstalacion</th>
											<th>numpista</th>
											<th>preciohorapista</th>
								</tr></thead>
								<tbody>";
				for ( $i = 0; $i < count( $arDataPistas[ "data" ] ); $i++ ) {
					 $tablePistas.= "<tr>";
					foreach ( $arDataPistas[ "data" ][ $i ] as $clave => $valor ) {
					 $tablePistas.= "<td>";
						 if ( $clave === "preciohorapista" ) {
							$tablePistas.= "<strong>$valor</strong>";
						} else {	
							$tablePistas.= $valor;
						}
						$tablePistas.= "</td>";	
					}
					$tablePistas.="</tr>";
				}
				$tablePistas.= "</tbody>";
				$tablePistas.= "</table>";
			break;
			case "001":
			
				$tablePistas = "<table><thead><tr>
										<th>nombreinstalacion</th>
										<th>numpista</th>
										<th>preciohorapista</th>
										</tr></thead>
								<tbody><tr><td colspan='3'>Sin datos.</td></tr></tbody></table>";
			
			break;
			case "002":
			
				$tablePistas = "<div>query: " . $arDataPistas[ "status" ][ "strSQL" ] . "</div>";
				$tablePistas.= "<div>Cod.Error: " . $arDataPistas[ "status" ][ "codErrorSQL" ] . "</div>";
				$tablePistas.= "<div>Des.Error:" . $arDataPistas[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
			
		}
		
		$arTablePistas[ 0 ] = $arDataPistas[ "status" ][ "codError" ];
		$arTablePistas[ 1 ] = $tablePistas;
		
		$totalPaginas = mod003_getPistasTotal( $numRegistros );
		$arTablePistas[ 2 ]="";
		
	
		$bPrimeraVez = false;
		for ( $i = 1; $i <= $totalPaginas; $i++ ) {
			if ( !$bPrimeraVez ) {
				$bPrimeraVez = true;
				$arTablePistas[ 2 ].= "<a href='pistas'>$i</a>";	
			} else {
				$arTablePistas[ 2 ].= " -- ";	
				$arTablePistas[ 2 ].= "<a href='pistas?pag=$i'>$i</a>";		
			}
		}
		echo "</br>";
	
		if ( $pag !== floatval( 1 ) ) {
			$arTablePistas[ 2 ].= "<a href='pistas?t=$numRegistros'><<</a>"; // < &lt; less than
			if ( $pag - floor( $pag ) === floatval( 0 ) ) {
				$pagAnt = $pag - 1;
			} else {
				$pagAnt = floor( $pag );
			}	
				
			$arTablePistas[ 2 ].= " <a href='pistas?pag=$pagAnt&t=$numRegistros'><</a>";
		} else {
			$arTablePistas[ 2 ].= "<< <";
		}
		
		if ( $pag - floor( $pag ) === floatval( 0 ) ) {
			$arTablePistas[ 2 ].= " $pag";
		} else {
			$arTablePistas[ 2 ].= " ?? " ;
		}	
		
		// Para que funcione el deshabilitado en cambio a 10 por pagina.
		// if ( $pag !== $totalPaginas ) {
		if ( $pag < $totalPaginas ) {
			if ( $pag - floor( $pag ) === floatval( 0 ) ) {
				$pagSig = $pag + 1;
			} else {
				$pagSig = floor( $pag ) + 1;
			}
			$arTablePistas[ 2 ].= " <a href='pistas?pag=$pagSig&t=$numRegistros'>></a>";
			$arTablePistas[ 2 ].= " <a href='pistas?pag=$totalPaginas&t=$numRegistros'>>></a>";
		} else {
			$arTablePistas[ 2 ].= " > >>";
		}
		

		return $arTablePistas;
	}
	
	/*	mod004_getLogo( $idinstalacion )
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen y los devuelve  
		-- Argumentos --
			$idInstalacion					: Numero que nos identifica a la instalacion
		-- Variables principales --
			
		-- Retorno:
			$arDataLogo					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getLogo
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getLogo( $idinstalacion ) {
		$arDataLogo = mod003_getLogo( $idinstalacion );
		
		return $arDataLogo;
	}							
								
	/*	mod004_getInstalaciones2()
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea un layer y devuelve los datos
		-- Argumentos --
			
		-- Variables principales --
			$layerInstalaciones					: Variable que almacena la informacion del layer
		-- Retorno:
			$layerInstalaciones							: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getInstalaciones2
		-- Controladores que la llaman.
			instalaciones2.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getInstalaciones2() {
		$arDataInstalaciones2 = mod003_getInstalaciones2();
		
		switch ( $arDataInstalaciones2[ "status" ][ "codError" ] ) {
			case "000":
				$layerInstalaciones = "";
				// Zona 1
				
				for ( $i = 0; $i < count ( $arDataInstalaciones2[ "data" ] ); $i++ ) {
					if ( $i % 3 === 0 ) {
						$layerInstalaciones.= "<div class='rowinstalaciones'>";
					}
					$layerInstalaciones.= "<div class='instalaciones'>";
					$layerInstalaciones.="<div>";
						$layerInstalaciones.= "<p data-idinstalacion=" . $arDataInstalaciones2[ "data" ][ $i ][ 'idinstalacion' ] . ">" . $arDataInstalaciones2[ "data" ][ $i ][ 'nominstalacion' ] . "</p>";
						$layerInstalaciones.= "<p data-idinstalacion=" . $arDataInstalaciones2[ "data" ][ $i ][ 'idinstalacion' ] . "><a href='#'>" . $arDataInstalaciones2[ "data" ][ $i ][ 'fecapertura' ] . "</a></p>";
					$layerInstalaciones.="</div>";	
					
					$layerInstalaciones.= "</div>";
					if ( $i % 3 === 2 ) {
						$layerInstalaciones.= "</div>";
					}
				
				}	
			break;
			case "001":
			break;
			case "002":
			break;
		}
			
		
		
		return $layerInstalaciones;
	}
	
	/*	mod004_insAltaCliente
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea un layer y devuelve los datos  
		-- Argumentos --
			$nomcliente					: Nombre del cliente
			$numtelefono				: Numero de telefono del cliente
			$idnivel					: Numero que nos identifica el nivel del cliente
		-- Variables principales --
			$layer						: Variable que almacena la informacion del layer
		-- Retorno:
			$arDataLogo					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_insAltaCliente
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_insAltaCliente( $nomcliente, $numtelefono, $idnivel ) {
		$layer = "";
		
		$arInsAltaCliente = mod003_insAltaCliente( $nomcliente, $numtelefono, $idnivel );
		
		$layer.= "<tr>";
		$layer.= 	"<td>";
		$layer.= 	   	$arInsAltaCliente[ "data" ][ 0 ][ "idclienteNew" ];
		$layer.= 	"</td>";
		$layer.= 	"<td>";
		$layer.=         $nomcliente;
		$layer.= 	"</td>";
		$layer.= 	"<td>";
		$layer.= 	   	 $numtelefono;
		$layer.= 	"</td>";
		$layer.= 	"<td>";
		$layer.= 	   	$idnivel;
		$layer.= 	"</td>";
		$layer.= 	"<td>";
		$layer.= 	   	"Editar";
		$layer.= 	"</td>";
		$layer.= "</tr>";
		
		
		return $layer;
		
	}

	/*	mod004_getNivel
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea un layer y devuelve los datos  
		-- Argumentos --
			$nomcliente						: Nombre del cliente
			$numtelefono					: Numero de telefono del cliente
			$idnivel						: Numero que nos identifica el nivel del cliente
		-- Variables principales --
			$layerSelect					: Variable que almacena la informacion del layer
		-- Retorno:
			$layerSelect						: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getNivel
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getNivel() {
		$arDataNivel = mod003_getNivel();
		
		switch ( $arDataNivel[ "status" ][ "codError" ] ) {
			case "000":
				$layerSelect = "";
				$layerSelect.= "<select name='idnivel'>";
				$layerSelect.= "<option value='-1'>Elige nivel</option>";
				for ( $i = 0; $i < count( $arDataNivel[ "data" ] ); $i++ ) {
					$layerSelect.= "<option value='" . $arDataNivel[ 'data' ][ $i ][ 'idnivel' ] . "'>" . $arDataNivel[ 'data' ][ $i ][ 'nomnivel' ] . "</option>";
				} 
				$layerSelect.= "</select>";
			break;
			case "001":
			break;
			case "002";	
			break;
		}
		
		
		return $layerSelect;
		
	}
	
	/*	mod004_getNameProfesor
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen, gestiona los errores y devuelve la informacion
		-- Argumentos --
			$idProfesor						: Numero que nos identifica al profesor
		-- Variables principales --
			$arDataNameProfesor				: Contiene la nformacion la informacion
		-- Retorno:
			$cabecera						: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getNameProfesor
		-- Controladores que la llaman.
			verprofesor.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getNameProfesor( $idProfesor ) {
		$arDataNameProfesor = mod003_getNameProfesor( $idProfesor );
		
		switch ( $arDataNameProfesor[ "status" ][ "codError" ] ) {
			case "000":
				$cabecera = "<h3>". $arDataNameProfesor[ "data" ][ 0 ][ "nomprofesor" ] . "</h3>";
			break;
			case "001":
			case "002";
				$cabecera = "<h3>Error inesperado.</h3>";
			break;
		}
		
		return $cabecera;
	
	}
	
	
	/*	mod004_getPhotoCliente
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen, gestiona los errores y devuelve la informacion
		-- Argumentos --
			$idcliente						: Numero que nos identifica al cliente
		-- Variables principales --
			
		-- Retorno:
			$arDataPhotoCliente				: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getPhotoCliente
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getPhotoCliente( $idcliente ){
		$arDataPhotoCliente = mod003_getPhotoCliente( $idcliente );
		
		return $arDataPhotoCliente;

	}

	/*	mod004_actCliente
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen y los devuelve   
		-- Argumentos --
			
		-- Variables principales --
			
		-- Retorno:
			$arDataCliente					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_actCliente
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto ) {
		$arDataCliente = mod003_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto );
		
		return $arDataCliente;
	}
	
	/*	mod004_getcurso
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
			$idcurso						: Numero que identifica el curso
		-- Variables principales --
			$tableCurso						: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arDataCurso					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getcurso
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getcurso( $idcurso ){
		$arDataCurso = mod003_getcurso( $idcurso );
		switch ( $arDataCurso[ "status" ][ "codError" ] ) {
			case "000":
				$tableCurso = "<table class='infocurso'><thead><tr>
											<th>ALUMNO</th>
											<th>INSTALACION</th>
											<th>FECHAINICIO</th>
										</tr>
									</thead>
									<tbody>";
							
				for ( $i = 0; $i < count ( $arDataCurso[ "data" ] ); $i++ ){
					$tableCurso.= "<tr>";
					foreach ( $arDataCurso[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave !== "idcliente" ) {
							$tableCurso.= "<td>";
								if ( $clave=== "ALUMNO" ) {
									$tableCurso.="<a href='vercliente.php?idcliente=" . $arDataCurso[ "data" ][ $i ][ "idcliente" ] . "'>";
										$tableCurso.= $valor;
									$tableCurso.="</a>";
								} else  {
									$tableCurso.= $valor;
								}	
							$tableCurso.= "</td>";
						}
					}	
					$tableCurso.= "</tr>";
				}
					$tableCurso.= "</tbody>";
				$tableCurso.= "</table>";
			break;
			case "001":
			$tableCurso =  "<table>
								<thead>
									<tr>
										<th>ALUMNO</th>
										<th>INSTALACION</th>
										<th>FECHAINICIO</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan='3'>
										Sin Datos.
										</td>
									</tr>
								</tbody></table>";
			break;
			case "002":
				$tableCurso = "<div>query: " . $arDataCurso[ "status" ][ "strSQL" ] . "</div>";
				$tableCurso.= "<div>Cod.error: " . $arDataCurso[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableCurso.= "<div>Des.error: " . $arDataCurso[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}
		
		
		$arDataCurso[ "data" ] = $tableCurso;

		return $arDataCurso;
	}


	/*	mod004_getCliente
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
			$busqueda							: Recoge el valor obtenido en el input busqueda
		-- Variables principales --
			$tableDatosCliente					: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arDataCliente						: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getDatosCliente
		-- Controladores que la llaman.
			controladorAJAX.PHP
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function mod004_getCliente( $busqueda ){
		$arDataBusqueda = mod003_getCliente( $busqueda );
		switch ( $arDataBusqueda[ "status" ][ "codError" ] ) {
			case "000":
				$tableBusqueda = "<table class='busqueda'><thead><tr>
											<th>nomcliente</th>
											<th>numtelefono</th>
											<th>idnivel</th>
										</tr>
									</thead>
									<tbody>";
					
												

				for ( $i = 0; $i < count ( $arDataBusqueda[ "data" ] ); $i++ ){
					$tableBusqueda.= "<tr>";
					foreach ( $arDataBusqueda[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave !== "idcliente" ) {
							$tableBusqueda.= "<td>";
								if ( $clave=== "nomcliente" ) {
									$tableBusqueda.="<a href='vercliente.php?idcliente=" . $arDataBusqueda[ "data" ][ $i ][ "idcliente" ] . "'>";
										$tableBusqueda.= $valor;
									$tableBusqueda.="</a>";
								} else  {
									$tableBusqueda.= $valor;
								}	
							$tableBusqueda.= "</td>";
						}
					}	
					$tableBusqueda.= "</tr>";
				}
					$tableBusqueda.= "</tbody>";
				$tableBusqueda.= "</table>";
			break;
			case "001":
			$tableBusqueda =  "<table>
								<thead>
									<tr>
										<th>nomcliente</th>
											<th>numtelefono</th>
											<th>idnivel</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan='3'>
										Sin Datos.
										</td>
									</tr>
								</tbody></table>";
			break;
			case "002":
				$tableBusqueda = "<div>query: " . $arDataBusqueda[ "status" ][ "strSQL" ] . "</div>";
				$tableBusqueda.= "<div>Cod.error: " . $arDataBusqueda[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableBusqueda.= "<div>Des.error: " . $arDataBusqueda[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}

		
		$arDataBusqueda[ "data" ] = $tableBusqueda;

		return $arDataBusqueda;
	}

	/*	mod004_getDatosCliente
		
		-- Descripción larga --
			Esta funcion coge los datos que le vienen. Gestiona los errores, crea una tabla y devuelve los datos
		-- Argumentos --
		
		-- Variables principales --
			$tableDatosCliente				: Variable que almacena la informacion de la tabla
		-- Retorno:
			$arDataCliente					: Devuelve un array con las posiciones "status" y "data" que trata los errores y la informacion
		-- Funciones a las que llama.
			mod003_getDatosCliente
		-- Controladores que la llaman.
			verclientes.php
		-- Autor: Ivan Jesus Herraiz Agueda
		-- Fechas.
			Creación		: 2021 - May
			Review			: 2021 - Jun
	*/
	function  mod004_getDatosCliente( $idcliente ){
		$arDataCliente = mod003_getDatosCliente( $idcliente );
		
		switch ( $arDataCliente[ "status" ][ "codError" ] ) {
			case "000":
				$tableDatosCliente = "<table class='detcliente'><thead><tr>
											<th>cliente</th>
											<th>telefono</th>
											<th>nivel</th>
											<th>fecregistro</th>
											<th>instalacion</th>
										</tr>
									</thead>
									<tbody>";
							
				for ( $i = 0; $i < count ( $arDataCliente[ "data" ] ); $i++ ){
					$tableDatosCliente.= "<tr>";
					foreach ( $arDataCliente[ "data" ][ $i ] as $clave => $valor ) {
						if ( $clave !== "nomficherofoto" ) {
							$tableDatosCliente.= "<td>";
								$tableDatosCliente.= $valor;
							$tableDatosCliente.= "</td>";
						}
					}	
					$tableDatosCliente.= "</tr>";
				}
					$tableDatosCliente.= "</tbody>";
				$tableDatosCliente.= "</table>";

				$tableDatosCliente.= "<div class='anchura100'>"; 
					$tableDatosCliente.= "<img src='" . $arDataCliente[ "data" ][ 0 ][ "nomficherofoto" ] . "' />";
				$tableDatosCliente.= "</div>";

			break;
			case "001":
				$tableDatosCliente =  "<table>
								<thead>
									<tr>
										<th>cliente</th>
										<th>telefono</th>
										<th>nivel</th>
										<th>fecregistro</th>
										<th>instalacion</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan='5'>
										Sin Datos.
										</td>
									</tr>
								</tbody></table>";
			break;
			case "002":
				$tableDatosCliente = "<div>query: " . $arDataCliente[ "status" ][ "strSQL" ] . "</div>";
				$tableDatosCliente.= "<div>Cod.error: " . $arDataCliente[ "status" ][ "codErrorSQL" ] . "</div>";
				$tableDatosCliente.= "<div>Des.error: " . $arDataCliente[ "status" ][ "desErrorSQL" ] . "</div>";
			break;
			default:
		}
		
		
		$arDataCliente[ "data" ] = $tableDatosCliente;

		return $arDataCliente;
	}






	



	
?>