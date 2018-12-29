<div class="row">
    <div class="col-7">
        <?php include_once 'carrousel.php' ?>
    </div>
    <div class="col-5">
        <div class="jumbotron">
            <h4 class="mb-3">Cadastre-se agora de forma simples e fácil</h4>
            <form action="" method="post">
                <div class="row">
                    <input type="hidden" name="type" value="2">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" name="nome" placeholder="Nome e sobrenome" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <select name="tipo" class="form-control" required>
                            <option value="">Tipo</option>
                            <option value="V">Vendedor</option>
                            <option value="C">Consumidor</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" value="M" required>
                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" value="F"  required>
                            <label class="form-check-label" for="inlineRadio2">Feminino</label>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">
                        Ao clicar em cadastre-se, você concorda com nossos Termos, Política de Dados e Política de Cookies. Você pode receber notificações por SMS e pode cancelar isso quando quiser.
                        </small>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-success btn-lg btn-block" type="submit">Cadastre-se</button>
            </form>
        </div>
    </div>
</div>