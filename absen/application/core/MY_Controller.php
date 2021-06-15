<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends CI_Controller {

    public $data;

    public $schema = "";
    
    # Deklarasi Controller
    //SETTING
    public $controller_login            = "login";
    public $controller_home             = "home";
    public $controller_setting          = "setting";
    public $controller_menu             = "menu";
    public $controller_user             = "user";
    public $controller_group            = "group";
    public $controller_profile_site     = "profileSite";

    //MASTER DATA
    public $controller_master_data         = "masterData";
    
    public $controller_parameter           = "parameter"; 
    public $controller_lookup              = "lookup";
    

    //DASHBOARD
    public $controller_dashboard        = "dashboard";

    public $controller_merchandise        = "merchandise";
    //DATA EKSTERNAL
    public $controller_eksternal        = "eksternal";

    //KEHADIRAN
    public $controller_kehadiran       = "kehadiran";
    //TRACKING BARANG
    public $controller_tracking_barang      = "tracking";
    // LAPORAN MERCHANDISE
    public $controller_merchandiseLaporan = "merchandiseLaporan";
    
    # ID Controller
    public $setting_id                  = 9000;
    public $menu_id                     = 9001;
    public $user_menu_id                = 9002;
    public $group_menu_id               = 9003;
    public $profile_site_menu_id        = 9004;
    public $dashboard_menu_id           = 1000;

    public $lookup_menu_id              = 6003;

    public $kehadiran_menu_id           = 1003;
    public $tracking_barang_id           = 1004;
    public $merchandiseLaporan           = 1006;
    public $merchandise           = 1005;


    # TBL TEMPLATE
    public $set_profile_site           = "set_profile_site";
    public $set_menu                   = "set_menu";
    public $set_user                   = "set_user";
    public $set_user_group             = "set_user_group";
    public $set_group                  = "set_group";
    public $set_group_priviledge       = "set_group_priviledge";
    public $set_lookup                 = "set_lookup";
    public $set_kehadiran              = "kehadiran";

    public $language_select            = "asset_lang.php";

    
    public function __construct(){
    
        parent::__construct();
    
        date_default_timezone_set('Asia/Jakarta');
    
        $this->load->model('model_basic');
        $this->load->model('model_basic_db2');
        $this->load->model('model_main');
        $this->load->helper('text');
        $this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('user_id')){
    
            $userid           = $this->session->userdata('user_id');
    
        }else{
    
            $userid           = 0;
    
        }

        $data_user = array(
                'select'      => '*',
                'from' => $this->set_user,
                'where' => "user_id = '".$userid."'"
        );

        $data_profile_set = array(
                'select'      => '*',
                'from' => $this->set_profile_site
        );

        if ($userid !=0 || $userid != "0") {
            $user = $this->model_basic_db2->get_data($data_user)->row();
        }else{
            $user = '';
        }
        
        // echo "<pre>";print_r($user);echo "</pre>";
        $site = $this->model_basic_db2->get_data($data_profile_set)->row();

        if ($user == null || $user == '') {
             $array              = array(
        
                        'user_initial'          => '',
                        'user_nip'              => '',
                        'user_nama_lengkap'     => '',
                        'user_id'               => '',
                        'user_language'         => 'english',
                        'user_foto'             => '',
                        'user_group'            => '',
                        'site_judul'            => $site->site_judul,
                        'site_nama'             => $site->site_nama,
                        'site_initial'          => $site->site_initial,
                        'site_logo_kecil'       => $site->site_logo_kecil,
                        'site_logo_besar'       => $site->site_logo_besar,
                        'site_version'          => $site->site_version,
                        'site_copy_right'       => $site->site_copy_right,
                        'menu_list'             => ''
            );
             
        }else{
         
            $get_menu         = $this->get_menu($userid);
            $data_user_group = array(
                'select'      => '*',
                'from' => $this->set_user_group,
                'where' => "user_id = '".$userid."'"
            );
            $user_group_list = $this->model_basic_db2->get_data($data_user_group)->row();
            $user_group     = $user_group_list->group_id;
        
            $exp_nama           = explode(' ',$user->user_nama_lengkap);
            $initial_name       = strtoupper(substr($exp_nama[0],0,1));
            if(isset($exp_nama[1])){
                $initial_name   .= strtoupper(substr($exp_nama[1],0,1));
            }
        
            $array              = array(
        
                        'user_initial'          => $initial_name,
                        'user_nip'              => $user->user_id,
                        'user_nama_lengkap'     => $user->user_nama_lengkap,
                        'user_id'               => $user->user_id,
                        'user_language'         => $user->user_language,
                        'user_foto'             => $user->user_foto,
                        'user_group'            => $user_group,
                        'branch_id'             => $user->branch_id,
                        'site_judul'            => $site->site_judul,
                        'site_nama'             => $site->site_nama,
                        'site_initial'          => $site->site_initial,
                        'site_logo_kecil'       => $site->site_logo_kecil,
                        'site_logo_besar'       => $site->site_logo_besar,
                        'site_version'          => $site->site_version,
                        'site_copy_right'       => $site->site_copy_right,
                        'menu_list'             => $get_menu
            );
        }
        
    
        $this->data = $array;
        $this->bahasa = $this->bahasa($this->data['user_language']);

    }

        

    public function bahasa($language=""){

        $this->load->language('asset',$language);

    }  

    public function get_menu($user_id = ""){
        $get_menu        = array();
        $data = array(
                'select'      => '*',
                'from' => $this->set_user_group,
                'where' => "user_id = '".$user_id."'"
        );
    
        $user_group_list = $this->model_basic_db2->get_data($data)->row();
        // echo "<pre>";print_r($user_group_list->group_id);echo "</pre>";
        $i = 0;
       
            $menu_parent_list    = $this->model_main->get_menu_parent($user_group_list->group_id);
            
            foreach ($menu_parent_list as $menu_parent) {
                $get_menu[$i]['menu_id']            = $menu_parent['menu_id'];
                $get_menu[$i]['menu_nama']          = $menu_parent['menu_nama'];
                $get_menu[$i]['menu_controller']    = $menu_parent['menu_controller'];
                $get_menu[$i]['menu_icon']          = $menu_parent['menu_icon'];

                $sub_menu_list = $this->model_main->get_menu_child($user_group_list->group_id, $menu_parent['menu_id']);
                // echo "<pre>";print_r($sub_menu_list);echo "</pre>";
                $j = 0;
                foreach ($sub_menu_list as $sub_menu) {
                    if ($sub_menu['menu_have_child'] == 1) {
                        $get_menu[$i]['submenu'][$j]['menu_id']          = $sub_menu['menu_id'];
                        $get_menu[$i]['submenu'][$j]['menu_nama']        = $sub_menu['menu_nama'];
                        $get_menu[$i]['submenu'][$j]['menu_controller']  = $sub_menu['menu_controller'];
                        $get_menu[$i]['submenu'][$j]['menu_icon']        = $sub_menu['menu_icon'];

                        $sub_menu_list = $this->model_main->get_menu_child($user_group_list->group_id, $sub_menu['menu_id']);
                        $k = 0;
                        foreach ($sub_menu_list as $sub_menu) {
                            $get_menu[$i]['submenu'][$j]['submenu'][$k]['menu_id']          = $sub_menu['menu_id'];
                            $get_menu[$i]['submenu'][$j]['submenu'][$k]['menu_nama']        = $sub_menu['menu_nama'];
                            $get_menu[$i]['submenu'][$j]['submenu'][$k]['menu_controller']  = $sub_menu['menu_controller'];
                            $get_menu[$i]['submenu'][$j]['submenu'][$k]['menu_icon']        = $sub_menu['menu_icon'];
                            
                            $k++;
                        }
                    }else{
                        $get_menu[$i]['submenu'][$j]['menu_id']          = $sub_menu['menu_id'];
                        $get_menu[$i]['submenu'][$j]['menu_nama']        = $sub_menu['menu_nama'];
                        $get_menu[$i]['submenu'][$j]['menu_controller']  = $sub_menu['menu_controller'];
                        $get_menu[$i]['submenu'][$j]['menu_icon']        = $sub_menu['menu_icon'];
                    }
                    $j++;
                }
                $i++;
            }
        // echo "<pre>";print_r($get_menu);echo "</pre>";
        return $get_menu;

    }

    public function cek_login(){
        if( $this->session->userdata('user_id')){
            return $this->session->userdata('user_id');
        }
        else{
            redirect('login');
        }
    }
 

    public function get_akses( $user_id = 0 , $id_menu = 0 ){

        $data_group = array(
                'select'      => '*',
                'from' => $this->set_user_group,
                'where' => "user_id = '".$user_id."'"
            );
    
        $user_group_list = $this->model_basic_db2->get_data($data_group)->row();

        $user_group     = $user_group_list->group_id;
        
        $rs = $this->model_main->get_akses($id_menu, $user_group);
        
        $data['is_view']   = $rs->is_view;
        $data['is_add']    = $rs->is_add;
        $data['is_edit']   = $rs->is_edit;
        $data['is_delete'] = $rs->is_delete;

        return $data;

    }

    public function returnJson($message){

        echo json_encode($message);

        exit;

    }

    public function deleteDir($dirPath) {

        if (! is_dir($dirPath)) {

            throw new InvalidArgumentException("$dirPath must be a directory");

        }

        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {

            $dirPath .= '/';

        }

        $files = glob($dirPath . '*', GLOB_MARK);

        foreach ($files as $file) {

            if (is_dir($file)) {

                self::deleteDir($file);

            } else {

                @unlink($file);

            }

        }

        @rmdir($dirPath);

    }

    function get_language( $folder = "" ){

        $dir    = getcwd().'/application/language'.$folder;

        $files  = scandir($dir);

    

        $data = array();

        foreach( $files as $f ){

            if( ( $f != "." ) && ( $f != ".." ) && ( $f != "index.html" ) ) $data[] = $f;

        }

        return $data;

    }

    function download($name,$content){

        $this->load->helper('download'); 

        $data = file_get_contents($content);

        force_download($name,$data);

    }

    function mydate($date) {

        $arrayBulan = array(lang('lbl_january'), lang('lbl_february'), lang('lbl_march'), lang('lbl_april'), lang('lbl_may'), lang('lbl_june'), lang('lbl_july'), lang('lbl_august'), lang('lbl_september'), lang('lbl_october'), lang('lbl_november'), lang('lbl_december'));

        $tahun      = date('Y',strtotime($date));

        $bulan      = date('m',strtotime($date));

        $tgl        = date('d',strtotime($date));

        $result     = $tgl . " " . $arrayBulan[(int)$bulan-1] . " ". $tahun;

        return($result);

    }

    function redirect_menu($id_modul=0,$id_level=0){

        $menu = $this->model_basic->get_data($this->tbl_menu,array('where_array'=>array('id_modul'=>$id_modul,'parent_id'=>0),'sort_by'=>'urutan'))->result();

        foreach($menu as $mn){

            $modul = $this->model_basic->get_data($this->tbl_modul,array('where_array'=>array('id'=>$mn->id_modul)))->row();

            $akses = $this->model_main->get_cek_akses( $this->tbl_user_akses, $id_level , $mn->id );

            if($akses > 0){

                $submenu = $this->model_basic->get_data($this->tbl_menu,array('where_array'=>array('parent_id'=>$mn->id),'sort_by'=>'urutan'))->result();

                if(count($submenu) > 0){

                    foreach($submenu as $sm){

                        $akses = $this->model_main->get_cek_akses( $this->tbl_user_akses , $id_level , $sm->id );

                        if($akses > 0){

                            redirect($modul->target . '/' . $mn->target . '/' . $sm->target);

                            exit;

                        }

                    }

                }else{

                    redirect($modul->target . '/' . $mn->target);

                    exit;

                }

            }

        }

    }

    function codeGenerator($tabel="",$prefix="",$jumlah_digit=0,$where_array=array(),$field="kode"){

        if($jumlah_digit == 0)

            $jumlah_digit = 3;

        $attr   = array(

            'field_like'    => $field,

            'like'          => $prefix,

            'select_max'    => $field

        );

        if(count($where_array) > 0)

            $attr['where_array']    = $where_array;

        

        $result   = $this->model_basic->get_data($tabel,$attr)->row();



        $code_max   = $result->$field;

        $code       = (int) substr($code_max,strlen($prefix),$jumlah_digit);

        $new_code   = $code + 1;



        if($jumlah_digit == 1)

            return $prefix . $new_code;

        else

            return $prefix . sprintf("%0".$jumlah_digit."s",$new_code);

    }

    function get_company($folder=""){

        $dir    = getcwd().'/assets/config/'.$folder;

        $files  = scandir($dir);

    

        $data = array();

        foreach( $files as $f ){

            if( ( $f != "." ) && ( $f != ".." ) && ( $f != "password.ini" ) && ( $f != "config.ini" ) ){

                $pecah  = explode('.',$f);

                $data[] = $pecah[0];

            }

        }

        return $data;

    }

    function get_file($folder=""){

        $dir    = getcwd().'/'.$folder;

        $files  = scandir($dir);

    

        $data = array();

        foreach( $files as $f ){

            if( ( $f != "." ) && ( $f != ".." ) ){

                $data[] = $f;

            }

        }

        return $data;

    }

    public function get_config($folder="",$config=""){

        if($config!=""){

            $file               = FCPATH . 'assets/config/'.$folder.'/'.$config.'.ini';

            if(file_exists($file)){

                $isi_file           = file_get_contents($file);

                $data               = json_decode($isi_file,true);

            }else{

                $data['group_db']   = "default";

            }

        }else{

            $data['group_db']   = "default";

        }

        return $data;

    }

    function generate_serial($email=""){

        $serial = 0; 

        for($i=0;$i<strlen($email);$i++){

            $serial += ord($email[$i]);

        }

        return $serial;

    }

    function serial_number($email="",$jml_company=1,$jml_user=1,$masa_aktif="bulan"){

        $serial = 0; 

        for($i=0;$i<strlen($email);$i++){

            $serial += ord($email[$i]);

        }

        $serial  += ( $jml_company * $jml_user );

        if($serial % 2 == 0){

            $key1   = $serial / 2;

            $key2   = $key1;

        }else{

            $key1   = ( $serial + 1 ) / 2;

            $key2   = $key1 - 1;

        }

        if(strlen($jml_company) == 1)

            $company = strrev(ord($jml_company)) + $key1;

        else

            $company = $jml_company + $serial;

        $user   = $key2 + $jml_user + $company;

        if($masa_aktif=="bulan")

            $satu_periode   = date('Y-m-d',strtotime('+1 month',strtotime(date('Y-m-d'))));

        else

            $satu_periode   = date('Y-m-d',strtotime('+1 year',strtotime(date('Y-m-d'))));

        $tanggal_expired    = date('Y-m-d',strtotime('-1 day',strtotime($satu_periode)));

        $exp    = strtotime($tanggal_expired) - $user;

        return $serial.'-'.$company.'-'.$user.'-'.$exp;

    }

    function view_serial($serial=""){

        $sub        = explode('-',$serial);

        if(count($sub) == 4){

            if($sub[0] % 2 == 0){

                $key1   = $sub[0] / 2;

                $key2   = $key1;

            }else{

                $key1   = ( $sub[0] + 1 ) / 2;

                $key2   = $key1 - 1;

            }

            $nil1       = strrev($sub[1] - $key1);

            if(strlen($nil1) == 1){

                $nil1   .= '0';

            }

            if(strlen($nil1) == 2)

                $company    = chr($nil1);

            else

                $company    = $sub[1] - $sub[0];

            $user       = $sub[2] - $sub[1] - $key2;

            $seri       = $sub[0] - ($company * $user);

            $data       = array(

                'serial'        => $seri,

                'company_limit' => $company,

                'user_limit'    => $user,

                'expired'       => date('d-m-Y',$sub[3]+$sub[2])

            );

        }else{

            $data       = array(

                'serial'        => 0,

                'company_limit' => 0,

                'user_limit'    => 0,

                'expired'       => 0

            );

        }

        return $data;

    }

    function enkripsi($input) {

        return strtr(base64_encode($input), '+/=', '-_|');

    }

    function dekripsi($input) {

        return base64_decode(strtr($input, '-_|', '+/='));

    }

    function readCSV($csvFile){

        $file  = fopen($csvFile, 'r');

        while (!feof($file) ) {

            $data[] = fgetcsv($file, 1024);

        }

        fclose($file);

        return $data;

    }


    public function upload_gambar(){

        $config['upload_path'] = FCPATH . "uploads/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']   = '5000';
        $config['overwrite']  = 'TRUE';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('file');
        $upload = $this->upload->data();

        if ($upload) {

            $path = $upload['file_path'];
            $ext = $upload['file_ext'];
            $name = $upload['file_name'];
            $newname = uniqid();
            $neworig = $newname . "-original".$ext;
            rename($upload['full_path'], $path . $neworig);

            $uploaded = "userdata/temp/uploads/$neworig";

            return $neworig;
        }

    }

    function getTweets($hash_tag) {



        $url = 'http://search.twitter.com/search.atom?q='.urlencode($hash_tag) ;

        echo '<p>Connecting to <strong>'.$url.'</strong>&hellip;</p>';

        $ch = curl_init($url);

        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $xml = curl_exec ($ch);

        curl_close ($ch);

    

        //If you want to see the response from Twitter, uncomment this next part out:

        echo '<p>Response:</p>';

        echo '<pre>'.htmlspecialchars($xml).'</pre>';

    

        $affected = 0;

        $twelement = new SimpleXMLElement($xml);

        foreach ($twelement->entry as $entry) {

            $text = trim($entry->title);

            $author = trim($entry->author->name);

            $time = strtotime($entry->published);

            $id = $entry->id;

            echo '<p>Tweet from '.htmlspecialchars($author).': <strong>'.htmlspecialchars($text).'</strong>  <em>Posted '.date('n/j/y g:i a',$time).'</em></p>';

        }

    

        return true ;

    }

    function translate($str=""){

        if(lang('con_'.str_replace(' ','_',strtolower($str))))

            return lang('con_'.str_replace(' ','_',strtolower($str)));

        else

            return ucwords($str);

    }


    function getDatatableAjax($data){
        $tableHeaderList = $data->list_fields();
        $tableBodyList   = $data->result_array();
        $html = '   <script src="templates/assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
                    <table class="table table-striped table-bordered table-hover" id="datatableListNoTools">
                    <thead><tr>';
                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                {
        $html .=            '<th style="font-size: 12px;">'.$tableHeaderList[$i].'</th>';
                }
        $html .=        '</tr>
                    </thead>
                    <tbody>';
            foreach ($tableBodyList as $tableBody) {
        $html .=        '<tr>';
                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                {
                    if (is_numeric($tableBody[$tableHeaderList[$i]])) {
        $html .=            '<td style="font-size: 12px;">'.str_replace(",","",$tableBody[$tableHeaderList[$i]]).'</td>';
                    }else{
        $html .=            '<td style="font-size: 12px;">'.$tableBody[$tableHeaderList[$i]].'</td>'; 
                    }
                }
        $html .=        '</tr>';
            }
        $html .= '   </tbody></table>';

        return $html;
    }

    function exportExcel($data,$title){
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=".$title.".xls");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);

        echo '<h2>'.$title.'</h2>';
        $tableHeaderList = $data->list_fields();
        $tableBodyList   = $data->result_array();
        echo '  <table border="1">
                    <thead><tr>';
                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                {
        echo            '<th>'.$tableHeaderList[$i].'</th>';
                }
        echo        '</tr>
                    </thead>
                    <tbody>';
            foreach ($tableBodyList as $tableBody) {
        echo        '<tr>';
                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                {
                    if (is_numeric($tableBody[$tableHeaderList[$i]])) {
        echo            '<td>'.str_replace(",","",$tableBody[$tableHeaderList[$i]]).'</td>';
                    }else{
        echo            '<td>'.$tableBody[$tableHeaderList[$i]].'</td>'; 
                    }
                }
        echo        '</tr>';
            }
        echo '</tbody></table>';
    }

    public function replaceKoma($value){
        return str_replace(',','',$value);
        // 100,000,000 => 100000000
    }

    public function currencyFormat($value){
        return number_format($value,'0','.',',');
        // 100.000.000
    }

    public function getLookup($namaLookUp){
        $data = array(
            'select'        => '*',
            'where_array'   =>array( 
                            'name' => $namaLookUp
            ),
            'order_by'      => 'no_urut'
        );
        $lookup = $this->model_basic->get_data($this->set_lookup,$data)->result_array();
        return $lookup;
    }

}