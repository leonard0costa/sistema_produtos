<!DOCTYPE html>
<!-- conecta ao banco e lista os produtos já cadastrados -->
<?php include("conexao.php");
    $listagemProdutos = selectProdutos();
?>
<!-- view de início -->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <style>
        input, button{
            background-color: #F8F8FF;
            border: none;
            color: white;
            text-decoration: none;
            cursor: pointer;
            color: black;
        }
    </style>
    <body >
        <center><div style="width: 100%; background-color: #2F4F4F; color: white;">
            <h1 style="font-family: Papyrus;">SISTEMA DE GESTÃO DE PRODUTOS</h1>

            <div class="text-center">
                <button type="button" class="btn btn-primary"><a href="inserir.php">Cadastrar novo produto</a></button>
            </div>
            <br>
        </div></center>
            <table style="background-color: #e6e6e6; width: 100%;" border="1" style="width: 100%;" class="table">
            <thead class="thead-light">
                <tr>
                    <th>CÓDIGO</th>
                    <th>DESCRIÇÃO</th>
                    <th>PREÇO</th>
                    <th>COR</th>
                    <th>DESCONTO (%)</th>
                    <th>VALOR FINAL</th>
                    <th colspan = 2>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($listagemProdutos as $produto) { 
                        $desconto = 0;
                        $valorFinal = $produto["preco"];
                        if($produto["cor"]==3){
                            if($produto["preco"]>50)
                            {
                                $desconto = 5;
                                $valorFinal = $valorFinal * 0.95;
                            }
                            else
                            {
                                $desconto = $produto["cor_desconto"]*100;
                                $valorFinal = $valorFinal * 0.80;
                            }
                        }
                        else if($produto["cor"]==1){
                            $desconto = $produto["cor_desconto"]*100;
                            $valorFinal = $valorFinal * 0.80;
                        } 
                        else if($produto["cor"]==2){
                            $desconto = $produto["cor_desconto"]*100;
                            $valorFinal = $valorFinal * 0.90;
                        } 
                    ?>
                    
                    <tr>
                        <th><?=$produto["idprod"]?></th>
                        <th><?=$produto["nome"]?></th>
                        <th>R$ <?=number_format($produto["preco"], 2, ',', '.');?></th>
                        <th><?=$produto["cor_descricao"]?></th>
                        <th><?=$desconto?></th>
                        <th>R$ <?=number_format( $valorFinal, 2, ',', '.');?></th>
                        <th>
                            <form name="editar" action="editar.php" method="post">
                                <input type="hidden" name="idprod" value="<?=$produto["idprod"]?>">
                                <input type="submit" name="editar" value="Editar">
                            </form>
                        </th>
                        <th>
                            <form name="excluir" action="conexao.php" method="post">
                                <input type="hidden" name="idprod" value="<?=$produto["idprod"]?>">
                                <input type="hidden" name="acao" value="excluir">
                                <input type="submit" name="excluir" value="Excluir">
                            </form>
                        </th>
                    </tr>   
                    <?php }
                ?>
            </tbody>
            </table>
    </body>
</html>
