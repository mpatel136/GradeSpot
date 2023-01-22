<?php
class Subject extends Model{

    public $subject_id;
    public $subject_number;


    public function __construct()
    {   
        parent::__construct();
    }


    public function getSubjectId($subject_number){
        $stmt = self::$_connection->prepare("SELECT subject_id FROM subject WHERE subject_number = :subject_number");
        $stmt->execute(['subject_number'=>$subject_number]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subject');
        return $stmt->fetch();
    }

    public function getSubjectName($subject_id){
        $stmt = self::$_connection->prepare("SELECT subject_number FROM subject WHERE subject_id = :subject_id");
        $stmt->execute(['subject_id'=>$subject_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Subject');
        return $stmt->fetch();
    }


}