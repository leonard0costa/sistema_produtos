<?php
    //conecta ao banco e busca informações específicas
    include("conexao.php");
    $produto = selectProdutoEspecifico($_POST["idprod"]);
?>

<meta charset="UTF-8">
<div>
    
    <center><form name="dadosProduto" action="conexao.php" method="post">
        <!-- view para edição de produtos -->
        <h2 style="font-family: Papyrus;">EDITAR INFORMAÇÕES DE PRODUTO</h1>
        <div style="background-color: #e6e6e6;">
            
        <input type="hidden" name="idprod" value="<?=$produto["idprod"]?>">

            <label style="font-family: Papyrus; ">Nome:</label>
            <input type="text" name="nome" value="<?=$produto["nome"]?>">
            
            <label style="font-family: Papyrus;" >Preço:</label>
            <input type="text" name="preco" id="preco" 
            value="<?=$produto["preco"]?>">
            <?php if($produto["cor"]=='4') { ?>
                <label style="font-family: Papyrus;">Cor:</label>
                <select name="cor" id="cor" value="<?=$produto["cor"]?>">
                    <option value="4" <?php echo $produto["cor"]=='4'?'selected':'';?> >CADASTRAR SEM COR</option>
                    <option value="1"  <?php echo $produto["cor"]=='1'?'selected':'';?> >AZUL</option>
                    <option value="2"  <?php echo $produto["cor"]=='2'?'selected':'';?> >AMARELO</option>
                    <option value="3" <?php echo $produto["cor"]=='3'?'selected':'';?> >VERMELHO</option>
                </select>
            <?php } else {?> 
                <input type="hidden" name="cor" value="<?=$produto["cor"]?>">
      
            <?php } ?> 

            <input type="hidden" name="acao" value="alterar">
            
            <input type="submit" name="Enviar" value="EDITAR PRODUTO">
        
        </div> 
    </form></center>
</div>    

