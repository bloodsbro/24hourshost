<?php

class loginfooterController extends Controller {
	public function index() {
		return $this->load->view('common/loginfooter', $this->data);
	}
}
?>
