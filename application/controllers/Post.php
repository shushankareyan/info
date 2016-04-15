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
        $this->load->model('postDb');
        $this->load->model('category_db');
    }
   
    public function create()
    {
        if (isset($_POST['postName'])) {
            $data = [
                'name' => $this->input->post('postName'),
                'category_id'  => $this->input->post('categoryId')    
            ];
            $result = $this->postDb->create($data);
            if ($result) {
                redirect('/post/getPosts');
            } else {
                $this->createError();
            }
        } else {
             $result ['categories'] =  $this->postDb->getCategories();
            $this->load->view('createPost' , $result);
        }
    }

    public function update($id)
    {
        if ($_POST) {
            $data = [
                'name' => $this->input->post('postName'),
                'category_id' => $this->input->post('categoryId')    
            ];
            $result = $this->postDb->update($data, $id);
            if ($result) {
                redirect('/category/getCategories');
            } else {
                $this->createError();
            }
        }else{
            $post = $this->postDb->get($id);
            $categories = $this->category_db->get();

            $data = [
                'post' => $post,
                'categories' => $categories
            ];
//            var_dump($post->category_id);
////            var_dump($result_post ['posts'][0]['name']);
////            var_dump($result_post ['posts'][0]['category_id']);
//
////            $result_post['current_category_id'] = $result_post ['posts'][0]['category_id']; //$this->category_db->get($result_post ['posts'][0]['category_id']);
//            $result_post['categories'] = $this->category_db->get();

            $this->load->view('updatePost', $data);
        }

    }

    public function delete($id){
        $result = $this->postDb->delete($id);
        if ($result) {
            redirect('/post/getPosts');
        } else {
            $this->createError();
        }
    }
    
    public function getPosts(){
        
      $result ['posts'] = $this->postDb->get();

        $this->load->view('getPost', $result);
    }
 
    
    public function createError()
    {
        $this->load->view('createError');
    }

}
