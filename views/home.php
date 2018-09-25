<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 25/09/18
 * Time: 19:23
 */
include_once "../model/Usuario.php";
include_once "../repositories/UsuarioDao.php";
include_once "../repositories/SolicitacaoDao.php";
include_once "../conexao/Conexao.php";


    if(isset($_POST['usrName']) && isset($_POST['password'])){

        $username = $_POST['usrName'];

        $con = new Conexao();
        $usuarioDao = new UsuarioDao($con->getConexao($con));

      //  $result = $usuarioDao->usuarioFindByEmail($username);

        if($result){
         //   header("location:login.php");
        }else{
          //  echo $result['email'];
        }

    }else{
        header("location:login.php");
    }

?>


<html>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<link rel="stylesheet" href="./css/home.css">



<nav>
    <div class="nav-wrapper grey darken-4">
        <a href="#" class="brand-logo">Olhar Cidadão</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
</nav>


<div class="col s12">
    <div class="">
        <div class="center">
            <h5 class="title grey-text">Minhas Solicitações</h5>
            <div>
               <!-- --><?php
/*
                    if(isset($_POST['dados'])){

                        foreach (array_expression as $value){
                            echo '<label></label> <label></label> <label></label>';
                        }
                    }

                */?>
            </div>
        </div>
    </div>
</div>



<div class="col s12 content-margin">
    <div class="row">
        <div class="col s6">
            <h5 class="title grey-text">Nova Solicitação</h5>
            <div class="card">
                <form action="#" method="post">
                    <div class="input">
                        <label for="userid">Código</label>
                        <input type="text" name="userid" id="userid">
                    </div>
                    <div class="input">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" id="tipo">
                    </div>
                    <div class="input">
                        <label for="desc">Comentário</label>
                        <input type="text" name="com" id="com">
                    </div>
                    <div class="input">
                        <label for="lat">Latitude</label>
                        <input type="text" name="lat" id="lat">
                    </div>
                    <div class="input">
                        <label for="lng">Longitude</label>
                        <input type="text" name="lng" id="lng">
                    </div>
                    <div class="input">
                        <div class="col s12 forms-buttons">
                            <input type="reset" value="LIMPAR" class="btn orange">
                            <input type="submit" value="ENVIAR" class="btn green">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s6">
            <div class="">
                <div class="center">
                    <h5 class="title grey-text">Minhas Solicitações</h5>
                    <div>
                        <?php

                            if(isset($_POST['dados'])){

                                foreach (array_expression as $value){
                                    echo '<label></label> <label></label> <label></label>';
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</html>

