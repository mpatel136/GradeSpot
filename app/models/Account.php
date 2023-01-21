<?php
class Account extends Model{

    public $first_name;
	public $last_name;
    public $university_id;


    public function __construct()
    {   
        parent::__construct();
    }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO account(first_name, last_name, university_id) VALUES(:first_name, :last_name, :university_id)");
        $stmt->execute(['first_name'=>$this->first_name,
                        'last_name'=>$this->last_name,
                        'university_id'=>$this->university_id]);
    }


}
