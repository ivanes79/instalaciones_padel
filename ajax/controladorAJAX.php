<?php
	require ( "../lib/mod004_presentacion.php" );
	
	$accion = $_POST[ "accion" ];
	
	switch ( $accion ) {
	/* getPhotoCliente2
		En este caso el controladorAJAX obtiene la foto del cliente que es llamado por vista_clientes , overlay foto cliente
	*/
		case  "getPhotoCliente2":
			if ( isset( $_POST[ "idcliente" ] ) ) {
					$idcliente = $_POST[ "idcliente" ];
					
					$dataReturn = mod004_getPhotoCliente( $idcliente );
					
					echo json_encode( $dataReturn );
				
			} else {
				
			}
		break;
	/* getLogo
		En este caso el controladorAJAX obtiene el logo de la instalacion que es llamado por vista_instalaciones2 
	*/
		case "getLogo":
			if ( isset( $_POST[ "id-instalacion" ] ) ) {
				$idInstalacion = $_POST[ "id-instalacion" ];
				
				$dataReturn = mod004_getLogo( $idInstalacion );
				
				echo json_encode( $dataReturn );
				
			} else {
				
			}
		break;
		
	/* insCliente 
		En este caso el controladorAJAX manda la informacion de un cliente nuevo. Es llamado por vista_clientes , overlay alta cliente
	*/		
		case "insCliente":
			if ( isset( $_POST[ "nomcliente" ], $_POST[ "numtelefono" ], $_POST[ "idnivel" ] ) ) {
				$nomcliente = $_POST[ "nomcliente" ];
				$numtelefono = $_POST[ "numtelefono" ];
				$idnivel = $_POST[ "idnivel" ];
				// $nomconferencia = $_POST[ "nomconferencia" ];
				
				$dataReturn = mod004_insAltaCliente( $nomcliente, $numtelefono, $idnivel );
				
				echo $dataReturn;
				
			} else {
				
			}
		break;
		
	/* actCliente 
		En este caso el controladorAJAX actualiza la informacion de un cliente. Hace una transaccion en la BD
		 y es llamado por vista_clientes , overlay actualizacion cliente(editar)
	*/		
		
			
		case "actCliente":
			if ( isset( $_POST[ "idcliente" ], 
				        $_POST[ "nomcliente" ], 
						$_POST[ "numtelefono" ], 
						$_POST[ "idnivel" ],
						$_POST[ "nomficherofoto" ],) ) {
							
				$idcliente 			= $_POST[ "idcliente" ];
				$nomcliente 		= $_POST[ "nomcliente" ];
				$numtelefono 		= $_POST[ "numtelefono" ];
				$idnivel 			= $_POST[ "idnivel" ];
				$nomficherofoto 	= $_POST[ "nomficherofoto" ];
				
				
				$dataReturn = mod004_actCliente( $idcliente, $nomcliente, $numtelefono, $idnivel, $nomficherofoto );
				
				echo json_encode( $dataReturn );
				
			}
		break;
	/* getPhotoCliente 
		En este caso el controladorAJAX obtiene la foto del cliente que es llamado por vista_clientes , overlay actualizacion cliente 
	*/
		case  "getPhotoCliente":
			if ( isset( $_POST[ "idcliente" ] ) ) {
					$idcliente = $_POST[ "idcliente" ];
					
					$arDataPhotoCliente = mod004_getPhotoCliente( $idcliente );
					
					echo json_encode( $arDataPhotoCliente );
					
				}
			break;
	/* getinfocurso 
		En este caso el controladorAJAX obtiene la informacion de un curso. Es llamado por vista_cursos, overlay infocurso
	*/
		case  "getinfocurso":
			if ( isset( $_POST[ "idcurso" ] ) ) {
					$idcurso = $_POST[ "idcurso" ];
					
					$arDataCurso = mod004_getcurso( $idcurso );
					
					echo json_encode( $arDataCurso );
					
				}
			break;
	/* buscar 
		En este caso el controladorAJAX obtiene los resultados de la busqueda que se introduce en el input buscador.
		 Es llamado por header, overlay busqueda
	*/
		case  "buscar":
			if ( isset( $_POST[ "busqueda" ] ) ) {
					$busqueda = $_POST[ "busqueda" ];
					
					$arDataBusqueda = mod004_getCliente( $busqueda );
					
					echo json_encode( $arDataBusqueda );
					
				}
			break;
			default:
	}
		
		
			
		
?>
