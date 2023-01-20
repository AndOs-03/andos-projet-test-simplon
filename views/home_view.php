<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'views/includes/head.php' ?>
        <title>Accueil - <?= WEBSITE_NAME ?></title>
    </head>

    <body>
        <div class="loader"></div>
        <div id="bloc">
            <!-- Inclusion du menu de navigation -->
            <?php include_once 'views/includes/header.php' ?>

            <!-- Les images en slide en haut de l'accueil -->
            <div class="header-slide">
                <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-2" data-slide-to="1"></li>
                        <li data-target="#carousel-example-2" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="view">
                                <img class="d-block w-100 carousel-image" src="assets/images/kaeloo.jpg" alt="First slide">
                                <div class="mask rgba-black-light"></div>
                                <div class="top-panel-home"></div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="view">
                                <img class="d-block w-100 carousel-image" src="assets/images/moignon.jpg" alt="Second slide">
                                <div class="mask rgba-black-strong"></div>
                                <div class="top-panel-home"></div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="view">
                                <img class="d-block w-100 carousel-image" src="assets/images/team_kaeloo.jpg" alt="Third slide">
                                <div class="mask rgba-black-slight"></div>
                                <div class="top-panel-home"></div>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Inclusion du pied de page -->
            <?php include_once 'views/includes/footer.php' ?>
        </div>

        <script src="js/main.js"></script>
        <script>
            $(window).on('load', function () {
                $('.loader').fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        </script>
    </body>
</html>