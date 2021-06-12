<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {
	function __construct(){
		parent::__construct();
        $this->cek_login();
	}
	
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->setting_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_menu;
        $data['parent_menu_id']         = $this->setting_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_setting; 
        $data['function_nama']          = 'index';

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'Menu List';
        $data['potlet_icon']            = 'list';

        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            ),
            2   => array(
                'target'    => $this->controller_setting.'/'.$this->controller_menu,
                'nama'      => $menu->menu_nama
            )
        );

        $data['get_data']       = $this->controller_setting.'/'.$this->controller_menu.'/get_data';
        $data['save_data']      = $this->controller_setting.'/'.$this->controller_menu.'/save_data';
        $data['edit_data']      = $this->controller_setting.'/'.$this->controller_menu.'/edit_data';
        $data['delete_data']    = $this->controller_setting.'/'.$this->controller_menu.'/delete_data';
        // echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('header', $data);
        $this->load->view('menuList');
        $this->load->view('footer');
	}

    function get_data(){
        $id = $this->input->post('id');
        $getData = array(
                'select'      => '*',
                'from' => $this->set_menu,
                'where' => "menu_id = '".$id."'"
            );
        $data = $this->model_basic_db2->get_data($getData)->row();
        if ($data) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_success_get_data'), 
                    'data' => $data
                )
            );
        }else{
            $this->returnJson(
                array(
                    'status' => lang('lbl_error'), 
                    'message' => lang('msg_failed_get_data'), 
                    'data' => $data
                )
            );
        }
    }

    function save_data(){
        $user   = $this->data;

        $menu_id            = $this->input->post('menu_id');
        $menu_nama          = $this->input->post('menu_nama');
        $menu_controller    = $this->input->post('menu_controller');
        $menu_no_urut       = $this->input->post('menu_no_urut');
        $menu_icon          = $this->input->post('menu_icon');
        $menu_have_child    = $this->input->post('menu_have_child');
        $menu_parent_id     = $this->input->post('menu_parent_id');

        if ($menu_have_child == '' || $menu_have_child == null) {
            $menu_have_child = 0;
        }
        if ($menu_have_child == '' || $menu_have_child == null) {
            $menu_have_child = 0;
        }

        $create_by          = $user['user_nip'];
        $create_date        = date('Y-m-d');



        $save_data = array(
            'from' => $this->set_menu,
            'set_value' => "(
                                '".$menu_id."',
                                '".$menu_nama."',
                                '".$menu_parent_id."',
                                ".$menu_no_urut.",
                                '".$menu_controller."',
                                '".$menu_have_child."',
                                '".$menu_icon."',
                                '".$create_by."',
                                '".$create_date."',
                                null,
                                null
                            )"
        );

        $data_check_menu_id = array(
                'select'      => '*',
                'from' => $this->set_menu,
                'where' => "menu_id = '".$menu_id."'"
            );

        $menu_id_check = $this->model_basic_db2->get_data($data_check_menu_id)->num_rows();
        
        if ($menu_id_check > 0) {
           $this->returnJson(
                array(
                    'status' => lang('lbl_error'), 
                    'message' => lang('msg_id_is_exist'), 
                    'data' => null
                )
            );
        }else{
            $save = $this->model_basic_db2->insert_data($save_data);
            if($save > 0) {
                     $this->returnJson(
                    array(
                        'status' => lang('lbl_success'), 
                        'message' => lang('msg_data_has_been_saved'), 
                        'data' => null,
                        'href' => $this->controller_setting  .'/'.$this->controller_menu
                    )
                );
               
            }else{
                $this->returnJson(
                    array(
                        'status' => lang('lbl_error'), 
                        'message' => lang('msg_data_not_saved'), 
                        'data' => null
                    )
                );
            }

        }
    }

    function edit_data(){
        $user       = $this->data;
        $menu_id            = $this->input->post('menu_id');
        $menu_nama          = $this->input->post('menu_nama');
        $menu_controller    = $this->input->post('menu_controller');
        $menu_no_urut       = $this->input->post('menu_no_urut');
        $menu_icon          = $this->input->post('menu_icon');
        $menu_have_child    = $this->input->post('menu_have_child');
        $menu_parent_id     = $this->input->post('menu_parent_id');

        if ($menu_have_child == '' || $menu_have_child == null) {
            $menu_have_child = 0;
        }
        if ($menu_have_child == '' || $menu_have_child == null) {
            $menu_have_child = 0;
        }

        $update_by          = $user['user_nip'];
        $update_date        = date('Y-m-d');

        $update    = array(
            'set_value' => "menu_nama = '".$menu_nama."',
                            menu_controller = '".$menu_controller."',
                            menu_no_urut = ".$menu_no_urut.",
                            menu_icon = '".$menu_icon."',
                            menu_have_child = '".$menu_have_child."',
                            menu_parent_id = '".$menu_parent_id."',
                            update_by = '".$update_by."',
                            update_date = '".$update_date."'",
            'from'      => $this->set_menu,
            'where'     => "menu_id = '".$menu_id."'"
        );

        if ($menu_parent_id != 0) {
             $data_have_child_check = array(
                'select'      => '*',
                'from' => $this->set_menu,
                'where' => "menu_id = '".$menu_parent_id."'"
            );
            $have_child_check   = $this->model_basic_db2->get_data($data_have_child_check)->row();

            if ($have_child_check->menu_have_child == 0) {
                $this->returnJson(
                    array(
                        'status' => lang('lbl_error'), 
                        'message' => 'Parent id '.$menu_parent_id.' can\'t have child' , 
                        'data' => null
                    )
                );
            }else{
                $update = $this->model_basic_db2->update_data($update); 
            }
        }else{
            $update = $this->model_basic_db2->update_data($update); 
        }
        // echo "<pre>";print_r($update);echo "</pre>";
        if($update > 0) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_menu
                )
            );
        }else{
            $this->returnJson(
                array(
                    'status' => lang('lbl_error'), 
                    'message' => lang('msg_data_not_update'), 
                    'data' => null
                )
            );
        }
    }

    function delete_data(){
        $id = $this->input->post('id');

        $data = array(
                'from' => $this->set_menu,
                'where' => "menu_id = '".$id."'"
            );

        $delete    = $this->model_basic_db2->delete_data($data);
        if($delete > 0) {
             $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_menu
                )
            );
            
            
        }else{
           $this->returnJson(
                array(
                    'status' => lang('lbl_error'), 
                    'message' => lang('msg_delete_failed'), 
                    'data' => null
                )
            );
        }
    }
    
}