<?php

class Database
{
    private $con;

    function __construct()
    {
        $this->con = $this->connect();
    }

    private function connect()
    {
        require_once("config.php");

        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $connection = new PDO($string, DBUSER, DBPASS);
            return $connection;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
        return false;
    }

    //write
    public function write($query, $data_array = [])
    {
        $con=$this->connect();
        $statement = $this->con->prepare($query);
        $check=$statement->execute($data_array);

        

        if ($check) {
            return true;
        }
        return false;
    }

    //read
    public function read($query, $data_array = [])
    {
        $con=$this->connect();
        $statement = $this->con->prepare($query);
        $check=$statement->execute($data_array);

        

        if ($check) {
            $result=$statement->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result)&& count($result)>0) {
                return $result;
            }
            return true;
        }
        return false;
    }


    public function get_user($userid)
    {
        $con=$this->connect();
        $arr['userid']=$userid;
        $query="select * from users where userid=:userid limit 1";
        $statement = $con->prepare($query);
        $check = $statement->execute($arr);

        

        if ($check) {
            $result=$statement->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)>0) {
                return $result[0];
            }
            return false;
        }
        return false;
    }


    public function generate_id($max)
    {
        $rand = "";
        $rand_count = rand(4, $max);
        for ($i = 0; $i < $rand_count; $i++) {
            $r = rand(0, 9);
            $rand .= $r;
        }
        return $rand;
    }
}
?>