<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-person">
    <div class="container">
        <a class="navbar-brand" href="<?php echo Url::getBase(); ?>">
        <img src="<?php echo Url::getBase(); ?>public/img/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
        <strong>Agroverdes</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
            <form class="form-inline col-6">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar vendedores" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>