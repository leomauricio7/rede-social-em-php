<div class="card bg-person">
    <div class="card-body">
        <ul class="list-unstyled">
            <?php 
                $read = new Read();
                $read->ExeRead('usuarios' ,'where id <> '.$_SESSION['userId'].'');
                foreach($read->getResult() as $users):
                    extract($users)
            ?>
            <li class="media">
                <img src="<?php echo Url::getBase().'uplouds/users/'.$avatar ?>" class="mr-3" alt="..." width="100px">
                <div class="media-body">
                <h5 class="mt-0 mb-1"><?php echo $nome ?></h5>
                    <strong>Telefone: </strong><?php echo $telefone ?><br>
                    <strong>E-mail: </strong><?php echo $email ?>
                    <a class="nav-link" href="./chat/<?php echo $id; ?>"><i class="fas fa-comments"></i> Enviar Mensagem</a>
                </div>
            </li>
            <hr>
            <?php endforeach ?>

        </ul>
    </div>
</div>