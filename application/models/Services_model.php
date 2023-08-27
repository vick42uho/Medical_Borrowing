<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services_model extends CI_Model 
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



//function นี้ก็วางแทนด้านบนนะครับ เพิ่ม group_by ป้องกันแสดงข้อมูลซ้ำครับ

    public function list_lend()
    {   
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('s.mbr_date_return is Null');
        $this->db->group_by('s.mbr_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function return_list()
    {   
        // คืน
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('d.ref_s_id',1);
        $this->db->group_by('d.d_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function list_damaged()
    {   
        // ชำรุด
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('d.ref_s_id',3);
        $this->db->group_by('d.d_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function list_repair()
    {   
        // ส่งซ่อม
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('d.ref_s_id',4);
        $this->db->group_by('d.d_id');
        $query = $this->db->get();
        return $query->result();
    }










    public function list_lend_member($m_id)
    {   
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('s.ref_m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }


    public function list_lend_member_boss()
    {   
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        // $this->db->where('d.ref_m_id',2);
        $query = $this->db->get();
        return $query->result();
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


    public function add_lend1_db()
    {

        $result = $_POST['device']; // value ที่ส่งมา
        $result_explode = explode(', ', $result);   //  ขั้นด้วย ',
        // echo "d_id : ". $result_explode[0]."<br />";    // 0 คือค่าก่อน '-'
        // echo "ref_t_id : ". $result_explode[1]."<br />"; // 1 คำหลัง '-'

        $ref_d_id = $result_explode[0];
        $ref_t_id =$result_explode[1];



        $data = array(
            'ref_d_id' => $ref_d_id,
            'ref_t_id' => $ref_t_id,
            'ref_m_id' => $this->input->post('ref_m_id'),
            'mbr_reason' => $this->input->post('mbr_reason'),
            'mbr_date_lend'=>date('Y-m-d'),
            'mbr_staff_id_lend' => $this->input->post('mbr_staff_id_lend'),
            'mbr_staff_name_lend' => $this->input->post('mbr_staff_name_lend')
        );
        $query = $this->db->insert('tbl_m_devices_services', $data);


        //อัพเดท stasus = 2
        $data2 = array(
            'ref_s_id' => 2   
        );
        $this->db->where('d_id', $ref_d_id);
        $query=$this->db->update('tbl_m_devices',$data2);

    }



    public function add_lend4_db()
    {
        $device = $this->input->post('device');

        foreach($device as $device){

                    $result_explode = explode(', ', $device);   // ขั้นด้วย '-
                    $ref_d_id = $result_explode[0];
                    $ref_t_id =$result_explode[1];

                    $mbr_reason = $this->input->post('mbr_reason');
                    $ref_m_id = $this->input->post('ref_m_id');
                    $ref_did = $this->input->post('ref_did');
                    $mbr_staff_id_lend = $this->input->post('mbr_staff_id_lend');
                    $mbr_staff_name_lend = $this->input->post('mbr_staff_name_lend');
                    


                    $data = array(
                        array(
                            'ref_d_id' => $ref_d_id,
                            'ref_t_id' => $ref_t_id,
                            'mbr_reason' => $mbr_reason,
                            'ref_m_id' => $ref_m_id,
                            'mbr_date_lend'=>date('Y-m-d'),
                            'mbr_staff_id_lend' => $mbr_staff_id_lend,
                            'mbr_staff_name_lend' => $mbr_staff_name_lend 
                        )
                    );
                    $this->db->insert_batch('tbl_m_devices_services', $data); 

                //doc = https://codeigniter.com/userguide3/database/query_builder.html?highlight=insert_batch#inserting-data


                //update status = 2
                    $data2 = array(
                        'ref_s_id' => 2
                    );
                    $this->db->where('d_id', $ref_d_id);
                    $query=$this->db->update('tbl_m_devices',$data2);

             }//close forearch
        }//close fun



        public function return_lend_db()
        {
            $data = array(
                'mbr_date_return'=>date('Y-m-d'),
                'mbr_staff_id_return' => $this->input->post('mbr_staff_id_return'),
                'mbr_staff_name_return' => $this->input->post('mbr_staff_name_return'),
                'mbr_repair_reason' => $this->input->post('mbr_repair_reason'),
                'mbr_date_repair'=>date('Y-m-d')
            );
            $this->db->where('mbr_id', $this->input->post('mbr_id'));
            $query=$this->db->update('tbl_m_devices_services',$data);

                //doc = https://codeigniter.com/userguide3/database/query_builder.html?highlight=insert_batch#inserting-data


                //update status = 2
            $data2 = array(
                'ref_s_id' => $this->input->post('ref_s_id')
            );
            $this->db->where('d_id', $this->input->post('d_id'));
            $query=$this->db->update('tbl_m_devices',$data2);
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



        public function query_edit_lend($mbr_id)
        {
            $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.*,t.t_name');
            $this->db->from('tbl_m_devices_services as s');
            $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
            $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
            $this->db->join('tbl_m_devices_type as t', 's.ref_t_id=t.t_id');
            $this->db->where('s.mbr_id', $mbr_id);
            $rsedit = $this->db->get();
            if ($rsedit->num_rows() > 0) {
                $data = $rsedit->row();
                return $data;
            }
            return FALSE;
        }





        public function edit_lend_db()
        {
            $data = array(
                'mbr_reason' => $this->input->post('mbr_reason')
            );
            $this->db->where('mbr_id', $this->input->post('mbr_id'));
            $query=$this->db->update('tbl_m_devices_services',$data);
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
