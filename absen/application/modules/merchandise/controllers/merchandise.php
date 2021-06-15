<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merchandise extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->cek_login();
	}

    public function index(){
        $data                           = $this->data;
        $menu                           = $this->model_main->get_akses($this->merchandise,$data['user_group']);
        $parent_menu                    = $this->model_main->get_akses($this->merchandise,$data['user_group']);
        $data['akses']                  = $this->get_akses($data['user_id'],$this->merchandise);
        $data['today_date']             = date('d-m-Y');
        $data['menu_id']                = $this->merchandise;
        $data['menu_nama']              = $menu->menu_nama;
        $data['menu_controller']        = $this->controller_merchandise;
        $data['parent_menu_id']         = $this->merchandise;
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
        $tanggal_now = date("d-m-Y");
		$sql = "SELECT tb_merchandise_pea.id_merchandise, tb_merchandise_pea.nik_pegawai, tb_merchandise_pea.nama, tb_merchandise_pea.tanggal_pengambilan from tb_merchandise_pea INNER JOIN tb_event_pea on tb_merchandise_pea.id_event_pea = tb_event_pea.id_event_pea where tb_event_pea.tanggal_event = '".$tanggal_now."' order by tb_merchandise_pea.id_merchandise desc";
        $query = $this->db->query($sql);
        $data = [];
            foreach($query->result() as $r) {
                 $data[] = array(
                      $r->id_merchandise,
                      $r->nik_pegawai,
                      $r->nama,
                      $r->tanggal_pengambilan
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
		$splittedstring=explode("|", $decript);
		$data['nik_pegawai'] = $splittedstring[0];
		$data['nama'] = $splittedstring[1];
		$data['id_event_pea'] = $splittedstring[2];
		$data['jabatan'] = $splittedstring[3];
		$data['no_hp'] = $splittedstring[4];
        $data['no_kursi'] = $splittedstring[5];
		$data['unit_kerja'] = $splittedstring[6];
		$data['nama_event'] = $splittedstring[7];

		if(strlen($data['nik']) == 6){
			$sql = "SELECT * FROM tb_merchandise_pea where nik_pegawai='".$data['nik_pegawai']."'";
			$cek = $this->db->query($sql)->num_rows();
			if ($cek<=0){
				$sukses = $this->db->insert('tb_merchandise_pea', $data);
					if($sukses){
						$ret=array(
							'success'=>true,
							'type'=>'success',
							'msg'=>'Absensi Berhasil!!!'
						);	
					}
			}  else{
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