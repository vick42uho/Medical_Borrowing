<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Status_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	public function list_status()
	{
		$querystatus = $this->db->get('tbl_m_devices_status');
        return $querystatus->result();
    }

    public function list_status_return()
    {
        $this->db->where('s_id in(1, 3, 4)');
        $querystatus = $this->db->get('tbl_m_devices_status');
        return $querystatus->result();
    }




    public function addstatus_db()
    {
        $data = array(
            's_name' => $this->input->post('s_name')
        );

        $query = $this->db->insert('tbl_m_devices_status', $data);

        
    }


    public function read($s_id){
        $this->db->select('*');
        $this->db->from('tbl_m_devices_status');
        $this->db->where('s_id',$s_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }


    public function editstatus_db()
    {

        $data = array(
            's_name' => $this->input->post('s_name')
        );

        $this->db->where('s_id', $this->input->post('s_id'));
        $query = $this->db->update('tbl_m_devices_status', $data);

        
    }

    public function delstatus_db($s_id)
    {
        $this->db->delete('tbl_m_devices_status',array('s_id'=>$s_id));
        
    }




}
