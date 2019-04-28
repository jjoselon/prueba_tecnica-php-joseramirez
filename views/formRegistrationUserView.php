<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
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
          document.getElementById('formRegistrationUser').addEventListener("submit", function (e) {
            let NodeList = document.querySelectorAll('.error');
            for (el of NodeList) {
              el.textContent = "";
            }
            let anyError = false;
            if (document.getElementById('nickname').value == "") {
              anyError = true;
              document.getElementById('error-nickname').textContent = `El campo ${document.querySelector('label[for=nickname]').textContent} es requerido`;
            }
            if (document.getElementById('password').value == "") {
              anyError = true;
              document.getElementById('error-password').textContent = `El campo ${document.querySelector('label[for=password]').textContent} es requerido`;
            }
            if (document.getElementById('email').value == "") {
              anyError = true;
              document.getElementById('error-email').textContent = `El campo ${document.querySelector('label[for=email]').textContent} es requerido`;
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
        <form action="<?php echo $helper->url('User','create')?>" method="post" id="formRegistrationUser">
          <p>
            <label for="nickname">Nombre de usuario</label>
            <input class="form-control" type="text" name="nickname" id="nickname" value="">
            <span id="error-nickname" class="error"></span>
          </p>
          <p>
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" id="password" value="">
            <span id="error-password" class="error"></span>
          </p>
          <p>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="">
            <span id="error-email" class="error"></span>
          </p>
          <p>
            <input class="btn btn-default" type="submit" value="Guardar">
            <a href="<?php echo $helper->url('User', 'index') ?>">Cancelar</a>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
