<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchandise extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->cek_login();
	}

    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->dashboard_menu_id,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->dashboard_menu_id,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->dashboard_menu_id);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->dashboard_menu_id;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_dashboard;
        $data['parent_menu_id']         = $this->dashboard_menu_id;
        $data['parent_menu_nama']       = $parent_menu->menu_nama; 
        $data['parent_menu_controller'] = $this->controller_dashboard; 
        $data['function_nama']          = 'index';
        $data['title_site']             = $menu->menu_nama; 
        $data['breadcrumbs']        	= array(
            1   => array(
                'target'    => $parent_menu->menu_controller,
                'nama'      => $this->translate($parent_menu->menu_nama)
            )
        );

        // echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('header', $data);
        $this->load->view('merchandise');
        $this->load->view('footer');
    }

    
    function get_json(){
        $user	= $this->data;
		$ret 	= array(
			'total'=>0,
			'rows'=>array()
        );

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $sql = "SELECT seq, nik, nama from kehadiran where townhall = '".$user['branch_id']."'  order by seq desc";
        $query = $this->db->query($sql);
        $data = [];

            foreach($query->result() as $r) {
                 $data[] = array(
                      $r->seq,
                      $r->nik,
                      $r->nama
                 );
            }

            $ret = array(
                      "draw" => $draw,
                       "recordsTotal" => $query->num_rows(),
                       "recordsFiltered" => $query->num_rows(),
                       "data" => $data
                  );
		header('Content-Type: application/json');
		echo json_encode($ret);		
    }

    function act_add(){
        $user  = $this->data;
		$ret=array(
			'success'=>false,
			'type'=>'error',
			'msg'=>'Absensi gagal!!!'
		);

		$decript =  $this->dekripsi($this->input->post('qr'));
		// print_r($decript);die();
		$splittedstring=explode("|", $decript);
		$data['nik'] = $splittedstring[0];
		$data['nama'] = $splittedstring[1];
		$data['rek_tab_emas'] = $splittedstring[2];
		$data['hp'] = $splittedstring[3];
		$data['id_transaksi_gte'] = $splittedstring[4];
        $data['townhall'] = $user['branch_id'];
		$data['tanggal']= date('Y-m-d');

		if(strlen($data['nik']) == 6){
			$sql = "SELECT * FROM kehadiran where nik='".$data['nik']."'";
			//$result  = $this->db->select('nik')->from('kehadiran')->where('nik', $data['nik'])->where('townhall', $data['townhall'])->get()->num_rows();
			$cek = $this->db->query($sql)->num_rows();
			
			//$this->db->select("nik");
			//$this->db->where('townhall', $user['branch_id']);
			//$this->db->where('nik', $data['nik']);
			//$query2 = $this->db->get('kehadiran')->num_rows();
			
			if ($cek<=0){
				//echo("absen baru");
				$sukses = $this->db->insert('kehadiran', $data);
					if($sukses){
						$ret=array(
							'success'=>true,
							'type'=>'success',
							'msg'=>'Absensi Berhasil!!!'
						);	
					}
			}  else{
				//echo("absen sudah dilakukan");
				$ret=array(
					'success'=>true,
					'type'=>'error',
					'msg'=>'Absen telah dilakukan!!!'
				);
			}
		}else{
			$ret=array(
				'success'=>true,
				'type'=>'error',
				'msg'=>'QR Code Tidak Valid!!!'
			);
		}

		header('Content-Type: application/json');		
		echo json_encode($ret);	
	}
    
    function enkripsi($string) {
		$secret_key = 'P3g4Da!Anm47u';
		$secret_iv  = 'Ad3eR!5w4n';
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		return $output;
	}

	function dekripsi($string ) {
		$secret_key = 'P3g4Da!Anm47u';
		$secret_iv  = 'Ad3eR!5w4n';
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		return $output;
	}
}