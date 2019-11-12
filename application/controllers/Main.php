<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['title'] = "homepage";
		
		$this->load->view('inc/header',$data);
		$this->load->view('form');
		$this->load->view('inc/footer');
	}
}
