<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="<?php echo Url::getBase() ?>" title=""><img src="<?php echo Url::getBase() ?>../public/images/logo-agro.png" alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Buscar...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav class="">
                <ul>
                    <li>
                        <a href="index.html" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Feed
                        </a>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-openm">
                            <span><img src="images/icon6.png" alt=""></span>
                            Conversas
                        </a>
                        <div class="notification-box msg" id="message">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img1.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="messages.html" title="">Jassica William</a></h3>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img3.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="messages.html" title="">Jassica William</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                        <span>2 min ago</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                <div class="view-all-nots">
                                    <a href="messages.html" title="">View All Messsages</a>
                                </div>
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img src="<?php echo Url::getBase().'uplouds/users/'.$_SESSION['avatar'] ?>" alt="">
                    <a href="#" title=""><?php echo $_SESSION['user']; ?></a>
                    <i class="fa fa-sort-down"></i>
                </div>
                <div class="user-account-settingss" id="users">
                    <h3>Ferramentas</h3>
                    <ul class="us-links">
                        <li><a href="" title="">Editar Perfil</a></li>
                    </ul>
                    <h3 class="tc"><a href="" title="">Sair</a></h3>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>