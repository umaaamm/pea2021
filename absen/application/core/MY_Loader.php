<?php
(defined('BASEPATH')) or exit('No direct script access allowed');

/* load the HMVC_Loader class */
require APPPATH . 'third_party/HMVC/Loader.php';

class MY_Loader extends HMVC_Loader {

    public function getDetailLookup($namaLookUp,$value){
        $data = array(
            'select'        => 'label',
            'where_array'   =>array( 
                            'name' => $namaLookUp,
                            'value' => $value
            )
        );
        $lookup = $this->model_basic->get_data($this->set_lookup,$data)->row();

        return $lookup->label;
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

    public function getNamaInstitusi($id){
        $data = array(
            'select'        => 'nama',
            'where_array'   =>array( 
                            'id' => $id
            )
        );
        $institusi = $this->model_basic->get_data($this->bank_institusi,$data)->row();

        return $institusi->nama;
    }

    public function currencyFormat($value){
        return number_format($value,'0','.',',');
        // 100,000,000
    }

    public function decimalFormat($value){
        return number_format($value,'5','.',',');
        // 0.00000
    }

    public function dateFormat($date){
        return date("d F Y", strtotime($date));
        // 1 January 2017
    }

    public function getInstitusi($id){
        $data = array(
            'select'        => 'nama',
            'where_array'   =>array( 
                            'id' => $id
            )
        );
        $institusi = $this->model_basic->get_data($this->bank_institusi,$data)->row();

        return $institusi;
    }

    public function getListInstitusi(){
        $data = array(
            'select'        => '*',
            'order_by'      => 'id'
        );
        $listinstitusi = $this->model_basic->get_data($this->bank_institusi,$data)->result_array();

        return $listinstitusi;
    }

    public function getPerjanjianBank($nomor_perjanjian){
        $data = array(
            'select'        => '*',
            'where_array'   =>array( 
                            'nomor' => $nomor_perjanjian
            )
        );
        $bank_perjanjian = $this->model_basic->get_data($this->bank_perjanjian,$data)->row();
        return $bank_perjanjian;
    }

    public function getListPerjanjianByInstitusi($id_institusi){
        $data = array(
            'select'        => '*',
            'where_array'   => array(
                                'id_institusi'=>$id_institusi
            ),
            'order_by'      => 'tanggal'
        );
        $list_perjanjian = $this->model_basic->get_data($this->bank_perjanjian,$data)->result_array();
        return $list_perjanjian;
    }

}