<?php 
  require_once './panel/app/conf.inc';
  require_once './panel/vendor/autoload.php';
  if (isset($_SESSION['logado'])):
      echo '<script>window.location.href="panel/";</script>';
  endif
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>panel/public/css/style.css"/>
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>panel/public/css/footer.css"/>
    <link rel="shortcut icon" href="<?php echo Url::getBase(); ?>panel/public/img/logo.png" type="image/x-icon">
    <title>Agroverdes</title>

  </head>
  <body>
    <?php include_once './panel/resource/views/site/header.php' ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php
              $pagina = Url::getURL(0);
              if ($pagina == null):
                  $pagina = "home";
              endif;
              if (file_exists("panel/resource/views/site/" . $pagina . ".php")):
                  require_once "panel/resource/views/site/" . $pagina . ".php";
              endif;
           ?>
        </div>
    </main>
    <?php include_once './panel/resource/views/site/footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>