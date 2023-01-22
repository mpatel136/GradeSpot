<?php
class DefaultController extends Controller{
	public function index(){
		$account = null;
		if(isset($_SESSION['account_id'])) {
			$account = $this->model('Account')->find($_SESSION['account_id']);
		}
		$this->view('Default/index', ['account'=>$account]);
	}

}
?>
