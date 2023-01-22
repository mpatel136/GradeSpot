<?php
class Program extends Model{

    public $program_id;
    public $program_name;


    public function __construct()
    {   
        parent::__construct();
    }


    public function getProgramId($program_name){
        $stmt = self::$_connection->prepare("SELECT program_id FROM program WHERE program_name = :program_name");
        $stmt->execute(['program_name'=>$program_name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Program');
        return $stmt->fetch();
    }


}