<div class="row">
    <div class="col-4"></div>
    <div class="col-4 jumbotron">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST"):
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
                endif;
            endif;

            if (isset($_SESSION['erro'])):
                echo $_SESSION['erro'];
                unset($_SESSION['erro']);
            endif;
        ?>
        <form class="form-signin text-center" method="POST">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="login" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label><br>
            <input type="password" class="form-control" placeholder="Senha" name="senha" required>
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>