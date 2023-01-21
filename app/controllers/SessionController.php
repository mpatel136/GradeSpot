<?php
class SessionController extends Controller{
	public function index($session_id = null) {
        
        if($session_id == null) {
            echo 'do not allow to join a session';
        }
        else {
            echo "current ongoing session is: " . $session_id;
        }
	}

    public function create() {
        echo 'creating new session';
    }

    public function search() {
        echo "searching session";
    }

    public function join() {
        $this->view('Session/join');
    }


}

?>