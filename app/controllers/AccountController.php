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
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_pass = $_POST['confirm_password'];

            if($password == $confirm_pass) {
                // create account model
                $account = $this->model('Account');
                $account->first_name = $first_name;
                $account->last_name = $last_name;
                $account->university_id = $university_id;
                $account->email = $email;
                $account->password = password_hash($password, PASSWORD_DEFAULT);
    
                $account->insert();
    
                return header('location:/');
            }
            else {
                $this->view('Account/create', ['error'=>'Passwords do not match. Please try again.']);
            }

        }
    }

    public function login() {
        if(isset($_SESSION['account_id'])) {
            return header('location:/');
        }

        if(!isset($_POST['login'])) {
            $this->view('Account/login');
        }
        else {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // account model
            $account = $this->model('Account')->find($email);

            if($account == null) {
                $this->view('Account/login', ['error'=>'No account found. Please try again.']);
            }
            else {
                // verify pass
                if(password_verify($password, $account->password)) {
                    $_SESSION['account_id'] = $account->account_id;

                    return header('location:/');
                }
                else {
                    $this->view('Account/login', ['error'=>'Invalid username or password.']);
                }
            }
        }
    }

    public function signup() {

    }

    public function logout() {
        session_destroy();

		header('location:/');
    }

}
?>
