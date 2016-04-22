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
        if (isset($_POST['userName'])) {
            $data = [
                'name' => $this->input->post('categoryName')
            ];
            $result = $this->category_model->create($data);
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
                'name' => $this->input->post('categoryName')
            ];
            $result = $this->user_model->update($data, $id);
            if ($result) {
                redirect('/user/getUsers');
            } else {
                $this->createError();
            }
        }else{
            $category = $this->user_model->get($id);
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


          $result ['users'] = $this->user_model->get();

        $this->template->load('template1', 'category/getCategory', $result);

    }
 
    
    public function createError()
    {
        $this->load->view('createError');
    }

}
