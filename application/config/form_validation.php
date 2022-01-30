<?php

$messages = array (
    'required' => 'Preencha o campo %s.',
    'is_unique' =>  'Este %s já existe.',
    'valid_email' => 'Este %s é inválido.',
    'numeric' => 'O campo %s deve conter apenas números.',
    'in_list' => 'O campo {field} deve conter apenas {param}.',
    'min_length' => 'O campo {field} deve conter no mínimo {param} caracteres.',
    'max_length' => 'O campo {field} deve conter no máximo {param} caracteres.'
);

$config  =  array ( 
    'user'  =>  array ( 
        array ( 
            'field'  =>  'user-name' , 
            'label'  =>  'nome' , 
            'rules'  =>  'trim|required|min_length[3]',
            'errors' => $messages
        ), 
        array ( 
            'field' =>  'user-password' , 
            'label' =>  'senha' , 
            'rules' =>  'trim|required|min_length[5]',
            'errors' => $messages
        ), 
        array ( 
            'field'  =>  'user-email' , 
            'label'  =>  'email' , 
            'rules'  =>  'trim|required|valid_email|is_unique[user.email]',
            'errors' => $messages
        ) 
    ),
    'login'  =>  array ( 
        array ( 
            'field' =>  'login-password' , 
            'label' =>  'senha' , 
            'rules' =>  'trim|required',
            'errors' => $messages
        ), 
        array ( 
            'field'  =>  'login-email' , 
            'label'  =>  'email' , 
            'rules'  =>  'trim|required|valid_email',
            'errors' => $messages
        ) 
    ),
    'client'  =>  array ( 
        array ( 
            'field'  =>  'client-name' , 
            'label'  =>  'nome' , 
            'rules'  =>  'trim|required',
            'errors' => $messages
        ), 
        array ( 
            'field'  =>  'client-email' , 
            'label'  =>  'email' , 
            'rules'  =>  'trim|required|valid_email|is_unique[client.email]',
            'errors' => $messages
        ),
        array ( 
            'field'  =>  'client-cpf_cnpj' , 
            'label'  =>  'CPF ou CNPJ' , 
            'rules'  =>  'trim|required|numeric|min_length[11]|max_length[14]|is_unique[client.cpf_cnpj]',
            'errors' => $messages
        ),  
        array ( 
            'field'  =>  'client-phone' , 
            'label'  =>  'telefone' , 
            'rules'  =>  'trim|required|numeric|min_length[10]|max_length[11]',
            'errors' => $messages
        ),  
        array ( 
            'field'  =>  'client-type' , 
            'label'  =>  'tipo' , 
            'rules'  =>  'trim|required|numeric|in_list[0,1]',
            'errors' => $messages
        )
    ),
    'client-update'  =>  array ( 
        array ( 
            'field'  =>  'client-name' , 
            'label'  =>  'nome' , 
            'rules'  =>  'trim|required',
            'errors' => $messages
        ), 
        array ( 
            'field'  =>  'client-email' , 
            'label'  =>  'email' , 
            'rules'  =>  'trim|required|valid_email',
            'errors' => $messages
        ),
        array ( 
            'field'  =>  'client-cpf_cnpj' , 
            'label'  =>  'CPF ou CNPJ' , 
            'rules'  =>  'trim|required|numeric|min_length[11]|max_length[14]',
            'errors' => $messages
        ),  
        array ( 
            'field'  =>  'client-phone' , 
            'label'  =>  'telefone' , 
            'rules'  =>  'trim|required|numeric|min_length[10]|max_length[11]',
            'errors' => $messages
        ),  
        array ( 
            'field'  =>  'client-type' , 
            'label'  =>  'tipo' , 
            'rules'  =>  'trim|required|numeric|in_list[0,1]',
            'errors' => $messages
        )
    )
);

?>