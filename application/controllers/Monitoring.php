<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Monitoring_model');
		$this->load->model('Penugasan_model');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in') == false) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Monitoring';
		$data['primary_view'] = 'Monitoring/v_monitoring';
		$data['total'] = $this->Monitoring_model->getCount();
		$data['list'] = $this->Monitoring_model->getList();
		$this->load->view('v_template', $data);
	}


	public function create()
	{
		$data['title'] = 'Tambah Monitoring';
		$data['primary_view'] = 'monitoring/create_monitoring';
		$data['user'] = $this->User_model->getList();
		$data['penugasan'] = $this->Penugasan_model->getList();
		$this->load->view('v_template', $data);
	}

	public function submit()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
			// $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'trim|required');
			$this->form_validation->set_rules('durasi', 'Durasi (Jam)', 'trim|required');
			$this->form_validation->set_rules('progres', 'Progres (%)', 'trim|required|integer');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
			$this->form_validation->set_rules('kendala', 'Kendala', 'trim|required');
		if($this->Monitoring_model->insert() == true){
			$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
			redirect('monitoring');
		}else{
			$this->session->set_flashdata('announce', 'Gagal menyimpan data');
			redirect('monitoring/create');
		}
	}
}

	public function submits()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required');
			// $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'trim|required');
			$this->form_validation->set_rules('durasi', 'Durasi (Jam)', 'trim|required');
			$this->form_validation->set_rules('progres', 'Progres (%)', 'trim|required|integer');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
			$this->form_validation->set_rules('kendala', 'Kendala', 'trim|required');
		if ($this->form_validation->run() == true) {
			if ($this->Monitoring_model->update($this->input->post('id')) == true) {
				$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
				redirect('monitoring/update?id=' . $this->input->post('id'));
			} else {
				$this->session->set_flashdata('announce', 'Gagal menyimpan data');
				redirect('monitoring/update?id=' . $this->input->post('id'));
			}
		} else {
			$this->session->set_flashdata('announce', validation_errors());
			redirect('monitoring/update?id='.$this->input->post('id'));
		} 
	}
}

	public function update()
	{
		
		$id = $this->input->get('id');
		$data['user'] = $this->User_model->getList();
		$data['penugasan'] = $this->Penugasan_model->getList();
		
		//CHECK : Data Availability
		if ($this->Monitoring_model->checkAvailability($id) == true) {
			$data['primary_view'] = 'monitoring/update_monitoring';
		} else {
			// $data['primary_view'] = '404_view';
		}
		$data['title'] = 'Update Monitoring';
		$data['detail'] = $this->Monitoring_model->getDetail($id);
		$this->load->view('v_template', $data);
	}

	public function delete()
	{
		$id = $this->input->get('rcgn');
		if ($this->Monitoring_model->delete($id) == true) {
			$this->session->set_flashdata('announce', 'Berhasil menghapus data');
			redirect('monitoring');
		} else {
			$this->session->set_flashdata('announce', 'Gagal menghapus data');
			redirect('monitoring');
		}
	}
}

/* End of filemonitoring.php */
/* Location: ./application/controllers/monitoring.php */