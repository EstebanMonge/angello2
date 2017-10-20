<?php
class Audit_model extends CI_model{
 
public function get_scans(){
 
  $this->db->select('*');
  $this->db->from('scans');
  $this->db->order_by('id','DESC');
 
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
