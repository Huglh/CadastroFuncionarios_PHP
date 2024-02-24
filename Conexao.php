<?php
// class é uma estrutura de um objeto contendo atributos e metodos(alunos)
// atributos -> as caracterisitcas do objeto (nome,sexo)
// metodos -> as acçôes do objeto(inserir/alterar)
class Conexao
{
    //atributos
    //para conectar com o banco de dados precisamos de 4 atributos
    //(servidor/banco/usuario/senha)
    //visibilidade -> private (somente a classe tem acesso)/ public (todos tem acesso)
    private $server = "localhost";
    private $bd="Trimestral3";
    private $User="root";
    private $passowrd="";
    private $conn=""; // variavel para receber a conexao do banco de dados
    //metodos
    public function __construct()//executar toda vez que instanciar a classe
    {
        try {
            //tratamento de erros de exacucao de codigo
            //criar a conexao com o banco de dados utilizando a classe PDO
            //this -> significa a classe
            //new -> criar uma instancia da classe -> criar um objeto do tipo PDO
            $this->conn = new PDO("mysql:host={$this->server};dbname={$this->bd};charset=utf8;",$this->User,$this->passowrd);

        }catch (PDOException $msg){// se der errado a execucao vamos exibir uma mensagem de erro para o usuario
            echo "Não foi possivel conectar ao servidor: ".$msg->getMessage();
        }
    }
    // metodo para executar comandos(insert / update /delete)
    public function executeQuery($comando){

        try {
            //variavel para receber o comando sql
            $sql = $this->conn->prepare($comando);
            //executar o comando no servidor
            $sql->execute();
            //testar se o comando retornou alguma linha
            if ($sql->rowCount() > 0) {
                return '1';
            } else {
                return $sql->errorInfo();
            }
        }catch (PDOException $msg){
            echo "Não foi possivel executar o comando: ".$msg->getMessage();
        }
    }
    // metodo para executar select
    public function executeSelect($comando){
        try {
            //criar uma varivel para receber um comando select
            $sql= $this->conn->prepare($comando);
            //executar o comando
            $sql->execute();
            //testar se o comando retornou alguma linha
            if ($sql->rowCount() > 0){
                //retornar o resultado do select para a tela
                //fetchAll -> retorna todos os dados do select
                //fetch_class-> retorna os dados no formato Linha/coluna (Classe) alunos -> NOME
                //fetch_assoc> retorna os dados no formato Linha/coluna (Vetor) alunos["NOME"]
                return $sql->fetchAll(PDO::FETCH_CLASS);

            }else{
                return $sql->errorInfo();
            }
        }catch (PDOException $msg){
            echo "Não foi possivel executar o comando Select: ".$msg->getMessage();
        }
    }
}
?>