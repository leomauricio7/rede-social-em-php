<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <!-- profile -->
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $_SESSION['avatar'] : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $_SESSION['avatar'] ?>">
                                        </div>
                                    </div>
                                    <!--username-dt end-->
                                    <div class="user-specs">
                                        <h3><?php echo $_SESSION['user'] ?></h3>
                                        <span><?php echo isset($_SESSION['descricao']) ? $_SESSION['descricao'] : 'Usuário Vendedor'; ?></span>
                                    </div>
                                </div>
                                <!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <h4>Seguindo</h4>
                                        <?php
                                        $readSeguidores = new Read();
                                        $readSeguidores->getTotalSeguidores($_SESSION['userId']);
                                        ?>
                                        <span><?php echo $readSeguidores->getRowCount() ?></span>
                                    </li>
                                    <li>
                                        <h4>Publicacoes</h4>
                                        <?php
                                        $readPosts = new Read();
                                        $readPosts->getTotalPost($_SESSION['userId']);
                                        ?>
                                        <span><?php echo $readPosts->getRowCount() ?></span>
                                    </li>
                                    <li>
                                        <a href="" title=""><i class="fa fa-id-badge"></i> Perfil</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- feeds -->
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <!-- post feed -->
                            <div class="post-topbar">
                                <div class="user-picy">
                                    <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $_SESSION['avatar'] : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $_SESSION['avatar'] ?>">
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="post_project" href="#" title="">Publicar</a></li>
                                    </ul>
                                </div>
                                <!--post-st end-->
                            </div>
                            <!-- posts -->
                            <div class="posts-section">
                                <?php include_once("posts.php") ?>
                            </div>
                        </div>
                    </div>
                    <!-- notifications -->
                    <div class="col-lg-3 pd-right-none no-pd">
                        <?php include_once('sidbar.php')?>
                    </div>

                </div>
            </div>
        </div>
</main>