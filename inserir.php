<meta charset="UTF-8">
<div>
    <center><form name="dadosProduto" action="conexao.php" method="post">
        <!-- view para cadastro de produto -->
    <h2 style="font-family: Papyrus;">CADASTRO DE PRODUTOS</h1>
        <table style="background-color: #e6e6e6;">
            <tbody>
                <tr>
                    <td style="font-family: Papyrus; ">Nome:</td>
                    <td><input type="text" name="nome" value=""></td>
                </tr>
                <tr>
                    <td style="font-family: Papyrus;" >Preço:</td>
                    <td><input type="text" name="preco" id="preco" ></td>
                </tr>
                <tr>
                    <td style="font-family: Papyrus;">Cor:</td>
                    <td><select name="cor" id="cor">
                        <option value="4">CADASTRAR SEM COR</option>
                        <option value="1">AZUL</option>
                        <option value="2">AMARELO</option>
                        <option value="3">VERMELHO</option>
                        </select></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="acao" value="inserir"></td>
                    <td><input type="submit" name="Enviar" value="CADASTRAR PRODUTO"></td>
                </tr>
            </tbody>
        </table> 
    </form></center>
</div>    
