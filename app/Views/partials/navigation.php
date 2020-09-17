<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-7 py-4">
                    <h4 class="text-white">О проекте</h4>
                    <p class="text-muted">
                        Add some information about the album below, the author, or any other background context. Make it
                        a few
                        sentences long so folks can pick up some informative tidbits. Then, link them off to some social
                        networking
                        sites or contact information.
                    </p>
                </div>
                <?php if (auth()->isLoggedIn()) : ?>
                    <div class="col-sm-5 col-md-4 offset-md-1 py-4">
                        <h5 class="text-white welcome-text">Добро пожаловать, <?php echo auth()->getUsername(); ?></h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="/logout" class="btn btn-warning">
                                    <span class="material-icons">disabled_by_default</span>
                                    <span>Выйти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="col-sm-5 col-md-4 offset-md-1 py-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="btn btn-info" href="/register">
                                    <span class="material-icons">how_to_reg</span>
                                    <span>Регистрация</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-primary" href="/login">
                                    <span class="material-icons">login</span>
                                    <span>Войти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="<?php echo ROOT_PATH; ?>" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                     height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                     style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);">
                    <path d="M10 2v2.26l2 1.33V4h10v15h-5v2h7V2H10M7.5 5L0 10v11h15V10L7.5 5M14 6v.93L15.61 8H16V6h-2m4 0v2h2V6h-2M7.5 7.5L13 11v8h-3v-6H5v6H2v-8l5.5-3.5M18 10v2h2v-2h-2m0 4v2h2v-2h-2z"fill="white"/>
                    <rect x="0" y="0" width="24" height="24" fill="rgba(0, 0, 0, 0)"/>
                </svg>
                <strong>&nbsp;Home Page</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>