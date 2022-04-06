<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cursos</title>
    </head>
    <body>
    <div class="col mb-2">
        <h4 class="modal-title">Cursos</h4>
        </br>
        <a class="btn btn-sm btn-primary" href="<?php echo site_url(); ?>cursos_agregar">Agregar Curso</a>
    </br>
    </br>
            <table class="table table-sm table-hover table-striped border-rounded" cellspacing="0px" cellpadding="10px">
                <tr style="background:#CCC">
                    <th align="left" style="font-size: 12px;">No. Curso</th>
                    <th align="left" style="font-size: 12px;">Nombre Curso</th>
                    <th align="left" style="font-size: 12px;">Material</th>
                    <th align="left" style="font-size: 12px;">Examen</th>
                    <th align="left" style="font-size: 12px;">Clasificación</th>
                    <th align="left" style="font-size: 12px;">Observación</th>
                    <th align="left" style="font-size: 12px;">Fecha de creación</th>
                    <th align="left" style="font-size: 12px;">Estatus</th>
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
                    <td style="width: 400px;" valign='middle' align='left' style=''><?php echo $row->observacion?></td>
                    <td valign='middle' align='left' style=''><?php echo $row->fecha?></td>
                    <td valign='middle' align='left' style=''><?php echo $row->estatus?></td>
                    <?php echo "<td><a class='btn btn-sm btn-danger' onclick='return Borrar();' href='cursos_admin/deletedata?idcurso=".$row->idcurso."'>Eliminar</td>"; ?>
                    <?php echo "<td><a class='btn btn-sm btn-secondary' href='cursos_actualizar/updatedata?idcurso=".$row->idcurso."'>Actualizar</td>"; ?>
                    </tr>
                <?php endforeach ?>
                <?php 
                    echo "<script>
                    function Borrar(){   
                    if(confirm('¿Seguro que quieres eliminar el curso?')){
                        return true;
                        }else{
                            return false;
                        }
                    }
                    </script>";
                
                ?>
                </tbody>
            </table>
            <div>
                <p class="form-control-sm" style="margin: 340px 0px 300px 5px;">Número de filas:
                <?php echo $this->db->count_all_results('curso'); ?></p>
            </div>
        </div>
     </body>
</html>