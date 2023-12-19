<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Common;

use PDO;

class PDOSingleton
{
    // On crée une variable pour la connexion à la BDD
    private $pdo;
    private static $instance;

    // Constructeur privé pour empêcher l'instanciation directe depuis l'extérieur
    private function __construct()
    {
        $user = 'root';
        $mdp = 'root';
        $this->pdo = new PDO('mysql:host=db;dbname=tp;charset=utf8mb4', $user, $mdp);
    }

    // Fonction pour récupérer l'instance unique de la classe
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDOSingleton();
        }
        return self::$instance->pdo;
    }
}