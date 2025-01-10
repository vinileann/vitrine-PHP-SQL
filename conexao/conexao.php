<?php
    // passo 1
    $servidor = "COLOQUE O NOME DO SERVIDOR AQUI"; //geralmente localhost
    $usuario = "COLOQUE SEU USUARIO AQUI"; //por padrao no seu muitas vezes é root
    $senha = "COLOQUE A SENHA AQUI";
    $banco = "andes"; //nome do bd, no nosso caso ja deixei um pronto e chama andes
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco); //elemento de abrir a conexao com o bd

    //passo 2
    if ( mysqli_connect_errno() ) {
        die("Conexão falhou: " . mysqli_connect_errno() );
    }
?>