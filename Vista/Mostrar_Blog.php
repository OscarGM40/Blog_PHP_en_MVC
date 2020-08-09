<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Personal by Oscar Coding®</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="Mostrar_Blog.css">
</head>

<body>
<div class="container">

<h1>Blog Personal</h1>
<br>

<img src="../imagenes/unnamed.gif" width="300" height="250" id="imagenprincipal">
<br>
<hr id="head">
    <?php
    /*Como debemos usar el metodo getContenido debemos importar*/
    include_once("../Modelo/ManejaEntradas_Blog.php");
    require_once("../Modelo/paginacionBlog.php");
    //debemos conectar con la BBDD
    try {
        $miconexion = new PDO("mysql:host=localhost; dbname=bbdd_blog", "root", "");
        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $miconexion->exec("SET CHARACTER SET utf8");
        //Creamos el objeto para acceder al método getContenidoByFecha
        $ManejaEntradas = new Maneja_Entradas_Blog($miconexion);
        //Recordemos que tenemos un array con las entradas como objects
        $Tabla_Blog = $ManejaEntradas->getContenidoPorFecha();

        if (empty($Tabla_Blog)) 
        {
            echo "<br>";
            echo "No hay entradas de blog aún";
            echo "<br>";
        } else 
        {
            foreach ($Tabla_Blog as $valor) 
            {
                
                echo "<br>" . "<hr class='hra'/>";
                echo "<h2>" . $valor->getTitulo() . "</h2>";
                echo "<h5>" . "<br>" . "Hora de la publicación: " . $valor->getFecha() . "</h5>";
                echo "<div class='cajaComentario' style='width:400px'>" . 
                "<br><h6>Comentarios de la entrada:</h6> " . "<hr>" . 
                $valor->getComentario() . "</div><br><br>";
                //solo la imprime si si existe,asi evitamos el icono de no hay imagen
                if($valor->getImagen() != ""){
                    echo "<img class='ima' src ='../imagenes/" ;
                    echo $valor->getImagen() . "' width='300px' height='200px' />";
                }
                echo "<hr class='hra'>";

            }
        }
    } catch (Exception $e) {   //Dejamos que caiga por completo la conexión
        die("Error : " . $e->getLine() . " " . $e->getMessage());
    }


    ?>

<?php
         //-----------    Diseño HTML&PHP de la paginacion    ----------------------//
         echo "<h6>Se encuentra en la pagina: $pagina <h6>";
         echo "<div class='divisor'>";
         if ($pagina != 1) {
         $anterior = $pagina - 1;
         echo "<a href='?pagina=$anterior'>Anterior</a>" . "&nbsp;";
               }

        for ($i = 1; $i <= $total_paginas; $i++) { //PHP lee las variables si el string del echo va entre comillas dobles-> solo para el metodo echo " '$var' " tmb vale "${var}"

         echo "<a href='?pagina=$i'>$i<a/>  ";
             }
         if ($pagina != $total_paginas) {
         $siguiente = $pagina + 1;
         echo "<a href='?pagina=$siguiente'>Siguiente</a>";
                       }
         echo "</div>";
     ?>

    <br/><br>
    <div class="alert alert-primary" id="cen">
    <a href="Formulario.php" >Volver al formulario</a>
    </div>
    <br>
</div>
</body>

</html>