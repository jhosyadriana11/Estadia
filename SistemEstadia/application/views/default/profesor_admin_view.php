<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profesores</title>
    </head>
    <body>
    <h4>Profesores</h4>
        <table border="1" width="600" border="0" cellspacing="5" cellpadding="5">
            <tr style="background:#CCC">
                <th align="left" style="font-size: 12px;">Nombre del profesor</th>
                <th align="left" style="font-size: 12px;">No. de cursos</th>
                <th align="left" style="font-size: 12px;">Historial</th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style='' id="nombre"><?php echo $row->nombrep?></td>
                <td valign='middle' align='left' style=''><?php echo $count?></td>
                <?php echo "<td><a onclick='return nombrep();' href='miscursos_admin/index?idprofesor=".$row->idprofesor."'>Historial</td>"; ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>