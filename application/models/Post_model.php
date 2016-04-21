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
class Post_model extends CI_Model{
   
    public function create($data){
        
        $this->db->insert('post', $data);
        return $this->db->insert_id();
               
    }
        
//    public function getId ($name){
//
//        $sql="SELECT * FROM `post` WHERE name='".$name."' ";
//        $result=$this->db->query($sql);
//        $last = $this->db->last_query();
//        var_dump($last);
//        $id = ($result->num_rows() !== 0)? $result->row()->id : 0;
//        return $id;
//    }
        
    public function get($id = 0){
        if ($id ==0) {
            $query = $this->db->query("Select * from post");  
             return $query->result_array();
             
        } else {
            $query = $this->db->get_where('post', array('id' => $id));
            return $query->row();
        }
    }
    

    public function delete($id){
          
       return $this->db->delete('post', array('id' => $id));
        
            
    }
         
    public function update($data, $id){
        
        $this->db->where('id', $id);
        return  $this->db->update('post', $data);
          
    }

}
