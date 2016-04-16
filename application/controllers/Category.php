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
class Category extends CI_Controller{
    
    public function __construct()
    { 
    
        parent::__construct();
        $this->load->model('category_model');
    }
   
    public function create()
    {
        if (isset($_POST['categoryName'])) {
            $data = [
                'name' => $this->input->post('categoryName')
            ];
            $result = $this->category_model->create($data);
            if ($result) {
                redirect('/category/getCategories');
            } else {
                $this->createError();
            }
        } else {
            $this->load->view('createCategory');
        }
    }

    public function update($id)
    {
        if ($_POST) {
            $data = [
                'name' => $this->input->post('categoryName')
            ];
            $result = $this->category_model->update($data, $id);
            if ($result) {
                redirect('/category/getCategories');
            } else {
                $this->createError();
            }
        }else{
            $result ['categories'] = $this->category_model->get($id);
            $this->load->view('updateCategory', $result);
        }

    }

    public function deleteCategory($id){
        $result = $this->category_model->delete($id);
        if ($result) {
            redirect('/category/getCategories');
        } else {
            $this->createError();
        }
    }
    
    public function getCategories(){
        
      $result ['categories'] = $this->category_model->get();

        $this->load->view('getCategory', $result);
    }
 
    
    public function createError()
    {
        $this->load->view('createError');
    }

}
