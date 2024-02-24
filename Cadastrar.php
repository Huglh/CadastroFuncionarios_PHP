<?php
header("Content-type:text/html; charset=utf8");

class funcionarios{
    public function inserir()
    {
        try {
            if (isset($_POST["salvar"])) {


               require_once "Conexao.php";
                //preencher os campos
                $this->numero = $_POST["numero"];
                $this->nome = $_POST["nome"];
                $this->idade = $_POST["idade"];
                $this->sexo = $_POST["sexo"];
                $this->funcao = $_POST["funcao"];
                //criar instacia da classe de conexão
                $bd = new Conexao();
                //criar o comando update
                $comandoUpdate = "insert into funcionarios(numero,nome,idade,sexo,funcao)values({$this->numero},'{$this->nome}','{$this->idade}','{$this->sexo}','{$this->funcao}')";
                return $bd->executeQuery($comandoUpdate);
            }
        } catch (PDOException $msg) {

        }


    }
}
$funcionarios= new funcionarios();

if(isset($_POST["salvar"])){

    $result = $funcionarios->inserir();

    if($result == '1'){

        header('location: Listar.php');

    }
}
?>
<html>
    <body style="text-align: center;background-color: rebeccapurple">
        <form style="
                width: 200px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                border-radius: 10%;
                border-color: whitesmoke;
                border-style: double;
                background: transparent;
                display: inline-block;
                padding: 1%;
                color:white;"
         action="Cadastrar.php" method="post">
            <h1>Cadastro de Funcionarios</h1>
            <! – campo Numero –>
            <label for="numero">Numero:</label>
            <input type="text" name="numero">
            <br>
            <! – Campo nome –>
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <! – Campo Idade –>
            <label for="idade">Idade:</label>
            <input type="text" name="idade">
            <br>
            <! – campo Sexo –>
            <label for="sexo">Sexo</label><br>
            <select name="sexo" id="sexo" class="form-control" required>
                <option value="">Selecionar uma opção</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
                <option value="N">Não Declarar</option>
                <option value="O">Outro</option>
            </select>
            <br>
            <! – campo Funcao –>
            <label for="funcao">Função</label>
            <input type="text" name="funcao">
            <br>
            <! –  navegação –>

            <button style="
                        margin-top: 10px;
                        color: white;
                        background: transparent;
                        text-decoration: none;
             "
                    type="submit" name="salvar">Cadastrar</button>
            <button style="
                        color: white;
                        background: transparent;
                        text-decoration: none;
             "
                    type="reset">Limpar</button>
            <button style="
                        color: white;
                        background: transparent;
                        text-decoration: none;
             "><a style="
                        color: white;
                        background: transparent;
                        text-decoration: none;
             "
                  href="Listar.php">Voltar</a></button>

        </form>
    </body>
</html>

