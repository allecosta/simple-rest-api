<?php

class Database 
{
    protected $conn = null;

    public function __construct()
    {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

            if (mysqli_connect_errno()) {
                throw new Exception("OPS! Não foi possível conectar ao banco de dados.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($sqlQuery = "", $params = []) 
    {
        try {
            $stmt = $this->executeStatement($sqlQuery, $params);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
   
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    private function executeStatement($sqlQuery = "", $params = []) 
    {
        try {
            $stmt = $this->conn->prepare($sqlQuery);

            if ($stmt === false) {
                throw new Exception("OPS! Incapaz de fazer declaração preparada: " . $sqlQuery);
            }

            if ($params) {
                $stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}