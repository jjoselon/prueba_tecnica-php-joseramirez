<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuarios</title>
  </head>
  <body>
    <div class="container">
      <div class="col-xs-12">
      <h1>Usuarios</h1>
      <?php
      if (count($all_users) == 0) {
        echo "<div class='alert alert-info'> <strong>Info!</strong> No tienes Usuarios. <a class='alert-link' href='{$helper->url('User', 'showFormRegistrationUser')}'>Crear uno</a></div> ";
      } else {
        echo "<a href='{$helper->url('User', 'showFormRegistrationUser')}'>Crear nuevo</a>";
       ?>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> Id</th>
              <th> Nickname</th>
              <th> Email</th>
              <th> Acción</th>
            </tr>
          </thead>
          <?php
          foreach ($all_users as $user) {
            echo "<tr>";
            echo "<td>";
            echo $user['idUser'];
            echo "</td>";
            echo "<td>";
            echo $user['UserNick'];
            echo "</td>";
            echo "<td>";
            echo $user['UserEmail'];
            echo "</td>";
            echo "<td>";
            echo "<a href='{$helper->url('User','get')}&id={$user['idUser']}'>Detalles</a>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </table>
      </div>
      <?php
        }
       ?>
     </div>
    </div>
  </body>
</html>
