<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blog Oscar® MVC/POO</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Manjari&display=swap" rel="stylesheet">
<link rel="stylesheet" href="Formulario.css">

</head>

<body>
  <br/>
<h1>Nueva Publicación</h1>
<form action="../Controlador/Transacciones.php" method="POST" enctype="multipart/form-data" name="form1">
<table >
  

<tr>
  <td><h4 style="display: inline;"><br>&nbsp;&nbsp;&nbsp;&nbsp;Título:&nbsp;</h4> 
    <label for="campotitulo"></label></td>
  <td><br>
    <input type="text" name="campo_titulo" id="campotitulo" required>
    <span>Debe colocar un título.</span>
  </td>
</tr>


  <tr>
    <td><h4>&nbsp;&nbsp;&nbsp;&nbsp;Comentarios:&nbsp;</h4> 
    <label for="areacomentarios"></label></td>
    <td>
      <textarea name="area_comentarios" id="areacomentarios" rows="10" cols="50" required></textarea>
      <span>Debe colocar los comentarios.</span>
    </td>
  </tr>
    <input type="hidden" name="MAX_TAM" value="2097152">
  
  <tr>
  <td colspan="2" align="center">Seleccione una imagen con tamaño inferior a 2 MB</td>
</tr>

  <tr>
    <td colspan="2" align="center"><input type="file" name="imagen" id="ima"></td>
  </tr>

  <tr>
    <td colspan="2" align="center">  
    <input type="submit" class="btn btn-success" name="btn_enviar" id="btnenviar" value="Publicar">
  </td>
</tr><br>

  <tr>
    <td colspan="2" align="center"><a href="Mostrar_Blog.php">Ver Publicaciones del Blog</a></td>
  </tr>
  
  </table>
</form>
<p>&nbsp;</p>
<br>
<footer>
  <div>
    <div class="alert alert-info"><h2>Privacidad y uso del sitio Web</h2></div>
  </div>

  <div class="alert alert-danger"  id="email">

Contacto via email para dudas,consultas o sugerencias&nbsp;
<a href="mailto:tucorreo@correo.com" class="alert-link">Click_Aquí</a> 
  </div>


</footer>

</body>
</html>