<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
            <h4 class="modal-title">Mis Cursos</h4>
        </br>
            <?php foreach($ver->result() as $row): ?>
                <p><?php echo $row->nombrep?><p>
            <?php endforeach ?>
            <table class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px">
                <tr style="background:#CCC">
                    <th align="left" style="font-size: 12px;">No. Curso</th>
                    <th align="left" style="font-size: 12px;">Nombre del curso</th>
                    <th align="left" style="font-size: 12px;">Material</th>
                    <th align="left" style="font-size: 12px;">Examen</th>
                    <th align="left" style="font-size: 12px;">Observación</th>
                    <th align="left" style="font-size: 12px;">Fecha de creación</th>
                    <th align="left" style="font-size: 12px;">Evidencia</th>
                    <th align="left" style="font-size: 12px;">Descargar</th>
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
                        <?php endforeach ?>
                        <?php
                            $archivos = scandir("uploads");
                            for ($i=2; $i<count($archivos); $i++)
                            {
                            ?>
                            <td valign='middle' align='left' style=''><?php echo $archivos[$i]; ?></td>
                            <td valign='middle' align='left' style=''><a title="Descargar Archivo" href="../uploads/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>">Descargar</a></td>
                        <?php }?> 
                    </tr>
                </tbody>
            </table>
        </div>
       
    </body>
</html>