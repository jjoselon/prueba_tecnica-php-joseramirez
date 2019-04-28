<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de goods</title>
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
          document.getElementById('formRegistrationGood').addEventListener("submit", function (e) {
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
      <div class="col-xs-12">
      <h1>Crear good</h1>
      <?php
        if (count($users) == 0) {
          echo "<div class='alert alert-warning'> <strong>Advertencia!</strong> Para crear un Good primero debes crear un usuario!. <a class='alert-link' href='{$helper->url('User', 'showFormRegistrationUser')}'>Crear uno</a></div> ";
        } else {
       ?>
      <form action="<?php echo $helper->url('Good','create')?>" method="post" id="formRegistrationGood">
        <p>
          <label for="name">Nombre</label>
          <input class="form-control" type="text" name="name" id="name" value="">
          <span id="error-name" class="error"></span>
        </p>
        <p>
          <label for="description">Descripción</label>
          <textarea class="form-control" name="description" id="description" rows="8" cols="80"></textarea>
          <span id="error-description" class="error"></span>
        </p>
        <p>
          <label for="value">Valor ($)</label>
          <input class="form-control" type="number" name="value" id="value" value="">
          <span id="error-value" class="error"></span>
        </p>
        <?php
          if ($_SESSION['position'] == 'admin') {
         ?>
        <p>
          <label for="user">Para el usuario</label>
          <select class="form-control" name="user">
            <?php
              foreach ($users as $user) {
                echo "<option value='{$user['idUser']}'>{$user['UserNick']}</option>";
              }
            ?>
          </select>
        </p>
      <?php } ?>
        <p>
          <input class="btn btn-default" type="submit" value="Guardar">
          <a href="<?php echo $helper->url('Good', 'index') ?>">Cancelar</a>
        </p>
      </form>
    <?php } ?>
  </div>
    </div>
  </body>
</html>
