<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimoni extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->testimoni,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->testimoni,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->testimoni);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->testimoni;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_testimoni;
        $data['parent_menu_id']         = $this->testimoni;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_testimoni; 

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'List Testimoni Peserta PEA 2021';
        $data['potlet_icon']            = 'list';
        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            )
        );

        $data['get_data']       = $this->controller_testimoni.'/get_data';
        $data['get_group']       = $this->controller_testimoni.'/get_group';
        $data['save_data']      = $this->controller_testimoni.'/save_data';
        $data['edit_data']      = $this->controller_testimoni.'/edit_data';
        $data['delete_data']    = $this->controller_testimoni.'/delete_data';
        $data['kontak_list'] = $this->db->query('select * from tb_kontak')->result();
        $data['status_list'] = $this->db->query('select * from tb_val_testimoni')->result();
        $data['testimoni_list'] = $this->db->query('select * from tb_testimoni_pea inner join tb_val_testimoni on tb_testimoni_pea.status_approve = tb_val_testimoni.id_val_testimoni')->result_array();
        $this->load->view('header', $data);
        $this->load->view('testimoni');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $data = $this->db->query('select * from tb_testimoni_pea where id_testimoni="'.$id.'"')->row();
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
                'from' => 'tb_testimoni_pea',
                'where' => "id_testimoni = '".$id."'"
            );
        
        $delete    = $this->model_basic_db2->delete_data($data);
        if($delete > 0) {
             $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_testimoni
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
        $nik_pegawai            = $this->input->post('nik_pegawai');
        $nama_pegawai      = $this->input->post('nama_pegawai');
        $pesan     = $this->input->post('pesan');
        $status_approve      = $this->input->post('status_approve');

        $update_data = array(
            'nik_pegawai'             => $nik_pegawai,
            'nama_pegawai'       => $nama_pegawai,
            'pesan'      => $pesan,
            'status_approve'       => $status_approve,
        );

         $update  = $this->model_basic->update_data('tb_testimoni_pea',$update_data,'nik_pegawai',$nik_pegawai); 
      
        if($update) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_testimoni
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