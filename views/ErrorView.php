<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error</title>
  </head>
  <body>
    <style>
      .error {
        color: #aa0000;
      }
    </style>
    <div class="container">
      <div class="alert alert-warning" role="alert">
        <p><strong>Advertencia!</strong> <?php echo $error_msg ?> <a class="alert-link" href="<?php echo $back_to ?>">Regresar</a></p> 
      </div>
    </div>
  </body>
</html>
