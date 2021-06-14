<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->tracking_barang_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->tracking_barang_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->tracking_barang_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->tracking_barang_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_tracking_barang;
        $data['parent_menu_id']         = $this->tracking_barang_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_tracking_barang; 

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'Tracking Barang List';
        $data['potlet_icon']            = 'list';
        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            )
        );

        $data['get_data']       = $this->controller_tracking_barang.'/get_data';
        $data['get_group']       = $this->controller_tracking_barang.'/get_group';
        $data['save_data']      = $this->controller_tracking_barang.'/save_data';
        $data['edit_data']      = $this->controller_tracking_barang.'/edit_data';
        $data['delete_data']    = $this->controller_tracking_barang.'/delete_data';
        $data['kontak_list'] = $this->db->query('select * from tb_kontak')->result();
        $data['status_list'] = $this->db->query('select * from tb_val_tracking')->result();
        $data['tracking_list'] = $this->db->query('select * from tb_tracking INNER JOIN tb_pevita_user on tb_tracking.nik_pegawai = tb_pevita_user.nik_pegawai INNER JOIN tb_kontak on tb_tracking.id_kontak = tb_kontak.id_kontak INNER JOIN tb_val_tracking on tb_tracking.status = tb_val_tracking.id_val')->result_array();
        $this->load->view('header', $data);
        $this->load->view('tracking');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $data = $this->db->query('select * from tb_tracking where id_tracking="'.$id.'"')->row();
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
                'from' => 'tb_tracking',
                'where' => "id_tracking = '".$id."'"
            );
        
        $delete    = $this->model_basic_db2->delete_data($data);
        if($delete > 0) {
             $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_tracking_barang
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
        $nik_pegawai            = $this->input->post('nik');
        $no_bagasi      = $this->input->post('no_bagasi');
        $keterangan     = $this->input->post('keterangan');
        $id_kontak      = $this->input->post('id_kontak');
        $status         = $this->input->post('status');

        $save_data = array(
            'nik_pegawai'             => $nik_pegawai,
            'no_bagasi'       => $no_bagasi,
            'keterangan'      => $keterangan,
            'id_kontak'       => $id_kontak,
            'status'          => $status,
        );
        
        $save = $this->model_basic->insert_data('tb_tracking',$save_data);

        if($save > 0) {
                     $this->returnJson(
                    array(
                        'status' => lang('lbl_success'), 
                        'message' => lang('msg_data_has_been_saved'), 
                        'data' => null,
                        'href' => $this->controller_tracking_barang
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
        $nik_pegawai            = $this->input->post('nik');
        $no_bagasi      = $this->input->post('no_bagasi');
        $keterangan     = $this->input->post('keterangan');
        $id_kontak      = $this->input->post('id_kontak');
        $status         = $this->input->post('status');

        $update_data = array(
            'nik_pegawai'             => $nik_pegawai,
            'no_bagasi'       => $no_bagasi,
            'keterangan'      => $keterangan,
            'id_kontak'       => $id_kontak,
            'status'          => $status,
        );

         $update  = $this->model_basic->update_data('tb_tracking',$update_data,'nik_pegawai',$nik_pegawai); 
      
        if($update) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_tracking_barang
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