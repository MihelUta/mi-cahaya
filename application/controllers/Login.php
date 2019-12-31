<?php 

/**
* class Login
*/
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function cek_login(){
		$data = array('username' => $this->input->post('username', TRUE),
					'password' => $this->input->post('password', TRUE)
					);

		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Login';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['email'] = $sess->email;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}

			if ($this->session->userdata('level') == 'admin') {
				redirect('dashboard');
			} else if ($this->session->userdata('level') == 'guru') {
				redirect('Guru');
					} else if ($this->session->userdata('level') == 'siswa') {
						redirect('Siswa');
						}			
		} else {
			echo '<script>alert("Login gagal! Silahkan cek Username atau Password");history.go(-1) ;</script>';
		}
	}

	function forgot_pass(){
		$title['title'] = "Forgot Password";

		$this->load->view('header', $title);
		$this->load->view('v_forgot_password');
		$this->load->view('footer');
	}

	function sent_data_user()
	{
		$title['title'] = "Forgot Password";

		$this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]|max_length[150]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');

		if ($this->form_validation->run() != true) {
			$this->load->view('header', $title);
			$this->load->view('v_forgot_password');
			$this->load->view('footer');
		} else {
			$nama = $this->input->post('nama', TRUE);
			$email = $this->input->post('email', TRUE);
			$username = $this->input->post('username', TRUE);

			$data = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'no_telp' => "-",
				'pesan' => "Lupa Password"
				);

			$this->model_pesan->insert_forgot_pwd($data);
			echo '<script>alert("Tunggu balasan dari Admin via Email setelah pengecekan data. Pastikan Email yang digunakan aktif/valid");</script>';
			redirect('home');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('home');
	}
}

?>