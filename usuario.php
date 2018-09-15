<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 30/08/18
 * Time: 10:40
 */

    include_once "model/Usuario.php";
    include_once "repositories/UsuarioDao.php";
    include_once "conexao/Conexao.php";


    if(isset($_GET['all'])){

        $con = new Conexao();
        $usuarioDao = new UsuarioDao($con->getConexao());

        return $usuarioDao->usuarioFindAll();
    }


    if(isset($_GET['email'])){

        $email = $_GET['email'];
        $con = new Conexao();
        $usuarioDao = new UsuarioDao($con->getConexao());

        return $usuarioDao->usuarioFindByEmail($email);
    }


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $con = new Conexao();
        $usuarioDao = new UsuarioDao($con->getConexao());

        return $usuarioDao->usuarioFind($id);
    }



if(isset($_POST)){

        unset($_POST);

        $entityBody = json_decode(file_get_contents('php://input'));

        if($entityBody != null and !empty($entityBody)) {

            $nome  = $entityBody->{"nome"};
            $email = $entityBody->{"email"};
            $senha = $entityBody->{"senha"};

            if(($nome != null and !empty($nome)) and ($email != null and !empty($email) and ($senha != null and !empty($senha)))){

                $user = new Usuario($nome, $email, $senha);

                $con = new Conexao();

                $usuarioDao = new UsuarioDao($con->getConexao());
                $result = $usuarioDao->usuarioSave($user);

                if($result){
                    echo $result;
                }else{
                    echo false;
                }
            }

        }



    }


    if(isset($_PUT["usuario"])){
        echo "PUT usuario <br>";
    }


    if(isset($_PATCH["usuario"])){
        echo "PATCH usuario <br>";
    }


    if(isset($_DELETE["usuario"])){
        echo "DELETE usuario <br>";
    }

?>