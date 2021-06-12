<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_main extends CI_Model{
    function get_menu_parent( $group_id ="" ){

    	$query 	= $this->db->query( 'SELECT
			gp.group_id,
			gr.group_nama,
			gp.menu_id,
			mn.menu_nama,
			mn.menu_parent_id,
			mn.menu_no_urut,
			mn.menu_controller,
			mn.menu_have_child,
			mn.menu_icon,
			gp.is_view,
			gp.is_add,
			gp.is_edit,
			gp.is_delete
			FROM
			set_group_priviledge as gp
			LEFT JOIN set_group as gr ON gr.group_id = gp.group_id
			LEFT JOIN set_menu as mn ON mn.menu_id = gp.menu_id
			WHERE
			gp.group_id = '.$group_id.' AND
			mn.menu_parent_id = 0 AND gp.is_view = 1
			ORDER BY
			mn.menu_no_urut ASC')->result_array();

		return $query;
	}

	function get_menu_child( $group_id ="", $user_parent_id="" ){
		$query 	= $this->db->query( 'SELECT
			gp.group_id,
			gr.group_nama,
			gp.menu_id,
			mn.menu_nama,
			mn.menu_parent_id,
			mn.menu_no_urut,
			mn.menu_controller,
			mn.menu_have_child,
			mn.menu_icon,
			gp.is_view,
			gp.is_add,
			gp.is_edit,
			gp.is_delete
			FROM
			set_group_priviledge as gp
			LEFT JOIN set_group as gr ON gr.group_id = gp.group_id
			LEFT JOIN set_menu as mn ON mn.menu_id = gp.menu_id
			WHERE
			gp.group_id = '.$group_id.' AND
			mn.menu_parent_id = '.$user_parent_id.' AND 
			gp.is_view = 1
			ORDER BY
			mn.menu_no_urut ASC')->result_array();

		return $query;
	}

	public function get_menu_name($tabel="",$id=""){
		$this->db->where('id',$id);
		$data = $this->db->get($tabel)->row();
        if(lang($data->target))
            $d['nama'] = lang($data->target);
        else
    		$d['nama'] = $data->nama;

        if(lang(strtolower(str_replace(' ','_',$data->keterangan))))
            $d['keterangan'] = lang(strtolower(str_replace(' ','_',$data->keterangan)));
        else
    		$d['keterangan'] = $data->keterangan;

        return $d;
	}

    function get_akses($menu_id = 0, $user_group = 0 ){
		return $this->db->query( 'SELECT
			gp.menu_id,
			mn.menu_nama,
			mn.menu_controller,
			gp.is_view,
			gp.is_add,
			gp.is_edit,
			gp.is_delete
			FROM
			set_group_priviledge as gp
			LEFT JOIN set_group as gr ON gr.group_id = gp.group_id
			LEFT JOIN set_menu as mn ON mn.menu_id = gp.menu_id
			WHERE
			gp.group_id = '.$user_group.' AND
			gp.menu_id = '.$menu_id)->row();
	}
}