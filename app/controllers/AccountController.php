<?php
class AccountController extends Controller{
	public function index(){
		echo "account page";
	}

    public function create() {
        // echo "creating an account";
        if(!isset($_POST['create_user'])) {
            $this->view('Account/create');
        }
        else {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $university_id = $_POST['university_id'];

            // create account model
            $account = $this->model('Account');
            $account->first_name = $first_name;
            $account->last_name = $last_name;
            $account->university_id = $university_id;

            $account->insert();

            return header('location:/');
        }
    }

}
?>
