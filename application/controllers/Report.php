<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Report_model');
		if ($this->session->userdata('m_level') == 4) {
			redirect('user', 'refresh');
		}

		$this->load->model('Member_model');
		$this->load->model('Services_model');
		$this->load->model('Devices_model');
		$this->load->model('Report_model');
		
		
	}

	public function index()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_total();
		$data['query1']=$this->Report_model->list_total_lend();
		$data['query2']=$this->Report_model->list_total_borrow();
		$data['query3']=$this->Report_model->list_total_damaged();
		$data['query4']=$this->Report_model->list_total_repair();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_total',$data);
		$this->load->view('template/backfooter_report');
	}


	public function view_total()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_viewtotal();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/view_total',$data);
		$this->load->view('template/backfooter_report');
	}


	public function view_total_borrow()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_viewtotal_borrow();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/view_total_borrow',$data);
		$this->load->view('template/backfooter_report');
	}


	public function view_total_lend()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_viewtotal_lend();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/view_total_lend',$data);
		$this->load->view('template/backfooter_report');
	}


	public function view_total_repair()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_viewtotal_repair();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/view_total_repair',$data);
		$this->load->view('template/backfooter_report');
	}


	public function view_total_damaged()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_viewtotal_damaged();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/view_total_damaged',$data);
		$this->load->view('template/backfooter_report');
	}




	public function list_all()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_all();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_all',$data);
		$this->load->view('template/backfooter_report');
	}


	public function list_all_total()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_all_total();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_all_total',$data);
		$this->load->view('template/backfooter_report');
	}




	public function repair()
	{
		// print_r($_SESSION);
		// $m_id = $_SESSION['m_id'];
		$data['query']=$this->Report_model->list_repair();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_repair',$data);
		$this->load->view('template/backfooter_report');
	}




	public function bymember()
	{
		$data['query']=$this->Report_model->list_bymember();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bymember',$data);
		$this->load->view('template/backfooter_report');
	}



	public function viewbymember($m_id)
	{
		$data['query']=$this->Report_model->list_viewbymember($m_id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_all',$data);
		$this->load->view('template/backfooter_report');
	}



	public function byposition()
	{
		$data['query']=$this->Report_model->list_byposition();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_byposition',$data);
		$this->load->view('template/backfooter_report');
	}



	public function byposition_chart()
	{
		$data['query']=$this->Report_model->list_byposition();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_byposition_chart',$data);
		$this->load->view('template/backfooter_report');
	}


	public function viewbyposition($pid)
	{
		$data['query']=$this->Report_model->list_viewbyposition($pid);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbyposition',$data);
		$this->load->view('template/backfooter_report');
	}



	public function bydivision()
	{
		$data['query']=$this->Report_model->list_bydivision();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bydivision',$data);
		$this->load->view('template/backfooter_report');
	}


	public function bydivision_chart()
	{
		$data['query']=$this->Report_model->list_bydivision();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bydivision_chart',$data);
		$this->load->view('template/backfooter_report');
	}


	public function viewbydivision($did)
	{
		$data['query']=$this->Report_model->list_viewbydivision($did);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbydivision',$data);
		$this->load->view('template/backfooter_report');
	}






	public function bytype()
	{
		$data['query']=$this->Report_model->list_bytype();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bytype',$data);
		$this->load->view('template/backfooter_report');
	}


	public function bytype_chart()
	{
		$data['query']=$this->Report_model->list_bytype();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bytype_chart',$data);
		$this->load->view('template/backfooter_report');
	}


	public function viewbytype($t_id)
	{
		$data['query']=$this->Report_model->list_viewbytype($t_id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbytype',$data);
		$this->load->view('template/backfooter_report');
	}




	public function searchbydate()
	{
		// print_r($_SESSION);
		$data['query']=$this->Report_model->list_all();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_from_search',$data);
		$this->load->view('template/backfooter_report');
	}


	public function searchbydate_db()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		// print_r($_SESSION);
		$data['query']=$this->Report_model->listbydate();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_from_search',$data);
		$this->load->view('template/backfooter_report');
	}





	public function byday()
	{
		$data['query']=$this->Report_model->list_byday();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_byday',$data);
		$this->load->view('template/backfooter_report');
	}

	public function viewbyday($datesave)
	{
		// echo $datesave;
		
		$data['query']=$this->Report_model->list_viewbyday($datesave);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbyday',$data);
		$this->load->view('template/backfooter_report');
	}




/**
	public function viewbyday($mbr_datesave)
	{
		$data['query']=$this->Report_model->list_viewbyday($mbr_datesave);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbyday',$data);
		$this->load->view('template/backfooter_report');
	}
	**/

	// public function viewbyday()
	// {
	// 	$data['query']=$this->Report_model->list_viewbyday("2021-9-13");

	// 	// echo '<pre>';
	// 	// print_r($data);
	// 	// echo '</pre>';
	// 	// exit;

	// 	$this->load->view('template/backheader_report');
	// 	$this->load->view('report/list_viewbyday',$data);
	// 	$this->load->view('template/backfooter_report');
	// }





	// public function bymonth()
	// {
	// 	$data['query']=$this->Report_model->list_bymonth();

	// 	// echo '<pre>';
	// 	// print_r($data);
	// 	// echo '</pre>';
	// 	// exit;

	// 	$this->load->view('template/backheader_report');
	// 	$this->load->view('report/list_bymonth',$data);
	// 	$this->load->view('template/backfooter_report');
	// }


	// public function viewbymonth()
	// {
	// 	$data['query']=$this->Report_model->list_viewbyday("2021-13");

	// 	// echo '<pre>';
	// 	// print_r($data);
	// 	// echo '</pre>';
	// 	// exit;

	// 	$this->load->view('template/backheader_report');
	// 	$this->load->view('report/list_viewbymonth',$data);
	// 	$this->load->view('template/backfooter_report');
	// }




	public function bymonth()
	{
		$data['query']=$this->Report_model->list_bymonth();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bymonth',$data);
		$this->load->view('template/backfooter_report');
	}

	public function viewbymonth($montsave)
	{
		// echo $montsave;
		
		$data['query']=$this->Report_model->list_viewbymonth($montsave);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbymonth',$data);
		$this->load->view('template/backfooter_report');
	}




	public function byyear()
	{
		$data['query']=$this->Report_model->list_byyear();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_byyear',$data);
		$this->load->view('template/backfooter_report');
	}


	public function viewbyyear($yearsave)
	{
		// echo $yearsave;
		
		$data['query']=$this->Report_model->list_viewbyyear($yearsave);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbyyear',$data);
		$this->load->view('template/backfooter_report');
	}




	public function bydaydivision()
	{
		$data['query']=$this->Report_model->list_bydaydivision();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_bydaydivision',$data);
		$this->load->view('template/backfooter_report');
	}

	public function viewbydaydivision($datesave)
	{
		// echo $datesave;
		
		$data['query']=$this->Report_model->list_viewbydaydivision($datesave);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_viewbydaydivision',$data);
		$this->load->view('template/backfooter_report');
	}





	public function form($value='')
	{
		
		
		$this->load->view('template/backheader_report');
		$this->load->view('report/list_form');
		$this->load->view('template/backfooter_report');
	}



	public function getform()
	{
		$data['query']=$this->Report_model->list_all();
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/backheader_report');
		$this->load->view('report/list_all',$data);
		$this->load->view('template/backfooter_report');
	}




	public function list_all_excel()
	{
		$data['query']=$this->Report_model->list_all();
		$this->load->view('report/list_all_ex_excel',$data);
		$this->load->view('template/backfooter_report');
	}


	public function list_repair_excel()
	{
		$data['query']=$this->Report_model->list_repair();
		$this->load->view('report/list_repair_ex_excel',$data);
	}


	public function list_all_excel_total()
	{
		$data['query']=$this->Report_model->list_all_total();
		$this->load->view('report/list_all_total_ex_excel',$data);
	}



	

}