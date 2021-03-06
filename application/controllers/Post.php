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
class Post extends CI_Controller{
    
    public function __construct()
    { 
    
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('category_model');
    }
   
    public function create()
    {
        if (!empty($_POST['postName'])) {
            $data = [
                'name' => $this->input->post('postName'),
                'category_id'  => $this->input->post('categoryId')    
            ];
            $result = $this->post_model->create($data);
            if ($result) {
                redirect('/post/getPosts');
            } else {
                $this->createError();
            }
        } else {
            $result ['categories'] =  $this->category_model->get();
            $this->template->load('main', 'post/createPost', $result);
        }
    }

    public function update($id)
    {
        if (!empty($_POST['postName']) && isset($_POST['categoryId'])) {
            $data = [
                'name' => $this->input->post('postName'),
                'category_id' => $this->input->post('categoryId')    
            ];
            $result = $this->post_model->update($data, $id);
            if ($result) {
                redirect('/post/getPosts');
            } else {
                $this->createError();
            }
        }else{
            $post = $this->post_model->get($id);
            $categories = $this->category_model->get();

            $data = [
                'post' => $post,
                'categories' => $categories
            ];

        $this->template->load('main', 'post/updatePost', $data);
        }

    }


    public function delete($id){
        $result = $this->post_model->delete($id);
        if ($result) {
            redirect('/post/getPosts');
        } else {
            $this->createError();
        }
    }
    
    public function getPosts(){
//        $this->load->library('template');
        
      $result ['posts'] = $this->post_model->get();

        $this->template->load('main', 'post/getPost', $result);

    }
 
    
    public function createError()
    {
        $this->load->view('createError');
    }

}
