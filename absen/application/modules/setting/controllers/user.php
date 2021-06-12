<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->user_menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->setting_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->user_menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->user_menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_user;
        $data['parent_menu_id']         = $this->setting_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_setting; 
        $data['function_nama']          = 'index';

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'User List';
        $data['potlet_icon']            = 'list';

		
        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            ),
            2   => array(
                'target'    => $this->controller_setting.'/'.$this->controller_user,
                'nama'      => $menu->menu_nama
            )
        );

        $data['get_data']       = $this->controller_setting.'/'.$this->controller_user.'/get_data';
        $data['get_group']       = $this->controller_setting.'/'.$this->controller_user.'/get_group';
        $data['save_data']      = $this->controller_setting.'/'.$this->controller_user.'/save_data';
        $data['edit_data']      = $this->controller_setting.'/'.$this->controller_user.'/edit_data';
        $data['delete_data']    = $this->controller_setting.'/'.$this->controller_user.'/delete_data';

        $query_data  = array(
            'select'    => '*',
            'from'      => $this->set_user,
            'join'      => array(
                                array(
                                    'join'    =>$this->set_user_group,
                                    'join_on' =>$this->set_user_group.'.user_id ='.$this->set_user.'.user_id',
                                    'join_type' =>'LEFT',
                                ),
                                array(
                                    'join'    =>$this->set_group,
                                    'join_on' =>$this->set_group.'.group_id = '.$this->set_user_group.'.group_id',
                                    'join_type' =>'LEFT '
                            )
                        ));

        $data['user_list'] = $this->model_basic->get_data_join($query_data)->result_array();

        $this->load->view('header', $data);
        $this->load->view('userList');
        $this->load->view('footer');
    }

    function get_data(){
        $id = $this->input->post('id');
        $query_get_data  = array(
            'select'    => '*',
            'from'      => $this->set_user,
            'join'      => array(
                                array(
                                    'join'    =>$this->set_user_group,
                                    'join_on' =>$this->set_user_group.'.user_id ='.$this->set_user.'.user_id',
                                    'join_type' =>'LEFT',
                                ),
                                array(
                                    'join'    =>$this->set_group,
                                    'join_on' =>$this->set_group.'.group_id = '.$this->set_user_group.'.group_id',
                                    'join_type' =>'LEFT '
                            )
                        ),
            'where_field' => $this->schema.$this->set_user.'.user_id = '."'".$id."'"
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

    function save_data(){
        $user   = $this->data;
        //TABEL USER
        $user_id            = $this->input->post('user_id');
        $user_nama_lengkap  = $this->input->post('user_nama_lengkap');
        $user_alamat        = $this->input->post('user_alamat');
        $user_email         = $this->input->post('user_email');
        $user_no_hp         = $this->input->post('user_no_hp');
        $user_start_time    = $this->input->post('user_start_time');
        $user_end_time      = $this->input->post('user_end_time');
        $user_language      = $this->input->post('user_language');
        $user_status        = $this->input->post('user_status');
        $branch_id          = $this->input->post('branch_id');
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');

        if($user_status == ''){
            $user_status = 0;
        }

        //TABEL GROUP USER
        $group_id    = $this->input->post('group_id');

        $create_by       = $user['user_nip'];
        $create_date     = date('Y-m-d');
        $update_by       = $user['user_nip'];
        $update_date     = date('Y-m-d');

        $user_foto = 'user_foto';

        $namaFoto = $_FILES['user_foto']['name'];

        $config['upload_path'] = './userdata/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000000'; 
        $config['max_width'] = '';
        $config['max_height'] = '';

        $this->load->library('upload', $config);

        if ($namaFoto != '') {
             if (!$this->upload->do_upload($user_foto)){
                $status = lang('lbl_error');
                $message = $this->upload->display_errors();
            }else{
                $uploadFoto = $this->upload->data();
                $save_data = array(
                    'user_id'            => $user_id,
                    'user_nama_lengkap'  => $user_nama_lengkap,
                    'user_alamat'        => $user_alamat,
                    'user_email'         => $user_email,
                    'branch_id'          => $branch_id,
                    'user_no_hp'         => $user_no_hp,
                    'user_start_time'    => $user_start_time,
                    'user_end_time'      => $user_end_time,
                    'user_language'      => $user_language,
                    'user_foto'          => $uploadFoto['file_name'],
                    'user_status'        => $user_status,
                    'user_last_login'    => '',
                    'username'           => $username,
                    'password'           => md5($password),
                    'create_by'          => $create_by,
                    'create_date'        => $create_date,
                    'update_by'          => 'null',
                    'update_date'        => 'null'
                );
                $status = lang('lbl_success');
                $message = 'success';

                $save_group_user = array(
                    'user_id'       =>$user_id,
                    'group_id'      =>$group_id,
                    'create_by'     =>$create_by,
                    'create_date'   =>$create_date, 
                    'update_by'     =>'null',
                    'update_date'   =>'null'
                );
            }
        }else{
                $save_data = array(
                    'user_id'            => $user_id,
                    'user_nama_lengkap'  => $user_nama_lengkap,
                    'user_alamat'        => $user_alamat,
                    'user_email'         => $user_email,
                    'branch_id'          => $branch_id,
                    'user_no_hp'         => $user_no_hp,
                    'user_start_time'    => $user_start_time,
                    'user_end_time'      => $user_end_time,
                    'user_language'      => $user_language,
                    'user_foto'          => '',
                    'user_status'        => $user_status,
                    'user_last_login'    => '',
                    'username'           => $username,
                    'password'           => md5($password),
                    'create_by'          => $create_by,
                    'create_date'        => $create_date,
                    'update_by'          => 'null',
                    'update_date'        => 'null'
                );
                $status = lang('lbl_success');
                $message = 'success';

                $save_group_user = array(
                    'user_id'       =>$user_id,
                    'group_id'      =>$group_id,
                    'create_by'     =>$create_by,
                    'create_date'   =>$create_date, 
                    'update_by'     =>'null',
                    'update_date'   =>'null'
                );
        }

         $save = $this->model_basic->insert_data($this->set_user,$save_data);
         $save2 = $this->model_basic->insert_data($this->set_user_group,$save_group_user);

         if($save==0) {
                     $this->returnJson(
                    array(
                        'status' => lang('lbl_success'), 
                        'message' => lang('msg_data_has_been_saved'), 
                        'data' => null,
                        'href' => $this->controller_setting  .'/'.$this->controller_user
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
        $user               = $this->data;
        $user_id            = $this->input->post('user_id');
        $user_nama_lengkap  = $this->input->post('user_nama_lengkap');
        $user_alamat        = $this->input->post('user_alamat');
        $user_email         = $this->input->post('user_email');
        $user_no_hp         = $this->input->post('user_no_hp');
        $user_start_time    = $this->input->post('user_start_time');
        $user_end_time      = $this->input->post('user_end_time');
        $user_language      = $this->input->post('user_language');
        $user_status        = $this->input->post('user_status');
        $branch_id          = $this->input->post('branch_id');
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');

        if($user_status == ''){
            $user_status = 0;
        }

        //TABEL GROUP USER
        $group_id    = $this->input->post('group_id');

        $create_by       = $user['user_nip'];
        $create_date     = date('Y-m-d');
        $update_by       = $user['user_nip'];
        $update_date     = date('Y-m-d');

        $user_foto = 'user_foto';

        $namaFoto = $_FILES['user_foto']['name'];

        $config['upload_path'] = './userdata/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000000'; 
        $config['max_width'] = '';
        $config['max_height'] = '';

        $this->load->library('upload', $config);
        $query_get_data_gambar  = array(
            'select'    => '*',
            'from'      => $this->set_user,
            'join'      => array(
                                array(
                                    'join'    =>$this->set_user_group,
                                    'join_on' =>$this->set_user_group.'.user_id ='.$this->set_user.'.user_id',
                                    'join_type' =>'LEFT',
                                ),
                                array(
                                    'join'    =>$this->set_group,
                                    'join_on' =>$this->set_group.'.group_id = '.$this->set_user_group.'.group_id',
                                    'join_type' =>'LEFT '
                            )
                        ),
            'where_field' => $this->schema.$this->set_user.'.user_id = '."'".$user_id."'"
        );
        $oldFile = $this->model_basic->get_data_join($query_get_data_gambar )->row();
        if ($namaFoto != '') {
             //HAPUS FILE
             if($oldFile){
            	unlink($config['upload_path'].$oldFile->user_foto);
             }
             if (!$this->upload->do_upload($user_foto)){
                $status = lang('lbl_error');
                $message = $this->upload->display_errors();
            }else{
                $uploadFoto = $this->upload->data();
                $update_data = array(
                    'user_nama_lengkap'  => $user_nama_lengkap,
                    'user_alamat'        => $user_alamat,
                    'user_email'         => $user_email,
                    'branch_id  '        => $branch_id,
                    'user_no_hp'         => $user_no_hp,
                    'user_start_time'    => $user_start_time,
                    'user_end_time'      => $user_end_time,
                    'user_language'      => $user_language,
                    'user_foto'          => $uploadFoto['file_name'],
                    'user_status'        => $user_status,
                    'username'           => $username,
                    'password'           => md5($password),
                    'update_by'          => $update_by,
                    'update_date'        => $update_date,
                );
                $status = lang('lbl_success');
                $message = 'success';

                $update_group_user = array(
                    'group_id'      =>$group_id,
                    'update_by'     =>$update_by,
                    'update_date'   =>$update_date
                );
            }
        }else{
                $update_data = array(
                    'user_nama_lengkap'  => $user_nama_lengkap,
                    'user_alamat'        => $user_alamat,
                    'user_email'         => $user_email,
                    'branch_id'          => $branch_id,
                    'user_no_hp'         => $user_no_hp,
                    'user_start_time'    => $user_start_time,
                    'user_end_time'      => $user_end_time,
                    'user_language'      => $user_language,
                    'user_status'        => $user_status,
                    'username'           => $username,
                    'password'           => md5($password),
                    'update_by'          => $update_by,
                    'update_date'        => $update_date,
                );
                $status = lang('lbl_success');
                $message = 'success';

                $update_group_user = array(
                    'group_id'      =>$group_id,
                    'update_by'     =>$update_by,
                    'update_date'   =>$update_date,
                );
        }
         $update  = $this->model_basic->update_data($this->set_user,$update_data,'user_id',$user_id); 
         $update2 = $this->model_basic->update_data($this->set_user_group,$update_group_user,'user_id',$user_id); 
        
        if($update) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_user
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
        $q_delete  = $this->model_basic->delete_data($this->schema.$this->set_user,'user_id',$id);
        $q_delete_group = $this->model_basic->delete_data($this->schema.$this->set_user_group,'user_id',$id);
        if($q_delete) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_user
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

    function get_group(){
        $getData = array(
                'select'      => '*',
                'sort' => "group_id ASC"
            );
        $data = $this->model_basic->get_data($this->set_group,$getData)->result_array();
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
    
}