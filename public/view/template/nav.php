        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top
        <?php if($_SERVER['REQUEST_URI'] !== '/'){echo "nav_perso";}?>" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/"><!-- <img src="assets/img/navbar-logo.svg" alt="" />-->Antonin Pfistner</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/posts">Articles</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Projets</a></li>
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] === "3"){
                            ?>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Administration
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/createPost">Crée un article</a>
                                    <a class="dropdown-item" href="#">Modération des commentaires</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logOut">Administration</a>
                                    </div>
                                </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/contact">Contact</a></li>
                        <?php
                            if(isset($_SESSION['pseudo'])){
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mon Compte
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/my-account">Mes informations</a>
                                    <!-- <a class="dropdown-item" href="#">Modifi</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logOut">Deconnexion</a>
                                    </div>
                                </li>
                                <?php
                            }else{
                                ?>
                                    <li class="nav-item"><a class="nav-link" href="/account">Mon compte</a></li>
                                <?php
                                }
                                ?>
                    </ul>
                </div>
            </div>
        </nav>
