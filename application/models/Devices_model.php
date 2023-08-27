<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Devices_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	// public function list_devices()
	// {
	// 	$query = $this->db->get('tbl_m_devices');
    //     return $query->result();
	// }

    public function list_devices()
    {
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $query = $this->db->get();
        return $query->result();
    }




    public function list_devices_free()
    {
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('d.ref_s_id',1);
        $ld = $this->db->get();
        return $ld->result();
    }




    //ไม่มีการอัพโหลดภาพ
    public function editdevices()
    {

        $data = array(
            'ref_pid' => $this->input->post('ref_pid'),
            'ref_did' => $this->input->post('ref_did'),
            'm_fname' => $this->input->post('m_fname'),
            'm_name' => $this->input->post('m_name'),
            'm_lname' => $this->input->post('m_lname'),
            'm_email' => $this->input->post('m_email'),
            'm_phone' => $this->input->post('m_phone')
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        $query = $this->db->update('tbl_m_devices', $data);

            // if ($query) {
            //     echo "<script>";
            //     echo "alert('อัปเดตสมาชิกสำเร็จ');";
            //     echo "</script>";
            // }else {
            //     echo "<script>";
            //     echo "alert('อัปเดตสมาชิกไม่สำเร็จ');";
            //     echo "</script>";
            // }

    }





    public function add_devices_db()
    {
        $filename = $this->upload->file_name;
        $data = array(
            'ref_t_id' => $this->input->post('ref_t_id'),
            'ref_s_id' => $this->input->post('ref_s_id'),
            'd_id' => $this->input->post('d_id'),
            'd_name' => $this->input->post('d_name'),
            'd_detail' => $this->input->post('d_detail'),
            'd_remark' => $this->input->post('d_remark'),
            'ref_m_id' => $this->input->post('ref_m_id'),
            'd_img' => $filename
        );
        $query = $this->db->insert('tbl_m_devices', $data);
    }
    
    

    public function read($no){
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('d.no',$no);
        $rsedit = $this->db->get();
        if ($rsedit->num_rows() > 0 ) {
            $data = $rsedit->row();
            return $data;
        }
        return FALSE;
    }



    public function edit_devices_db_img()
    {
        $filename = $this->upload->file_name;
        $data = array(
            'ref_t_id' => $this->input->post('ref_t_id'),
            'ref_s_id' => $this->input->post('ref_s_id'),
            'd_id' => $this->input->post('d_id'),
            'd_name' => $this->input->post('d_name'),
            'd_detail' => $this->input->post('d_detail'),
            'd_remark' => $this->input->post('d_remark'),
            'd_img' => $filename
        );
        $this->db->where('no', $this->input->post('no'));
        $query=$this->db->update('tbl_m_devices',$data);
    }




    public function edit_devices_db()
    {

        $data = array(
            'ref_t_id' => $this->input->post('ref_t_id'),
            'ref_s_id' => $this->input->post('ref_s_id'),
            'd_id' => $this->input->post('d_id'),
            'd_name' => $this->input->post('d_name'),
            'd_detail' => $this->input->post('d_detail'),
            'd_remark' => $this->input->post('d_remark')
        );
        $this->db->where('no', $this->input->post('no'));
        $query=$this->db->update('tbl_m_devices',$data);
    }

       //แก้ไขภาพอย่าเดียว
    public function editdevices_img_onty()
    {

        $filename = $this->upload->file_name;
        $data = array(
            'd_img' => $filename
        );

        $this->db->where('no', $this->input->post('no'));
        $query = $this->db->update('tbl_m_devices', $data);


    }


    public function del_devices_db($no)
    {
        $this->db->delete('tbl_m_devices',array('no'=>$no));
    }
    




}
