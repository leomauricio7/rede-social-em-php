<!-- Perfil -->
<?php 
    if ($_POST && ($_POST['typeForm'] == 'cu')):
        $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $update = new Update();
        //verifica se o usuario enviou alguma imagem
        if (!empty($_FILES['img']['name'])):
            $Dados['img'] = $_FILES['img']['name'];
            $file = $_FILES['img'];
            $uploud = new Uploud();
            $uploud->ImagemEdit($file, 'users/');
            //verifica se foi feito o upload
            if (!$uploud->getResult()):
                echo $uploud->getMsg();
            else:
                $_SESSION['avatar'] = $Dados['img'];
                $Dados = ['nome' => $Dados['nome'], 'email' => $Dados['email'], 'telefone' => $Dados['telefone'], 'tipo' => $Dados['tipo'], 'sexo' => $Dados['sexo'], 'avatar' => $Dados['img']];
                $update->ExeUpdate('usuarios', $Dados, 'WHERE id = :id', 'id=' . $_SESSION['userId'] . '');
            endif;
        else:
            $Dados = ['nome' => $Dados['nome'], 'email' => $Dados['email'], 'telefone' => $Dados['telefone'], 'tipo' => $Dados['tipo'], 'sexo' => $Dados['sexo']];
            $update->ExeUpdate('usuarios', $Dados, 'WHERE id = :id', 'id=' . $_SESSION['userId'] . '');
        endif;

        if ($update->getResult()):
            $_SESSION['tipo'] = $Dados['tipo'];
            ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 align="center"><i class="fa fa-warning"></i> Alterações realizadas com sucesso.</h5>
                </div>
            <?php
            unset($Dados);
        endif;
    endif;

    $dadosUser = Validation::getUser($_SESSION['userId']);
    foreach ($dadosUser as $user):
        extract($user) 
?>
<div class="card">
  <div class="card-body">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
            <div class="col-4">
                <input type="file" id="upload_file" name="img" />
                <label style="cursor: pointer;" id="upload-btn" for="upload_file" title="clique na foto para selecionar a foto do perfil">
                    <img src="<?php echo Url::getBase().'uplouds/users/'.$avatar ?>" width="100"class="rounded float-left" alt="...">
                </label>
            </div>
            <div class="col-8">
                <h5 class="card-title"><?php echo $nome ?></h5>
                <div id="perfil">
                    <h6 class="card-subtitle mb-2 text-muted"><strong>E-mail:</strong> <?php echo $email ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Telefone:</strong> <?php echo $telefone ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Sexo:</strong> <?php echo $sexo == 'M' ? 'Masculino' : 'Feminino' ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Tipo:</strong> <?php echo $tipo == 'V' ? 'Vendedor': 'Consumidor' ?></h6>
                </div>
                <div id="form-perfil">
                    <input type="hidden" name="typeForm" value="cu">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?php echo $nome ?>"required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $email ?>"required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="telefone" value="<?php echo $telefone ?>"required>
                    </div>
                    <input type="radio" name="sexo" value="M" checked/>Masculino
                    <input type="radio" name="sexo" value="F"/>Femino
                    <div class="form-group">
                        <select class="form-control form-control-sm" name="tipo">
                            <option value="V">Vendedor</option>
                            <option value="C">Consumidor</option>
                        </select>
                    </div>
                </div>
                <a id="update-profile" class="btn btn-primary btn-sm btn-post card-link"><i class="fa fa-user-edit"></i> Editar Perfil</a>
                <a id="cancel-profile" class="btn btn-danger btn-sm btn-post card-link"><i class="fa fa-times-circle"></i> Cancelar</a>
                <button id="save-profile" type="submit" class="btn btn-success btn-sm btn-post card-link"><i class="fa fa-save"></i> Salvar Alterações</button>
            </div>
        </div>
    </form>
  </div>
</div>
<?php endforeach ?>
<hr class="mb-4"/>
<h6>Publicações</h6>
<!-- feeds de publicações dos vendedores-->
<?php
$posts= new Read();
$idUser = $_SESSION['userId'];
$posts->getPosts("WHERE u.id = $idUser ORDER BY p.id DESC");
foreach ($posts->getResult() as $post):
    extract($post);
?>
<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <img class="rounded" width="30px" src="<?php echo Url::getBase().'uplouds/users/'.$avatar ?>" alt="">
            <span class="badge badge-pill badge-secondary"><?php echo $nome ?> </span><i class="fa fa-clock"></i>
            <?php 
            $data = new DateTime("$dataPublicacao");
            echo $data->format('d-m-Y H:i:s'); 
            ?>
        </li>
    </ul>
<img src="<?php echo Url::getBase().'uplouds/posts/'.$idPost.'/'.$img ?>" class="card-img-top" alt="...">
<div class="card-body">
<p class="card-text"><?php echo $legenda ?></p>
</div>
<div class="card-body">
<a class="badge badge-pill badge-primary btn-post"><span class="badge badge-light"><?php echo '0' ?></span> <i class="fas fa-thumbs-up"></i> Curti</a>
<a class="badge badge-pill badge-primary btn-post" id="comentario"><i class="fas fa-comments"></i> Comentarios</a>
</div>
<?php 
        $comentarios = new Read();
        $comentarios->getComentarios("WHERE p.id = $idPost ORDER BY c.id ASC");
        foreach($comentarios->getResult() as $comentario):
            extract($comentario);
    ?>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <img class="rounded" width="30px" src="<?php echo Url::getBase().'uplouds/users/'.$avatarUserComentario ?>" alt="">
        <span class="badge badge-pill badge-secondary"><?php echo $nomeUserComentario ?></span>
        <?php echo $comentario ?>
    </li>
  </ul>
<?php endforeach ?>
  <div class="card-body">
    <?php 
        $key = $idPost;
        if ($_POST && ($_POST['typeForm'] == 'cc') && ($_POST['ccPost'] == $key)):
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            unset($dados['ccPost']);
            unset($dados['typeForm']);
            $create = new Create();
            $create->ExeCreate('comentarios', $dados);
            if($create->getResult()){
                echo '<script>location.href="./profile";</script>';
                unset($dados);
            }
            
        endif
    ?>
    <form class="form-inline col-12" method="POST">
        <img class="rounded" style="margin: 10px;" width="30px" src="<?php echo Url::getBase().'uplouds/users/'.$_SESSION['avatar'] ?>" alt="">    
        <input type="hidden" name="typeForm" value="cc">
        <input type="hidden" name="ccPost" value="<?php echo $idPost ?>">
        <input type="hidden" name="id_post" value="<?php echo $idPost ?>">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['userId'] ?>">
        <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" name="comentario" placeholder="Escreva um comentario" required>
        <button type="submit" class="btn btn-sm btn-outline-success ary mb-2">Comentar</button>
    </form>
</div>
</div>
<br>
<?php endforeach ?>