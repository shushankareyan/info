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
class User_model extends CI_Model{
   
    public function create($data){
        
        $this->db->insert('user', $data);
        return $this->db->insert_id();
               
    }
        
        
    public function get($id = 0){
        if ($id ==0) {
            $query = $this->db->query("Select * from user");  
             return $query->result_array();
             
        } else {
            $query = $this->db->get_where('user', array('id' => $id));
            return $query->row();
        }
    }
    

    public function delete($id){
          
       return $this->db->delete('user', array('id' => $id));
        
            
    }
         
    public function update($data, $id){
        
        $this->db->where('id', $id);
        return  $this->db->update('user', $data);
          
    }

}
