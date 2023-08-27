<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Position_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	public function list_position()
	{
		$query = $this->db->get('tbl_position');
        return $query->result();
    }

    public function addposition()
    {
        $data = array(
            'pname' => $this->input->post('pname')
        );

        $query = $this->db->insert('tbl_position', $data);

        // if ($query) {
        //     echo "<script>";
        //     echo "alert('เพิ่มตำแหน่งเรียบร้อยแล้ว');";
        //     echo "</script>";
        // }else {
        //     echo "<script>";
        //     echo "alert('เพิ่มตำแหน่งไม่สำเร็จ');";
        //     echo "</script>";
        // }
    }


    public function read($pid){
        $this->db->select('*');
        $this->db->from('tbl_position');
        $this->db->where('pid',$pid);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }


    public function editposition()
    {

        $data = array(
            'pname' => $this->input->post('pname')
        );

        $this->db->where('pid', $this->input->post('pid'));
        $query = $this->db->update('tbl_position', $data);

        // if ($query) {
        //     echo "<script>";
        //     echo "alert('อัปเดตตำแหน่งเรียบร้อยแล้ว');";
        //     echo "</script>";
        // }else {
        //     echo "<script>";
        //     echo "alert('อัปเดตตำแหน่งไม่สำเร็จ');";
        //     echo "</script>";
        // }
    }

    public function deldata($pid)
    {
        $this->db->delete('tbl_position',array('pid'=>$pid));
        // if ($query) {
        //     echo "<script>";
        //     echo "alert('ลบตำแหน่งเรียบร้อยแล้ว');";
        //     echo "</script>";
        // }else {
        //     echo "<script>";
        //     echo "alert('ลบตำแหน่งไม่สำเร็จ');";
        //     echo "</script>";
        // }
    }




}
