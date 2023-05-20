<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result extends CI_Controller
{

	public function index()
	{
		$data['message'] = $this->db->where('active',0)->order_by('created_at','desc')->get('users')->result();	 
		$this->load->view('message', $data);
	}
}
