<?php

class DBModel
{
    protected $host='localhost';
    protected $user='root';
    protected $password='';
    protected $database='edaxsystem';

	public $conn;	

	public function db(){
        $this->conn = new mysqli($this->host,$this->user,$this->password,$this->database,);
            if($this->conn->connect_error){
                die('Conexiunea nu s-a realizat. Eroare: '.$this->conn->connect_error);
            } 
			return $this->conn;
		} 
}