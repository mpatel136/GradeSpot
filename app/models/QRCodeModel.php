<?php
class QRCodeModel extends Model{

    public $session_id;
    public $qr_code_name;
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
	    $stmt = self::$_connection->prepare("INSERT INTO qr_code(qr_code_name, session_id, status) 
                                            VALUES(:qr_code_name, :session_id, :status)");
        $stmt->execute(['qr_code_name'=>$this->qr_code_name,
                        'session_id'=>$this->session_id,
                        'status'=>'1']);
    }

    public function updateStatus(){
        $stmt = self::$_connection->prepare("UPDATE room SET status = :status WHERE room_id = :room_id");
        $stmt->execute(['status'=>$this->status, 
                        'room_id'=>$this->room_id]);
    }


}
