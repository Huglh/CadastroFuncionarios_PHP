<?php
header("Content-type:text/html; charset=utf8");
require_once "Conexao.php";
class funcionarios{
    public function listarTodos()
    {

        try {

            //criar uma instancia da classe de conexao
            $bd = new Conexao();
            //criar uma variavel para receber o comando select
            $lista = $bd->executeSelect("select * from funcionarios");
            //retornar os dados para tela
            return $lista;
        } catch (PDOException $msg) {
            echo "Não foi possível listar os dados dos Funcionarios: " . $msg->getMessage();
        }
    }
}
$funcionarios = new funcionarios();
$listarFuncionarios = $funcionarios->listarTodos();
?>
<html>
<body style="text-align: center;background-color: rebeccapurple">



        <table style="
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                border-radius: 5%;
                border-color: whitesmoke;
                border-style: double;
                background: transparent;
                display: inline-block;
                padding: 1%;
                color:white;"
        <tr>
            <th></th>
            <th>Tabela de Funcionarios</th>
            <th></th>
            <th> <button style="margin: 10px; background: transparent"><a style="text-align: right;color: white;text-decoration: none" href="Cadastrar.php">Cadastrar</a></button></th>
        </tr>
            <tr>
                <th>Numero</th>
                <th>Nome</th>
                <th>idade</th>
                <th>sexo</th>
                <th>Função</th>
                <th></th>
            </tr>
           <?php foreach ($listarFuncionarios as $funcionarios){?>
                <tr>
                    <td><?php echo $funcionarios->numero;?></td>
                    <td><?php echo $funcionarios->nome;?></td>
                    <td><?php echo $funcionarios->idade;?></td>
                    <td><?php echo $funcionarios->sexo;?></td>
                    <td><?php echo $funcionarios->funcao;?></td>
                </tr>
            <?php }?>

        </table>
</body>
</html>
