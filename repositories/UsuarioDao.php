<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 22/08/18
 * Time: 10:18
 *
 *          Classe responsável por realizar operações de CRUD de usuario
 */

include_once "../model/Usuario.php";
include_once "../conexao/Conexao.php";

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
     * @return retorna um numero inteiro resultante da soma do ultimo id + 1
     */
    private function returnIdForInsertion(){

        $query = 'SELECT MAX(id) as id FROM usuario';

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();

        return ($row['id'] + 1);
    }




    /**
     *   lista todos os usuários
     */
    public function usuarioFindAll(){

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


        $query = 'SELECT * FROM usuario';
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        // recebe todas as linhas da consulta
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // retorna arquivo Json encodificado para UTF-8
        echo json_encode($users,JSON_UNESCAPED_UNICODE);
    }





    /**
     * @param $user Recebe como parametro um objeto do tipo usuario para GRAVAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */

    public function usuarioSave(Usuario $user){

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");

        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $id = $this->returnIdForInsertion();

                if ($id != null and !empty($id)) {

                    $sql = "INSERT INTO usuario(id, senha, nome, email) VALUES (:_id,md5(:_senha),:_nome,:_email)";

                    $stmt = $this->con->prepare($sql);

                    try {
                        $this->con->beginTransaction();

                        $stmt->execute(array(
                            ':_id' => $id,
                            ':_nome' => $user->getNome(),
                            ':_email' => $user->getEmail(),
                            ':_senha' => $user->getSenha()
                        ));
                        $this->con->commit();

                        return true;

                    }catch (PDOException $e){
                        $this->con->rollback();
                        echo 'Error: ' . $e->getMessage();
                    }

                }
            }
        catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }




    /**
     * @param $user Recebe como parametro um objeto do tipo usuario pra ATUALIZAR no banco de dados
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioUpdate($user){

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


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

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


        $query = "SELECT * FROM usuario ";
        $query .= "WHERE id= ";
        $query .= ":id";

        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo (json_encode($result,  JSON_UNESCAPED_UNICODE));
    }




    /**
     * @param $email
     * @return mixed
     */
    public function usuarioFindByEmail($email){

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


        $query  = "SELECT * FROM usuario ";
        $query .= "WHERE email = ";
        $query .= ":param";

        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":param", $email);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo(json_encode($result));
    }






    /**
     * @param $id recebe como parametro um id para REMOVER no banco de dados um usuario
     * @return bool retorna boleano se a operação foi bem sucedida
     */
    public function usuarioDelete($id){
        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


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