<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cursos</title>
    </head>
    <body>
    <div class="col mb-2">
        <h4>Cursos</h4></br>
        <?php foreach($ver->result() as $row): ?>
            <h5><?php echo $row->nombrep?><h5>
        <?php endforeach ?>
        <form method="POST" action="<?= base_url() ?>cursos_usuario/savec">
        <table class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px">
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
                <td valign='middle' align='left' style=''><input type="submit" colspan="2" class='btn btn-sm btn-secondary' align="center" name="inscribirme" value="Inscribirme"/></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </body>
</html>