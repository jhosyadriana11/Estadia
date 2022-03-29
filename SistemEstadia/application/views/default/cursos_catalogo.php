<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cursos</title>
    </head>
    <body>
        <h4>Cursos</h4>
        <table border="1" width="800" border="0" cellspacing="5" cellpadding="5">
            <tr style="background:#CCC">
                <th align="left" style="font-size: 12px;">No. Curso</th>
                <th align="left" style="font-size: 12px;">Nombre del curso</th>
                <th align="left" style="font-size: 12px;">Clasificación</th>
                <th align="left" style="font-size: 12px;">Observación</th>
                <th align="left" style="font-size: 12px;">Fecha de creación</th>
                <th align="left" style="font-size: 12px;"></th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
                <td valign='middle' align='left' style=''><?php echo $row->nombrec?></td>
                <td valign='middle' align='left' style=''><?php echo $row->clasificacion?></td>
                <td valign='middle' align='left' style=''><?php echo $row->observacion?></td>
                <td valign='middle' align='left' style=''><?php echo $row->fecha?></td>
                <td valign='middle' align='left' style=''><a href='miscursos'>Inscribirme</td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>