<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctype_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}

	public function list_Doctype()
	{
		$query = $this->db->get('tbl_doc_type');
        return $query->result();
	}

    public function adddoctype()
    {
        $data = array(
            'dname' => $this->input->post('dname')
        );

        $query = $this->db->insert('tbl_doc_type', $data);

        // if($query){
        //         echo 'add ok';
        // }else{
        //         echo 'add failed';
        // }
    }


    public function read($did){
                $this->db->select('*');
                $this->db->from('tbl_doc_type');
                $this->db->where('did',$did);
                $query = $this->db->get();
                if ($query->num_rows() > 0 ) {
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


        public function editdoctype()
        {

                $data = array(
                'dname' => $this->input->post('dname')
                );

                $this->db->where('did', $this->input->post('did'));
                $query = $this->db->update('tbl_doc_type', $data);

                // if($query){
                //         echo 'edit ok';
                // }else{
                //         echo 'edit failed';
                // }
        }

        public function deldata($did)
        {
                $this->db->delete('tbl_doc_type',array('did'=>$did));
        }




}
