<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->cek_login();
    }
    
    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->group_menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->setting_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->group_menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->group_menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_group;
        $data['parent_menu_id']         = $this->setting_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_setting; 
        $data['function_nama']          = 'index';

        $data['title_site']             = $menu->menu_nama; 
        $data['potlet_title']           = 'Group List';
        $data['potlet_icon']            = 'list';

        
        $data['breadcrumbs']        = array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            ),
            2   => array(
                'target'    => $this->controller_setting.'/'.$this->controller_group,
                'nama'      => $menu->menu_nama
            )
        );

        $data['get_data']       = $this->controller_setting.'/'.$this->controller_group.'/get_data';
        $data['get_new_data']       = $this->controller_setting.'/'.$this->controller_group.'/get_new_data';
        $data['save_data']      = $this->controller_setting.'/'.$this->controller_group.'/save_data';
        $data['edit_data']      = $this->controller_setting.'/'.$this->controller_group.'/edit_data';
        $data['delete_data']    = $this->controller_setting.'/'.$this->controller_group.'/delete_data';

         $getData = array(
                'select'      => '*',
                'from' => $this->set_group,
                'order_by' => "group_id ASC"
            );

        $data['group_list'] = $this->model_basic_db2->get_data($getData)->result_array();
        // echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('header', $data);
        $this->load->view('groupList');
        $this->load->view('footer');
    }

    function get_new_data(){
        $getData = array(
                'select'      => '*',
                'from' => $this->set_menu,
                'order_by' => "menu_id ASC"
            );
        $data = $this->model_basic_db2->get_data($getData)->result_array();

        $html ='<link rel="stylesheet" href="templates/treeTable/css/jquery.treegrid.css">
                <script>
                    jQuery(document).ready(function() {
                        $(".tree").treegrid();
                    });
                </script>
                <table class="table table-hover tree">
                    <thead>
                        <tr>
                            <th>Menu Id</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Is View</th>
                            <th style="text-align: center;">Is Add</th>
                            <th style="text-align: center;">Is Update</th>
                            <th style="text-align: center;">Is Delete</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $dataParent = array('select'=>'*','from'=> $this->set_menu,'where'=> "menu_parent_id = 0",'sort_by'=> 'menu_no_urut ASC');
                        $menuParentList = $this->model_basic_db2->get_data($dataParent)->result_array();
                        foreach ($menuParentList as $menuParent) {
                            if ($menuParent['menu_have_child'] == 1) {
        $html .= '      <tr class="treegrid-'. $menuParent['menu_id'].'">
                            <td>'. $menuParent['menu_id'] .'</td>
                            <td>'. $menuParent['menu_nama'] .'</td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_view_'. $menuParent['menu_id'].'" name="is_view[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_add_'. $menuParent['menu_id'].'" name="is_add[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_edit_'. $menuParent['menu_id'].'" name="is_edit[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_delete_'. $menuParent['menu_id'].'" name="is_delete[]" /> <span></span>
                                </label>
                            </td>
                        </tr>';  
                                $datachild1 = array('select' => '*','from' => $this->set_menu,'where' => "menu_parent_id = '".$menuParent['menu_id']."'",'sort_by' => 'menu_no_urut ASC');
                                $menuChild1List = $this->model_basic_db2->get_data($datachild1)->result_array();
                                foreach ($menuChild1List as $menuChild1) {
        $html .= '          <tr class="treegrid-'. $menuChild1['menu_id'] .' treegrid-parent-'. $menuParent['menu_id'].'">
                                <td>'. $menuChild1['menu_id'] .'</td>
                                <td>'. $menuChild1['menu_nama'] .'</td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_view_'. $menuChild1['menu_id'] .'" name="is_view[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_add_'. $menuChild1['menu_id'] .'" name="is_add[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_edit_'. $menuChild1['menu_id'] .'" name="is_edit[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_delete_'. $menuChild1['menu_id'] .'" name="is_delete[]" /> <span></span>
                                    </label>
                                </td>
                            </tr>';
                                if ($menuChild1['menu_have_child'] == 1) {
                                    $datachild2 = array('select' => '*','from' => $this->set_menu,'where' => "menu_parent_id = '".$menuChild1['menu_id']."'",'sort_by' => 'menu_no_urut ASC');

                                    $menuChild2List = $this->model_basic_db2->get_data($datachild2)->result_array();
                                    foreach ($menuChild2List as $menuChild2) {  
        $html .= '              <tr class="treegrid-'. $menuChild2['menu_id'] .' treegrid-parent-'. $menuChild1['menu_id'] .'">
                                    <td>'. $menuChild2['menu_id'] .'</td>
                                    <td>'. $menuChild2['menu_nama'] .'</td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_view_'. $menuChild2['menu_id'] .'" name="is_view[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_add_'. $menuChild2['menu_id'] .'" name="is_add[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_edit_'. $menuChild2['menu_id'] .'" name="is_edit[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_delete_'. $menuChild2['menu_id'] .'" name="is_delete[]" /> <span></span>
                                        </label>
                                    </td>
                                </tr> ';
                                    } 
                                }      
                                }
                                }else{ 
        $html .= '          <tr class="treegrid-'. $menuParent['menu_id'].'">
                                <td>'. $menuParent['menu_id'].'</td>
                                <td>'. $menuParent['menu_nama'].'</td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_view_'. $menuParent['menu_id'].'" name="is_view[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_add_'. $menuParent['menu_id'].'" name="is_add[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_edit_'. $menuParent['menu_id'].'" name="is_edit[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_delete_'. $menuParent['menu_id'].'" name="is_delete[]" /> <span></span>
                                    </label>
                                </td>
                            </tr>';
                                } 
                        } 
        $html .= '  </tbody></table>';

        // echo $html;
        if ($data) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_success_get_data'), 
                    'data' => $html
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

    function get_data(){
        $id = $this->input->post('id');

        $getDataGroup = array(
                'select'      => '*',
                'from' => $this->set_group,
                'where' => "group_id = '".$id."'"
            );
        $dataGroup = $this->model_basic_db2->get_data($getDataGroup)->row();

        $getDataPriviledge = array(
                'select'      => '*',
                'from' => $this->set_group_priviledge,
                'where' => "group_id = '".$id."'"
            );
        $dataPriviledge = $this->model_basic_db2->get_data($getDataPriviledge)->result_array();

        $getDataMenu = array(
                'select'      => '*',
                'from' => $this->set_menu,
                'order_by' => "menu_id ASC"
            );
        $dataMenu = $this->model_basic_db2->get_data($getDataMenu)->result_array();

        $html ='<link rel="stylesheet" href="templates/treeTable/css/jquery.treegrid.css">
                <script>
                    jQuery(document).ready(function() {
                        $(".tree").treegrid();
                    });
                </script>
                <table class="table table-hover tree">
                    <thead>
                        <tr>
                            <th>Menu Id</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Is View</th>
                            <th style="text-align: center;">Is Add</th>
                            <th style="text-align: center;">Is Update</th>
                            <th style="text-align: center;">Is Delete</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $dataParent = array('select'=>'*','from'=> $this->set_menu,'where'=> "menu_parent_id = 0",'sort_by'=> 'menu_no_urut ASC');
                        $menuParentList = $this->model_basic_db2->get_data($dataParent)->result_array();
                        foreach ($menuParentList as $menuParent) {
                            if ($menuParent['menu_have_child'] == 1) {
        $html .= '      <tr class="treegrid-'. $menuParent['menu_id'].'">
                            <td>'. $menuParent['menu_id'] .'</td>
                            <td>'. $menuParent['menu_nama'] .'</td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_view_'. $menuParent['menu_id'].'" name="is_view[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_add_'. $menuParent['menu_id'].'" name="is_add[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_edit_'. $menuParent['menu_id'].'" name="is_edit[]" /> <span></span>
                                </label>
                            </td>
                            <td align="center">
                                <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_delete_'. $menuParent['menu_id'].'" name="is_delete[]" /> <span></span>
                                </label>
                            </td>
                        </tr>';  
                                $datachild1 = array('select' => '*','from' => $this->set_menu,'where' => "menu_parent_id = '".$menuParent['menu_id']."'",'sort_by' => 'menu_no_urut ASC');
                                $menuChild1List = $this->model_basic_db2->get_data($datachild1)->result_array();
                                foreach ($menuChild1List as $menuChild1) {
        $html .= '          <tr class="treegrid-'. $menuChild1['menu_id'] .' treegrid-parent-'. $menuParent['menu_id'].'">
                                <td>'. $menuChild1['menu_id'] .'</td>
                                <td>'. $menuChild1['menu_nama'] .'</td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_view_'. $menuChild1['menu_id'] .'" name="is_view[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_add_'. $menuChild1['menu_id'] .'" name="is_add[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_edit_'. $menuChild1['menu_id'] .'" name="is_edit[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuChild1['menu_id'] .'" id="is_delete_'. $menuChild1['menu_id'] .'" name="is_delete[]" /> <span></span>
                                    </label>
                                </td>
                            </tr>';
                                if ($menuChild1['menu_have_child'] == 1) {
                                    $datachild2 = array('select' => '*','from' => $this->set_menu,'where' => "menu_parent_id = '".$menuChild1['menu_id']."'",'sort_by' => 'menu_no_urut ASC');

                                    $menuChild2List = $this->model_basic_db2->get_data($datachild2)->result_array();
                                    foreach ($menuChild2List as $menuChild2) {  
        $html .= '              <tr class="treegrid-'. $menuChild2['menu_id'] .' treegrid-parent-'. $menuChild1['menu_id'] .'">
                                    <td>'. $menuChild2['menu_id'] .'</td>
                                    <td>'. $menuChild2['menu_nama'] .'</td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_view_'. $menuChild2['menu_id'] .'" name="is_view[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_add_'. $menuChild2['menu_id'] .'" name="is_add[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_edit_'. $menuChild2['menu_id'] .'" name="is_edit[]" /> <span></span>
                                        </label>
                                    </td>
                                    <td align="center">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" value="'. $menuChild2['menu_id'] .'" id="is_delete_'. $menuChild2['menu_id'] .'" name="is_delete[]" /> <span></span>
                                        </label>
                                    </td>
                                </tr> ';
                                    } 
                                }      
                                }
                                }else{ 
        $html .= '          <tr class="treegrid-'. $menuParent['menu_id'].'">
                                <td>'. $menuParent['menu_id'].'</td>
                                <td>'. $menuParent['menu_nama'].'</td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_view_'. $menuParent['menu_id'].'" name="is_view[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_add_'. $menuParent['menu_id'].'" name="is_add[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_edit_'. $menuParent['menu_id'].'" name="is_edit[]" /> <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="'. $menuParent['menu_id'].'" id="is_delete_'. $menuParent['menu_id'].'" name="is_delete[]" /> <span></span>
                                    </label>
                                </td>
                            </tr>';
                                } 
                        } 
        $html .= '  </tbody></table>';

        if ($dataMenu) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_success_get_data'), 
                    'dataGroup' => $dataGroup,
                    'dataPriviledge' => $dataPriviledge,
                    'html' => $html
                )
            );
        }else{
            $this->returnJson(
                array(
                    'status' => lang('lbl_error'), 
                    'message' => lang('msg_failed_get_data'), 
                    'data' => ''
                )
            );
        }
    }

    function save_data(){
        $user            = $this->data;
        $group_id        = $this->input->post('group_id');
        $group_nama      = $this->input->post('group_nama');
        $group_keterangan= $this->input->post('group_keterangan');
        $group_status    = $this->input->post('group_status');
        $group_is_view   = $this->input->post('is_view');
        $group_is_add    = $this->input->post('is_add');
        $group_is_edit   = $this->input->post('is_edit');
        $group_is_delete = $this->input->post('is_delete');

        $create_by       = $user['user_nip'];
        $create_date     = date('Y-m-d');
        
        if (is_null($group_status) || $group_status == '') {
            $group_status = 0;
        }
        $data_group = array(
            'from' => $this->set_group,
            'set_value' => "(
                ".$group_id .",
                '".$group_nama."',
                '".$group_keterangan."',
                ".$group_status.",
                '".$create_by."',
                '".$create_date."',
                null,
                null
             )"
        );
        $save_group = $this->model_basic_db2->insert_data($data_group);

        foreach ($group_is_view as $data_is_view) {
            if (isset($data_is_view)) {
                $is_view = 1;
            }
            $data_priviledge = array(
                'from' => $this->set_group_priviledge,
                'set_value' => "(
                    ".$group_id .",
                    '".$data_is_view."',
                    ".$is_view.",
                    0,
                    0,
                    0,
                    '".$create_by."',
                    '".$create_date."',
                    null,
                    null
                )"
            );
            // echo "<pre>";print_r($data_is_view);echo "</pre>";
            $save_priviledge = $this->model_basic_db2->insert_data($data_priviledge);
        }

        $is_add = 0;
        foreach ($group_is_add as $data_is_add) {
            if (isset($data_is_add)) {
                $is_add = 1;
            }
            $update_priviledge    = array(
                'set_value' => "is_add = ".$is_add,
                'from'      => $this->set_group_priviledge,
                'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_add
            );
            // echo "<pre>";print_r($update_priviledge);echo "</pre>";
            $update = $this->model_basic_db2->update_data($update_priviledge); 
            $is_add = 0;
        }

        $is_edit = 0;
        foreach ($group_is_edit as $data_is_edit) {
            if (isset($data_is_edit)) {
                $is_edit = 1;
            }
            $update_priviledge    = array(
                'set_value' => "is_edit = ".$is_edit,
                'from'      => $this->set_group_priviledge,
                'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_edit
            );
            // echo "<pre>";print_r($update_priviledge);echo "</pre>";
            $update = $this->model_basic_db2->update_data($update_priviledge); 
            $is_edit = 0;
        }

        $is_delete = 0;
        foreach ($group_is_delete as $data_is_delete) {
            if (isset($data_is_delete)) {
                $is_delete = 1;
            }
            $update_priviledge    = array(
                'set_value' => "is_delete = ".$is_delete,
                'from'      => $this->set_group_priviledge,
                'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_delete
            );
            // echo "<pre>";print_r($update_priviledge);echo "</pre>";
            $update = $this->model_basic_db2->update_data($update_priviledge);
            $is_delete = 0; 
        }
        

        if($save_group > 0) {
                     $this->returnJson(
                    array(
                        'status' => lang('lbl_success'), 
                        'message' => lang('msg_data_has_been_saved'), 
                        'data' => null,
                        'href' => $this->controller_setting  .'/'.$this->controller_group
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
        $user            = $this->data;
        $group_id        = $this->input->post('group_id');
        $group_nama      = $this->input->post('group_nama');
        $group_keterangan= $this->input->post('group_keterangan');
        $group_status    = $this->input->post('group_status');
        $group_is_view   = $this->input->post('is_view');
        $group_is_add    = $this->input->post('is_add');
        $group_is_edit   = $this->input->post('is_edit');
        $group_is_delete = $this->input->post('is_delete');
        $create_by       = $user['user_nip'];
        $create_date     = date('Y-m-d');
        $update_by       = $user['user_nip'];
        $update_date     = date('Y-m-d');
        
        if (is_null($group_status) || $group_status == '') {
            $group_status = 0;
        }

        $updateData    = array(
            'set_value' => "group_nama = '".$group_nama."',
                            group_keterangan = '".$group_keterangan."',
                            group_status = ".$group_status.",
                            update_by = '".$update_by."',
                            update_date = '".$update_date."'",
            'from'      => $this->set_group,
            'where'     => "group_id = '".$group_id."'"
        );

        $updateGroup = $this->model_basic_db2->update_data($updateData); 

        $deleteData = array(
                'from' => $this->set_group_priviledge,
                'where' => "group_id = '".$group_id."'"
            );

        $deletePriviledge    = $this->model_basic_db2->delete_data($deleteData);

        if (isset($group_is_view)) {
            foreach ($group_is_view as $data_is_view) {
                if (isset($data_is_view)) {
                    $is_view = 1;
                }
                $data_priviledge = array(
                    'from' => $this->set_group_priviledge,
                    'set_value' => "(
                        ".$group_id .",
                        '".$data_is_view."',
                        ".$is_view.",
                        0,
                        0,
                        0,
                        '".$create_by."',
                        '".$create_date."',
                        null,
                        null
                    )"
                );
                // echo "<pre>";print_r($data_is_view);echo "</pre>";
                $save_priviledge = $this->model_basic_db2->insert_data($data_priviledge);
            }
        }
        
        if (isset($group_is_add)) {
            $is_add = 0;
            foreach ($group_is_add as $data_is_add) {
                if (isset($data_is_add)) {
                    $is_add = 1;
                }
                $update_priviledge    = array(
                    'set_value' => "is_add = ".$is_add,
                    'from'      => $this->set_group_priviledge,
                    'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_add
                );
                // echo "<pre>";print_r($update_priviledge);echo "</pre>";
                $update = $this->model_basic_db2->update_data($update_priviledge); 
                $is_add = 0;
            }
        }

        if (isset($group_is_edit)) {
            $is_edit = 0;
            foreach ($group_is_edit as $data_is_edit) {
                if (isset($data_is_edit)) {
                    $is_edit = 1;
                }
                $update_priviledge    = array(
                    'set_value' => "is_edit = ".$is_edit,
                    'from'      => $this->set_group_priviledge,
                    'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_edit
                );
                // echo "<pre>";print_r($update_priviledge);echo "</pre>";
                $update = $this->model_basic_db2->update_data($update_priviledge); 
                $is_edit = 0;
            }
        }

        if (isset($group_is_view)) {
            $is_delete = 0;
            foreach ($group_is_delete as $data_is_delete) {
                if (isset($data_is_delete)) {
                    $is_delete = 1;
                }
                $update_priviledge    = array(
                    'set_value' => "is_delete = ".$is_delete,
                    'from'      => $this->set_group_priviledge,
                    'where'     => "group_id = ". $group_id ." AND menu_id = ".$data_is_delete
                );
                // echo "<pre>";print_r($update_priviledge);echo "</pre>";
                $update = $this->model_basic_db2->update_data($update_priviledge);
                $is_delete = 0; 
            }
        }
        

        if($updateGroup > 0) {
            $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_data_has_been_update'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_group
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

        $dataGroup = array(
                'from' => $this->set_group,
                'where' => "group_id = '".$id."'"
            );

        $deleteGroup    = $this->model_basic_db2->delete_data($dataGroup);

        $deleteDataPriviledge = array(
                'from' => $this->set_group_priviledge,
                'where' => "group_id = '".$id."'"
            );

        $deletePriviledge    = $this->model_basic_db2->delete_data($deleteDataPriviledge);
        if($deletePriviledge > 0) {
             $this->returnJson(
                array(
                    'status' => lang('lbl_success'), 
                    'message' => lang('msg_delete_success'), 
                    'data' => null,
                    'href' => $this->controller_setting  .'/'.$this->controller_group
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