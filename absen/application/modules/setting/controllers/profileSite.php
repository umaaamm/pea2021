<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileSite extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->profile_site_menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->setting_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->profile_site_menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->profile_site_menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_profile_site;
        $data['parent_menu_id']         = $this->setting_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_setting; 
        $data['function_nama']          = 'index';

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'Profile Site';
        $data['potlet_icon']            = 'globe';

        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            ),
            2   => array(
                'target'    => $this->controller_setting.'/'.$this->controller_profile_site,
                'nama'      => $menu->menu_nama
            )
        );

        $data['get_data']       = $this->controller_setting.'/'.$this->controller_profile_site.'/get_data';
        $data['save_data']      = $this->controller_setting.'/'.$this->controller_profile_site.'/save_data';
        $data['edit_data']      = $this->controller_setting.'/'.$this->controller_profile_site.'/edit_data';
        $data['delete_data']    = $this->controller_setting.'/'.$this->controller_profile_site.'/delete_data';

        
        $data['profile_site'] = $this->get_data();

        // echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('header', $data);
        $this->load->view('profileSiteEdit');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $getData = array(
                'select'      => '*',
                'from' => $this->set_profile_site
            );
        $data = $this->model_basic_db2->get_data($getData)->row();
        
        return $data;
    }

    function edit_data(){
        $user            = $this->data;
        $siteNama        = $this->input->post('site_nama');
        $siteAlamat      = $this->input->post('site_alamat');
        $siteInitial     = $this->input->post('site_initial');
        $siteJudul       = $this->input->post('site_judul');
        $siteVersion     = $this->input->post('site_version');
        $siteCopyRight   = $this->input->post('site_copy_right');

        $update_by       = $user['user_nip'];
        $update_date     = date('Y-m-d');

        $logoKecil = 'site_logo_kecil';
        $logoBesar = 'site_logo_besar';

        $namaLogoKecil = $_FILES['site_logo_kecil']['name'];
        $namaLogoBesar = $_FILES['site_logo_besar']['name'];

        $config['upload_path'] = './userdata/profile_site/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000000'; 
        $config['max_width'] = '';
        $config['max_height'] = '';
        
        $this->load->library('upload', $config);
        
        $getDataGambar = array(
                'select'      => '*',
                'from' => $this->set_profile_site
            );
        $oldFile = $this->model_basic_db2->get_data($getDataGambar)->row();

        if ($namaLogoKecil != '' &&  $namaLogoBesar != '') {
             //HAPUS FILE
             if($oldFile){
            	unlink($config['upload_path'].$oldFile->site_logo_kecil);
            	unlink($config['upload_path'].$oldFile->site_logo_besar);
             }
            
             if (!$this->upload->do_upload($logoKecil)){
                $status = lang('lbl_error');
                $message = $this->upload->display_errors();
            }else{
                $uploadLogoKecil = $this->upload->data();
                if (!$this->upload->do_upload($logoBesar)){
                    $status = lang('lbl_error');
                    $message = $this->upload->display_errors();
                }else{
                    $uploadLogoBesar = $this->upload->data();
                    $query    = array(
                        'set_value' => "site_nama = '".$siteNama."',
                                        site_alamat = '".$siteAlamat."',
                                        site_initial = '".$siteInitial."',
                                        site_judul = '".$siteJudul."',
                                        site_logo_kecil = '".$uploadLogoKecil['file_name']."',
                                        site_logo_besar = '".$uploadLogoBesar['file_name']."',
                                        site_version = '".$siteVersion."',
                                        site_copy_right = '".$siteCopyRight."',
                                        update_by = '".$update_by."',
                                        update_date = '".$update_date."'",
                        'from'      => $this->set_profile_site,
                        'where'     => "SITE_ID = 1"
                    );
                    $status = lang('lbl_success');
                    $message = 'success';
                }
            }
        }else if($namaLogoKecil != '' &&  $namaLogoBesar == ''){
            //HAPUS FILE
             if($oldFile){
            	unlink($config['upload_path'].$oldFile->site_logo_kecil);
             }
            if (!$this->upload->do_upload($logoKecil)){
                $status = lang('lbl_error');
                $message = $this->upload->display_errors();
            }else{
                $uploadLogoKecil = $this->upload->data();
                $query    = array(
                        'set_value' => "site_nama = '".$siteNama."',
                                        site_alamat = '".$siteAlamat."',
                                        site_initial = '".$siteInitial."',
                                        site_judul = '".$siteJudul."',
                                        site_logo_kecil = '".$uploadLogoKecil['file_name']."',
                                        site_version = '".$siteVersion."',
                                        site_copy_right = '".$siteCopyRight."',
                                        update_by = '".$update_by."',
                                        update_date = '".$update_date."'",
                        'from'      => $this->set_profile_site,
                        'where'     => "SITE_ID = 1"
                    );
                $status = lang('lbl_success');
                $message = 'success';
            }
        }else if($namaLogoKecil == '' &&  $namaLogoBesar != ''){
            //HAPUS FILE
             if($oldFile){
            	unlink($config['upload_path'].$oldFile->site_logo_besar);
             }
            if (!$this->upload->do_upload($logoBesar)){
                $status = lang('lbl_error');
                $message = $this->upload->display_errors();
            }else{
                $uploadLogoBesar = $this->upload->data();
                $query    = array(
                        'set_value' => "site_nama = '".$siteNama."',
                                        site_alamat = '".$siteAlamat."',
                                        site_initial = '".$siteInitial."',
                                        site_judul = '".$siteJudul."',
                                        site_logo_besar = '".$uploadLogoBesar['file_name']."',
                                        site_version = '".$siteVersion."',
                                        site_copy_right = '".$siteCopyRight."',
                                        update_by = '".$update_by."',
                                        update_date = '".$update_date."'",
                        'from'      => $this->set_profile_site,
                        'where'     => "SITE_ID = 1"
                );
                $status = lang('lbl_success');
                $message = 'success';
            }
        }else if($namaLogoKecil == '' &&  $namaLogoBesar == ''){
            $query    = array(
                        'set_value' => "site_nama = '".$siteNama."',
                                        site_alamat = '".$siteAlamat."',
                                        site_initial = '".$siteInitial."',
                                        site_judul = '".$siteJudul."',
                                        site_version = '".$siteVersion."',
                                        site_copy_right = '".$siteCopyRight."',
                                        update_by = '".$update_by."',
                                        update_date = '".$update_date."'",
                        'from'      => $this->set_profile_site,
                        'where'     => "SITE_ID = 1"
            );
            $status = lang('lbl_success');
            $message = 'success';
        }   

        $update = $this->model_basic_db2->update_data($query);
        // echo "<pre>";print_r($uploadLogoKecil['file_name']);echo "</pre>";
        if($update > 0) {
            $this->returnJson(
                array(
                    'status' => $status, 
                    'message' => $message, 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_profile_site
                )
            );
        }else{
            $this->returnJson(
                array(
                    'status' => $status, 
                    'message' => $message, 
                    'data' => null
                )
            );
        }
    }
    
}