<?php

class DB {
    private $host = 'localhost';
    private $dbname = 'gestion_bib';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->executeQuery($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($sql, $params = []) {
        $stmt = $this->executeQuery($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    public function __destruct() {
        $this->conn = null; 
    }
}

class MigrationScript {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function migrate($sqlFile) {
        $sqlQueries = file_get_contents($sqlFile);
        
        $queries = explode(';', $sqlQueries);
        
        foreach ($queries as $query) {
            $query = trim($query);
            
            if (!empty($query)) {
                $this->db->executeQuery($query);
            }
        }
        
        echo "\nMigration completed successfully.\n";
    }
}