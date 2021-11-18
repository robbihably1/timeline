<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wbs_model extends CI_Model
{

	public function insert()
	{
		$data = array(
			'WEB_CODE'	=> $this->input->post('web_code'),
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
			'URAIAN_KEGIATAN'		=> $this->input->post('uraian_kegiatan'),
		);

		$this->db->insert('wbs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getList()
	{
		return $query = $this->db->order_by('web_code', 'ASC')->get('wbs')->result();
		return $query = $this->db->order_by('web_code', 'ASC')->get('pwbs')->result();
	}
	public function getTimList()
	{
		return $query = $this->db->order_by('id_tim', 'ASC')->get('timwbs')->result();
	}

	public function update()
	{
		$data = array(
			'PIC'		=> $this->input->post('pic'),
			'TGL_AWAL'		=> $this->input->post('tgl_awal'),
			'TGL_AKHIR'		=> $this->input->post('tgl_akhir'),
			'DURASI'		=> $this->input->post('durasi'),
			'NAMA_PEKERJAAN'		=> $this->input->post('nama_pekerjaan'),
			'URAIAN_KEGIATAN'		=> $this->input->post('uraian_kegiatan'),
		);

		$this->db->where('WEB_CODE', $id)->update('wbs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getCount()
	{
		return $this->db->count_all('wbs');
	}
	public function getCountTim()
	{
		return $this->db->count_all('timwbs');
	}

	public function getDetail($id)
	{
		return $this->db->where('WEB_CODE', $id)->get('wbs')->row();
	}

	public function getDetailTim($id)
	{
		return $this->db->where('ID_TIM', $id)->get('timwbs')->row();
	}

	public function checkAvailability($id)
	{
		$query = $this->db->where('WEB_CODE', $id)->get('wbs');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Model WBS TIM
	public function insertim(){
		$data = array(
			'FULL_NAME'		=> $this->input->post('full_name'),
			'WEB_CODE'	=> $this->input->post('web_code'),
			'ID_TIM'		=> $this->input->post('id_tim'),
		);

		$this->db->insert('wbs/tim', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function tim()
	{
		$data = array(
			'FULL_NAME'	=> $this->input->post('full_name'),
			'ID_TIM'	=> $this->input->post('id_tim'),
			// 'WEB_CODE'	=> $this->join->('wbs','wbs'.'web_code'= 'timwbs'.'web_code'),
			'WEB_CODE'	=> $this->input->post('web_code'),
		);

		$this->db->insert('timwbs', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('WEB_CODE', $id)->delete('wbs');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	
}
