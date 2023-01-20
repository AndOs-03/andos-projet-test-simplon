<?php

/**
 * Class Participants - Représente un participant
 */
class Participants
{
    public $id;
    public $nom;
    public $prenom;
    public $numero;
    public $adresseEmail;

    /**
     * Participants constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM participants WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->numero = $data['numero'];
        $this->adresseEmail = $data['adresse_email'];
    }

    /**
     * Renvoi la liste des participants.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM participants ORDER BY id DESC");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM participants WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * @param $numero
     * @return mixed
     */
    static function getByNumero($numero)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM participants WHERE numero = ?");
        $req->execute([$numero]);
        return $req->fetch();
    }

    /**
     * @param $email
     * @return mixed
     */
    static function getByEmail($email)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM participants WHERE adresse_email = ?");
        $req->execute([$email]);
        return $req->fetch();
    }

    /**
     * Renvoi la dernière ligne.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM participants ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Renvois le nombre total des participants.
     * @return int
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare('SELECT COUNT(*) FROM participants');
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $adresse_email
     * @return bool
     */
    static function insert($nom, $prenom, $numero, $adresse_email)
    {
        global $db;
        $req = $db->prepare('INSERT INTO participants(nom, prenom, numero, adresse_email) VALUES(?, ?, ?, ?)');
        return $req->execute([$nom, $prenom, $numero, $adresse_email]);
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $adresse_email
     * @return bool
     */
    static function update($id, $nom, $prenom, $numero, $adresse_email)
    {
        global $db;
        $req = $db->prepare('UPDATE participants SET nom = ?, prenom = ?, numero =?, adresse_email = ? WHERE id = ?');
        return $req->execute([$id, $nom, $prenom, $numero, $adresse_email]);
    }

    /**
     * @param $id
     * @return bool
     */
    static function delete($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM participants WHERE id = ?');
        try {
            return $req->execute([$id]);
        } catch (PDOException $ex) {
            return false;
        }
    }
}