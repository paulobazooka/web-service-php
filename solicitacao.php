<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:53
 */

include_once "model/Solicitacao.php";
include_once "conexao/Conexao.php";
include_once "repositories/SolicitacaoDao.php";


header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, must-revalidate');
header("Content-Type: text/plain; charset=UTF-8");

if(isset($_GET['id'])){
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    return $solicitacaoDao->solicitacaoFindAllByUserId($_GET['id']);
}


if(file_get_contents("php://input")){

    header("HTTP/1.1 200 OK");

    $dados = file_get_contents("php://input");
    $sol = json_decode($dados);

    date_default_timezone_set('America/Sao_Paulo');
    $dat = date('Y-m-d H:i');

    $solicitacao = new Solicitacao($dat, $sol->latitude, $sol->longitude, $sol->tipo, $sol->comentario, $sol->foisolucionado, $sol->usuarioid);

    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    $result = $solicitacaoDao->solicitacaoSave($solicitacao);

    if($result){
        echo $result;
    }else{
        echo false;
    }
}


if(isset($_PUT["*"])){
    echo "PUT Solicitação <br>";
}


if(isset($_PATCH["id"])){
    echo "PATCH Solictação <br>";
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    return $solicitacaoDao->solicitacaoComplete($_DELETE['id']);   
}


if(isset($_DELETE["id"])){
    echo "DELETE Solictação <br>";
    $con = new Conexao();
    $solicitacaoDao = new SolicitacaoDao($con->getConexao());

    return $solicitacaoDao->removeSolicitacao($_DELETE['id']);   
}

?>
