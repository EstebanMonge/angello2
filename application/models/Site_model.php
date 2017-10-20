<?php
class Site_model extends CI_model{
 
public function get_sites(){
 
  $this->db->select('sites.name,countries.name AS country, sites.description, clients.name as client');
  $this->db->from('sites');
  $this->db->join('countries','sites.id_country=countries.id_country','left');
  $this->db->join('clients','sites.id_client=clients.id_client','left');
  $this->db->order_by('sites.name','ASC');
 
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
