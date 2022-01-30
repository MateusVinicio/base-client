<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    { 
        parent::__construct();

		$this->load->model('crud_model', 'crud');
		$this->load->library('form_validation');
		$this->load->library('login_lib');
    }

    public function create()
	{
		$this->data['view'] = 'user/create-user';
		$this->data['footer'] = 'template/footer';
        $this->load->view($this->config->item('template'), $this->data);
	}

	public function save()
	{
		checkAJax($this->input->is_ajax_request());

		if($this->form_validation->run('user') == FALSE){
			echo errorResponse(formatError(validation_errors()));
			return;
		}
		
		$hash = $this->login_lib->generateHash($this->input->post('user-password'));

		if($hash == NULL){
			echo errorResponse("Não foi possível cadastrar o usuário.");
			return;
		}
		
		$dataAdd = array(
			'email' => $this->input->post('user-email'),
			'name' => $this->input->post('user-name'),
			'password' => $hash
		);

		$add = $this->crud->add('user', $dataAdd);
				
		echo $add ? successResponse("Usuário cadastrado com sucesso!") : errorResponse(formatError("Não foi possível cadastrar o usuário."));
	}

}
