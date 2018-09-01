<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:05
 */

class Conexao extends PDO
{

    private $host = "ec2-54-225-92-1.compute-1.amazonaws.com";
    private $dbname = "ddcg5gtojtuh3l";
    private $user = "upmouvifqxmomz";
    private $password = "f44c4be926490c043483cd136e783fc6c80c486fce746223b16b39163e415785";
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