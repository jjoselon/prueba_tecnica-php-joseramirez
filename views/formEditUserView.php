<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar usuario</title>
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
          document.getElementById('showHidePassword').addEventListener("click", function (e) {
            if (this.classList.contains('glyphicon-eye-open')) {
              document.getElementById('password').setAttribute('type','password');
              this.classList.add('glyphicon-eye-close');
              this.classList.remove('glyphicon-eye-open');
            } else if (this.classList.contains('glyphicon-eye-close')) {
              document.getElementById('password').setAttribute('type','text');
              this.classList.remove('glyphicon-eye-close');
              this.classList.add('glyphicon-eye-open');
            }
          });
          document.getElementById('formEditUser').addEventListener("submit", function (e) {
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
      <form action="<?php echo $helper->url('User','put')?>" method="post" id="formEditUser">
        <input type="hidden" name="idUser" value="<?php echo $user["idUser"]?>">
        <p>
          <label for="nickname">Nombre de usuario</label>
          <input class="form-control" type="text" name="nickname" id="nickname" value="<?php echo $user['UserNick']?>">
          <span id="error-nickname" class="error"></span>
        </p>
        <p>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><span id="showHidePassword" class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span>
              <input class="form-control" type="text" name="password" id="password" aria-describedby="" value="<?php echo $user['UserPassword']?>">
              <span id="error-password" class="error"></span>
            </div>
          </div>
        </p>
        <p>
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" value="<?php echo $user['UserEmail']?>">
          <span id="error-email" class="error"></span>
        </p>
        <p>
          <input class="btn btn-default" type="submit" value="Guardar">
          <a href="<?php echo $helper->url('User', 'index')?>">Cancelar</a>
        </p>
      </form>
    </div>
  </body>
</html>
