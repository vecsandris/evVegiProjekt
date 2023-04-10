<?php

namespace Andrew\Turazas;

use PDO;
use PDOException;
use PHPUnit\Util\Xml\Exception;

final class Belepes
{
    private $pdo;
    public function __construct($dsn, $username, $password)
    {
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            throw new Exception('Database connection failed: ' . $e->getMessage());
        }
    }
    public function Login(string $nev, string $jelszo): bool
    {
        $this->execute("SELECT * from felhasznalok where nev = ? and jelszo = ? ",[$nev, $jelszo]);
        return true;
    }
    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
