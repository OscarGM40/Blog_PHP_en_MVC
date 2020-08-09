<?php
//Vamos a crear una clase que se ocupe del manejo de las entradas al Blog
//Como vamos a usar instancias de Entrada_Blog la importamos
include_once("Entrada_Blog.php");

class Maneja_Entradas_Blog 
{
    //Propiedades de la clase
    private $conexionA;
    
    //Constructor
    public function __construct($con)
      {
          $this->setConexion($con);

      }

      public function setConexion(PDO $conexionB)
      {
          $this->conexionA = $conexionB;
      }

      //método que recuperará el contenido de la BBDD
      public function getContenidoPorFecha()
      {

                
        /*Vamos a crear la paginacion.Debe empezar desde aqui*/
        //variable para el numero de registros que queremos ver por pagina
        $tamagno_paginas = 2 ;
        //variable que indica la pag en la que estamos,por defecto,la 1
        $pagina = 1;
        //si usamos un vinculo ya $pagina sera el numero que va por la URL
        if(isset($_GET['pagina']))
        {
          $pagina = $_GET['pagina'];
        }
        //variable que indica el indice del primer registro de cada pagina para el 1er argumento dinamico de la instruccion limit
        $empezar_desde = ($pagina-1) * $tamagno_paginas;

        $rs = $this->conexionA->prepare("select * from Contenido");
        $rs->execute(array());

        $num_filas = $rs->rowCount();
        //el total es el entero inmediato superior del numero de registros entre las paginas que queremos.ejemplo 15 registros 3 por pag salen 5 pag en total 16 registros 3 por pagina salen 6 pag
        $total_paginas = ceil($num_filas/ $tamagno_paginas);
        $rs->closeCursor();

        $matriz = array();
        $contador = 0;

        $resultado = $this->conexionA->query("select * from Contenido order by Fecha limit $empezar_desde, $tamagno_paginas");

        while($registro = $resultado->fetch(PDO::FETCH_ASSOC))
            {   //creamos una instancia de una entrada al blog
                //Usamos los setter para establecer los valores
                $blog = new Entrada_Blog();
                $blog->setID($registro["Id"]);
                $blog->setTitulo($registro["Titulo"]);
                $blog->setFecha($registro["Fecha"]);
                $blog->setComentario($registro["Comentario"]);
                $blog->setImagen($registro["Imagen"]);
                //Añadimos el objeto al array definido anteriormente
                //Las posiciones las dará la variable contador
                $matriz[$contador] = $blog;
                $contador++;
            }
            //debemos devolver el array de objetos Blog
            return $matriz;
      }//fin del get

      //método que insertará el contenido(una instancia) en la BBDD
      public function insertaContenido(Entrada_Blog $blog)
      {
        $sql = "insert into Contenido (Titulo,Fecha,Comentario,Imagen) values 
        ('".$blog->getTitulo()."','".$blog->getFecha()."', '".$blog->getComentario()."', '".$blog->getImagen()."')";

        $this->conexionA->exec($sql);

      }





    
} //fin de la clase
