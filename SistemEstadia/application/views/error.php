<!DOCTYPE html>
<html lang="es">
    	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="/servicios_generales/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="/servicios_generales/css/styles.css" rel="stylesheet" />
		<title><?php echo $title; ?></title>
<body class="bg-dark">
<div class="modal-show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $error_t; ?></h5>
            </div>
            <div class="modal-body">
                <?php echo $error; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $_SERVER['HTTP_REFERER']; ?>'">Volver</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>