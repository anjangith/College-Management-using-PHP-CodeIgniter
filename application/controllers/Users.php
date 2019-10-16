<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends My_Controller {

public function dashboard(){

  $this->load->model('queries');
  $college_id = $this->session->userdata('college_id');
  $students = $this->queries->getStudents($college_id);
  $this->load->view('users',['students'=> $students]);

}

public function __construct(){
  parent::__construct();
  if(!$this->session->userdata('user_id')){
    return redirect('homepage/login');
  }
}

  public function work(){
  $this->load->view('work');
}


public function postWork(){

  $this->form_validation->set_rules('post_work','Work Title','required');
  $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
  if($this->form_validation->run()){

    $data = $this->input->post();
    $post = $data['post_work'];
    $this->load->model('queries');
    $categories = $this->queries->getCategories();
    $this->config->set_item('post',$post);
    $this->load->view('postwork',['post'=>$post,'categories'=> $categories]);


  }else{
    $this->find();

  }
}


public function logout(){
  $this->session->unset_userdata("user_id");
  return redirect('homepage/login');
}

public function find(){
  $this->load->model('queries');
  $categories = $this->queries->getCategories();
  $this->load->view('find',['categories'=> $categories]);
}

public function category($id){
echo "<h1>$id</h1>";
}

public function loadPostWork(){

  $this->load->model('queries');
  $categories = $this->queries->getCategories();
  $this->load->view('postwork',['post'=>'','categories'=> $categories]);
}

public function postFinal(){

  $this->form_validation->set_rules('p_title','Post Title','required');
  $this->form_validation->set_rules('c_id','Category','required');
  $this->form_validation->set_rules('p_description','Description','required');
  $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
  if($this->form_validation->run()){

    $data = array(
      'p_uid' => $this->session->userdata('user_id'),
      'p_title' => $this->input->post('p_title'),
      'p_description' => $this->input->post('p_description')
    );
    $this->load->model('queries');
    if($this->queries->postWork($data)){
      $this->session->set_flashdata('message','New Post Added');
      return redirect("users/find");
    }else{
      $this->session->set_flashdata('message','Failed to add a new Post!');
      return redirect("users/loadPostWork");
    }
    //print_r($data);
  }else
  {
  //  echo ($this->input->post['p_title']);
    $this->loadPostWork();
  }
}
}
