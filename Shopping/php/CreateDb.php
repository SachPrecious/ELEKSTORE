<?php

class CreateDb
{
    public $survername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    public function __construct(
        $dbname ="elekstore",
        $tablename ="products",
        $servername ="localhost",
        $username ="root",
        $password =""


    )
    {

        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->survername=$servername;
        $this->username=$username;
        $this->password=$password;

        //create conection

        $this->con=mysqli_connect($servername,$username,$password);

        //check

        if(!$this->con)
        {
            die("Connection Failed:".mysqli_connect_error());

        }
        //query

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //execute

        if (mysqli_query($this->con,$sql)) {

            $this->con = mysqli_connect($servername,$username,$password,$dbname);

            //sql to create table

            $sql = "CREATE TABLE IF NOT EXISTS $tablename 
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_title VARCHAR(25) NOT NULL,
            product_price FLOAT,
            product_image VARCHAR(100)
            );";

                if (!mysqli_query($this->con,$sql)) {
                    
                    echo "Error Creating Table".mysqli_error($this->con);

                    
                }else{
                    return false;
                }

            }


    }

    public function getData()
{
    $sql ="SELECT * FROM $this->tablename" ;

    $result = mysqli_query($this->con,$sql);

    if (mysqli_num_rows($result)>0) {

        return $result;
        # code...
    }

}
    
}
    
?>





