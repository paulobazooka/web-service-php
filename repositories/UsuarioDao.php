<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:18
 *
 *          Classe responsável por realizar operações de CRUD de usuario
 */


// include_once "../model/Usuario.php";



class UsuarioDao
{
    /**
     * @var recebe uma conexão válida
     */
    private $con;


    /**
     * UsuarioDao constructor.
     * @param $con  recebe uma conexão válida para operar no banco de dados
     */
    public function __construct($con)
    {
        $this->con = $con;
    }



    private function returnIdForInsertion(){

        $query = 'SELECT MAX(id) as id FROM usuario';

        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch();

        return ($row['id'] + 1);

    }


    public function usuarioFindAll(){
        $users = [];

        $query = 'SELECT * FROM usuario';
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        // recebe todas as linhas da consulta
        $users = $stmt->fetchAll();

        // retorna arquivo Json encodificado para UTF-8
        echo json_encode($users,JSON_UNESCAPED_UNICODE);
    }



    /**
     * @param $user Recebe como parametro um objeto do tipo usuario para GRAVAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */

    public function usuarioSave($user){

        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $id = $this->returnIdForInsertion();

            $stmt = $this->con->prepare('INSERT INTO usuario(id, nome, email) VALUES(:_id,:_nome,:_email)');
            $stmt->execute(array(
                ':_id' => $id,
                ':_nome' => $user->getNome(),
                ':_email' => $user->getEmail()
            ));

           // echo $stmt->rowCount();

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    /**
     * @param $user Recebe como parametro um objeto do tipo usuario pra ATUALIZAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioUpdate($user){
        $query = "UPDATE usuario SET ";
        $query.= "nome = ".$user->getNome().", ";
        $query.= "email = " .$user->getEmail().";";

        return $this->con->executeQuery($query);
    }

    /**
     * @param $id recebe como parametro um id para BUSCAR no banco de dados um usuario
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioFind($id){
        $query = "SELECT * FROM usuario ";
        $query .= "WHERE id= ";
        $query .= $id;
        $query .= ";";

        return $this->con->executeQuery($query);
    }


    /**
     * @param $id recebe como parametro um id para REMOVER no banco de dados um usuario
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioDelete($id){
        $query = "DELETE FROM usuario ";
        $query .= "WHERE id= ";
        $query .= $id;
        $query .= ";";

        return $this->con->executeQuery($query);

    }


    /**
     * @param $query  query para ser executada pelo objeto mysqli
     * @return bool  retorna boleano se a operação foi bem sucedida
     */
    private function executeQuery($query){

        if(($this->con->query($query))){
            return true;
        }else{
            return false;
        }
    }




}