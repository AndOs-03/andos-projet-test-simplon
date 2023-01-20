<?php

$participants = null;
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    include("models/Participants.php");
    $participants = Participants::getAll();
}

// Enregistrement d'un nouveau participant
if (isset($_POST['btn_add'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Participants.php');

    $nom = strSecur($_POST["nom"]);
    $prenoms = strSecur($_POST["prenoms"]);
    $numero = strSecur($_POST["numero"]);
    $email = strSecur($_POST["email"]);

    $e_nom = $e_prenoms = $e_numero = $e_email = "";

    $succes = true;

    if (empty($nom)) {
        $e_nom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($prenoms)) {
        $e_prenoms = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($numero)) {
        $e_numero = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (!verifiePhone($numero)) {
        $e_numero = "Numéro de téléphone invalide.";
        $succes = false;
    }

    if ($succes) {
        if (!empty($numero)) {
            $participant = Participants::getByNumero($numero);
            if (isset($participant) && $participant != null) {
                $e_numero = "Ce numéro est déjà utilisé !";
                echo json_encode([
                    'success' => 'false',
                    'nom' => $e_nom,
                    'prenom' => $e_prenoms,
                    'numero' => $e_numero,
                    'email' => $e_email
                ]);
                exit();
            }
        }

        if (!empty($email)) {
            $participant = Participants::getByEmail($email);
            if (isset($participant) && $participant != null && $participant != "") {
                $e_email = "Cet adresse email est déjà utilisée !";
                echo json_encode([
                    'success' => 'false',
                    'nom' => $e_nom,
                    'prenom' => $e_prenoms,
                    'numero' => $e_numero,
                    'email' => $e_email
                ]);
                exit();
            }
        }

        if (Participants::insert($nom, $prenoms, $numero, $email)) {
            $message = "Participant enregistré avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        }
        else {
            $message = "Erreur lors de l'enregistrement du participant !";
            echo json_encode([
                'success' => 'non',
                'message' => $message
            ]);
        }
    }
    else {
        echo json_encode([
            'success' => 'false',
            'nom' => $e_nom,
            'prenom' => $e_prenoms,
            'numero' => $e_numero,
            'email' => $e_email
        ]);
    }
}

// Modification d'un participant
if (isset($_POST['btn_update'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Participants.php');

    $nom = strSecur($_POST["nomUpdate"]);
    $prenoms = strSecur($_POST["prenomsUpdate"]);
    $numero = strSecur($_POST["numeroUpdate"]);
    $email = strSecur($_POST["emailUpdate"]);
    $idModif = strSecur($_POST["idModif"]);

    $e_nom = $e_prenoms = $e_numero = $e_email = "";

    $succes = true;

    if (empty($nom)) {
        $e_nom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($prenoms)) {
        $e_prenoms = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($numero)) {
        $e_numero = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (!verifiePhone($numero)) {
        $e_numero = "Numéro de téléphone invalide.";
        $succes = false;
    }

    $succes = true;

    if ($succes) {
        $lastParticipant = Participants::getById($idModif);
        if (!empty($email)) {
            $participant = Participants::getByEmail($email);
            if ($participant['adresse_email'] === $email && $participant['adresse_email'] !== $lastParticipant['adresse_email']) {
                $e_email = "Cet adresse email est déjà utilisée !";
                echo json_encode([
                    'success' => 'false',
                    'nom' => $e_nom,
                    'prenom' => $e_prenoms,
                    'numero' => $e_numero,
                    'email' => $e_email
                ]);
                exit();
            }
        }

        $participant = Participants::getByNumero($numero);
        if ($participant['numero'] === $numero && $participant['numero'] !== $lastParticipant['numero']) {
            $message = "Ce numéro existe déjà";
            echo json_encode([
                'success' => 'false',
                'nom' => $e_nom,
                'prenom' => $e_prenoms,
                'numero' => $e_numero,
                'email' => $e_email
            ]);
        }
        else {
            if (Participants::update($idModif, $nom, $prenoms, $numero, $email)) {
                $message = "Participant modifié avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }
            else {
                $message = "Erreur lors de la modification du participant.";
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    }
    else {
        echo json_encode([
            'success' => 'false',
            'nom' => $e_nom,
            'prenom' => $e_prenoms,
            'numero' => $e_numero,
            'email' => $e_email
        ]);
    }
}

// Récupération des info d'un participant
if (isset($_GET['idDetail'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Participants.php');

    $id = strSecur($_GET['idDetail']);
    $participant = Participants::getById($id);

    if ($participant) {
        echo json_encode([
            'participant' => $participant
        ]);
    }
    else {
        echo json_encode([
            'participant' => 'null'
        ]);
    }
}

// Récupération des info de la dernière ligne
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Participants.php');

    $participant = Participants::getLast();

    if ($participant) {
        $total = Participants::getCount();
        echo json_encode([
            'participant' => $participant,
            'total' => $total
        ]);
    }
    else {
        echo json_encode([
            'participant' => 'null'
        ]);
    }
}

if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Participants.php');

    $id = strSecur($_GET['idSuppr']);
    if (Participants::delete($id)) {
        $message = "Participant supprimé avec succès.";
        echo json_encode([
            'success' => 'oui',
            'message' => $message
        ]);
    }
    else {
        $message = "Erreur impossible de supprimer cette ligne.";
        echo json_encode([
            'success' => 'non',
            'message' => $message
        ]);
    }
}