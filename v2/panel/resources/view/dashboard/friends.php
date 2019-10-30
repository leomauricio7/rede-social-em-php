<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <h3>Usuários</h3>
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                <?php
                $read = new Read();
                $read->ExeRead('usuarios', 'where id <> ' . $_SESSION['userId'] . '');
                foreach ($read->getResult() as $users) :
                    extract($users)
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src="<?php echo $avatar != null ? Url::getBase() . 'uplouds/users/' . $avatar : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $avatar ?>" alt="">
                                <h3><?php echo $nome ?></h3>
                                <h4><?php echo $email ?></h4>
                                <h4><?php echo $telefone ?></h4>
                                <ul>
                                    <li><a href="./chat/<?php echo $id; ?>" title="Chat" class="message-us"><i class="fa fa-comments"></i></a></li>
                                    <?php if (Validation::verificaSeguidor($id)) { ?>
                                        <li><a href="#" title="deixar de Seguir" class="hire-us seguir" alt="<?php echo $id ?>"><i class="fa fa-minus"></i></a></li>
                                    <?php } else { ?>
                                        <li><a href="#" title="Seguir" class="hire-us seguir" alt="<?php echo $id ?>"><i class="fa fa-plus"></i></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>