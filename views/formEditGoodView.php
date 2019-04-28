<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar good</title>
  </head>
  <body>
    <style>
      .error {
        color: #aa0000;
      }
    </style>
    <script type="text/javascript">
      if (document.readyState !== 'loading') {

      } else {
        document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('formEditGood').addEventListener("submit", function (e) {
            let NodeList = document.querySelectorAll('.error');
            for (el of NodeList) {
              el.textContent = "";
            }
            let anyError = false;
            if (document.getElementById('name').value == "") {
              anyError = true;
              document.getElementById('error-name').textContent = "El nombre del good es requerido";
            }
            if (document.getElementById('description').value == "") {
              anyError = true;
              document.getElementById('error-description').textContent = "La descripción del good es requerida";
            }
            if (document.getElementById('value').value == "") {
              anyError = true;
              document.getElementById('error-value').textContent = "El valor del good es requerido";
            }
            if (anyError) {
              e.preventDefault();
            }
          });
        })
      }
    </script>
    <div class="container">
      <form action="<?php echo $helper->url('Good','put')?>" method="post" id="formEditGood">
        <input type="hidden" name="idGood" value="<?php echo $good["idGood"]?>">
        <p>
          Nombre: <input class="form-control" type="text" name="name" id="name" value="<?php echo $good["GoodName"]?>">
          <span id="error-name" class="error"></span>
        </p>
        <p>
          Descripción:
          <textarea class="form-control" name="description" id="description" rows="8" cols="80" ><?php echo $good["GoodDescription"]?></textarea>
          <span id="error-description" class="error"></span>
        </p>
        <p>
          Valor: <input class="form-control" type="number" name="value" id="value" value="<?php echo $good["GoodValue"]?>">
          <span id="error-value" class="error"></span>
        </p>
        <p>
          <input class="btn btn-default"type="submit" value="Guardar cambios">
          <a href="<?php echo $helper->url('Good', 'index')?>">Cancelar</a>
        </p>
      </form>
    </div>
  </body>
</html>
