<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

	public function dashboard(){

			$this->load->model('queries');
			$users = $this->queries->viewAllColleges();
			$this->load->view('dashboard', ['users'=> $users]);

	}


	public function addCoadmin(){

		$this->load->model('queries');
		$roles = $this->queries->getRoles();
		$colleges = $this->queries->getColleges();
		$this->load->view('addCoadmin',['roles'=>$roles,'colleges'=>$colleges]);

	}

	public function coadmins(){

		$this->load->model('queries');
		$users = $this->queries->viewAllColleges();
		$this->load->model('queries');
		$this->load->view('viewadmins',['users'=> $users]);
	}

	public function createCoadmin(){


		$this->form_validation->set_rules('user_name','Username','required');
		$this->form_validation->set_rules('college_id','College Name','required');
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
			if($this->queries->registerCoAdmin($data)){
				$this->session->set_flashdata('message','Co-Admin Registered Successfully');
				return redirect("admin/addCoadmin");
			}else{
				$this->session->set_flashdata('message','Failed to register!');
				return redirect("admin/addCoadmin");
			}

		}else{
			$this->addCoadmin();
		}


	}

	public function editStudent($id){
		$this->load->model('queries');
		$studentData = $this->queries->getStudentRecord($id);
		$colleges=$this->queries->getColleges();
		$this->load->view('editStudent',['studentData'=>$studentData,'colleges'=>$colleges]);
	}

	public function deleteStudent($id){

		$this->load->model('queries');
		if($this->queries->removeStudent($id)){
			return redirect("admin/dashboard");
		}
	}

	public function addCollege(){


		$this->load->view('addCollege');

	}

	public function createCollege(){

		$this->form_validation->set_rules('collegename','College Name','required');
		$this->form_validation->set_rules('branch','Branch','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
		$data= $this->input->post();
		$this->load->model('queries');
		if($this->queries->makeCollege($data)){
			$this->session->set_flashdata('message','College Created Successfully');
		}else{
			$this->session->set_flashdata('message','Failed To Create College');
		}
		return redirect('admin/addCollege');
		}else{
			$this->addCollege();
		}

	}

	public function addStudent(){
		$this->load->model('queries');
			$colleges = $this->queries->getColleges();
			$this->load->view('addStudent',['colleges' => $colleges]);
	}

	public function viewStudents($college_id){
		$this->load->model('queries');
		$students = $this->queries->getStudents($college_id);
		$this->load->view('viewStudents',['students'=>$students]);
	}

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			return redirect('welcome/login');
		}
	}


	public function createStudent(){

		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
			$data = $this->input->post();
			$this->load->model('queries');
			if($this->queries->insertStudent($data)){
				$this->session->set_flashdata('message','Sudent added Successfully!');
			}else{
				$this->session->set_flashdata('message','Failed to add student!');
			}
			return redirect('admin/addStudent');
			}
			else{
					$this->addStudent();
 			}
	}

	public function modifyStudent($id){
		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run()){
			$data = $this->input->post();
			$this->load->model('queries');
			if($this->queries->updateStudent($data, $id)){
				$this->session->set_flashdata('message','Sudent updated Successfully!');
			}else{
				$this->session->set_flashdata('message','Failed to update student!');
			}
			return redirect("admin/modifyStudent/{$id}");
			}
			else{
					$this->editStudent($id);
 			}
	}

}
