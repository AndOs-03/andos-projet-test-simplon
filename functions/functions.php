<?php

/**
 * Échapper les caractères spéciaux et enlever les espaces pour sécuriser une chaine
 * @param $string
 * @return string
 */
function strSecur($string)
{
    return trim(stripslashes(htmlspecialchars($string)));
}

/**
 * Pour vérifier les numéros de telephone
 * @param $var
 * @return int
 */
function verifiePhone($var)
{
    $pattern = '/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/';
    return preg_match($pattern, $var);
}

/**
 * Vérifier les si un email est bon
 * @param $var
 * @return mixed
 */
function verifieEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

/** Debug plus lisible des différentes variables
 * @param $var
 */
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    exit();
    echo '</pre>';
}
