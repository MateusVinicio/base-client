<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    { 
        parent::__construct();
        
		$this->load->library('form_validation');
		$this->load->library('login_lib');
		$this->load->helper('general');

    }

	public function index()
	{
		$this->data['view'] = 'login/login';
		$this->data['footer'] = 'template/footer';
        $this->load->view($this->config->item('template'), $this->data);
	}


	public function signin()
	{
		checkAJax($this->input->is_ajax_request());

		$email = $this->input->post('login-email');
        $password = $this->input->post('login-password');

		if($this->form_validation->run('login') == FALSE){
			echo errorResponse(formatError(validation_errors()));
			return;
		}

		$infoUser = $this->login_lib->verifyLogin($email, $password);
		
		if($infoUser == FALSE){
			echo errorResponse(formatError("Usuário e/ou senha incorretos."));
			return;
		}

		$sessionData = array(
			'user' => $infoUser->id,
			'name' => $infoUser->name,
			'email' => $infoUser->email
		);

		$this->session->set_userdata($sessionData);

		echo successResponse("Sucesso");
	}

	public function logout(){

        $this->session->sess_destroy();
        redirect('/');
    }

	
}
