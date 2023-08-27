<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model 
{

	//public $a_name; 
	public function __construct()
	{
		parent::__construct();
	}


    public function list_all()
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,m.m_img,d.d_id,d.d_name,d.d_img,i.dname,t.t_name');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_m_devices_type as t', 's.ref_t_id=t.t_id');
        // $this->db->where('s.ref_m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }



    public function list_all_total()
    {
        $this->db->select('s.*, mbr_datesave, COUNT(mbr_id) as total, m.m_fname,m.m_name,m.m_lname,m.m_img,d.d_id,d.d_name,d.d_img,i.dname,t.t_name');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_m_devices_type as t', 's.ref_t_id=t.t_id');
        $this->db->group_by('s.mbr_datesave');
        $this->db->order_by('s.mbr_datesave ASC');
        $query = $this->db->get();
        return $query->result();
    }



    public function list_all_viwstotal()
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,m.m_img,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        // $this->db->where('s.ref_m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }


    public function list_repair()
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,m.m_img,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where("s.mbr_repair_reason !='' ");
        $this->db->group_by('d.d_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_total()
    {
        $this->db->select('COUNT(no) as dtotal');
        $this->db->from('tbl_m_devices');
        $query = $this->db->get();
        return $query->result();
    }


    public function list_viewtotal()
    {   
        // อุปกรณ์ทั้งหมด

        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $query = $this->db->get();
        return $query->result();
    }




    public function list_total_lend()
    {
        $this->db->select('COUNT(no) as ltotal');
        $this->db->from('tbl_m_devices');
        $this->db->where('ref_s_id=1');
        $query = $this->db->get();
        return $query->result();


    }


    public function list_viewtotal_lend()
    {   
        // อุปกรณ์ที่ยืมได้
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('ref_s_id',1);
        $query = $this->db->get();
        return $query->result();

    }



    public function list_total_borrow()
    {
        $this->db->select('COUNT(no) as btotal');
        $this->db->from('tbl_m_devices');
        $this->db->where('ref_s_id=2');
        $query = $this->db->get();
        return $query->result();


    }


    public function list_viewtotal_borrow()
    {   
        // อุปกรณ์ที่ถูกยืม
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('ref_s_id',2);
        $query = $this->db->get();
        return $query->result();

    }


    public function list_total_repair()
    {
        $this->db->select('COUNT(no) as rtotal');
        $this->db->from('tbl_m_devices');
        $this->db->where('ref_s_id=4');
        $query = $this->db->get();
        return $query->result();


    }


    public function list_viewtotal_repair()
    {   
        // อุปกรณ์ที่ส่งซ่อม
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('ref_s_id',4);
        $query = $this->db->get();
        return $query->result();

    }


    public function list_total_damaged()
    {
        $this->db->select('COUNT(no) as damtotal');
        $this->db->from('tbl_m_devices');
        $this->db->where('ref_s_id=3');
        $query = $this->db->get();
        return $query->result();


    }


    public function list_viewtotal_damaged()
    {   
        // อุปกรณ์ที่ส่งซ่อม
        $this->db->select('d.*,t.t_name,s.s_name');
        $this->db->from('tbl_m_devices as d');
        $this->db->join('tbl_m_devices_type as t', 'd.ref_t_id=t.t_id');
        $this->db->join('tbl_m_devices_status as s', 'd.ref_s_id=s.s_id');
        $this->db->where('ref_s_id',3);
        $query = $this->db->get();
        return $query->result();

    }




    // public function list_repair()
    // {   
    //     // ส่งซ่อม
    //     $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
    //     $this->db->from('tbl_m_devices_services  as s');
    //     $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
    //     $this->db->join('tbl_division as i', 'm.ref_did=i.did');
    //     $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
    //     $this->db->where('d.ref_s_id',4);
    //     $this->db->group_by('d.d_id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }




    // public function list_bymember()
    // {
    //     $this->db->select('m.m_id,m.m_fname,m.m_name,m.m_lname,COUNT(s.mbr_id) as total');
    //     $this->db->from('tbl_member as m');
    //     $this->db->join('tbl_m_devices_services as s', 'm.m_id=s.ref_m_id','left');
    //     $this->db->group_by('m.m_id');

    //     $query = $this->db->get();
    //     return $query->result();
    // }


    public function list_bymember()
    {   

        $this->db->select('s.*,m.m_id,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname,COUNT(s.mbr_id) as total');
        $this->db->from('tbl_m_devices_services  as s', 'm.m_id=s.ref_m_id','left');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('ref_s_id in(1, 2, 3, 4)');
        $this->db->group_by('m.m_id');
        $query = $this->db->get();
        return $query->result();
    }




    public function list_viewbymember($m_id)
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('s.ref_m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }



    public function list_byposition()
    {
        $this->db->select('p.*,COUNT(s.mbr_id) as total');
        $this->db->from('tbl_position as p');
        $this->db->join('tbl_member as m', 'p.pid=m.ref_pid');
        $this->db->join('tbl_m_devices_services as s', 'm.m_id=s.ref_m_id','left');
        $this->db->group_by('p.pid');
        $this->db->where('p.pid',4);
        $query = $this->db->get();
        return $query->result();
    }





    public function list_viewbyposition($pid)
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,m.ref_pid,p.pname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_position as p', 'm.ref_pid=p.pid');
        $this->db->where('m.ref_pid',$pid);
        $query = $this->db->get();
        return $query->result();
    }




// public function list_bydivision()
// {
//     $this->db->select('d.*,COUNT(s.mbr_id) as total');
//     $this->db->from('tbl_division as d');
//     $this->db->join('tbl_member as m', 'd.did=m.ref_did');
//     $this->db->join('tbl_m_devices_services as s', 'm.m_id=s.ref_m_id','left');
//     $this->db->group_by('d.did');
//     $query = $this->db->get();
//     return $query->result();
// }


    public function list_bydivision()
    {   

        $this->db->select('d.*,s.*,COUNT(s.mbr_id) as total');
        $this->db->from('tbl_division as d');
        $this->db->join('tbl_member as m', 'd.did=m.ref_did');
        $this->db->join('tbl_m_devices_services  as s', 'm.m_id=s.ref_m_id','left');
        $this->db->join('tbl_m_devices as p', 's.ref_d_id=p.d_id');
        $this->db->where('ref_s_id in(1, 2, 3, 4)');
        $this->db->group_by('d.did');
        $query = $this->db->get();
        return $query->result();
    }



    public function list_viewbydivision($did)
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,m.ref_pid,p.dname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_division as p', 'm.ref_did=p.did');
        $this->db->where('m.ref_did',$did);
        $query = $this->db->get();
        return $query->result();
    }


    public function list_bytype()
    {
        $this->db->select('t.*, COUNT(s.ref_t_id) as total');
        $this->db->from('tbl_m_devices_type as t');
        $this->db->join('tbl_m_devices_services as s', 't.t_id=s.ref_t_id');
        $this->db->group_by('t.t_id');
        $query = $this->db->get();
        return $query->result();
    }



    public function list_viewbytype($t_id)
    {
        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,m.ref_pid,p.pname');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_position as p', 'm.ref_pid=p.pid');
        $this->db->where('s.ref_t_id',$t_id);
        $query = $this->db->get();
        return $query->result();
    }



    public function listbydate()
    {

        $ds = $this->input->post('ds');
        $de = $this->input->post('de');

        $dsx = $ds. ' 00:00:00';
        $dex = $de. ' 23:59:59';

        $this->db->select('s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname,t.t_name');
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices_type as t', 's.ref_t_id=t.t_id');
        $this->db->where('s.mbr_datesave >=',$dsx);
        $this->db->where('s.mbr_datesave <=',$dex);
        $query = $this->db->get();
        return $query->result();
    }




    public function list_byday()
    {
        $this->db->select("mbr_datesave, COUNT(mbr_id) as total");
        $this->db->from('tbl_m_devices_services');
        $this->db->group_by("DATE_FORMAT(mbr_datesave, '%d-%M-%Y')");
        $query = $this->db->get();
        return $query->result();
    }


    public function list_viewbyday($datesave)
    {

        $ds = $datesave. ' 00:00:00';
        $de = $datesave. ' 23:59:59';

        $this->db->select("s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname");
        $this->db->from('tbl_m_devices_services  as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where('s.mbr_datesave >=',$ds);
        $this->db->where('s.mbr_datesave <=',$de);
        $this->db->group_by('s.mbr_id');

        $query = $this->db->get();
        return $query->result();
    }


    public function list_bymonth()
    {

        $this->db->select('mbr_datesave, COUNT(mbr_id) as total');
        $this->db->from('tbl_m_devices_services');
        $this->db->group_by('DATE_FORMAT(mbr_datesave,"%M%")');
        $query = $this->db->get();
        return $query->result();
    }


    public function list_viewbymonth($monthsave)
    {
        $this->db->select("s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname");
        $this->db->from('tbl_m_devices_services as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where("DATE_FORMAT(s.mbr_datesave,'%m')",$monthsave);
        $this->db->group_by('s.mbr_id');
        $query = $this->db->get();
        return $query->result();
    }






    public function list_byyear()
    {
        $this->db->select('mbr_datesave, COUNT(mbr_id) as total');
        $this->db->from('tbl_m_devices_services');
        $this->db->group_by('DATE_FORMAT(mbr_datesave,"%Y%")');
        $query = $this->db->get();
        return $query->result();
    }


    public function list_viewbyyear($yearsave)
    {
        $this->db->select("s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname");
        $this->db->from('tbl_m_devices_services as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
        $this->db->where("DATE_FORMAT(s.mbr_datesave,'%Y')",$yearsave);
        $this->db->group_by('s.mbr_id');
        $query = $this->db->get();
        return $query->result();
    }





    public function list_bydaydivision()
    {
        $this->db->select("s.mbr_datesave, COUNT(s.mbr_id) as total,i.dname");
        $this->db->from('tbl_m_devices_services as s');
        $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
        $this->db->join('tbl_division as i', 'm.ref_did=i.did');
        $this->db->group_by("DATE_FORMAT(mbr_datesave, '%d-%M-%Y', ref_d_id)");
        $query = $this->db->get();
        return $query->result();
    }


    public function list_viewbydaydivision($datesave)
    {

       $ds = $datesave. ' 00:00:00';
       $de = $datesave. ' 23:59:59';

       $this->db->select("s.*,m.m_fname,m.m_name,m.m_lname,d.d_id,d.d_name,d.d_img,i.dname");
       $this->db->from('tbl_m_devices_services  as s');
       $this->db->join('tbl_member as m', 's.ref_m_id=m.m_id');
       $this->db->join('tbl_division as i', 'm.ref_did=i.did');
       $this->db->join('tbl_m_devices as d', 's.ref_d_id=d.d_id');
       $this->db->where('s.mbr_datesave >=',$ds);
       $this->db->where('s.mbr_datesave <=',$de);
       $this->db->group_by('s.mbr_id');

       $query = $this->db->get();
       return $query->result();
   }





   public function count_doc_type()
   {
    $this->db->select('t.dname, COUNT(d.doc_id) as dtotal');
    $this->db->from('tbl_doc as d');
    $this->db->join('tbl_doc_type as t' , 'd.ref_did=t.did');
    $this->db->group_by('d.ref_did');
    $query = $this->db->get();
    return $query->result();
}

public function count_doc_day()
{
    $this->db->select('DATE_FORMAT(d.doc_save,"%d-%m-%Y") as docsave, COUNT(d.doc_id) as dtotal');
    $this->db->from('tbl_doc as d');
    $this->db->group_by('DATE_FORMAT(d.doc_save,"%d%")');
    $query = $this->db->get();
    return $query->result();
}

public function count_doc_month()
{
    $this->db->select('DATE_FORMAT(d.doc_save,"%M-%Y") as docsave, COUNT(d.doc_id) as dtotal');
    $this->db->from('tbl_doc as d');
    $this->db->group_by('DATE_FORMAT(d.doc_save,"%M%")');
    $query = $this->db->get();
    return $query->result();
}

public function count_doc_year()
{
    $this->db->select('DATE_FORMAT(d.doc_save,"%Y") as docsave, COUNT(d.doc_id) as dtotal');
    $this->db->from('tbl_doc as d');
    $this->db->group_by('DATE_FORMAT(d.doc_save,"%Y%")');
    $query = $this->db->get();
    return $query->result();
}

public function count_doc_form()
{
    $ds = $this->input->post('ds');
    $de = $this->input->post('de');
        // echo $ds .' x '.$de;
        // exit;
    $de = $de .' 23:59:59';

    $this->db->select('d.*,t.dname');
    $this->db->from('tbl_doc as d');
    $this->db->join('tbl_doc_type as t', 'd.ref_did=t.did');
    $this->db->where('doc_date >=',$ds);
    $this->db->where('doc_date <=',$de);
    $query = $this->db->get();
    return $query->result();
}



}



