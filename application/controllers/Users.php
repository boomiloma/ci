<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	private function logged_in()
	{
		if (!$this->session->userdata('authenticated')) {
			redirect('users/login');
		}
	}

	public function login()
	{

		$data['title'] = "Login";

		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == false) {

			$this->load->view('header', $data);
			$this->load->view('users/login', $data);
			$this->load->view('footer', $data);
		} else {

			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));

			$user = $this->users_model->login($email, $password);

			if ($user) {
				$userdata = array(
					'id' => $user->id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'authenticated' => TRUE,
					'team' => $user->team,
					'image' => $user->team . '.png',
				);

				$this->session->set_userdata($userdata);

				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', 'Invalid email or password');
				redirect('users/login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users/login');
	}

	public function addPlayers()
	{

		// $data['message'] = 'Player selection stopped by Administrator';
		// $data['status'] = false;
		// echo  json_encode($data);
		// exit;

		$userID = $this->session->userdata('id');
		$data['status'] = false;
		$totalPlayers = $this->db->where('taken_by', $userID)->get('users')->num_rows();
		if ($totalPlayers >= 7) {
			$data['message'] = 'Already you selected 7 players';
			echo  json_encode($data);
			exit;
		}
		$query = $this->db
			->where('taken_by', $userID)
			->where('id', $_POST['id'])
			->get('users');
		if ($query->num_rows() > 0) {
			$this->db
				->update('users', ['taken_by' => '0', 'team' => 'grey'], ['id' => $_POST['id']]);

				$rows = $this->db->get_where('users', ['id' =>  $_POST['id']])->row();


			$data['message'] = 'Player selection reverted successfully';
			$data['id'] = $_POST['id'];
			$data['image'] = 'grey.png';
			$data['status'] = true;
			$data['captain'] = '-';
			$data['team'] = 'grey';
			$data['name'] = ucfirst($rows->first_name);
			$this->db
				->update('users', ['selectable' => 1], ['id' => $userID]);
		} else {
			$count = $this->db->where('taken_by', '0')->where('id', $_POST['id'])->get('users')->num_rows();
			if (empty($count)) {
				$data['message'] = 'Already selected this player by opposite team';
			} else {
				$result = $this->db->where('selectable', 1)->where('id', $userID)->get('users')->num_rows();
				if (empty($result)) {
					$data['message'] = 'Please wait for opposite captain player selection';
					echo  json_encode($data);
					exit;
				}
				$this->db
					->update('users', ['taken_by' => $userID, 'team' => $this->session->userdata('team')], ['id' => $_POST['id']]);
				$this->db
					->update('users', ['selectable' => 0], ['id' => $userID]);

				if ($userID == 1) {
					$userID = 2;
				} else {
					$userID = 1;
				}
				$this->db
					->update('users', ['selectable' => 1], ['id' => $userID]);
				$data['message'] = 'Player selected successfully';
				$data['id'] = $_POST['id'];
				$data['status'] = true;
				$data['image'] = $this->session->userdata('image');
				$row = $this->db->get_where('users', ['id' =>  $this->session->userdata('id')])->row();
				$rows = $this->db->get_where('users', ['id' =>  $_POST['id']])->row();
				$data['captain'] = ucfirst($row->first_name);
				$data['team'] = $row->team;
				$data['name'] = ucfirst($rows->first_name);
			}
		}
		echo  json_encode($data);
		exit;
	}
}
