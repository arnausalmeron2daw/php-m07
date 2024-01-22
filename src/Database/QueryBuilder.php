<?php

namespace App\Database;
use App\Registry;
class QueryBuilder{
    private $selectables=[];
    private $table;
    private $whereClause;
    private $limit;
    protected $pdo;

    function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    function selectAll($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function select(){
        $this->selectables=func_get_args();
        return $this;
    }

    function selectWhereEmail($table,$email){
        try{
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE email = :email");
            $statement->bindParam(':email',$email);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_CLASS);
        }catch(\PDOException $ex){
            echo "Error: Usuario no encontrado";
        }
    }


    function selectWhereId($table,$id){
        try{
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE user_id = :id");
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_CLASS);
        }catch(\PDOException $ex){
            echo "Error: Usuario no encontrado";
        }
    }

    function selectUserId($table,$id){
        try{
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_CLASS);
        }catch(\PDOException $ex){
            echo "Error: Usuario no encontrado";
        }
    }


    function adduser(string $user,string $email,string $password){
        try{
            $statement = $this->pdo->prepare("INSERT INTO user (name,email,password,role)
            VALUES (:name,:email,:password,3)");
            $statement->bindParam(':name',$user);
            $statement->bindParam(':email',$email);
            $statement->bindParam(':password',$password);
            $statement->execute();

        }catch(\PDOException $ex){
            echo "Error al crear el usuario";
        }
        try{
            $user= Registry::get('database')->selectWhereEmail('user',$email);
            $userId=$user[0]->id;          
            $statement = $this->pdo->prepare("INSERT INTO reader (id_user) VALUES ('$userId')");
            $statement->execute();
        }catch(\PDOException $ex){
            echo "Error al crear el usuario";
        }
       
    }

    function update($table,$array,$session){

        try{
            $cont=0;
            $statement = "UPDATE {$table} SET ";
            foreach($array as $a=>$valor){
                $statement .= "$a='$valor'";
                if(count($array)-1>$cont){
                    $statement .= ", ";
                }

                $cont++;
            }
         
            $statement .= " WHERE id='$session'";

            $sql = $this->pdo->prepare($statement);
            
            $sql->execute();

        }catch(\PDOException $ex){
            echo "Error al crear el usuario";
        }


    }

    function addsubs(int $user_id,string $startdate,string $enddate){
        try{
            $statement = $this->pdo->prepare("INSERT INTO subscription (user_id,start_date,end_date,is_active)
            VALUES (:user_id,:start_date,:end_date,1)");
            $statement->bindParam(':user_id',$user_id);
            $statement->bindParam(':start_date',$startdate);
            $statement->bindParam(':end_date',$enddate);
            $statement->execute();

        }catch(\PDOException $ex){
            echo "Error al crear el usuario";
        }    
    }

}