<?php
require_once "Conexao.php";


class Funcionarios
{
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