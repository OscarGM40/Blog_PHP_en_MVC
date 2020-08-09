<?php

//Como vamos a usar objetos de tipo Entrada_Blog y vamos a necesitar los métodos de ManejaEntrasdasBlog lo primero es incluir ambos archivos
//Fijarse que debemos subir un nivel en el árbol de archivos 
include_once("../Modelo/Entrada_Blog.php");
include_once("../Modelo/ManejaEntradas_Blog.php");
header('Content-Type: text/html; charset=UTF-8');
//Debemos establecer la conexion con la BBDD
try{
    $miconexion = new PDO("mysql:host=localhost; dbname=bbdd_blog","root","");
    $miconexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
   // $miconexion->exec("SET CHARACTER SET utf8");

    //Comprobamos si hay error en la carga de la imagen
    //$_FILES['imagen']['error'] es una constante int
    if($_FILES["imagen"]["error"]){
        switch($_FILES["imagen"]["error"]){
            //Tamaño excede la directiva upload_max_filesize del php.ini
            case 1:
                echo "El tamaño del archivo excede lo permitido por el 'php.ini'";
            break;
            //tamaño excede el indicado en el HTML por la directiva MAX_FILE_SIZE de HTML
            case 2:
                echo "El tamaño del archivo excede lo permitido por el codigo HTML del formulario";
            break;
            //Archivo parcialmente subido,debido a algun corte de internet,..
            case 3:
                echo "El archivo ha sido parcialmente subido y ha quedado corrupto";
            break;
            //No se ha subido nada
            case 4:
                echo "No se ha subido ningun archivo";
            break;
        }
    }else {

        echo "Archivo subido correctamente a la carpeta temporal.<br>";
        //Si no ha habido error y si lo hemos subido lo rescatamos de la carpeta temporal a la nuestra 'imagenes' en nuestro proyecto,ya aque no usaremos campos BLOB
        if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK))){
            //Las imagenes siempre van a un directorio temporal,asi que hay que rescatarlas de alli,en este caso las movemos a imagenes/
            $destino_de_ruta =  "../imagenes/";
            //Recordemos que $_FILEs es un array asociativo y por ello podemos acceder a valores como el directorio temporal['tmp_name'] o el nombre ['name]
            move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_de_ruta.$_FILES['imagen']['name']);

            echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado correctamente en el directorio de imágenes local del proyecto";
        }else{
            echo "el archivo no se ha podido copiar al directorio de imágenes";
        }//fin if/else anidado

    }//fin if/else de arriba o exterior

//Creamos un objeto Maneja_Entradas_blog y otro tipo Entrada_blog
$Maneja_entradas = new Maneja_Entradas_Blog($miconexion);
$blog = new Entrada_Blog();
//Simplemente usamos los setter,eso si,evitando inyeccion SQL
$blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]),ENT_QUOTES));
//otro anti-inyeccion
$blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]),ENT_QUOTES));

//Si hubiera problemas con la hora
//date_default_timezone_set('Europe/Madrid');
$blog->setFecha(Date("Y-m-d H:i:s"));
//almacenamos el campo imagen
$blog->setImagen($_FILES["imagen"]["name"]);

//ya tenemos el objeto blog construido y rellenado,debemos pasarlo al metodo de ManejaEntradas para que lo inserte en la BBDD
$Maneja_entradas->insertaContenido($blog);

echo "<br> Entrada de blog agregada con éxito <br>";
echo "Redirigiendole de nuevo al formulario en 3segundos",
header("Refresh:3;url=../Vista/Formulario.php");


}catch(Exception $e)
{   //Dejamos que caiga por completo la conexión
    die("Error : " . $e->getLine() . " " . $e->getMessage());
}

?>