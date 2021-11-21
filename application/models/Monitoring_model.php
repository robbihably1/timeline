<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{

	public function insert()
	{
		$data = array(
			'FULL_NAME'		=> $this->input->post('full_name'),
			'TANGGAL'		=> $this->input->post('tanggal'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
			'DURASI'		=> $this->input->post('durasi'),
			'PROGRES'		=> $this->input->post('progres'),
			'CATATAN'		=> $this->input->post('catatan'),
			'KENDALA'		=> $this->input->post('kendala'),
		);

		$this->db->insert('monitoring', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id)
	{
		$data = array(
			'FULL_NAME'			=> $this->input->post('full_name'),
			'TANGGAL'			=> $this->input->post('tanggal'),
			'NAMA_PEKERJAAN'	=> $this->input->post('nama_pekerjaan'),
			'DURASI'			=> $this->input->post('durasi'),
			'PROGRES'			=> $this->input->post('progres'),
			'CATATAN'			=> $this->input->post('catatan'),
			'KENDALA'			=> $this->input->post('kendala'),
		);

		$this->db->where('NO_MONITORING', $id)->update('monitoring', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('monitoring');
	}

	public function getList()
	{
		return $query = $this->db->order_by('NO_MONITORING', 'ASC')->get('monitoring')->result();
	}
	public function getDetail($id)
	{
		return $this->db->where('NO_MONITORING', $id)->get('monitoring')->row();
	}

	public function delete($id)
	{
		$this->db->where('NO_MONITORING', $id)->delete('monitoring');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('NO_MONITORING', $id)->get('monitoring');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Monitoring_model.php */
/* Location: ./application/models/Monitoring_model.php */