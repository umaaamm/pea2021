<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_basic_db2 extends CI_Model{

    /*
        PANDUAN GET DATA
        WHERE 1 KONDISI
        $select = array(
                'select'      => '*',
                'from' => $this->set_user,
                'where' => "username = '".$username."'"
                )
            );

        WHERE LEBIH DARI 1 KONDISI
        $select = array(
                'select'      => '*',
                'from' => $this->set_user,
                'where' => array(
                   array('where' => "username = '".$username."'"), --> contoh value string
                   array('where' => "user_status = $status") --> contoh value integer
                )
            );


         $update    = array(
                'set_value' => array(
                    array('set_value' => 'USER_LAST_LOGIN'=>date('Y-m-d H:i:s'),
                    array('set_value' => 'user_status = $status')
                )
            );
    */
    
    function get_data($data=array()){
        $select = '';
        $from = '';
        $where = '';
        $order_by  = '';
        $group_by = '';
        $join_type = '';
        $join = '';
        $join_on = '';

        if(isset($data['select'])){
            $select = "SELECT ".$data['select']." ";
        }
        if(isset($data['from'])){
            $from = "FROM ".$this->schema.$data['from']." ";
        }
        if(isset($data['group_by']) && $data['group_by'] != ""){
            $group_by = " GROUP BY ".$data['group_by'];
        }
        if(isset($data['order_by']) && $data['order_by'] != ""){
            $order_by = " ORDER BY ".$data['order_by'];
        }

        if(isset($data['join'])){
            if (is_array($data['join'])) {
                foreach ($data['join'] as $joinList) {
                    if(isset($joinList['join_type']) && isset($joinList['join_on_a']) && isset($joinList['join_on_b'])){
                    $join .= " ".$joinList['join_type']." JOIN ".$this->schema.$joinList['join']." ON ".$this->schema.$joinList['join_on_a']." = ".$this->schema.$joinList['join_on_b'];    
                    } else {
                        $join .= " JOIN ".$this->schema.$joinList['join'];
                    } 
                }
            } else {
                if(isset($joinList['join_type']) && isset($joinList['join_on_a']) && isset($joinList['join_on_b'])){
                    $join = " ".$joinList['join_type']." JOIN ".$this->schema.$joinList['join']." ON ".$this->schema.$joinList['join_on_a']." = ".$this->schema.$joinList['join_on_b'];   
                    } else {
                        $join .= " JOIN ".$this->schema.$joinList['join'];
                    } 
            }
        }

        if (isset($data['where'])) {
            if (is_array($data['where'])) {
                $i=1;
                $where = " WHERE";
                foreach ($data['where'] as $whereList) {
                    if ($i==1) {
                        $where .= " ".$whereList["where"];
                    }else{
                        $where .= " AND ".$whereList["where"];
                    }
                    $i++;
                }
            }else{
                $where = " WHERE ". $data['where'];
            }
        }
           
        $query = $select.$from.$join_type.$join.$join_on.$where.$group_by.$order_by;
        // echo "<pre>";print_r($query);echo "</pre>";
        
        $data = $this->db->query($query);
        	
        return $data;
    }

    function get_data_by_query($query){

        $data = $this->db->query($query);
        return $data;
    }

    function update_data($data=array()){
        $set_value = '';
        $from = '';
        $where = '';

        if(isset($data['from'])){
            $from = "UPDATE ".$this->schema.$data['from']." SET";
        }
        if(isset($data['set_value'])){
            if (is_array($data['set_value'])) {
                $i=1;
                foreach ($data['set_value'] as $setValueList) {
                    if ($i==1) {
                        $set_value .= " ".$setValueList["set_value"];
                    }else{
                        $set_value .= ",".$setValueList["set_value"];
                    }
                    $i++;
                }
            }else{
                $set_value = " ". $data['set_value'];
            }
        }
        if(isset($data['where'])){
            if (is_array($data['where'])) {
                $i=1;
                $where = " WHERE";
                foreach ($data['where'] as $whereList) {
                    if ($i==1) {
                        $where .= " ".$whereList["where"];
                    }else{
                        $where .= " AND ".$whereList["where"];
                    }
                    $i++;
                }
            }else{
                $where = " WHERE ". $data['where'];
            }
        }

        $query = $from.$set_value.$where;
        // echo "<pre>";print_r($query);echo "</pre>";
        return $this->db->query($query);
    }

    function insert_data($data=array()){
        $from = '';
        $set_field = '';
        $set_value = '';

        if(isset($data['from'])){
            $from = $data['from'];
        }

        if(isset($data['set_field'])){
            if (is_array($data['set_field'])) {
                $i=1;
                $countData= count($data['set_field']);
                foreach ($data['set_field'] as $field) {
                    if ($i==1) {
                        $set_field .= "(".$field;
                    }else if ($i==$countData) {
                        $set_field .= ",".$field.")";
                    }else{
                        $set_field .= ",".$field;
                    }
                    $i++;
                }
            } else {
                 $set_field = $data["set_field"];
            }
        }

        if(isset($data['set_value'])){
            if (is_array($data['set_value'])) {
                $i=1;
                $countData= count($data['set_value']);
                foreach ($data['set_value'] as $setValueList) {
                    if ($i==1) {
                        $set_value .= "("."'".$setValueList."'";
                    }else if ($i==$countData) {
                        $set_value .= ","."'".$setValueList."'".")";
                    }else{
                        $set_value .= ","."'".$setValueList."'";
                    }
                    $i++;
                }
            }else{
                $set_value = $data["set_value"];
            }
        }
        
        $query = "INSERT INTO ".$this->schema.$from.$set_field." VALUES".$set_value;

//         echo "<pre>";print_r($query);echo "</pre>";

        return $this->db->query($query);
    }

    function delete_data($data=array()){
        $from = '';
        $where = '';

        if(isset($data['from'])){
            $from = "DELETE FROM ".$this->schema.$data['from'];
        }
        if(isset($data['where'])){
            if (is_array($data['where'])) {
                $i=1;
                $where = " WHERE";
                foreach ($data['where'] as $whereList) {
                    if ($i==1) {
                        $where .= " ".$whereList["where"];
                    }else{
                        $where .= " AND ".$whereList["where"];
                    }
                    $i++;
                }
            }else{
                $where = " WHERE ". $data['where'];
            }
        }
        $query = $from.$where;
        // echo "<pre>";print_r($query);echo "</pre>";
        return $this->db->query($query);
    }
        
}