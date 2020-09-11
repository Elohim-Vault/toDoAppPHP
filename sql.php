<?php

class Sql{

    private $conn;

    function __construct(){
        $this->conn = new PDO('mysql:host=localhost;dbname=dao', "root" , "");
    }


    public function setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }

    public function setParams($statement, $params = array()){
        foreach($params as $key => $value){
            $this->setParam($statement, $key, $value);
        }
    }

    public function query($rawQuery, $params = array()){
        $statement = $this->conn->prepare($rawQuery);
        $this->setParams($statement, $params);
        $statement->execute();
        return $statement;
    }

    public function select($rawQuery, $params = array()){
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
