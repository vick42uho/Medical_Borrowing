<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Division_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	public function list_division()
	{
        $query = $this->db->get('tbl_division');
        return $query->result();
    }

    public function adddivision()
    {
        $data = array(
            'dname' => $this->input->post('dname')
        );

        $query = $this->db->insert('tbl_division', $data);

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


    public function read($did){
        $this->db->select('*');
        $this->db->from('tbl_division');
        $this->db->where('did',$did);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }


    public function editdivision()
    {

        $data = array(
            'dname' => $this->input->post('dname')
        );

        $this->db->where('did', $this->input->post('did'));
        $query = $this->db->update('tbl_division', $data);

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

    public function deldata($did)
    {
        $this->db->delete('tbl_division',array('did'=>$did));
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


       //แก้ไขภาพอย่าเดียว
    public function edit_devices_img_only()
    {

        $filename = $this->upload->file_name;
        $data = array(
            'd_img' => $filename
        );

        $this->db->where('no', $this->input->post('no'));
        $query = $this->db->update('tbl_m_devices', $data);


    }




}
