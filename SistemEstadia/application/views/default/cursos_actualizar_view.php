
<!DOCTYPE html>
<html>
    <head>
    <title>Actualizar Curso </title>
    </head>
    
    <body>
    <div class="col mb-2">
            <h4 class="modal-title">Actualizar Curso</h4>
        
        
        </br>
            <?php foreach($table->result() as $row): ?>
                <form method="post" >
                    <table width="900" cellspacing="5" cellpadding="5">
            <tr>
                <td width="150">No. Curso </td>
                <td width="230" valign='middle' class="form-control-sm" align='left'><?php echo $row->idcurso?></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Escriba el nombre del curso </td>
                <td width="400" valign='middle' align='left' style=''><input type="text" class="form-control form-control-sm" name="nombrec" value="<?php echo $row->nombrec?>"/></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Material del Curso </td>
                <td width="400" valign='middle' align='left' style=''><input type="text" class="form-control form-control-sm" name="material" value="<?php echo $row->material; ?>"/></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Examen del Curso </td>
                <td width="400" valign='middle' align='left' style=''><input type="text" class="form-control form-control-sm" name="examen" value="<?php echo $row->examen; ?>"/></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Clasificación </td>
                <td width="400" valign='middle' align='left' style=''><select name="clasificacion" class="form-control form-control-sm" for="clasificacion">
                    <option value="Básicos"<?php if ($row->clasificacion=='Básicos') echo 'selected'; ?>>Básicos</option> 
                    <option value="Enseñanza" <?php if ($row->clasificacion=='Enseñanza') echo 'selected'; ?>>Enseñanza</option> 
                    <option value="Tecnología"<?php if ($row->clasificacion=='Tecnología') echo 'selected'; ?>>Tecnología</option>
                    <option value="Disciplinaria"<?php if ($row->clasificacion=='Disciplinaria') echo 'selected'; ?>>Disciplinaria</option> 
                </select></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Observación</td>
                <td width="400" valign='middle' align='left'><textarea class="form-control form-control-sm text-uppercase" type="text" name="observacion"><?php echo $row->observacion;?></textarea></td>
            </tr>
            <tr>
                <td width="150" class="form-label">Fecha de creación</td>
                <td width="400" valign='middle' align='left' style=''><input type="date" class="form-control form-control-sm" name="fecha" value="<?php echo $row->fecha; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input class="btn btn-sm btn-primary btnUTCAzul" type="submit" name="update" value="Actualizar"/></td>
            </tr>
            </table>
                </form>
                <?php endforeach ?>
        </div>
    </body>
</html>