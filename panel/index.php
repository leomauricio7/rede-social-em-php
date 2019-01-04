<?php 
  require_once './app/conf.inc';
  require_once './vendor/autoload.php';
  if (isset($_GET['logout'])):
    if ($_GET['logout'] == 'confirmar'):
        Validation::deslogar();
    endif;
endif;
Validation::validaSession();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>public/css/style.css"/>
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>public/css/footer.css"/>
    <title>Rede Social - <?php echo $_SESSION['user']; ?></title>

  </head>
  <body>
    <?php include_once './resource/views/admin/header.php' ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <ul class="nav nav-pills flex-column">
                        <a  class="nav-link" href="./profile">
                            <img class="rounded" width="30px" src="<?php echo Url::getBase().'uplouds/users/'.$_SESSION['avatar'] ?>" alt="">
                            <span><?php echo $_SESSION['user']; ?></span>
                        </a><br>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo Url::getBase() ?>"><i class="fas fa-atlas"></i> Feeds de noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./friends"><i class="fas fa-users"></i> Amigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comments"></i> Bate-papo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?logout=confirmar" tabindex="-1" aria-disabled="true"><i class="fas fa-sign-in-alt"></i> Sair</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <?php
                        $pagina = Url::getURL(0);
                        if ($pagina == null):
                            $pagina = "feeds";
                        endif;
                        if (file_exists("resource/views/admin/" . $pagina . ".php")):
                            require_once "resource/views/admin/" . $pagina . ".php";
                        endif;
                    ?>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </main>
    <?php include_once './resource/views/admin/footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#like').click(function(){
                $( "#formLike" ).submit();
            });
            $('#form-perfil').hide();
            $('#save-profile').hide();
            $('#cancel-profile').hide();
            $('#update-profile').click(function(){
                $('#perfil').hide();
                $('#update-profile').hide();
                $('#form-perfil').show('fast');
                $('#save-profile').show('slow');
                $('#cancel-profile').show('slow');
            });
            $('#cancel-profile').click(function(){
                $('#perfil').show('fast');
                $('#update-profile').show('slow');
                $('#save-profile').hide();
                $('#cancel-profile').hide();
                $('#form-perfil').hide();
            });
        });
    </script>
  </body>
</html>