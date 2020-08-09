<?php
//Debemos crear la clase que cree entradas
class Entrada_Blog 
{
//declaracion de propiedades de la clase
    private  $Id;
    private  $Titulo;
    private  $Fecha;
    private  $Comentario;
    private  $Imagen;

//necesitamos los métodos de acceso,ya que son private las propiedades--GETTERs----
    public function getId ()
    {
        return $this->Id;
    }
    public function getTitulo() 
    {
        return $this->Titulo;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function getComentario()
    {
        return $this->Comentario;
    }
    public function getImagen () 
    {
        return $this->Imagen;
    }

//-----SETTERs de las propiedades ------
    public function setID($id)
    {
        $this->Id = $id;
    }
    public function setTitulo($titulo)
    {
        $this->Titulo = $titulo;
    }
    public function setFecha($fecha) 
    {
        $this->Fecha = $fecha;
    }
    public function setComentario($comentario) 
    {
        $this->Comentario= $comentario;
    }
    public function setImagen ($imagen) 
    {
        $this->Imagen = $imagen;
    }

           //----------CONSTRUCTOR DE LA CLASE-------

    public function __construct()
    {

    }


} //fin de la clase
