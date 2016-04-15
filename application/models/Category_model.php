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
class Category_model extends CI_Model{
   
    public function create($data){
        
        $this->db->insert('category', $data);
        return $this->db->insert_id();
               
    }
        
    public function getId ($name){
      
        $sql="SELECT * FROM `category` WHERE name='$name' ";
        $result=$this->db->query($sql);
        $id = ($result->num_rows() !== 0)? $result->row()->id : 0;
        return $id;
    }
        
    public function get($id = 0){
        if ($id ==0) {
            $query = $this->db->query("Select * from category");  
             return $query->result_array();
             
        } else {
            $query = $this->db->get_where('category', array('id' => $id));
            return $query->row();
        }
    }
        
    public function delete($id){
          
       return $this->db->delete('category', array('id' => $id));
        
            
    }
         
    public function update($data, $id){
        
        $this->db->where('id', $id);
        return  $this->db->update('category', $data);
          
    }

}
