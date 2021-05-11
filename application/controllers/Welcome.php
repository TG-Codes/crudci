<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	

	 function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('form', 'url');
        $this->load->library('session');
        $this->load->helper('download');
        $this->load->library('form_validation');
    }

	// This handles the pages
	public function Ugochi ($page = 'index')
	{
		if( !file_exists('application/views/'.$page.'.php'))
		{
			show_404();
		}
        elseif ($page == 'index') {
                    

            $this->load->view($page);

        }
        else {
            
            // load any page that comes in 
            $this->load->view($page);
        }
		       
	}

	// create a registration method
	public function register(){
		// set the varaibles for each html elemenst that comes into the controller from the view 
		$Ugochi['fname'] = $this->input->post('fname');
		$Ugochi['lname'] = $this->input->post('lname');
		$Ugochi['otherName'] = $this->input->post('otherName');
		$Ugochi['day'] = $this->input->post('day');
		$Ugochi['month'] = $this->input->post('month');
		$Ugochi['year'] = $this->input->post('year');
		$Ugochi['gender'] = $this->input->post('gender');
		$Ugochi['address'] = $this->input->post('address');
		$Ugochi['country'] = $this->input->post('country');
		$Ugochi['phoneNo'] = $this->input->post('phoneNo');
		$Ugochi['email'] = $this->input->post('Email');
		$Ugochi['pass'] = $this->input->post('pass');

		if (!empty($Ugochi['fname']) &&  !empty($Ugochi['lname']) &&  !empty($Ugochi['otherName']) &&  !empty($Ugochi['day']) &&  !empty($Ugochi['month']) &&  !empty($Ugochi['year']) &&  !empty($Ugochi['gender']) &&  !empty($Ugochi['address']) &&  !empty($Ugochi['country']) &&  !empty($Ugochi['phoneNo']) &&  !empty($Ugochi['email']) &&  !empty($Ugochi['pass'])) {
			
			// I'm trying to make sure that the user emails is not doubled.
			$query = $this->Home_model->Verify($Ugochi);
			if ($query == true) {
				$response['error'] = true;
				$response['message'] = 'Email Already Exist';
			}
			else{

				// Save the user in the database 
				$insert = $this->Home_model->insert($Ugochi);

				$response['error'] = false;
				$response['message'] = 'User Added Successfully';
			}

		}
		else{
			$response['error'] = true;
			$response['message'] = 'All field are required';
		}

		

		echo json_encode($response);

	}

	public function login(){
		// fetch the html entities from the views 
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');


		// check if user exist in the data base 
		$query = $this->Home_model->ValidateEntry($data);

		// if it works create a session else bounce the nigger back
		if($query == true){

			// fetch all the user data fro mthe databse 
			$fetchdata = $this->Home_model->FetchUserData($data);
			
			// echo json_encode($fetchdata);
			//create the session here 
			$session_data = array(
				'email' => $fetchdata[0]->email, 
				'fname' => $fetchdata[0]->fname, 
				'lname' => $fetchdata[0]->lname, 
				'otherName' => $fetchdata[0]->otherName, 
				'day' => $fetchdata[0]->day,
				'month' => $fetchdata[0]->month, 
				'year' => $fetchdata[0]->year, 
				'gender' => $fetchdata[0]->gender,
				'address' => $fetchdata[0]->address, 
				'country' => $fetchdata[0]->country, 
				'phoneNo' => $fetchdata[0]->phoneNo
				);
			// add user data to  session
			$this->session->set_userdata('logged_in', $session_data);
			$response['error'] = false;
			$response['message'] = 'user logged in';


		}
		else{
			$response['error']= true;
			$response['message'] = 'No User found in the database';
		}

		echo json_encode($response);
	}


	public function LogOut(){
		// Removing session data
		$sess_array = array(
			'username' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			header('location:'.base_url('login'));
	}

	public function Update(){
		if(isset($this->session->userdata['logged_in'])){
			// update the user data
			// first we set the html entities 
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['otherName'] = $this->input->post('otherName');
			$data['day'] = $this->input->post('day');
			$data['month'] = $this->input->post('month');
			$data['year'] = $this->input->post('year');
			$data['gender'] = $this->input->post('gender');
			$data['address'] = $this->input->post('address');
			$data['country'] = $this->input->post('country');
			$data['phoneNo'] = $this->input->post('phoneNo');
			$data['email'] = $this->input->post('Email');

			// create a model the handles the updat to the databse 
			$query = $this->Home_model->Update($data);

			if ($query == false) {
				$response['error'] = false;
				$response['message'] = 'User details updates successfully';
			}
			else {
				$response['error'] = true;
				$response['message'] = 'Error inupdating user data';
			}
			
			echo json_encode($response);

		}
		else{
			// redirect the user to logged in 
			redirect(base_url('login'));
		}
	}

	public function PasswordUpdate(){
        if (isset($this->session->userdata['logged_in'])) {
            $data['email'] = ($this->session->userdata['logged_in']['email']);
            // chrch if the password on the db matches the one that is coming
            // fecth the old password from the user end
            $data['opass'] = $this->input->post('opass');

            // fect th enew password from the user end
            $data['pass'] =  $this->input->post('pass');

            // fetch the password in the database
            $query = $this->Home_model->FetchUserDataa($data);
		
			// fecth database email 
			$dbpass = $query[0]->pass;

			if($dbpass == $data['opass']){
				// you can modify with the new passsword 
				$query1 = $this->Home_model->UpdatePassword($data);

				if($query1 == false){
					$response['error'] = false;
					$response['message'] = 'Passwor update successfully';
				}
				else{
					$response['error'] = true;
				  $response['message'] = 'Error Updating password';
				}

			}
			else{
				$response['error'] = true;
				$response['message'] = 'Password is incorrect';
			}
			echo json_encode($response);
        }
		else{
			// redirect the user to logged in 
			redirect(base_url('login'));
		}

	}


	// we will fetch all theusers in the database


	public function AllUsers(){
		// authenticate the user 
		if(isset($this->session->userdata['logged_in'])){
			
			$query = $this->Home_model->AllUsers();

			if($query !== false){
				$response['error'] = false;
				$response['message'] = $query;

			}
			else{
				$response['error'] = true;
				$response['message'] = 'No User found in the database';
			}
			
			echo json_encode($response);
		}
		else{
			redirect(base_url('login'));
		}
	}



	public function DeleteUser(){
		if (isset($this->session->userdata['logged_in'])) {
			// fetch user id in the databse (unique id)
			$id = $this->input->post('id');
			$query = $this->Home_model->DeleteUser($id)
			if()
		}
		else{
			redirect(base_url('login'));
		}
	}










}
