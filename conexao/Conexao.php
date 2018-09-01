<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:05
 */

class Conexao extends PDO
{

    private $host = "localhost";
    private $dbname = "db_olharcidadao";
    private $user = "postgres";
    private $password = "postgres";
    private $port = "5432";
    private $dsn = "";
    private static $db = null;



    /**
     * Conexao constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return null|PDO
     */
    public function getConexao()
    {
        $this->dsn = ("pgsql:host=$this->host;dbname=$this->dbname;user=$this->user;port=$this->port;password=$this->password");
        $this->db = new PDO($this->dsn);

        return $this->db;
    }


    /**
     *  Close connection
     */
    public function closeConexao()
    {
        $this->db = null;
    }
}