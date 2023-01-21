<?php
class Account extends Model{

    public $first_name;
	public $last_name;
    public $university_id;
    public $email;
    public $password;


    public function __construct()
    {   
        parent::__construct();
    }

    public function find($email){
        $stmt = self::$_connection->prepare("SELECT * FROM account WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Account');
        return $stmt->fetch();
    }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO account(first_name, last_name, university_id, email, password) VALUES(:first_name, :last_name, :university_id, :email, :password)");
        $stmt->execute(['first_name'=>$this->first_name,
                        'last_name'=>$this->last_name,
                        'university_id'=>$this->university_id,
                        'email'=>$this->email,
                        'password'=>$this->password]);
    }


}
