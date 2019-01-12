<!---------------------CADASTRO DE PUBLICAÇÕES----------------->
<?php if($_SESSION['tipo'] != 'C'): 

    if ($_POST && ($_POST['typeForm'] == 'cp')):
        $addinfo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $addinfo['id_usuario'] = $_SESSION['userId'];
        $addinfo['img'] = ($_FILES['img']['tmp_name'] ? $_FILES['img'] : null);
        unset($addinfo['typeForm']);
        $file = $_FILES['img'];
        $post = new Post();
        $post->CreatePost($addinfo);

        if (!$post->getResult()):
            echo $post->getMsg();
        else:
            $uploud = new Uploud();
            $uploud->Imagem($file, 'posts/' . $post->getResult() . '/');
            echo $post->getMsg();
            unset($addinfo);
        endif;
    endif;
    unset($addinfo);
    if (!empty($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
?>
<div class="card">
  <div class="card-body">
  <div class="form-group">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="typeForm" value="cp">
            <div class="form-group">
                <label><strong>Criar publicação</strong></label>
                <textarea class="form-control" rows="2" name="legenda" placeholder="Faça a descrição da sua publicação aqui..." required></textarea>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img" id="customFileLangHTML">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Inserir"><i class="fas fa-image"></i></label>
                    </div>
                </div>
                <div class="col-9"> <button class="btn btn-success float-right" type="submit">Publicar</button></div>
            </div>  
        </div>
    </form>
  </div>
</div>
<?php endif ?>

<hr class="mb-4"/>
<!-----------------PUBLICAÇÕES--------------------->
<?php
    $posts= new Read();
    $posts->getPosts('ORDER BY p.id DESC');
    foreach ($posts->getResult() as $post):
        extract($post);
?>
<div class="card bg-person">
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
  <?php 
        $key = $idPost;
        if ($_POST && ($_POST['typeForm'] == 'cl') && ($_POST['ccLike'] == $key)):
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $read = new Read();
            $read->verificaLike($dados['id_usuario'], $dados['id_post']);
            if($read->getResult()){
             $update = new Update();
             foreach($read->getResult() as $like):
                extract($like);
                if($curtiu == 'SIM'){
                    $data = ['curtiu' => 'NAO'];
                    $update->ExeUpdate('likes', $data, "where id= :id", "id=$id");
                }else{
                    $data = ['curtiu' => 'SIM'];
                    $update->ExeUpdate('likes', $data, "where id= :id", "id=$id");
                }
             endforeach;

            }else{
                $dados['curtiu'] = 'SIM';
                unset($dados['ccLike']);
                unset($dados['typeForm']);
                var_dump($dados);
                $create = new Create();
                $create->ExeCreate('likes', $dados);
                if($create->getResult()){
                    echo '<script>location.href="./";</script>';
                    unset($dados);
                }
            }
        endif
    ?>
    <?php 
    $readLike = new Read();
    $readLike->getLike($idPost);
    foreach($readLike->getResult() as $likes):
        extract($likes);
    ?>
    <form id="formLike" method="post">
        <input type="hidden" name="typeForm" value="cl">
        <input type="hidden" name="ccLike" value="<?php echo $idPost ?>">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['userId'] ?>">
        <input type="hidden" name="id_post" value="<?php echo $idPost ?>">
        <button type="submit" class="btn btn-sm btn-outline-primary float-left btn-post"><span class="badge badge-light"><?php echo $curtidas ?></span> <i class="fas fa-thumbs-up"></i> Curti</button> 
    </form>
    <?php endforeach ?>
  </div>  
  <!-----------------------COMENTARIOS------------------->  
    <?php 
        $comentarios = new Read();
        $comentarios->getComentarios("WHERE p.id = $idPost ORDER BY c.id ASC");
        foreach($comentarios->getResult() as $comentario):
            extract($comentario);
    ?>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-person">
        <img class="rounded" width="30px" src="<?php echo Url::getBase().'uplouds/users/'.$avatarUserComentario ?>" alt="">
        <span class="badge badge-pill badge-secondary"> <i class="fas fa-comments"></i> <?php echo $nomeUserComentario ?></span>
        <?php echo $comentario ?>
    </li>
  </ul>
  <!----------------------------------------------------------->
  <!-------------CADASTRO DE COMENTARIOS ----------------------->
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
                echo '<script>location.href="./";</script>';
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
  <!----------------------------------------------------------->
</div>
<br>
<?php endforeach ?>