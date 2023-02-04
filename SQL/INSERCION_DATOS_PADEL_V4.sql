USE INSTALACIONPADEL;

INSERT INTO `1000_ESCUELASPADEL`
	( 1000_idescuela, 1000_nomescuela, 1000_nif, 1000_feccreacion, 1000_fotonomescuela )
VALUES
	(  NULL, "ESCUELA TIX PADEL " , 	"B80231928",	 "2018-02-13", 	"C:\imagenes\escuela.jpg"	);
	
INSERT INTO `2000_PROFESORES`
	( 2000_idprofesor, 2000_nomprofesor, 2000_nomfotoprofesor )
VALUES
	(  NULL, "Juan Fernandez Garcia", 		"images/profesores/Juan Fernandez Garcia.jpg"	),
	(  NULL, "Mario Merino Nuñez", 			"images/profesores/Mario Merino Nuñez.jpg"		),
	(  NULL, "Elena Aguilar Rojas", 		"images/profesores/Elena Aguilar Rojas.jpg"	),
	(  NULL, "Matias Iglesias Bernal ",		"images/profesores/Matias Iglesias Bernal.jpg"	),
	(  NULL, "David Jimenez Arribas", 		"images/profesores/David Jimenez Arribas.jpg"	);

INSERT INTO `3000_NIVELES` 
	( 3000_idnivel, 3000_nomnivel )
	
VALUES
	( null, "Principiante" 					),
	( null, "Principiante-medio" 			),
	( null, "Medio" 						),
	( null, "Medio-Avanzado"				),
	( null, "Avanzado"						),
	( null, "Avanzado-Experto"				),
	( null, "Experto" 						);
	

INSERT INTO `4000_HORARIOS` 
	( 4000_idhorario, 4000_horario )
	
VALUES
	( null, "19:00 - 20:30" 		),
	( null, "17:00 - 18:30" 		),
	( null, "11:00 - 12:30" 		),
	( null, "13:00 - 14:30" 		),
	( null, "21:00 - 22:30" 		);
	


INSERT INTO `1100_INSTALACIONESPADEL`
	( 1100_idinstalacion, 1100_nominstalacion, 1100_direccion, 1100_telefono, 1100_fecapertura,1100_logoinstalacion, 1000_idescuela )
VALUES
	( NULL, "TIX PADEL INDOOR",	 		"C/BUENOS AIRES Nº46",		914770359,	"2018-02-13", "images/logosinstalaciones/TIX_logo.jpg",  1	),
	( NULL, "INDOOR PADEL TRAINING",	"C/ELECTRODO Nº18",			916734060,	"2018-04-15", "images/logosinstalaciones/INDOOR_logo.jpg",	 1	),
	( NULL, "TOP PADEL INDOOR",	 		"C/JOSE DEL HIERRO Nº24",	913282430,	"2019-12-10", "images/logosinstalaciones/TOP_logo.jpg",	 1	);

	
	
INSERT INTO `3100_CLIENTES`
	( 3100_idcliente, 3100_nomcliente, 3100_numtelefono, 3000_idnivel )
VALUES
	(  NULL,	"Jose Luis Perez Ayala", 		629291346, 			3 ),
	(  NULL, 	"Ivan Mendez Hidalgo",     		679823641,		 	3 ),
	(  NULL, 	"Javier Garcia herrera",     	649523748,			2 ),
	(  NULL, 	"David Fernandez Luengo",       667871010,		 	3 ),
	(  NULL, 	"Maria Rodriguez Lopez",      	667498755,		 	1 ),
	(  NULL, 	"Vanesa Prieto garcia",      	629378960,		 	3 ),
	(  NULL, 	"Ruben Bernal Garcia",      	637563615,	 		4 ),
	(  NULL, 	"Miguel Sanchez Piñeiro",     	600430400,	 		3 ),
	(  NULL, 	"David Aguilar Sanchez",      	654278483,	 		4 ),
	(  NULL, 	"Pedro Garcia Martin",      	629465719,		 	3 ),
	(  NULL, 	"Marta Fernandez Merino",      	637273819,			5 ),
	(  NULL, 	"Raul Azaña Jimenez",	      	649875543,		 	3 ),
	(  NULL, 	"Roberto Lopez Perez",      	629456129,		 	3 ),
	(  NULL, 	"Diana Flores Herrera ",      	645630980,		 	2 );
	


INSERT INTO `3120_REGISTROCLIENTES`
	( 1100_idinstalacion, 3100_idcliente, 3120_fecregistro )
VALUES
	(  1,		1, 			"2018-02-13" ),
	(  1, 		2,     		"2018-02-13" ),
	(  1, 		3,     		"2018-02-13" ),
	(  2, 		4,      	"2018-04-15" ),
	(  3, 		5,      	"2019-12-10" ),
	(  1, 		6,      	"2018-03-04" ),
	(  1, 		7,      	"2018-04-24" ),
	(  1, 		8,     		"2019-02-09" ),
	(  1, 		9,      	"2020-10-10" ),
	(  2,		10,			"2021-01-09" ),
	(  2,		11,			"2021-02-24" ),
	(  1,		12,			"2018-02-13" ),
	(  3,		13,			"2021-02-24" ),
	(  3,		14,			"2018-02-13" );	


INSERT INTO `1110_PISTAS`
	( 1110_idpista, 1100_idinstalacion, 1110_numpista, 1110_preciohorapista )
VALUES
	(  NULL,	1, 			"Pista 1", 		 	21.50 ),
	(  NULL, 	1,     		"Pista 2",			21.50 ),
	(  NULL, 	1,     		"Pista 3",			18.00 ),
	(  NULL, 	1,     	 	"Pista 4",			18.00 ),
	(  NULL, 	1,     	 	"Pista 5",			18.00 ),
	(  NULL, 	1,      	"Pista 6",			18.00 ),
	(  NULL, 	2,     		"Pista 7",			18.00 ),
	(  NULL, 	2,      	"Pista 8",			18.00 ),
	(  NULL, 	2,      	"Pista 9",			18.00 ),
	(  NULL, 	2,      	"Pista 10",		 	18.00 ),
	(  NULL,	2, 			"Pista 11", 		18.00 ),
	(  NULL, 	2,     		"Pista 12",			18.00 ),
	(  NULL, 	2,     		"Pista 13",			18.00 ),
	(  NULL, 	2,     		"Pista 14",			18.00 ),
	(  NULL, 	2,      	"Pista 15",			18.00 ),
	(  NULL, 	3,      	"Pista 16",			18.00 ),
	(  NULL, 	3,      	"Pista 17",		 	18.00 ),
	(  NULL,	3, 			"Pista 18", 		18.00 ),
	(  NULL, 	3,     		"Pista 19",			18.00 ),
	(  NULL, 	3,     		"Pista 20",			18.00 ),
	(  NULL, 	3,      	"Pista 21",		 	18.00 ),
	(  NULL,	3, 			"Pista 22", 		18.00 ),
	(  NULL, 	3,     		"Pista 23",			18.00 ),
	(  NULL, 	3,     		"Pista 24",			18.00 );
	
INSERT INTO `1111_CURSOS`
	( 1111_idcurso, 1100_idinstalacion, 1110_idpista, 1111_preciocurso, 2000_idprofesor, 3000_idnivel )
VALUES
	(  NULL,				1, 			 	3,				240.00,				2,						3 ),
	(  NULL,				1, 			 	4,				240.00,				3,						4 ),
	(  NULL,				2, 			 	7,				180.00,				5,						3 ),
	(  NULL,				2, 			 	8,				200.00,				5,						3 ),
	(  NULL,				2, 			 	9,				300.00,				4,						5 ),
	(  NULL,				1, 			 	2,				200.00,				2,						3 ),
	(  NULL,				1, 			 	6,				180.00,				5,						4 ),
	(  NULL,				1, 			 	5,				180.00,				3,						3 );






INSERT INTO `4111_HORARIOSCURSOS`
	( 1111_idcurso, 4111_fecalta,4000_idhorario  )
VALUES
	(  1,			"2021-01-12",				1 ),
	(  2,			"2020-11-09",				2 ),
	(  3,			"2019-10-09",				1 ),
	(  4,			"2021-01-09",				3 ),
	(  5,			"2021-02-24",				3 ),
	(  6,			"2018-11-24",				4 ),
	(  7,			"2019-06-09",				5 ),
	(  8,			"2018-06-20",				4 );
	
	
	
	

INSERT INTO `1111A_REGISTROSCURSOS`
	( 1111_idcurso, 3100_idcliente, 1100_idinstalacion, 1111A_fecinicio  )
VALUES
	(  1,			6,				1,			"2021-01-12"	 ),
	(  1,			8,				1,			"2021-01-12"	 ),
	(  1,			1,				1,			"2021-02-14"	 ),
	(  1,			3,				1,			"2021-03-14"	 ),
	(  2,			7,				1,			"2020-11-09"	 ),
	(  2,			9,				1,			"2020-11-24"	 ),
	(  2,			1,				1,			"2020-11-24"	 ),
	(  3,			4,				2,			"2019-10-09"	 ),
	(  4,			10,				2,			"2021-01-09"	 ),
	(  5,			11,				2,			"2021-02-24"	 ),
	(  6,			2,				1,			"2018-11-24"	 ),
	(  6,			7,				1,			"2018-12-06"	 ),
	(  7,			6,				1,			"2019-06-09"	 ),
	(  8,			12,				1,			"2018-06-20"	 ),
	(  8,			8,				1,			"2018-06-27"	 );	


INSERT INTO `3110_FOTOCLIENTES`
	( 3100_idcliente, 3110_nomficherofoto )
VALUES
	(  1,	"images/clientes/Jose Luis Perez Ayala.jpg"		),
	(  2, 	"images/clientes/Ivan Mendez Hidalgo.jpg"   	),
	(  3, 	"images/clientes/Javier Garcia herrera.jpg" 	),
	(  4, 	"images/clientes/David Fernandez Luengo.jpg" 	),
	(  5, 	"images/clientes/Maria Rodriguez Lopez.jpg"  	),
	(  8, 	"images/clientes/Miguel Sanchez Piñeiro.jpg" 	),
	(  9, 	"images/clientes/David Aguilar Sanchez.jpg"  	),
	(  10, 	"images/clientes/Pedro Garcia Martin.jpg"    	),
	(  11, 	"images/clientes/Marta Fernandez Merino.jpg" 	),
	(  12, 	"images/clientes/Raul Azaña Jimenez.jpg"	  	),
	(  13, 	"images/clientes/Roberto Lopez Perez.jpg" 		),
	(  14, 	"images/clientes/Diana Flores Herrera.jpg"		);	
	

	