<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo Url::getBase(); ?>">
      <img src="https://getbootstrap.com/docs/4.2/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Rede Social
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"></ul>
        <?php if(Url::getURL(0) != 'login'): 
          if ($_SERVER['REQUEST_METHOD'] == "POST"):
            if( filter_input(INPUT_POST, "type", FILTER_SANITIZE_MAGIC_QUOTES) == 1):
                $valida = new Validation();
                //pegando os valores do formulario
                $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
                $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
                //trantando os valores dos campos
                $senha = addslashes($senha);
                $senha = base64_encode($senha);

                //setando os valores nos metodos
                $valida->setLogin($login);
                $valida->setSenha($senha);
                //fazendo a validação
                if ($valida->logar()):
                  echo '<script>window.location.href="panel/";</script>';
                else:
                  echo '<script>window.location.href="login";</script>';
                endif;
                ///se for cadastro de usuários
              else:
                $create = new Create();
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                unset($dados['type']);
                $dados['senha'] = base64_encode($dados['senha']);
                $create->ExeCreate('usuarios', $dados);
               if($create->getResult()):
                  echo '<script>window.location.href="panel/";</script>';
                endif;  
              endif;
            endif;
          ?>
          <form class="form-inline" method="POST">
            <input type="hidden" name="type" value="1">
            <input class="form-control mr-sm-2" type="text" placeholder="Email" name="login" required>
            <input class="form-control mr-sm-2" type="password" placeholder="Senha" name="senha" required>
            <button class="btn btn-success my-2 my-sm-0" type="submit">Entrar</button>
          </form>
        <?php endif ?>
    </div>
  </div>
</nav>