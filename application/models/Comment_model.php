<?php
class Comment_model extends CI_model{
 
public function get_comments($item,$ip,$vlan){
                 switch ($item) {
                        case "Interface":
				$this->db->select('interface AS comments');
				$this->db->from('hostnames');
				$this->db->where('ip LIKE '.$ip);
                                break;
                        case "Switch":
				$this->db->select('switch AS comments');
				$this->db->from('hostnames');
				$this->db->where('ip LIKE '.$ip);
                                break;
                        case "Switch Interface":
				$this->db->select('switch_interface AS comments');
				$this->db->from('hostnames');
				$this->db->where('ip LIKE '.$ip);
                                break;
                        case "Comment";
				$this->db->select('reserved,comments');
				$this->db->from('hostnames');
				$this->db->where('ip LIKE '.$ip);
                                break;
                        case "Description";
				$this->db->select('description AS comments');
				$this->db->from('vlans');
				$this->db->where('vlan LIKE '.$vlan);
                                break;
                }

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
