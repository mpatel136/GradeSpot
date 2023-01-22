<?php
class Room extends Model{

    public $room_no;
	public $status;


    public function __construct()
    {   
        parent::__construct();
    }

    public function find($room_number){
        $stmt = self::$_connection->prepare("SELECT * FROM room WHERE room_number = :room_number");
        $stmt->execute(['room_number'=>$room_number]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Room');
        return $stmt->fetch();
    }

    public function findById($room_id){
        $stmt = self::$_connection->prepare("SELECT * FROM room WHERE room_id = :room_id");
        $stmt->execute(['room_id'=>$room_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Room');
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

    public function updateStatus(){
        $stmt = self::$_connection->prepare("UPDATE room SET status = :status WHERE room_id = :room_id");
        $stmt->execute(['status'=>$this->status, 
                        'room_id'=>$this->room_id]);
    }


}
