<?php
class Country_model extends CI_model{
 
public function get_countries(){
 
  $this->db->select('*');
  $this->db->from('countries');
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
