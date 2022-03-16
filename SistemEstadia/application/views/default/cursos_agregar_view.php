<!DOCTYPE html>  
<html>
<head>
<title>Agregar Curso</title>
</head>
 
<body>
  <h4>Agregar Curso</h4>
	<form method="POST" action="<?= base_url() ?>cursos_agregar/savedata">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Nombre del Curso </td>
    <td width="329"><input type="text" name="nombrec"/></td>
  </tr>
  <tr>
    <td>Material </td>
    <td><input type="text" name="material"/></td>
  </tr>
  <tr>
    <td>Examen </td>
    <td><input type="text" name="examen"/></td>
  </tr>
  <tr>
    <td>Clasificación </td>
    <td><select name="clasificacion">
   <option value="Básicos">Básicos</option> 
   <option value="Enseñanza">Enseñanza</option> 
   <option value="Tecnología">Tecnología</option>
   <option value="Disciplinaria">Disciplinaria</option> 
</select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="save" value="Guardar"/></td>
  </tr>
</table>
 
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