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
        if ($_POST) {
            $data = [
                'name' => $this->input->post('userName'),
                'email' => $this->input->post('userEmail'),
                'password' => $this->input->post('userPass'),
                'updated_at' => time(),
                'created_at' => time()
            ];
            $result = $this->user_model->create($data);
            if ($result) {
                redirect('/user/getUsers');
            } else {
                $this->createError();
            }
        } else {
            $this->load->view('user/createUser');
        }
    }

    public function update($id)
    {
        if ($_POST) {
            $data = [
                'name' => $this->input->post('userName'),
                'email' => $this->input->post('userEmail'),
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
            $this->load->view('user/updateUser', $data);
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
    
    public function getUsers(){


          $data ['users'] = $this->user_model->get();

        $this->template->load('main', 'user/getUser', $data);

    }
 
    
    public function createError()
    {
        $this->load->view('createError');
    }

}
