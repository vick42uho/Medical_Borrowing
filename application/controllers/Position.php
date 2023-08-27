<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Position extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Position_model');
		
	}

	public function index()
	{
		$data['query']=$this->Position_model->list_position();
        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/position',$data);
		$this->load->view('template/backfooter');
	}


	public function adding()
	{
		$this->load->view('template/backheader');
		$this->load->view('admin/position_form_add');
		$this->load->view('template/backfooter');
	}
	

	public function adddata()
	{
		$this->form_validation->set_rules('pname', 'ตำแหน่ง Name', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == FALSE) {

				$this->load->view('template/backheader');
				$this->load->view('admin/position_form_add');
				$this->load->view('template/backfooter');
		} else {
				$this->Position_model->addposition();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('position', 'refresh');

				//set_flashdata ชั่วคราวมีอายุ 1 refresh
		}

        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

	}

	public function edit($pid)
	{
		$data['rsedit']=$this->Position_model->read($pid);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/backheader');
		$this->load->view('admin/position_form_edit',$data);
		$this->load->view('template/backfooter');
	}

	public function editdata()
	{
		$this->form_validation->set_rules('pname', 'ตำแหน่ง', 'trim|required|min_length[4]');
		
		$pid=$this->input->post('pid');
		if ($this->form_validation->run() == FALSE) {

			$data['rsedit']=$this->Position_model->read($pid);
			$this->load->view('template/backheader');
			$this->load->view('admin/position_form_edit_error',$data);
			$this->load->view('template/backfooter');
				
		} else {

				$this->Position_model->editposition();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('position', 'refresh');
		}
        // echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		
	}

	public function del($pid)
	{
		// print_r($_POST);

		$this->Position_model->deldata($pid);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('position','refresh');
	}



}