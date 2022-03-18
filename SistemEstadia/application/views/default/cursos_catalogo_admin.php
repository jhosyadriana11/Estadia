<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cursos</title>
    </head>
    <body>
        <h4>Cursos</h4>
        <a href="<?php echo site_url(); ?>cursos_agregar">Agregar Curso</a>
        <table border="1" width="600" border="0" cellspacing="5" cellpadding="5">
            <tr style="background:#CCC">
                <th align="left" style="font-size: 12px;">No. Curso</th>
                <th align="left" style="font-size: 12px;">Nombre Curso</th>
                <th align="left" style="font-size: 12px;">Material</th>
                <th align="left" style="font-size: 12px;">Examen</th>
                <th align="left" style="font-size: 12px;">Clasificación</th>
                <th align="left" style="font-size: 12px;">Eliminar</th>
                <th align="left" style="font-size: 12px;">Actualizar</th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
                <td valign='middle' align='left' style=''><?php echo $row->nombrec?></td>
                <td valign='middle' align='left' style=''><?php echo $row->material?></td>
                <td valign='middle' align='left' style=''><?php echo $row->examen?></td>
                <td valign='middle' align='left' style=''><?php echo $row->clasificacion?></td>
                <?php echo "<td><a href='cursos_admin/deletedata?idcurso=".$row->idcurso."'>Eliminar</td>"; ?>
                <?php echo "<td><a href='cursos_actualizar/updatedata?idcurso=".$row->idcurso."'>Actualizar</td>"; ?>
                 </tr>
            <?php endforeach ?>
            </tbody>
        </table>
     </body>
</html>