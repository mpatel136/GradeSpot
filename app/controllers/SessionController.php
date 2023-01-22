<?php
require_once 'phpqrcode/qrlib.php';

class SessionController extends Controller{
	public function index($session_token = null) {
        
        if($session_token == null) {
            echo 'do not allow to join a session';
        }
        else {
            $session_obj = $this->model('Session')->getBySessionToken($session_token);
            // echo "current ongoing session is: " . $session_id;
            if(isset($_POST['exit_chat'])) {
                $_SESSION['exit_chat'] = true;
                $session_obj->participant_count--;
                $session_obj->increaseParticipant();

                header('location:/');
            }
            $this->view('Session/in_session', ['session_obj'=>$session_obj]);
        }
	}

    public function create() {
        
        if(isset($_SESSION['account_id'])) {
            return header('location:/session/register');
        }

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

            $room_id = 2;
            //$date = $_POST['date'];
            // $participant_count = $_POST['participant_count'];
            // $status = $_POST['status'];
            // $is_official = $_POST['is_official'];

            // create session model
            $session_token = $this->getToken(20);
            $session = $this->model('Session');
            $session->session_token = $session_token;
            $session->university_id = $university_id;
            $session->program_id = $program_id;
            $session->subject_id = $subject_id;
            $session->is_private = $is_private;
            $session->room_id = $room_id;
            $session->is_in_person = $is_in_person;
            //$session->date = $date;
            $session->participant_count = 1;
            // $session->status = $status;
            // $session->is_official = $is_official;

            $session->insert();

            //TODO: GO TO JOIN???
            return header('location:/session/index/' . $session_token);

        }

    }

    public function register() {
        $room_obj = null;

        if(isset($_POST['register_room'])) {
            // uni id
            $university_id = $this->model('Account')->getUniversityId($_SESSION['account_id'])->university_id;

            // create session for that room
            $session_token = $this->getToken(20);
            $session = $this->model('Session');
            $session->session_token = $session_token;
            $session->university_id = $university_id;
            $session->room_id = $_SESSION['room_id_reg'];
            $session->is_official = 1;
            
            $session->insertForUniversity();

            // generate qr code for this session
            $url = "/session/index/" . $session_token;

            // set QR code error correction level
            $errorCorrectionLevel = 'L';
        
            // set QR code size
            $matrixPointSize = 4;

            $upOne = dirname(__DIR__, 2);
            
            // generate QR code
            QRcode::png($url, "$upOne/images/qr_codes/$session_token.png", $errorCorrectionLevel, $matrixPointSize, 2);

            $last_inserted_session_id = $_SESSION['register_room_session_id'];
            $qr_code_obj = $this->model('QRCodeModel');
            $qr_code_obj->qr_code_name = $session_token;
            $qr_code_obj->session_id = $last_inserted_session_id;
            $qr_code_obj->insert();


            // Change room's status to already assigned
            $room_obj = $this->model('Room')->findById($_SESSION['room_id_reg']);
            $room_obj->status = 1;
            $room_obj->updateStatus();

            // Pass the room info to the view
            $this->view('Session/register', ['room_obj'=>$room_obj, 'qr_code'=>$session_token . '.png']);
        }
        else if(!isset($_POST['search_room'])) {
            $this->view('Session/register');
        }
        else {
            $room_no = $_POST['room_no'];
            
            $room_obj = $this->model('Room')->find($room_no);
            if($room_obj != null) {
                $_SESSION['room_id_reg'] = $room_obj->room_id;
                
                $this->view('Session/register', ['room_obj'=>$room_obj]);
            }
            else {
                $this->view('Session/register', ['error'=>'Can not find the room you entered.', 'room_number'=>$room_no]);
            }
        }
    }

    public function search() {
        
        // if(isset($_SESSION["result"])) {
        //     echo "lsdjfsd";
        //     echo $_SESSION['result'];
        //     $this->view('Session/search');
        // }
        // else 
        if(!isset($_POST['search_session'])) {
            $this->view('Session/search');
        }
        else{
            
            $program_name = $_POST['search_input'];
            
            // var_dump($session_data);

            // create session model
            $program = $this->model('Program')->getProgramId($program_name);
            // $program->program_name = $session_data;

            // Search session table
            $session_obj = $this->model('Session')->getAllSessionByProgramId($program->program_id);

            $_SESSION["result"] = $session_obj;
            //var_dump($_SESSION["result"]);

            $this->view('Session/search');
            $this->view('Session/results', ['result'=>$session_obj]);

            
            // $this->view('Session/results');
            
        }
    }

    public function results(){
        echo $_SESSION["result"];
    }

    public function join($session_token) {
        $session_obj = $this->model('Session')->getBySessionToken($session_token);

        if(!isset($_POST['join_session'])) {
            $this->view('Session/join', ['session'=>$session_obj]);
        }
        else {
            $program = filter_input(INPUT_POST, 'program', FILTER_SANITIZE_STRING);
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
            
            if($program != null && $subject != null) {
                $session_obj->program_id = $program;
                $session_obj->subject_id = $subject;
                $session_obj->updateProgramAndSubject();
            }
            
            // incrase the participant count in session table
            $session_obj->participant_count++;
            $session_obj->increaseParticipant();

            header('location:/session/index/' . $session_token);

        }
    }


}

?>