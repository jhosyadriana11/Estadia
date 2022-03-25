<!DOCTYPE html>  
<html>
<head>
<title>Agregar Curso</title>
</head>
 
<body>
  <h4>Agregar Curso</h4>
	<form method="POST" action="<?= base_url() ?>cursos_agregar/savedata">
    <label width="230">Nombre del Curso </label>
    <input type="text" name="nombrec"/>
  <br/>
    <label>Material </label>
    <input type="text" name="material"/>
  </br>
    <label>Examen </label>
    <input type="text" name="examen"/>
  <br/>
    <label>Clasificación </label>
    <select name="clasificacion">
    <option value="Básicos">Básicos</option> 
    <option value="Enseñanza">Enseñanza</option> 
    <option value="Tecnología">Tecnología</option>
    <option value="Disciplinaria">Disciplinaria</option> 
    </select>
  <br/>
    <label>Observación </label>
    <input type="text" name="observacion"/>
  </br>
    <label>Fecha </label>
    <input type="date" name="fecha"/>
  </br>
    <input type="submit" colspan="2" align="center" name="save" value="Guardar"/>
	</form>
</body>
</html>
<!--<html>
<body>
<form action="" method="post">
    Nombre del Curso: <input type="text" name="nombrec"><br>
    Material: <input type="text" name="material"><br>
	Examen: <input type="text" name="examen"><br>
	Clasificación: <select name="clasificacion">
   <option value="1">Básicos</option> 
   <option value="2">Enseñanza</option> 
   <option value="3">Tecnología</option>
   <option value="10">Disciplinaria</option> 
</select>
    <input type="submit" value="Guardar">
</form>
</body>
</html>-->