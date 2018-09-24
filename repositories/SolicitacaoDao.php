<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:55
 */


include_once "../model/Solicitacao.php";
include_once "../conexao/Conexao.php";


class SolicitacaoDao
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

        $query = 'SELECT MAX(id) as id FROM solicitacao';

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();

        return ($row['id'] + 1);
    }


    public function solicitacaoSave(Solicitacao $solicitacao){

        header("Access-Control-Allow-Origin: *");
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Type: text/plain; charset=UTF-8");


        try {
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $id = $this->returnIdForInsertion();

            if ($id != null and !empty($id)) {

                $sql = "INSERT INTO solicitacao (id, datasolicitacao, latitude, longitude, tipo, comentario, foisolucionado, usuarioid) values (:_id, :_datasolicitacao, :_latitude, :_longitude, :_tipo, :_comentario, :_foisolucionado, :_usuarioid)";

                $stmt = $this->con->prepare($sql);

                try {
                    $this->con->beginTransaction();

                    $stmt->execute(array(
                        ':_id' => $id,
                        ':_datasolicitacao' => $solicitacao->getDatasolicitacao(),
                        ':_latitude' => $solicitacao->getLatitude(),
                        ':_longitude' => $solicitacao->getLongitude(),
                        ':_tipo'  => $solicitacao->getTipo(),
                        ':_comentario' => $solicitacao->getComentario(),
                        ':_foisolucionado'  => $solicitacao->getSolucionado(),
                        ':_usuarioid'  => $solicitacao->getUserId()
                    ));

                    $this->con->commit();

                    return true;

                }catch (PDOException $e){
                    $this->con->rollback();
                    echo 'Error: ' . $e->getMessage();
                }

            }else{
                return json_encode("Erro!","Não foi possiel inserir");
            }
        }
        catch (PDOException $e) {
            return json_encode("Erro!",$e);
        }

    }


    public function solicitacaoFindAllByUserId($id){
        $query  = "SELECT * FROM solicitacao ";
        $query .= "WHERE usuarioid = ". $id;

        $stmt = $this->con->prepare($query);
        $stmt->execute();

        // recebe todas as linhas da consulta
        $solicitacoes = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // retorna arquivo Json encodificado para UTF-8
        echo json_encode($solicitacoes,JSON_UNESCAPED_UNICODE);
    }

    public function solicitacaoComplete($id){
        $query = "UPDATE solicitacao ";
        $query .= "SET foisolucionado=1";
        $query .= "WHERE id=". $id; 

        return $this->con->executeQuery($query);
    }

    public function removeSolicitacao($id){
        $query = "DELETE FROM solicitacao ";
        $query .= "WHERE id=". $id;

        return $this->con->executeQuery($query);
    }
}
