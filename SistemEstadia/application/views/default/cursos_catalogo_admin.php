<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cursos</title>
    </head>
    <body>
        <h4>Cursos</h4>
        <a href="<?php echo site_url(); ?>cursos_agregar">+</a>
        <button>-</button>
        <button>✏︎</button>
        <table border="1">
            <tr>
                <th align="left" style="font-size: 12px;">No. Curso</th>
                <th align="left" style="font-size: 12px;">Nombre Curso</th>
                <th align="left" style="font-size: 12px;">Material</th>
                <th align="left" style="font-size: 12px;">Examen</th>
                <th align="left" style="font-size: 12px;">Clasificación</th>
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><?php echo $row->idcurso?></td>
                <td valign='middle' align='left' style=''><?php echo $row->nombrec?></td>
                <td valign='middle' align='left' style=''><?php echo $row->material?></td>
                <td valign='middle' align='left' style=''><?php echo $row->examen?></td>
                <td valign='middle' align='left' style=''><?php echo $row->clasificacion?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
     </body>
</html>
        <!--<table border="1">
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Nombre del curso</th>
                    <th>Material</th>
                    <th>Examen</th>
                    <th>Clasificación</th>
                </tr>
                <td>01</td>
                <td>Curso principiantes</td>
                <td>No disponible</td>
                <td>No disponible</td>
                <td>Básicos</td>
            </tbody>
        </table>
        
       
    </body>
</html>-->