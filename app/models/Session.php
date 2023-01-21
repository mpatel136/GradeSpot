<?php
class Session extends Model{

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
        $stmt = self::$_connection->prepare("INSERT INTO session(university_id, program_id, subject_id, is_private, is_in_person, room_id) VALUES(:university_id, :program_id, :subject_id, :is_private, :is_in_person, :room_id)");
        $stmt->execute(['university_id'=>$this->university_id,
                        'program_id'=>$this->program_id,
                        'subject_id'=>$this->subject_id,
                        'is_private'=>$this->is_private,
                        'is_in_person'=>$this->is_in_person,
                        'room_id'=>$this->room_id]);
    }


}