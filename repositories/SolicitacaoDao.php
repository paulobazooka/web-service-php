<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:55
 */

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


    public function solicitacaoSave($solicitacao){
        $query  = "INSERT INTO solicitacao (data, latitude, longitude, tipo, comentario, foisolucionado) values ";
        $query .= "(".$solicitacao->getDatasolicitacao(). ", ";
        $query .= $solicitacao->getLatitude(). ", ";
        $query .= $solicitacao->getLongitude(). ", ";
        $query .= $solicitacao->getTipo(). ", ";
        $query .= $solicitacao->getComentario(). ", ";
        $query .= $solicitacao->getSolucionado(). ")";

        return $this->con->executeQuery($query);
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
}