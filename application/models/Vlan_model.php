<?php
class Vlan_model extends CI_model{
 
public function get_vlans(){
 
  $this->db->select('*');
  $this->db->from('vlans');
  $this->db->order_by('vlan','ASC');
 
  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
}

public function get_comments($vlan){
  $this->db->select('description AS comments');
  $this->db->from('vlans');
  $this->db->where('vlan LIKE '.$vlan);
 
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
