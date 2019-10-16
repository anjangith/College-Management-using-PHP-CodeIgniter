
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pagination extends CI_Controller {

 function index()
 {
  $this->load->view("find");
 }


 function pagination()
 {
  $this->load->model("ajax_pagination_model");
  $this->load->library("pagination");
  $config = array();
  $config["base_url"] = "#";
  $config["total_rows"] = $this->ajax_pagination_model->count_all();
  $config["per_page"] = 2;
  $config["uri_segment"] = 3;
  $config["use_page_numbers"] = TRUE;
  $config['full_tag_open'] = "<ul class='pagination'>";
  $config['full_tag_close'] ="</ul>";
  $config['num_tag_open'] = '<li class="page-item page-link">';
  $config['num_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='disabled page-item '><li class='active page-item '><a class='page-link' href='#'>";
  $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
  $config['next_tag_open'] = "<li class='page-link'>";
  $config['next_tagl_close'] = "</li>";
  $config['prev_tag_open'] = "<li class='page-item page-link'>";
  $config['prev_tagl_close'] = "</li>";
  $config['first_tag_open'] = "<li class='page-item page-link'>";
  $config['first_tagl_close'] = "</li>";
  $config['last_tag_open'] = "<li class='page-item page-link'>";
  $config['last_tagl_close'] = "</li>";
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config["per_page"];

  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'country_table'   => $this->ajax_pagination_model->fetch_details($config["per_page"], $start)
  );
  echo json_encode($output);
 }

}
