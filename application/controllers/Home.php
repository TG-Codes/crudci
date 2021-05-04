<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

     function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url');
        $this->load->library('session');
        $this->load->helper('download');
		$this->load->library('form_validation');
		$this->load->library('pagination');

    }


	// This handles the pages
	public function view ($page = 'home')
	{
		if( !file_exists('application/views/'.$page.'.php'))
		{
			show_404();
		}
        else {
            
            
            $this->load->view('nav');
            $this->load->view($page);
            $this->load->view('footer');
        }
		       
	}
	
	public function contact(){
	    
	    $fullname = $this->input->post('fullname');
	    $email = $this->input->post('email');
	    $phone = $this->input->post('phone');
	    $company = $this->input->post('company');
	    $message = $this->input->post('message');
	    
	    // send email to us
	    
	}
}
