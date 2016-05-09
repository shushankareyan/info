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
        $query=$this->db->get_where('user', array('email' => $data['email']));
        if(!empty($query->result())){
            return FALSE;
        } else {
           $this->db->insert('user', $data);
            $id = $this->db->insert_id();
            return  $this->db->get_where('user', array('id' => $id))->row();
        }             
    }

    public function create_temp($data){
        $this->db->insert('temp_user', $data);
        $id = $this->db->insert_id();
        return  $this->db->get_where('user', array('id' => $id))->row();
    }

    public function add_user($key){
        $query=$this->db->get_where('temp_user', array('vkey' => $key));
        if($query->num_rows() !=1){
            return false;
        } else {
            $data = [
                'email' => $query->row()->email,
                'password' => $query->row()->password,
                'updated_at' => time(),
                'created_at' => time()
            ];
            $this->db->insert('user', $data);
            $id = $this->db->insert_id();
            $this->db->delete('temp_user', array('vkey' => $key));
            return  $this->db->get_where('user', array('id' => $id))->row();
        }
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

    public function login($data){
      $query = $this->db->get_where('user', $data);
      return $query->result();

    }
}
