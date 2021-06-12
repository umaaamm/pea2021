<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {
	function __construct(){
		parent::__construct();
	}
	
    public function index(){
        $this->session->unset_userdata('id_user');
        $this->session->sess_destroy();
        delete_cookie('id_user');
        $this->load->database('default',TRUE);
		redirect('login');
    }
}