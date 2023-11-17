<?php

class indexController extends Controller {
	public function index() {
		$this->data['result'] = $this->request->get['result'];
        $this->data['public'] = $this->config->public;
		
		return $this->load->view('offline/index', $this->data);
	}
}
?>