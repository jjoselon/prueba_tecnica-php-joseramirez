<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Goods</title>
  </head>
  <body>
    <style>
    #hideMe {
      -webkit-animation: cssAnimation 5s forwards;
      animation: cssAnimation 5s forwards;
    }
    @keyframes cssAnimation {
      0%   {opacity: 1;}
      90%  {opacity: 1;}
      100% {opacity: 0;}
    }
    @-webkit-keyframes cssAnimation {
      0%   {opacity: 1;}
      90%  {opacity: 1;}
      100% {opacity: 0;}
    }
    </style>
    <div class="container">
      <div class="col-xs-12">
        <?php if (isset($_SESSION["flag_msg"])) {?>
        <p class="text-success" id="hideMe">
          <?php
          echo $_SESSION["flag_msg"];
          ?>
        </p>
        <?php } ?>
        <h1>Goods</h1>
        <?php
        if (count($all_goods) == 0) {
          echo "<div class='alert alert-info'> <strong>Info!</strong> No tienes Goods. <a class='alert-link' href='{$helper->url('Good', 'showFormRegistrationGood')}'>Crear uno</a></div> ";
        } else {
          echo "<a href='{$helper->url('Good', 'showFormRegistrationGood')}'>Crear nuevo</a>";
         ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Id</th>
                <th> Nombre</th>
                <th> Descripción</th>
                <th> Valor</th>
                <th> Propietario</th>
                <th> Acción</th>
              </tr>
            </thead>
            <?php
              foreach ($all_goods as $good) {
                echo "<tr>";
                echo "<td>";
                echo $good['idGood'];
                echo "</td>";
                echo "<td>";
                echo $good['GoodName'];
                echo "</td>";
                echo "<td>";
                echo $good['GoodDescription'];
                echo "</td>";
                echo "<td>";
                echo $good['GoodValue'];
                echo "</td>";
                echo "<td>";
                echo "{$good['UserNick']} - <a href='{$helper->url('User','get')}&id={$good['idUser']}'>Ver</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='{$helper->url('Good','get')}&id={$good['idGood']}'>Detalles</a>";
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
