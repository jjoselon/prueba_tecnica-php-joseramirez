<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
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
          document.getElementById('formAuthenticationUser').addEventListener("submit", function (e) {
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
            if (anyError) {
              e.preventDefault();
            }
          });
        })
      }
    </script>
    <div class="container">
      <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
          <div class="panel-body">
            <form action="<?php echo $helper->url('User','checkLogin')?>" method="post" id="formAuthenticationUser">
              <p>
                <label for="nickname">Usuario</label>
                <input class="form-control" type="text" name="nickname" id="nickname" placeholder="Tu usuario">
                <span id="error-nickname" class="error"></span>
              </p>
              <p>
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Tu contraseña">
                <span id="error-password" class="error"></span>
              </p>
              <p class="text-right">
                <input class="btn btn-default" type="submit" value="Entrar">
              </p>
            </form>
          </div>
          <?php
            echo $bad_credentials ?? "";
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
