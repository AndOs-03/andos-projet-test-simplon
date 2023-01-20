<?php

// Inclusion des fichiers principaux
include_once 'config/config.php';
include_once 'config/db.php';
include_once 'functions/functions.php';

// DEFINITION DES VARIABLES DE SESSION

// Définition de la page courante
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page'])); // enlever les espaces et mettre en minuscule
} else {
    $page = 'home';
}

// Array contenant toutes les pages
$allPages = scandir('controllers/');

// Verification de l'existence de la page demandée
if (in_array($page.'_controller.php', $allPages)) {
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'views/'.$page.'_view.php';
} else {
    include_once 'views/404.php';
}
