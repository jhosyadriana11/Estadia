<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Mis Cursos</title>
    </head>
    <body>
        <h4>Mis Cursos</h4>
        <table border="1" width="600" border="0" cellspacing="5" cellpadding="5">
            <tr style="background:#CCC">
                <th align="left" style="font-size: 12px;">No. Curso</th>
                <th align="left" style="font-size: 12px;">Nombre del curso</th>
                <th align="left" style="font-size: 12px;">Material</th>
                <th align="left" style="font-size: 12px;">Examen</th>
                <th align="left" style="font-size: 12px;">Evidencia</th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
                <td valign='middle' align='left' style=''><?php echo $row->nombrec?></td>
                <td valign='middle' align='left' style=''><?php echo $row->material?></td>
                <td valign='middle' align='left' style=''><?php echo $row->examen?></td>
                <td valign='middle' align='left' style=''>Evidencia</td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        
       
    </body>
</html>