<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light scrolling-navbar navbar-principale" style="z-index: 998; width: 100%">
        <div class="container">
            <a href="index.php?page=home" class="logo-lien mr-5">
                <img class="img_lo" src="assets/images/logo.png" width="150" height="80">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Partie gauche de la bar de navigation pour lien vers autres pages -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item menu-item">
                      <a class="nav-link waves-effect waves-light" href="index.php?page=home" title="">ACCUEIL</a>
                  </li>

                  <li class="nav-item menu-item">
                    <a class="nav-link waves-effect waves-light" href="index.php?page=participants"
                       title="">PARTICIPANTS</a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>
</header>