<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle good</title>
  </head>
  <body>
    <script type="text/javascript">
      if (document.readyState !== 'loading') {

      } else {
        document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('deleteGood').addEventListener("click", function (e) {
            let frmData = new FormData();
            frmData.append("idGood", this.getAttribute('data-idgood'));
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
      <h1><?php echo $good["GoodName"]?></h1>
      <p><?php echo $good["GoodDescription"]?></p>
      <code><?php echo $good["GoodValue"]?></code>
      <hr>
      <p>
        <button class="btn btn-danger" type="button" id="deleteGood" data-url="<?php echo $helper->url('Good', 'delete') ?>" data-idgood="<?php echo $good["idGood"]; ?>">Borrar</button>
        <a href="<?php echo $helper->url('Good', 'put') . '&id=' . $good["idGood"]?>">Editar</a> |
        <a href="<?php echo $helper->url('Good', 'index')?>">Volver a la lista</a>
      </p>
    </div>
  </body>
</html>
