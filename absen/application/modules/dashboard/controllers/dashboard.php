<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard extends MY_Controller {

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

        $this->load->view('header', $data);
        $this->load->view('dashboardView');
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
		$sql = "SELECT tb_kehadiran_pea.id_kehadiran, tb_kehadiran_pea.nik_pegawai, tb_kehadiran_pea.nama, tb_kehadiran_pea.nama_event, tb_kehadiran_pea.no_kursi, tb_kehadiran_pea.tanggal_kehadiran, tb_nominasi.nama_nominasi
		from tb_kehadiran_pea 
		LEFT JOIN tb_event_pea on tb_kehadiran_pea.id_event_pea = tb_event_pea.id_event_pea 
		LEFT JOIN tb_pevita_user on tb_kehadiran_pea.nik_pegawai = tb_pevita_user.nik_pegawai
		LEFT JOIN tb_nominasi on tb_pevita_user.id_nominasi = tb_nominasi.id_nominasi where tb_event_pea.tanggal_event = '".$tanggal_now."' order by tb_kehadiran_pea.id_kehadiran desc";
        $query = $this->db->query($sql);
        $data = [];
            foreach($query->result() as $r) {
				$datetime = explode(" ",$r->tanggal_kehadiran);
                 $data[] = array(
                      $r->id_kehadiran,
                      $r->nik_pegawai,
                      $r->nama,
					  $r->nama_nominasi,
					  $r->no_kursi,
					  $datetime[1]
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

		if(strlen($data['nik_pegawai']) == 6){
			$sql = "SELECT * FROM tb_kehadiran_pea where nik_pegawai='".$data['nik_pegawai']."'";
			$cek = $this->db->query($sql)->num_rows();
			if ($cek<=0){
				$sukses = $this->db->insert('tb_kehadiran_pea', $data);
					if($sukses){
						$ret=array(
							'success'=>true,
							'type'=>'success',
							'msg'=>'Absensi Berhasil!!!'
						);	
					}
			}else{
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