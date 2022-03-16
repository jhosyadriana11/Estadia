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
            </tr>
            <tbody>
            <?php foreach($table->result() as $row): ?>
                <tr>
                <td valign='middle' align='left' style=''><a href="<?php echo site_url(); ?>miscursos"><?php echo $row->nombrep?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>