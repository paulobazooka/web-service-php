<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:18
 *
 *          Classe responsável por realizar operações de CRUD de usuario
 */

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


    /**
     * @param $user Recebe como parametro um objeto do tipo usuario para GRAVAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */

    public function usuarioSave($user){
        $query = "INSERT INTO usuario (nome, email) values ";
        $query.= "(".$user->getNome().", ";
        $query.= $user->getEmail().");";

      return $this->executeQuery($query);
    }


    /**
     * @param $user Recebe como parametro um objeto do tipo usuario pra ATUALIZAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioUpdate($user){
        $query = "UPDATE usuario SET ";
        $query.= "nome = ".$user->getNome().", ";
        $query.= "email = " .$user->getEmail().";";

        return $this->executeQuery($query);
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

        return $this->executeQuery($query);
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

        return $this->executeQuery($query);

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