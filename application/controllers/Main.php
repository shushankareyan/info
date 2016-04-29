<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Main extends CI_Controller{
 
    public function index(){
        if($this->session->userdata('logged_in')) {
            $this->load->view('main/welcome');          
        } else { 
            $this->load->view('main/login-register');
        }
        
    }  
}



