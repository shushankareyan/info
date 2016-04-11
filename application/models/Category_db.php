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
class Category_db extends CI_Model{
   
    public function addUser($user){
        
        $this->db->insert('user', $user);
               
    }
        
    public function getUserId ($my_email, $my_pass){
      
        $sql="SELECT * FROM `user` WHERE password='$my_pass' AND email='$my_email'";
        $result=$this->db->query($sql);
        $id = ($result->num_rows() !== 0)? $result->row()->id : 0;
        return $id;
    }
        
    public function getUserById($id){
            
        $query = $this->db->get_where('user', array('id' => $id));
        return ($query->num_rows() !== 0)? $query->result() : 0;
    }
        
    public function deleteUser($id){
          
        $this->db->delete('user', array('id' => $id));
            
    }
         
    public function editUserPass($id, $data){
        
        $this->db->where('id', $id);
        $this->db->update('user', $data);
          
    }

}
