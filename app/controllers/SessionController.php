<?php
class SessionController extends Controller{
	public function index($session_id = null) {
        
        if($session_id == null) {
            echo 'do not allow to join a session';
        }
        else {
            // echo "current ongoing session is: " . $session_id;
            $this->view('Session/in_session');
        }
	}

    public function prepare_session() {
        $name = "Miraj";
        $_SESSION['current_user_name_in_chat'] = $name;
        header('location:/session/index/3lkj3lkj3');
    }

    public function create() {
        
        if(!isset($_POST['create_session'])) {
            $this->view('Session/create');
        }
        else{
            $university_id = $_POST['university_id'];
            $program_id = $_POST['program_id'];
            $subject_id = $_POST['subject_id'];
            
            $is_private = 0;
            if(isset($_POST['is_private'])) {
                $is_private = 1;
            }
            

            $is_in_person = 0;
            if(isset($_POST['is_in_person'])) {
                $is_in_person = 1;
            }

            $room_id = 69;
            //$date = $_POST['date'];
            // $participant_count = $_POST['participant_count'];
            // $status = $_POST['status'];
            // $is_official = $_POST['is_official'];

            // create session model
            $session = $this->model('Session');
            $session->university_id = $university_id;
            $session->program_id = $program_id;
            $session->subject_id = $subject_id;
            $session->is_private = $is_private;
            $session->room_id = $room_id;
            $session->is_in_person = $is_in_person;
            //$session->date = $date;
            // $session->participant_count = $participant_count;
            // $session->status = $status;
            // $session->is_official = $is_official;

            $session->insert();

            //TODO: GO TO JOIN???
            return header('location:/');

        }

    }

    public function search() {
        echo "searching session";
    }

    public function join() {
        $this->view('Session/join');
    }


}

?>