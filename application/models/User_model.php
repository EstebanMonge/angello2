<?php
class User_model extends CI_model{
 
public function login_user($username,$password){
 
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('username',$username);
  $this->db->where('password',$password);
 
  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}

public function get_users(){

  $this->db->select('username,name,email,is_admin');
  $this->db->from('users');
  $this->db->order_by('username','asc');

  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
}

}
?>
