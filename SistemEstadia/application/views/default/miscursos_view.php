<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Mis Cursos</title>
    </head>
    <body>
        <h4>Mis Cursos</h4>
        <form method="POST" action="<?= base_url() ?>miscursos/cargar_archivo" enctype="multipart/form-data">
        <table border="1" width="800" border="0" cellspacing="5" cellpadding="5">
            <tr style="background:#CCC">
                <th align="left" style="font-size: 12px;">No. Curso</th>
                <th align="left" style="font-size: 12px;">Nombre del curso</th>
                <th align="left" style="font-size: 12px;">Material</th>
                <th align="left" style="font-size: 12px;">Examen</th>
                <th align="left" style="font-size: 12px;">Observación</th>
                <th align="left" style="font-size: 12px;">Fecha de creación</th>
                <th align="left" style="font-size: 12px;">Evidencia</th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
                <td valign='middle' align='left' style=''><?php echo $row->nombrec?></td>
                <td valign='middle' align='left' style=''><?php echo $row->material?></td>
                <td valign='middle' align='left' style=''><?php echo $row->examen?></td>
                <td valign='middle' align='left' style=''><?php echo $row->observacion?></td>
                <td valign='middle' align='left' style=''><?php echo $row->fecha?></td>
                <td valign='middle' align='left' style=''><input name="file" type="file"/>
                <input type="submit" name="evidencia" value="Subir Evidencia"/></td>
                <!--<td valign='middle' align='left' style=''><button>Subir Evidencia</button></td>-->
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
            </form>
    </body>
</html>