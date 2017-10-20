<?php
class Log_model extends CI_model{
 
public function get_logs(){
 
  $this->db->select('*');
  $this->db->from('logs');
  $this->db->order_by('date','DESC');
 
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
