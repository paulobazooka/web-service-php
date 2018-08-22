<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:05
 */

class Conexao
{
    private $host = "localhost:3306";
    // private $port = "3306";
    private $database = "DB_DSW";
    private $user = "root";
    private $pass = "1q2w3e";


    /**
     * @return mysqli|null  returna um conexão com o banco de dados
     */
    public function getConnection(){

        // Cria a conexão
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->database);

        // Verifica a  connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return null;
        }

        return $conn;
    }

    /**
     *  Encerra a conexão com o banco de dados
     */
    public function closeConnection(){

        $this->conn->close();
    }
}