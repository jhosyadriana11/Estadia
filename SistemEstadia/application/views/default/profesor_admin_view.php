<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profesores</title>
    </head>
    <body>
    <div class="col mb-2">
        <h4 class="modal-title">Profesores</h4>
    </br>
        <form method="post">
            <table class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px">
                <tr style="background:#CCC">
                    <th align="left" style="font-size: 12px;">Nombre del profesor</th>
                    <th align="left" style="font-size: 12px;">No. de cursos</th>
                    <th align="left" style="font-size: 12px;">Historial</th>
                </tr>
                <tbody>
                <?php foreach($table->result() as $row): ?>
                    <tr>
                    <td valign='middle' align='left' style='' id="nombre"><?php echo $row->nombrep?></td>
                    <td valign='middle' align='left' style=''><?php echo $count; ?></td>
                    <?php echo "<td><a onclick='return nombrep();' class='btn btn-sm btn-secondary' href='miscursos_admin/index?idprofesor=".$row->idprofesor."'>Historial</td>"; ?>
                    </tr>
                <?php endforeach ?>
                </tbody>
                </form>
            </table>
    </div>
    </body>
</html>