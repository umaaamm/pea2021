<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kehadiran extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->kehadiran_menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->kehadiran_menu_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->kehadiran_menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->kehadiran_menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_kehadiran;
        $data['parent_menu_id']         = $this->kehadiran_menu_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_kehadiran; 

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'kehadiran List';
        $data['potlet_icon']            = 'list';
        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            )
        );

        $data['get_data']       = $this->controller_kehadiran.'/get_data';
        $data['get_group']       = $this->controller_kehadiran.'/get_group';
        $data['save_data']      = $this->controller_kehadiran.'/save_data';
        $data['edit_data']      = $this->controller_kehadiran.'/edit_data';
        $data['delete_data']    = $this->controller_kehadiran.'/delete_data';

        
        // echo "<pre>";print_r($data);echo "</pre>";
        if($data['branch_id']!=null){
            $query_data  = array(
                'select'    => '*',
                'from'      => $this->set_kehadiran,
                'where_field' => 'townhall = '."'".$data['branch_id']."'");
    
            $data['kehadiran_list'] = $this->model_basic->get_data_join($query_data)->result_array();
        }else{
            $query_data  = array(
                'select'    => '*',
                'from'      => $this->set_kehadiran);
        }
        

        $data['kehadiran_list'] = $this->model_basic->get_data_join($query_data)->result_array();

        $this->load->view('header', $data);
        $this->load->view('kehadiran');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $query_get_data  = array(
            'select'    => '*',
            'from'      => $this->set_kehadiran,
            'where_field' => $this->schema.$this->set_kehadiran.'.nik = '."'".$id."'"
        );
        
        $data = $this->model_basic->get_data_join($query_get_data)->row();
        
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

    function delete_data(){
        $id = $this->input->post('id');

        $data = array(
                'from' => $this->set_kehadiran,
                'where' => "nik = '".$id."'"
            );
        
        $delete    = $this->model_basic_db2->delete_data($data);
        if($delete > 0) {
             $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_kehadiran
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

    function save_data(){
        $nik            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $event_id             = $this->input->post('event_id');
		$nm_event           = $this->input->post('nm_event');
        $event_kanwil         = $this->input->post('event_kanwil');
        $nm_kantor     = $this->input->post('nm_kantor');

        $save_data = array(
            'nik'                   => $nik,
            'nama'                  => $nama,
            'event_id'              => $event_id,
            'nm_event'              => $nm_event,
            'event_kanwil'          => $event_kanwil,
            'nm_kantor'    			=> $nm_kantor,
            'tanggal'               => date('Y-m-d')
        );
        
        $save = $this->model_basic->insert_data($this->set_kehadiran,$save_data);

        if($save > 0) {
                     $this->returnJson(
                    array(
                        'status' => lang('lbl_success'), 
                        'message' => lang('msg_data_has_been_saved'), 
                        'data' => null,
                        'href' => $this->controller_kehadiran
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

    function edit_data(){
        $nik            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $event_id             = $this->input->post('event_id');
		$nm_event           = $this->input->post('nm_event');
        $event_kanwil         = $this->input->post('event_kanwil');
        $nm_kantor     = $this->input->post('nm_kantor');

        $update_data = array(
           'nik'                   => $nik,
            'nama'                  => $nama,
            'event_id'              => $event_id,
            'nm_event'              => $nm_event,
            'event_kanwil'          => $event_kanwil,
            'nm_kantor'    			=> $nm_kantor,
            'tanggal'               => date('Y-m-d')
        );

         $update  = $this->model_basic->update_data($this->set_kehadiran,$update_data,'nik',$nik); 
      
        if($update) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_kehadiran
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

    
}