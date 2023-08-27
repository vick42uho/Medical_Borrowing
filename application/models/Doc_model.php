<?php
class Doc_model extends CI_Model 
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

    public function list_doc()
    {
        $this->db->select('d.*,t.dname');
        $this->db->from('tbl_doc as d');
        $this->db->join('tbl_doc_type as t', 'd.ref_did=t.did');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_doc_emp()
    {
        $this->db->select('d.*,t.dname');
        $this->db->from('tbl_doc as d');
        $this->db->join('tbl_doc_type as t', 'd.ref_did=t.did');
        $this->db->where('d.doc_status','1');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function adddocs()
        {

                        $config['upload_path'] = './docs/';
                        $config['allowed_types'] = 'pdf|exec|docs'; //'gif|jpg|png';
                        $config['max_size'] = '5000';
                        // $config['max_width'] = '3000';
                        // $config['max_height'] = '3000';
                        $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('doc_file'))
                {
                        echo $this->upload->display_error();
                }
                else
                {
                $data = $this->upload->data();
                //print_r($data);
                $filename = $data['file_name'];
                $data = array(
                'doc_status' => $this->input->post('doc_status'),
                'ref_did' => $this->input->post('ref_did'),
                'doc_num' => $this->input->post('doc_num'),
                'doc_date' => $this->input->post('doc_date'),
                'doc_name' => $this->input->post('doc_name'),
                'doc_from' => $this->input->post('doc_from'),
                'doc_to' => $this->input->post('doc_to'),
                'doc_file' => $filename
                );

                $query=$this->db->insert('tbl_doc',$data);

                if ($query) {
                    echo "<script>";
                    echo "alert('เพิ่มหนังสือสำเร็จ');";
                    echo "</script>";
                }else {
                    echo "<script>";
                    echo "alert('เพิ่มหนังสือไม่สำเร็จ');";
                    echo "</script>";
                }
                }
                
        }

    public function read($doc_id){
        $this->db->select('d.*,t.dname');
        $this->db->from('tbl_doc as d');
        $this->db->join('tbl_doc_type as t', 'd.ref_did=t.did');
        $this->db->where('d.doc_id',$doc_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
                $data = $query->row();
                return $data;
        }
        return FALSE;
    }


    public function editdocs()
    {


            $config['upload_path'] = './docs/';
            $config['allowed_types'] = 'pdf|exec|docs'; //'gif|jpg|png';
            $config['max_size'] = '5000';
            // $config['max_width'] = '3000';
            // $config['max_height'] = '3000';
            $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('doc_file'))
        {
            //echo $this->upload->display_error();
        $data = array(
        'doc_status' => $this->input->post('doc_status'),
        'ref_did' => $this->input->post('ref_did'),
        'doc_num' => $this->input->post('doc_num'),
        'doc_date' => $this->input->post('doc_date'),
        'doc_name' => $this->input->post('doc_name'),
        'doc_from' => $this->input->post('doc_from'),
        'doc_to' => $this->input->post('doc_to')
        );

        $this->db->where('doc_id', $this->input->post('doc_id'));
        $query = $this->db->update('tbl_doc', $data);

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
        else
        {
        $data = $this->upload->data();
        //print_r($data);
        $filename = $data['file_name'];


        $data = array(
        'doc_status' => $this->input->post('doc_status'),
        'ref_did' => $this->input->post('ref_did'),
        'doc_num' => $this->input->post('doc_num'),
        'doc_date' => $this->input->post('doc_date'),
        'doc_name' => $this->input->post('doc_name'),
        'doc_from' => $this->input->post('doc_from'),
        'doc_to' => $this->input->post('doc_to'),
        'doc_file' => $filename
        );

        $this->db->where('doc_id', $this->input->post('doc_id'));
        $query = $this->db->update('tbl_doc', $data);

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

}
