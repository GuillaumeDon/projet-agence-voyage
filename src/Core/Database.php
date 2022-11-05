<?php 

class Database {

    static private ?PDO $pdo = null;

    public function __construct()
    {
        if (self::$pdo == null) {
            self::$pdo = $this->getPDOConnection();
        }
    }

    /**
     * Création d'une connexion PDO à la base de données
     */
    function getPDOConnection()
    {
        // Connexion à la base de données
        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8'; // DSN : Data Source Name (informations de connexion à la BDD)
        $user = DB_USER; // Utilisateur
        $password = DB_PASS; // Mot de passe
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Pour transformer les eerreurs SQL en exceptions (erreurs) PHP et les voir sur le page
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Mode de récupération des résultats de requêtes de sélection : tableaux associatifs
        ];

        $pdo = new PDO($dsn, $user, $password, $options); // Création d'un objet de la classe PDO

        return $pdo;
    }

    /**
     * Prépare et exécute une requête SQL
     * @param string $sql La requête SQL qu'on souhaite exécuter
     * @param array $values Le tableau de valeurs qu'on souhaite introduire dans la requête SQL
     * @return PDOStatement L'objet PDOStatement une fois la requête exécutée
     */
    public function executeQuery(string $sql, array $values = []): PDOStatement
    {
        // Préparation 
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution 
        $pdoStatement->execute($values);

        // On retourne l'objet PDOStatement
        return $pdoStatement;
    }

    /**
     * Exécute une requête de sélection et retourne UN résultat
     */
    public function getOneResult(string $sql, array $values = [], $className = false)
    {
        // Préapration et exécution de la requête
        $pdoStatement = $this->executeQuery($sql, $values);

        // Récupération d'UN SEUL résultat
        $line = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        if($line !== false
        && $className !== false
        && class_exists($className)) {
            $line = new $className($line);
        }
        return $line;
    }

    /**
     * Exécute une requête de sélection et retourne TOUS les résultats
     */
    public function getAllResults(string $sql, array $values = [], $className = false)
    {
        // Préapration et exécution de la requête
        $pdoStatement = $this->executeQuery($sql, $values);

        // Récupération de TOUS les résultats
        if($className === false || !class_exists($className)) {
            return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = [];
            while($line = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
                $data[] = new $className($line);
            }
            return $data;
        }
    }

}