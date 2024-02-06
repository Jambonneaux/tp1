<?php 


class CRUD extends PDO{

    public function __construct(){

        parent::__construct('mysql:host=localhost; dbname=meatmarket; port=3306; charset=utf8', 'root', '');
      
    }


    //Select All

    public function select($table, $pkey = 'id', $order = 'asc'){

        $sql = "SELECT * FROM $table ORDER BY $pkey $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();

    }

    // SelectId

    public function selectId($table, $value, $url, $pkey = 'id'){

        $sql = "SELECT * FROM $table WHERE id = :$pkey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$pkey", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        }else{
            header("location:$url.php");
        }

    }


    //Insert

    public function insert($table, $data){

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";

        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->lastInsertId();

        }else{
            print_r($stmt->errorInfo());

        }
    }


    //Update

    //$data si plusieurs valeurs
    
    public function update($table, $data, $pkey = 'id'){

        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $pkey = :$pkey;";
        
        $stmt = $this->prepare($sql);
        foreach( $data as $key => $value ){
            $stmt->bindValue(":$key", $value);

        }
        $stmt->execute();

        $count = $stmt->rowCount();

        if( $count == 1 ){
            //Pour revenir à la page précédente
            header("location:" . $_SERVER['HTTP_REFERER']);

        }else{
            print_r($stmt->errorInfo());

        }

        
        return $sql;
    }


    //Delete

    //$value si valeur unique

    public function delete($table, $value, $url, $pkey = 'id'){


        $sql = "DELETE FROM $table WHERE $pkey = :$pkey";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$pkey", $value);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count == 1){

            header("location:$url.php");

        }else{

            print_r($stmt->errorInfo()); 
    
        }

        return $sql;
    }


}







?>