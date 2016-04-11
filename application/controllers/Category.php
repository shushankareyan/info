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
    
    public function __construct(){ 
    
        parent::__construct();
        $this->load->model('category_db');
    }
   
  
    
    public function registration(){
                                  
        $this->load->view('registration');      
    }
        
             
    public function registrationHandle(){
       
        $this->addUser($_POST["name"], $_POST["email"],  $_POST["password"]); 
        redirect(site_url("user/main_view"));
    }
    
    public function login(){
                           
        $this->load->view('login');                
    }
    
    
    public function loginHandle(){
       
        if ($this->getUserId($_POST["email"],  $_POST["password"]) !== 0){
                                   
            redirect(site_url("user/main_view"));
        } else {
             
            $this->load->view('login'); 
        }                                        
    }
    
    public function main_view(){
                                 
          $this->load->view('login');
               
    }
    
    public function addUser($my_name, $my_email, $my_pass){
     
        if(!empty($my_name) && !empty($my_email)  && !empty($my_pass)){
            $current_time=time();
            $data = array(
            'name' => "$my_name" ,
            'email' => "$my_email" ,
            'password' => "$my_pass",
            'created_at' => "$current_time" ,
            'updated_at' => "$current_time"               
            );
           $this->user_db->addUser($data);     
        }
    }
        
    public function getUserId( $my_email, $my_pass){
            
        return $this->user_db->getUserId($my_email, $my_pass);
    }
        
    public function getUserById($id){
           
        $user= $this->user_db->getUserById($id);
        return $user;
    }
        
    public function deleteUser($my_name, $my_email, $my_pass){
            
        $id=$this->getUserId($my_name, $my_email, $my_pass);
        if($id !== 0){
            $this->user_db->deleteUser($id);  
        }
    }
        
    public function editUserPass($id, $pass){
        
        if($id != 0){ 
            $data = array(
               'password' => $pass,
               'updated_at' => time() 
            );
            $this->user_db->editUserPass($id, $data);
        }
    }
   
}
