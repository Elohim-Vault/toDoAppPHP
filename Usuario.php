<?php

require "config.php";
class Usuario{

    private $id;
    private $login;
    private $senha;
    private $funcao;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    
    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    function __construct($login = "", $senha = "", $funcao = ""){
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setFuncao($funcao);
    }

    public function __toString(){
        return json_encode(array(
            "Id"=>$this->getId(),
            "Login"=>$this->getLogin(),
            "Senha"=>$this->getSenha(),
            "Funcao"=>$this->getFuncao()
        ));
    }

    function setData($array){
        $this->setId($array['id']);
        $this->setLogin($array['login']);
        $this->setSenha($array['senha']);
        $this->setFuncao($array['funcao']);
    }

    public function loadById($id){
        $sql = new Sql;

        $resultado = $sql->select('SELECT * FROM tb_usuarios WHERE id = :ID', array(
            ":ID"=>$id
        ));
        if(count($resultado) > 0){
            $this->setData($resultado[0]);
        }
    }

    public function isEmpty($array){
        if(count($array) > 0){
            return true;
        }
        return false;
    }

    static function listFunc(){
        $sql = new Sql;
        $resultado = $sql->select("SELECT * FROM tb_usuarios");
        return $resultado;
    }

    public function insert(){
        $sql = new Sql;
        $sql->query("INSERT INTO tb_usuarios (login, senha, funcao) VALUES (:LOGIN, :SENHA, :FUNCAO)", array(
            ":LOGIN"=>$this->getLogin(),
            ":SENHA"=>$this->getSenha(),
            ":FUNCAO"=>$this->getFuncao()
        ));

        $resultado = $sql->select("SELECT * FROM tb_usuarios WHERE id = last_insert_id()");

        if(count($resultado) > 0){
            $this->setData($resultado[0]);
        }
    }

    public function update(){
        $sql = new Sql;
        $sql->query("UPDATE tb_usuarios SET login = :LOGIN, senha = :SENHA, funcao = :FUNCAO WHERE id = :ID", array(
            ":ID"=>$this->getId(),
            ":LOGIN"=>$this->getLogin(),
            ":SENHA"=>$this->getSenha(),
            ":FUNCAO"=>$this->getFuncao()
        ));
    }

    public function delete(){
        $sql = new Sql;
        $sql->query("DELETE FROM tb_usuarios WHERE id = :ID", array(
            ":ID"=>$this->getId()
        ));
    }


}
?>
