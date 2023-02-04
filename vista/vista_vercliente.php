<!DOCTYPE html>
<html lang="es"/>
	<head>
		<meta charset="utf-8"/>
		<title>instalaciones padel</title>
	    <link rel='stylesheet' href='css/estilosvercliente.css'/> 
		<link rel='stylesheet' href='css/header.css'/>
		<link rel='stylesheet' href='css/comunes.css'/>
		<link rel='stylesheet' href='css/imagenes.css'/>
		<link rel='stylesheet' href='css/overlay.css'>
		<script src='jquery/jquery-3.6.0.js'></script>
		<script src='js/loadPage.js'></script>
		<script>
	
		window.onload = loadPage;
		
		</script>
	</head>
    <body>
        <div class='wrapper'>
            <main>
                <header></header>
                <section>
                    <article>
                        <!-- <div class='anchura190'> -->
                            <?php
                                echo $arTableDatosClientes["data"];
                            ?> 
                       <!--  </div> -->
                       <!--  <div class='anchura190'> -->
                            <!-- <a img src="$arDataPhotoCliente"></a> -->
                            <!-- <div class='anchura100'>  
                                <img src='<?php echo $arDataPhotoCliente[ "data" ][ 0 ][ "nomficherofoto" ]; ?>' />
                            <img src='images/pepegarcia.jpg' />
                            </div> -->
                        <!-- </div> -->
                    </article>	
                </section>
            </main>
        </div>
    </body>
</html>