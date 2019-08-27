<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$chkAdmin = $this->queries->checkAdminExist();
		$this->load->view('home',['chkAdmin'=>$chkAdmin]);
	}

	public function adminRegister(){
		$this->load->model('queries');
		$roles = $this->queries->getRoles();
		$this->load->view('register',['roles'=>$roles]);
	}

	public function adminSignup(){
					$this->form_validation->set_rules('user_name','Username','required');
					$this->form_validation->set_rules('email','Email','required|valid_email');
					$this->form_validation->set_rules('gender','Gender','required');
					$this->form_validation->set_rules('role_id','Role','required');
					$this->form_validation->set_rules('password','Password','required');
					$this->form_validation->set_rules('confpwd','Confirm Password','required|matches[password]');

					$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
					if($this->form_validation->run()){

						$data = $this->input->post();
						$data['password']=sha1($this->input->post('password'));
						$data['confpwd']=sha1($this->input->post('confpwd'));
						$this->load->model('queries');
						if($this->queries->registerAdmin($data)){
							$this->session->set_flashdata('message','Admin Registered Successfully');
							return redirect("welcome/adminRegister");
						}else{
							$this->session->set_flashdata('message','Failed to register Admin!');
							return redirect("welcome/adminRegister");
						}

					}else{
						$this->adminRegister();
					}
	}


	public function login(){
		if($this->session->userdata('user_id')){
			return redirect("admin/dashboard");
		}

		$this->load->view('login');
	}

	public function signin(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
					$email= $this->input->post('email');
					$password= sha1($this->input->post('password'));
					$this->load->model('queries');
					$usrExist = $this->queries->adminExist($email, $password);
					if($usrExist){
						if($usrExist->role_id == '1'){
						$sessionData= [
							'user_id' => $usrExist->user_id,
							'username' => $usrExist->user_name,
							'email' => $usrExist->email,
							'role_id' => $usrExist->role_id,
						];
							$this->session->set_userdata($sessionData);
							return redirect('admin/dashboard');

					}else if($usrExist->user_id > '1'){
						$sessionData= [
							'user_id' => $usrExist->user_id,
							'username' => $usrExist->user_name,
							'email' => $usrExist->email,
							'role_id' => $usrExist->role_id,
							'college_id'=>$usrExist->college_id,
						];
						$this->session->set_userdata($sessionData);
						return redirect('users/dashboard');
					}
					}else{
						$this->session->set_flashdata('message','Email or Password is Incorrect!');
						redirect('welcome/login');
					}

		}else{
			$this->login();
		}
	}

	public function logout(){
		$this->session->unset_userdata("user_id");
		return redirect('welcome/login');
	}


}
