<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	/**
	 * Index method. It loads Homepage
	 */
	public function index()
	{	
		$data['title']='NewsPaper | We provide News';
		$this->load->view('include/header', $data);
		$this->load->view('include/navbarl');
		$this->load->view('home');
		$this->load->view('include/footer');
	}

		
}
