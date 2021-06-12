<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 
class Setting extends MY_Controller {
 
	public function __construct() {
	  	parent::__construct();
	 	$this->cek_login();
	}
 
  	public function index(){
	    $data   = $this->data;
	    redirect($this->controller_login);
  	}
 
}