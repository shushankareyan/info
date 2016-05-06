<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author skareyan
 */
class User extends CI_Controller{
    
    public function __construct()
    { 
    
        parent::__construct();
        $this->load->model('user_model');
    }
   
    public function create()
    {
        if (!empty($_POST['userEmail']) && !empty($_POST['userPass'])) {
            $data = [                
                'email' => $this->input->post('userEmail'),
                'password' => $this->input->post('userPass'),
                'updated_at' => time(),
                'created_at' => time()
            ];
            $result = $this->user_model->create($data);            
            if (isset($result)) {
                if($result == FALSE){
                    $this->template->load('main', 'user/createUser');  
                }else {
                redirect('/user/getUsers');
                }
            } else {
                $this->createError();
            }
        } else {
           $this->template->load('main', 'user/createUser');
        }
    }

    public function update($id)
    {
        if (!empty($_POST['userPass']) || !empty($_POST['userEmail'])) {
            $data = [
                'name' => $this->input->post('userName'),                               
                'updated_at' => time()
             ];
            
            $result = $this->user_model->update($data, $id);
            if ($result) {
                redirect('/user/getUsers');
            } else {
                $this->createError();
            }
        }else{
            $user = $this->user_model->get($id);
            $data = [
                'user' => $user,
            ];          
             $this->template->load('main', 'user/updateUser', $data);
        }

    }

    public function deleteUser($id){
        $result = $this->user_model->delete($id);
        if ($result) {
            redirect('/user/getUsers');
        } else {
            $this->createError();
        }
    }
    
    public function getUsers() {


        $data ['users'] = $this->user_model->get();

        $this->template->load('main', 'user/getUser', $data);

    }
    
    public function login() {
        if (!empty($_POST['userEmail']) && !empty($_POST['userPass'])) {
            $data = [
                'email' => $this->input->post('userEmail'),
                'password' => $this->input->post('userPass')              
            ];
            $result = $this->user_model->login($data);                       
            if (sizeof($result)==1) {
                    $sess_array = array(
                    'id' => $result[0]->id,
                    'email' => $result[0]->email,
                    'password' => $result[0]->password
                    );
                    $this->session->set_userdata('logged_in', $sess_array);              
                    redirect('/main/index');                
            }else {
                $this->template->load('main', 'main/login');
            }
        } else {
           $this->template->load('main', 'main/login');
        }
    }
 
       public function register()
    {
        if (!empty($_POST['userEmail']) && !empty($_POST['userPass'])) {
            $data = [
                'email' => $this->input->post('userEmail'),
                'password' => $this->input->post('userPass')              
            ];
            $result = $this->user_model->create($data);                      
            if (sizeof($result)==1 && $result != FALSE ) {
                    $sess_array = array(
                    'id' => $result->id,
                    'email' => $result->email,
                    'password' => $result->password
                    );
                    $this->session->set_userdata('logged_in', $sess_array);              
                    redirect('/main/index');                
            } else {
                $this->template->load('main', 'main/register');
            }
        } else {
           $this->template->load('main', 'main/register');
        }
    }
    
    public function logout()
        {
           $this->session->unset_userdata('logged_in');
           $this->load->view('main/login-register');
           
    }
    
    
    public function createError()
    {
        $this->load->view('createError');
    }

  
}
