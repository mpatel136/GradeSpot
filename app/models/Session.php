<?php
class Session extends Model{

    public $session_id;
    public $university_id;
    public $program_id;
    public $subject_id;
    public $is_private;
    public $is_in_person;
    public $room_id;
    public $date;
    public $participant_count;
    public $status;
    public $is_official;


    public function __construct()
    {   
        parent::__construct();
    }

    public function insert(){
        $stmt = self::$_connection->prepare("INSERT INTO session(session_token, university_id, program_id, subject_id, is_private, is_in_person, participant_count, room_id) 
                                            VALUES(:session_token, :university_id, :program_id, :subject_id, :is_private, :is_in_person, :participant_count, :room_id)");
        $stmt->execute(['university_id'=>$this->university_id,
                        'session_token'=>$this->session_token,
                        'program_id'=>$this->program_id,
                        'subject_id'=>$this->subject_id,
                        'is_private'=>$this->is_private,
                        'is_in_person'=>$this->is_in_person,
                        'participant_count'=>$this->participant_count,
                        'room_id'=>$this->room_id]);
        $id = self::$_connection->lastInsertId();
        return $id;
    }

    public function insertForUniversity(){
        $stmt = self::$_connection->prepare("INSERT INTO session(session_token, university_id, is_official, room_id) 
                                            VALUES(:session_token, :university_id, :is_official, :room_id)");
        $stmt->execute(['university_id'=>$this->university_id,
                        'session_token'=>$this->session_token,
                        'room_id'=>$this->room_id,
                        'is_official'=>$this->is_official]);
        $_SESSION['register_room_session_id'] = self::$_connection->lastInsertId();
    }

    public function getAllSessionByProgramId($program_id){
        $stmt = self::$_connection->prepare("SELECT * FROM session WHERE program_id = :program_id");
        $stmt->execute(['program_id'=>$program_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Session');
		return $stmt->fetchAll();
    }

    public function getBySessionToken($session_token){
        $stmt = self::$_connection->prepare("SELECT * FROM session WHERE session_token = :session_token");
        $stmt->execute(['session_token'=>$session_token]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Session');
		return $stmt->fetch();
    }

    public function increaseParticipant() {
        $stmt = self::$_connection->prepare("UPDATE session SET participant_count = :participant_count WHERE session_id = :session_id");
        $stmt->execute(['participant_count'=>$this->participant_count, 
                        'session_id'=>$this->session_id]);
    }

    public function updateProgramAndSubject() {
        $stmt = self::$_connection->prepare("UPDATE session SET program_id = :program_id, subject_id = :subject_id WHERE session_id = :session_id");
        $stmt->execute(['program_id'=>$this->program_id, 
                        'subject_id'=>$this->subject_id, 
                        'session_id'=>$this->session_id]);
    }



}