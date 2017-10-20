<?php
class Host_model extends CI_model{
 
public function total_ip($vlan){
 
  $this->db->select('*');
  $this->db->from('hostnames');
  $this->db->where('vlan='.$vlan);
 
  if($query=$this->db->count_all_results())
  {
      return $query;
  }
  else{
    return false;
  }
}

public function free_ip($vlan){

  $this->db->select('*');
  $this->db->from('hostnames');
  $this->db->where('hostname="free" AND vlan='.$vlan);

  if($query=$this->db->count_all_results())
  {
      return $query;
  }
  else{
    return false;
  }
}

public function get_hosts($vlan){
  $this->db->select('*');
  $this->db->from('hostnames');
  $this->db->where('vlan LIKE "'.$vlan.'"');
  $this->db->order_by('INET_ATON(ip)','ASC');
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
