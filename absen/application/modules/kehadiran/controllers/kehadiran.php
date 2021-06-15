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
                'from'      => 'tb_kehadiran_pea',
                'where_field' => 'id_event_pea = '."'".$data['branch_id']."'");
    
            $data['kehadiran_list'] = $this->model_basic->get_data_join($query_data)->result_array();
        }else{
            $query_data  = array(
                'select'    => '*',
                'from'      => 'tb_kehadiran_pea');
        }
        
        $data['kehadiran_list'] = $this->model_basic->get_data_join($query_data)->result_array();
        $data['event_list'] = $this->db->query('select * from tb_event_pea')->result();
        $this->load->view('header', $data);
        $this->load->view('kehadiran');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $query_get_data  = array(
            'select'    => '*',
            'from'      => 'tb_kehadiran_pea',
            'where_field' => $this->schema.'tb_kehadiran_pea'.'.id_kehadiran = '."'".$id."'"
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
                'from' => 'tb_kehadiran_pea',
                'where' => "id_kehadiran = '".$id."'"
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
        $id_event           = $this->input->post('id_event');
        $hp             = $this->input->post('hp');
        $jabatan         = $this->input->post('jabatan');
        $no_kursi     = $this->input->post('no_kursi');
        $unit_kerja = $this->input->post('unit_kerja');
        $sql = "SELECT * from tb_event_pea";
        $query = $this->db->query($sql)->result_array();
        $save_data = array(
            'nik_pegawai'   => $nik,
            'nama'          => $nama,
            'id_event_pea'  => $id_event,
            'jabatan'       => $jabatan,
            'no_hp'         => $hp,
            'no_kursi'      => $no_kursi,
            'unit_kerja'    => $unit_kerja,
            'nama_event'    => $query[0]['nama_event'],
        );
        
        $save = $this->model_basic->insert_data('tb_kehadiran_pea',$save_data);

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
        $id_event           = $this->input->post('id_event');
        $hp             = $this->input->post('hp');
        $jabatan         = $this->input->post('jabatan');
        $no_kursi     = $this->input->post('no_kursi');
        $unit_kerja = $this->input->post('unit_kerja');
        $sql = "SELECT * from tb_event_pea";
        $query = $this->db->query($sql)->result_array();
        $update_data = array(
            'nik_pegawai'   => $nik,
            'nama'          => $nama,
            'id_event_pea'  => $id_event,
            'jabatan'       => $jabatan,
            'no_hp'         => $hp,
            'no_kursi'      => $no_kursi,
            'unit_kerja'    => $unit_kerja,
            'nama_event'    => $query[0]['nama_event'],
        );

        $update  = $this->model_basic->update_data('tb_kehadiran_pea',$update_data,'nik_pegawai',$nik); 
      
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