<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<?php
if (!empty($_SESSION)) {
?>
<div class="container">
  <ul class="nav nav-pills nav-justified">
    <?php
    if ($_SESSION["position"] == "admin") {
      ?>
      <li role="presentation">
        <a class="navbar-brand" href="<?php echo $helper->url('User', 'index') ?>">Usuarios</a>
      </li>
      <?php
    }
    ?>
    <li role="presentation"><a class="navbar-brand" href="<?php echo $helper->url('Good', 'index') ?>"> Goods </a></li>
    <li role="presentation"><a class="navbar-brand" href="<?php echo $helper->url('User', 'logout') ?>"> <span class="glyphicon glyphicon-log-out"></span> Salir </a></li>
  </ul>
  <?php
}
?>
</div>
