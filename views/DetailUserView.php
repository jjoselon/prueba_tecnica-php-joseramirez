<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle usuario</title>
  </head>
  <body>
    <script type="text/javascript">
      if (document.readyState !== 'loading') {

      } else {
        document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('deleteUser').addEventListener("click", function (e) {
            let frmData = new FormData();
            frmData.append("idUser", this.getAttribute('data-iduser'));
            fetch(this.getAttribute('data-url'), {
              method: 'post',
              body: frmData
            }).then(function(response) {
              window.location = response.url;
            })
          });
        })
      }
    </script>
    <div class="container">
      <h1><?php echo $user["UserNick"]?></h1>
      <p><?php echo $user["UserEmail"]?></p>
      <p>Password: <?php echo $user["UserPassword"]?></p>
      <p>Posición:<code><?php echo $user["Position_idPosition"]?></code></p>
      <hr>
      <p>
        <button class="btn btn-danger" type="button" id="deleteUser" data-url="<?php echo $helper->url('User', 'delete') ?>" data-iduser="<?php echo $user["idUser"]; ?>">Borrar</button>
        <a href="<?php echo $helper->url('User', 'put') . '&id=' . $user["idUser"]?>">Editar</a> |
        <a href="<?php echo $helper->url('User', 'index')?>">Volver a la lista</a>
      </p>
    </div>
  </body>
</html>
