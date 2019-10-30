<section class="cover-sec">
    <img src="<?php echo Url::getBase() ?>../public/images/cover-img.jpg" alt="">
</section>
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <!-- profile -->
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $_SESSION['avatar'] : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $_SESSION['avatar'] ?>">
                                </div>
                                <div class="user_pro_status">
                                    <ul class="flw-status">
                                        <li>
                                            <span>Seguindo</span>
                                            <?php
                                            $readSeguidores = new Read();
                                            $readSeguidores->getTotalSeguidores($_SESSION['userId']);
                                            ?>
                                            <b><?php echo $readSeguidores->getRowCount() ?></b>
                                        </li>
                                        <li>
                                            <span>Publicações</span>
                                            <?php
                                            $readPosts = new Read();
                                            $readPosts->getTotalPost($_SESSION['userId']);
                                            ?>
                                            <b><?php echo $readPosts->getRowCount() ?></b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- feeds interno -->
                    <div class="col-lg-6">
                        <div class="main-ws-sec">

                            <div class="user-tab-sec">
                                <h3><?php echo $_SESSION['user'] ?></h3>
                                <div class="star-descp">
                                    <span><?php echo isset($_SESSION['descricao']) ? $_SESSION['descricao'] : 'Usuário Vendedor'; ?></span>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                                <!--star-descp end-->
                                <div class="tab-feed">
                                    <ul>
                                        <li data-tab="feed-dd" class="animated fadeIn active">
                                            <a href="#" title="">
                                                <img src="<?php echo Url::getBase() ?>../public/images/ic1.png" alt="">
                                                <span>Minhas Publicações</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div>
                            <div class="product-feed-tab animated fadeIn current" id="feed-dd">
                                <div class="posts-section">
                                    <?php include_once("myPosts.php") ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <?php 
                            include_once('portifolio.php');
                            include_once('sidbar.php');
                         ?>
                    </div>
                </div>
            </div>
</main>
<?php include_once("footer.php") ?>