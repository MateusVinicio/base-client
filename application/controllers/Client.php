<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
    { 
        parent::__construct();

		if (!$this->session->userdata('user'))
			redirect('/'); 

		$this->load->model('crud_model', 'crud');
		$this->load->library('form_validation');
		$this->load->library('datatable_lib');
    }

	public function index()
	{
		$this->data['view'] = 'client/list-client';
		$this->data['header'] = 'template/header';
		$this->data['footer'] = 'template/footer';
        $this->load->view($this->config->item('template'), $this->data);
	}

    public function save()
	{
		checkAJax($this->input->is_ajax_request());

		if($this->form_validation->run('client') == FALSE){
			echo errorResponse(formatError(validation_errors()));
			return;
		}
		
		$dataAdd = array(
			'email' => $this->input->post('client-email'),
			'name' => $this->input->post('client-name'),
			'phone' => $this->input->post('client-phone'),
			'cpf_cnpj' => $this->input->post('client-cpf_cnpj'),
			'type' => $this->input->post('client-type'),
			'id_user' => $this->session->userdata('user')
		);

		$add = $this->crud->add('client', $dataAdd);
				
		echo $add ? successResponse("Cliente cadastrado com sucesso!") : errorResponse(formatError("Não foi possível cadastrar o cliente."));
	}

    public function list()
	{
		checkAJax($this->input->is_ajax_request());

		$id = $this->uri->segment(3);
		$data = $this->crud->list('client', 'id', $id);

		echo $data ? successResponse($data) : errorResponse(formatError("Não foi possível encontrar o cliente"));
	}

    public function listAll()
	{
		checkAJax($this->input->is_ajax_request());

		$data = $this->datatable_lib->datatable('client');
		echo datatableResponse($data);
	}
    
    public function update()
	{
		checkAJax($this->input->is_ajax_request());

		if($this->form_validation->run('client-update') == FALSE){
			echo errorResponse(formatError(validation_errors()));
			return;
		}

		if(!$this->input->post('client')){
			echo errorResponse(formatError("Não foi possível editar o cliente. Tente Novamente"));
			return;
		}
		
		$dataEdit = array(
			'email' => $this->input->post('client-email'),
			'name' => $this->input->post('client-name'),
			'phone' => $this->input->post('client-phone'),
			'cpf_cnpj' => $this->input->post('client-cpf_cnpj'),
			'type' => $this->input->post('client-type'),
			'id_user' => $this->session->userdata('user')
		);

		$edit = $this->crud->update('client', $dataEdit, 'id', $this->input->post('client'));
				
		echo $edit ? successResponse("Cliente editado com sucesso!") : errorResponse(formatError("Não foi possível editar o cliente."));
	}

    public function delete()
	{
		checkAJax($this->input->is_ajax_request());

		$id = $this->input->post('cliente');
		$data = $this->crud->delete('client', 'id', $id);
		
		echo $data ? successResponse($data) : errorResponse(formatError("Não foi possível deletar o cliente"));
	}
}
