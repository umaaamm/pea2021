<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->cek_login();
	}

    public function index(){
        $data = $this->data;
        foreach($data['menu_list'] as $m){
            if(isset($m['submenu'])){
                foreach ($m['submenu'] as $sm) {
                    if(isset($sm['submenu'])){
                        foreach ($sm['submenu'] as $ssm) {
                            redirect($m['menu_controller'].'/'.$sm['menu_controller'].'/'.$ssm['menu_controller']);
                        }
                    }else{
                        redirect($m['menu_controller'].'/'.$sm['menu_controller']);
                    }
                }
            }else{
                redirect($m['menu_controller']);
            }
        }

        redirect('errors/no_access');
        exit;
	}

    

}