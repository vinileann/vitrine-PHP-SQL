<?php require_once("../../conexao/conexao.php"); ?>
<?php
    session_start();
    if ( !isset($_SESSION["user_portal"]) ) {
        header("location:login.php");
    }

    //testar parametro
    if( isset($_GET["codigo"]) ) {
        $produtoID= $_GET["codigo"];
    }
    else {
        Header("Location: listagem.php");
    }

    //consulta ao banco de dados
    $consulta = "SELECT * ";
    $consulta .= " FROM produtos ";
    $consulta .= " WHERE produtoID = {$produtoID} ";
    $detalhe = mysqli_query($conecta, $consulta);

    if( !$detalhe ) {
        die("Falha no banco de dados");
    }
    else { 
        $dados_detalhe = mysqli_fetch_assoc($detalhe);

        $produtoID      = $dados_detalhe["produtoID"];
        $nomeproduto    = $dados_detalhe["nomeproduto"];
        $descricao      = $dados_detalhe["descricao"];
        $codigobarra    = $dados_detalhe["codigobarra"];
        $tempoentrega   = $dados_detalhe["tempoentrega"];
        $precorevenda   = $dados_detalhe["precorevenda"];
        $precounitario  = $dados_detalhe["precounitario"];
        $estoque        = $dados_detalhe["estoque"];
        $imagemgrande   = $dados_detalhe["imagemgrande"];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vitrine by vinilean</title>
        
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem">
                        <img src="<?php echo $imagemgrande ?>">
                    </li>
                    <li><h2>
                        <?php echo $nomeproduto ?>
                    </h2></li>
                    <li>
                        <b>Descrição: </b>
                        <?php echo $descricao ?>
                    </li>
                    <li>
                        <b>Código de Barra: </b>
                        <?php echo $codigobarra ?>
                    </li>
                    <li>
                        <b>Tempo de Entrega: </b>
                        <?php echo $tempoentrega . " dias." ?>
                    </li>
                    <li>
                        <b>Preço Unitário: </b>
                        <?php echo real_format($precounitario) ?>
                    </li>
                    <li>
                        <b>Preço Revenda: </b>
                        <?php echo real_format($precorevenda) ?>
                    </li>
                    <li>
                        <b>Estoque: </b>
                        <?php echo $estoque ?>
                    </li>
                </ul>
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
