
<!DOCTYPE html>
<html>
    <head>
    <title>Actualizar Curso </title>
    </head>
    
    <body>
    <h4>Actualizar Curso</h4>
    <?php foreach($table->result() as $row): ?>
        <form method="post">
            <table width="600" border="1" cellspacing="5" cellpadding="5">
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
        <td valign='middle' align='left' style=''><input name="clasificacion" value="<?php echo $row->clasificacion?>">
        <!--<select name="clasificacion">
        <option value="Básicos">Básicos</option> 
        <option value="Enseñanza">Enseñanza</option> 
        <option value="Tecnología">Tecnología</option>
        <option value="Disciplinaria">Disciplinaria</option> 
        </select>--></td>
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