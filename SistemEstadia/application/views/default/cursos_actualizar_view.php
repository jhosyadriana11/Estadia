
<!DOCTYPE html>
<html>
    <head>
    <title>Actualizar Curso </title>
    </head>
    
    <body>
    <h4>Actualizar Curso</h4>
    <?php foreach($table->result() as $row): ?>
        <form method="post" >
            <table width="600" border="1" cellspacing="5" cellpadding="5">
    <tr>
        <td width="230">No. Curso </td>
        <td width="329" valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
    </tr>
    <tr>
        <td width="230">Escriba el nombre del curso </td>
        <td width="329" valign='middle' align='left' style=''><input type="text" name="nombrec" value="<?php echo $row->nombrec?>"/></td>
    </tr>
    <tr>
        <td>Material del Curso </td>
        <td><input type="text" name="material" value="<?php echo $row->material; ?>"/></td>
    </tr>
    <tr>
        <td>Examen del Curso </td>
        <td><input type="text" name="examen" value="<?php echo $row->examen; ?>"/></td>
    </tr>
    <tr>
        <td>Clasificación </td>
        <td valign='middle' align='left' style=''><select name="clasificacion" for="clasificacion">
            <option value="Básicos"<?php if ($row->clasificacion=='Básicos') echo 'selected'; ?>>Básicos</option> 
            <option value="Enseñanza" <?php if ($row->clasificacion=='Enseñanza') echo 'selected'; ?>>Enseñanza</option> 
            <option value="Tecnología"<?php if ($row->clasificacion=='Tecnología') echo 'selected'; ?>>Tecnología</option>
            <option value="Disciplinaria"<?php if ($row->clasificacion=='Disciplinaria') echo 'selected'; ?>>Disciplinaria</option> 
        </select></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        <input type="submit" name="update" value="Actualizar"/></td>
    </tr>
    </table>
        </form>
        <?php endforeach ?>
    </body>
</html>