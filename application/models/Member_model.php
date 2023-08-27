<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	// public function list_member()
	// {
	// 	$query = $this->db->get('tbl_member');
    //     return $query->result();
	// }

    public function list_member()
    {
        $this->db->select('m.m_id,m.m_fname,m.m_name,m.m_lname,m.m_email,m.m_phone,m.m_img,p.pname,d.dname');
        $this->db->from('tbl_member as m');
        $this->db->join('tbl_position as p', 'm.ref_pid=p.pid');
        $this->db->join('tbl_division as d', 'm.ref_did=d.did');
        $query = $this->db->get();
        return $query->result();
    }

        public function list_memberUI1()
    {
        $this->db->select('m.m_id,m.m_fname,m.m_name,m.m_lname,m.m_email,m.m_phone,m.m_img,p.pname,d.dname');
        $this->db->from('tbl_member as m');
        $this->db->join('tbl_position as p', 'm.ref_pid=p.pid');
        $this->db->join('tbl_division as d', 'm.ref_did=d.did');
        $this->db->where('m.m_id >= 4');
        $query = $this->db->get();
        return $query->result();
    }

    public function addmember()
    {
        $data = array(
            'ref_pid' => $this->input->post('ref_pid'),
            'ref_did' => $this->input->post('ref_did'),
            'm_username' => $this->input->post('m_username'),
            'm_password' => sha1($this->input->post('m_password')), // เพิ่ม sha1 เพื่อเก็บรหัสแบบมีเข้ารหัสไว้
            'm_fname' => $this->input->post('m_fname'),
            'm_name' => $this->input->post('m_name'),
            'm_lname' => $this->input->post('m_lname')
        );

        $query = $this->db->insert('tbl_member', $data);

        if ($query) {
            echo "<script>";
            echo "alert('เพิ่มสมาชิกสำเร็จ');";
            echo "</script>";
        }else {
            echo "<script>";
            echo "alert('เพิ่มสมาชิกไม่สำเร็จ');";
            echo "</script>";
        }
    }

// เพิ่ม function สำหรับเพิ่มข้อมูลซ้ำ
    public function addmember2()
    {
        $m_username = $this->input->post('m_username');
        // num rows example
        $this->db->select('m_username');
        $this->db->where('m_username',$m_username);
        $query = $this->db->get('tbl_member');
        $num = $query->num_rows();
        if($num > 0)
        {
            echo "<script>";
            echo "alert('ขออภัย ยูสเซอร์นี้มีอยู่ในระบบแล้ว กรุณากลับไปเพิ่มชื่อเข้ามาใหม่ !!');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            //มาจาก controllers Member
            $filename = $this->upload->file_name;

            $data = array(
                'ref_pid' => $this->input->post('ref_pid'),
                'ref_did' => $this->input->post('ref_did'),
                'm_username' => $this->input->post('m_username'),
                'm_password' => sha1($this->input->post('m_password')), // เพิ่ม sha1 เพื่อเก็บรหัสแบบมีเข้ารหัสไว้
                'm_fname' => $this->input->post('m_fname'),
                'm_name' => $this->input->post('m_name'),
                'm_lname' => $this->input->post('m_lname'),
                'm_email' => $this->input->post('m_email'),
                'm_phone' => $this->input->post('m_phone'),
                'm_img'=>$filename
        );

            $query = $this->db->insert('tbl_member', $data);

            if ($query) {
                echo "<script>";
                echo "alert('เพิ่มสมาชิกสำเร็จ');";
                echo "</script>";
            }else {
                echo "<script>";
                echo "alert('เพิ่มสมาชิกไม่สำเร็จ');";
                echo "</script>";
            }
        }
    }


    public function read($m_id){
        $this->db->select('m.*, p.pname, d.dname');
        $this->db->from('tbl_member as m');
        $this->db->join('tbl_position as p', 'm.ref_pid=p.pid');
        $this->db->join('tbl_division as d', 'm.ref_did=d.did');
        $this->db->where('m.m_id',$m_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }

    //ไม่มีการอัพโหลดภาพ
    public function editmember()
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
        $query = $this->db->update('tbl_member', $data);

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

    // มีการอัพโหลดภาพใหม่
    public function editmember_img()
    {

        $filename = $this->upload->file_name;
        $data = array(
            'ref_pid' => $this->input->post('ref_pid'),
            'ref_did' => $this->input->post('ref_did'),
            'm_fname' => $this->input->post('m_fname'),
            'm_name' => $this->input->post('m_name'),
            'm_lname' => $this->input->post('m_lname'),
            'm_email' => $this->input->post('m_email'),
            'm_phone' => $this->input->post('m_phone'),
            'm_img' => $filename
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        $query = $this->db->update('tbl_member', $data);


    }

   //แก้ไขภาพอย่าเดียว
    public function editmember_img_onty()
    {

        $filename = $this->upload->file_name;
        $data = array(
            'm_img' => $filename
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        $query = $this->db->update('tbl_member', $data);


    }




    public function editmemberpwd()
    {

        $data = array(
            'm_password' => sha1($this->input->post('m_password')) // เพิ่ม sha1
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        $query = $this->db->update('tbl_member', $data);
    }
    

    public function deldata($m_id)
    {
        $this->db->delete('tbl_member',array('m_id'=>$m_id));
    }



    public function fetch_user_login($m_username,$m_password)
    {
        $this->db->where('m_username',$m_username);
        $this->db->where('m_password',$m_password);
        $query = $this->db->get('tbl_member');
        return $query->row();
    }


    public function editboss()
    {
        $config['upload_path'] = './profile_img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('m_img'))
        {
            echo $this->upload->display_error();
        }else{
            $data = $this->upload->data();
                //print_r($data);
            $filename = $data['file_name'];

            $data = array(
                'm_fname' => $this->input->post('m_fname'),
                'm_name' => $this->input->post('m_name'),
                'm_lname' => $this->input->post('m_lname'),
                'm_img' => $filename
            );

            $this->db->where('m_id', $this->input->post('m_id'));
            $query = $this->db->update('tbl_member', $data);

            if ($query) {
                echo "<script>";
                echo "alert('อัปเดตสมาชิกสำเร็จ');";
                echo "</script>";
            }else {
                echo "<script>";
                echo "alert('อัปเดตสมาชิกไม่สำเร็จ');";
                echo "</script>";
            }


        }
    }

    public function editstaff()
    {

            $data = array(
                'm_fname' => $this->input->post('m_fname'),
                'm_name' => $this->input->post('m_name'),
                'm_lname' => $this->input->post('m_lname'),
                'm_email' => $this->input->post('m_email'),
                'm_phone' => $this->input->post('m_phone')
            );

            $this->db->where('m_id', $this->input->post('m_id'));
            $query = $this->db->update('tbl_member', $data);

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
    

    public function editemployee()
    {

     $config['upload_path'] = './img/';
     $config['allowed_types'] = 'gif|jpg|png';
     $config['max_size'] = '2000';
     $config['max_width'] = '3000';
     $config['max_height'] = '3000';
     $config['encrypt_name'] = TRUE;

     $this->load->library('upload', $config);
     if ( ! $this->upload->do_upload('m_img'))
     {
        echo $this->upload->display_error();
    }else{
        $data = $this->upload->data();
                //print_r($data);
        $filename = $data['file_name'];

        $data = array(
            'm_fname' => $this->input->post('m_fname'),
            'm_name' => $this->input->post('m_name'),
            'm_lname' => $this->input->post('m_lname'),
            'm_img' => $filename
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        $query = $this->db->update('tbl_member', $data);

        if ($query) {
            echo "<script>";
            echo "alert('อัปเดตสมาชิกสำเร็จ');";
            echo "</script>";
        }else {
            echo "<script>";
            echo "alert('อัปเดตสมาชิกไม่สำเร็จ');";
            echo "</script>";
        }


    }
}


public function editbosspwd()
{

    $data = array(
            'm_password' => sha1($this->input->post('m_password')) // เพิ่ม sha1
        );

    $this->db->where('m_id', $this->input->post('m_id'));
    $query = $this->db->update('tbl_member', $data);

    if ($query) {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านเรียบร้อยแล้ว');";
        echo "</script>";
    }else {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านไม่สำเร็จ');";
        echo "</script>";
    }
}


public function editstaffpwd()
{

    $data = array(
            'm_password' => sha1($this->input->post('m_password')) // เพิ่ม sha1
        );

    $this->db->where('m_id', $this->input->post('m_id'));
    $query = $this->db->update('tbl_member', $data);

    if ($query) {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านเรียบร้อยแล้ว');";
        echo "</script>";
    }else {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านไม่สำเร็จ');";
        echo "</script>";
    }
}


public function editemployeepwd()
{

    $data = array(
            'm_password' => sha1($this->input->post('m_password')) // เพิ่ม sha1
        );

    $this->db->where('m_id', $this->input->post('m_id'));
    $query = $this->db->update('tbl_member', $data);

    if ($query) {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านเรียบร้อยแล้ว');";
        echo "</script>";
    }else {
        echo "<script>";
        echo "alert('อัปเดตรหัสผ่านไม่สำเร็จ');";
        echo "</script>";
    }
}




}
