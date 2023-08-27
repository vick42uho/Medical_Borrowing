<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Type_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	public function list_type()
	{
		$query = $this->db->get('tbl_m_devices_type');
        return $query->result();
    }

    public function addtype_db()
    {
        $data = array(
            't_name' => $this->input->post('t_name')
        );

        $query = $this->db->insert('tbl_m_devices_type', $data);

        
    }


    public function read($t_id){
        $this->db->select('*');
        $this->db->from('tbl_m_devices_type');
        $this->db->where('t_id',$t_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }


    public function edittype_db()
    {

        $data = array(
            't_name' => $this->input->post('t_name')
        );

        $this->db->where('t_id', $this->input->post('t_id'));
        $query = $this->db->update('tbl_m_devices_type', $data);

        
    }

    public function deltype_db($t_id)
    {
        $this->db->delete('tbl_m_devices_type',array('t_id'=>$t_id));
        
    }




}
