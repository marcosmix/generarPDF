
<!DOCTYPE html>
<html lang="es">
<head>
	<title>OSSE</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        @font-face {
            font-family: 'Omnes-Regular';
            src: url("../../../assets/fonts/omnes-regular.ttf");
        }
        body {
			width: 250mm;
            height: 190mm;
            background: lightblue;
            margin: 0;
            padding: 11mm 11mm;

	    }

        .pdf-cert
        {
            background: white;
            height: 147mm;
            width: 250mm;
            
        }

        .pdf-cert img
        {
            width: 100%;
            
        }
        .felicitaciones
        {
            background: yellow;
            width: 57mm;
            text-align: center;
                   
            padding: 4mm 0;
        }
        .contenedor__texto {
            padding: 2mm 10mm;
            text-align: center;
		}
        .contenedor__titulo {
			padding: 2mm 0mm;
            text-align: center;
		}

    </style>
</head>

  
<body>
	<div class=pdf-cert>
        <div class="felicitaciones">
            ¡FELICITACIONES!
        </div>   
        <div class="contenedor">
         
            <h1 class="contenedor__titulo">OBRAS SANITARIAS SOCIEDAD DEL ESTADO</h1>
            <span class="contenedor__texto" >Certifica que {{$ganador['nombre']}} D.N.I {{$ganador['dni']}} Ha participado junto a sus alumnos del concurso escular 2021 "Asi cuidamos el agua potable",</span><br><span class="contenedor__texto" > organizado por OSSE.</span> <br><br><span class="contenedor__texto" >Rsolucion Ministerial N° 2839. </span>
        </div>
		<img class="pdf-cert__img" src="img\plantilla.jpg" >

    </div>
</body>

</html>