<?php
class Client_model extends CI_model{
 
public function get_clients(){
 
  $this->db->select('*');
  $this->db->from('clients');
  $this->db->order_by('name','ASC');
 
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
