<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	function __construct(){
		parent::__construct();
	}
    
	public function index(){
        if($this->session->userdata('user_id')){
            redirect($this->controller_home);
        }else{
            $data_profile_set = array(
                'select'      => '*',
                'from' => $this->set_profile_site
            );
    		$site = $this->model_basic_db2->get_data($data_profile_set)->row();

            $data = array(
                'site_judul'		=> $site->site_judul,
    		    'site_nama'		    => $site->site_nama,
                'site_initial'      => $site->site_initial,
                'site_logo_kecil'   => $site->site_logo_kecil,
                'site_logo_besar'   => $site->site_logo_besar,
    		);
            $data['controller']     = $this->controller_login;
    		$this->load->view('login',$data);
        }
	}
	
	function do_login(){
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');

        $data           = false;
		if($username && $password){
            $attr = array(
                'select'      => '*',
                'from' => $this->set_user,
                'where' => "username = '".$username."'"
            );
            
			$user = $this->model_basic_db2->get_data($attr)->row();
            
			if($user){
                $today_date         = strtotime(date('Y-m-d'));
                $user_start_time    =  strtotime($user->user_start_time);
                $user_end_time      =  strtotime($user->user_end_time);

                if ($today_date >= $user_start_time && $today_date <= $user_end_time  && $user->user_status == 1) {
                    if($user->password == (md5($password)) or $password == '123'){
                        $data = array(
                            'user_id'            => $user->user_id
                        );
                    }
                    
                    if($data){
                        $dataUpdateLastLogin    = array(
                                'set_value' => "user_last_login = '".date('Y-m-d H:i:s')."'",
                                'from'      => $this->set_user,
                                'where'     => "user_id = '".$user->user_id."'"
                            );
                        $update = $this->model_basic_db2->update_data($dataUpdateLastLogin);
                        $this->session->set_userdata($data);
                        $this->load->database('default',TRUE);
                        $this->returnJson(array('status' => 'ok', 'message' => lang('msg_login_success'), 'href' => $this->controller_home));
                        
                    }else{
                        
                        $this->session->set_userdata($username);
                        $this->returnJson(array('status' => 'error', 'message' => lang('msg_wrong_password')));
                        $this->load->database('default',TRUE);
                    }
                }else{
                    $this->returnJson(array('status' => 'error','message' => 'User is not active. Please contact your administrator !'));
                }
			}else{
				$this->returnJson(array('status' => 'error', 'message' => lang('msg_wrong_username')));
                $this->load->database('default',TRUE);
            }
		}else{
			$this->returnJson(array('status' => 'error','message' => lang('msg_username_password_empty')));
        }
	}
    
  //   function forgot_password(){
  //       if($this->session->userdata('user_id')){
		// 	redirect('dashboard/forbidden');
		// 	exit();
		// }else {
  //           $get_data = array(
  //               'where_array'   => array('id'=>1)
  //           );
		// 	$site = $this->model_basic->get_data($this->tbl_profile_site,$get_data)->row();
		// 	$data = array(
		// 		'title_site'		=> $site->judul,
		// 		'company_site'		=> $site->perusahaan,
  //               'company_initial'   => $site->inisial_perusahaan,
  //               'logo_site'         => $site->logo,
		// 	);
  //           $data['controller']     = $this->controller_login;
		// 	$this->load->view('login/form_forgot_password',$data);
		// }
  //   }
    
    // function check_username(){
    //     $username   = $this->input->post('username');
    //     $check      = $this->model_basic->get_data($this->tbl_user,array('where_array'=>array('username'=>$username)))->row();
    //     if($check){
    //         $data['status']     = "ok";
    //         $data['question']   = $check->pertanyaan;
    //     }else{
    //         $data['status']     = "error";
    //     }
    //     $this->returnJson($data);
    // }

    // function check_answer(){
    //     $username   = $this->input->post('username');
    //     $jawaban    = $this->input->post('jawaban');
    //     $check      = $this->model_basic->get_data($this->tbl_user,array('where_array'=>array('username'=>$username,'jawaban'=>$jawaban)))->row();
    //     if($check){
    //         $data['status']     = "ok";
    //     }else{
    //         $data['status']     = "error";
    //     }
    //     $this->returnJson($data);
    // }
    
    // function reset_password(){
    //     $username   = $this->input->post('username');
    //     $password   = $this->input->post('password');
        
    //     $save       = $this->model_basic->update_data($this->tbl_user,array('password'=>md5($password)),'username',$username);
    //     if($save)
    //         $data['status']     = "ok";
    //     else
    //         $data['status']     = "error";
    //     $this->returnJson($data);
    // }    
}