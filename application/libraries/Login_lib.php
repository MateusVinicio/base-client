<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_lib
{
    public function __construct()
    {
        $this->CI = &Get_instance();
        $this->CI->load->model('crud_model', 'crud');
    }

    public function generateHash($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

		if(password_needs_rehash($hash, PASSWORD_DEFAULT))
            $hash = password_hash($password, PASSWORD_DEFAULT);

        if(password_verify($password, $hash))
            return $hash;

        return NULL;
    }

    public function verifyLogin($email, $password)
    {
        $infoUser = $this->CI->crud->list('user', 'email', $email);

        if($infoUser != NULL && $infoUser != FALSE){
            $check = password_verify($password, $infoUser->password);
            return $check ? $infoUser : FALSE;
        }

        return FALSE;
    }
}