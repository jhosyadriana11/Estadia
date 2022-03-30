<!DOCTYPE html>  
<html>
<head>
  <title>Agregar Curso</title>
</head>
 
<body>
  <div class="col mb-2">
    <h4 class="modal-title">Agregar Curso</h4>
    </br>
    <form method="POST" action="<?= base_url() ?>cursos_agregar/savedata">
      <div class="col mb-2">
        <label width="230" class="form-label">Nombre del Curso </label>
        <input class="form-control form-control-sm" type="text" style="width: 900px;" name="nombrec"/>
      </div>
    <div class="col mb-2">
      <label class="form-label">Material </label>
      <input class="form-control form-control-sm" type="text" style="width: 900px;" name="material"/>
    </div>
    <div class="col mb-2">
      <label class="form-label">Examen </label>
      <input class="form-control form-control-sm" type="text" style="width: 900px;" name="examen"/>
    </div>
    <div class="col mb-2">
      <label class="form-label">Clasificación </label>
      <select class="form-control form-control-sm" style="width: 900px;" name="clasificacion">
        <option value="Básicos">Básicos</option> 
        <option value="Enseñanza">Enseñanza</option> 
        <option value="Tecnología">Tecnología</option>
        <option value="Disciplinaria">Disciplinaria</option> 
      </select>
    </div>
    <div class="col mb-2">
      <div >
        <label class="form-label">Observación </label>
        <textarea class="form-control form-control-sm" type="text" style="width: 900px;" name="observacion"></textarea>
      </div>
    </div>
    <div class="col mb-2">
      <label class="form-label">Fecha </label>
      <input class="form-control form-control-sm" type="date" style="width: 900px;" name="fecha"/>
    </div>
    <div class="col mb-2">
      <input class="btn btn-sm btn-primary btnUTCAzul" type="submit" colspan="2" align="center" name="save" value="Guardar"/>
    </div>
    </form>
  </div>
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