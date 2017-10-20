<?php
 
class Vlans extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('vlan_model');
}
 
public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
	}
else {
	$vlans=$this->vlan_model->get_vlans();
	$vlans['vlans'] = $vlans;
	$this->load->view("vlans",$vlans);
	}
}

#public function comments($vlan)
#{
#$user_id=$this->session->userdata('id_user');
#if(!$user_id){
#        $this->load->view("login");
#        }
#else {
#        $vlans=$this->vlan_model->get_vlans();
#        $vlans['vlans'] = $vlans;
#        $vlans['form'] = $form;
#        $vlans['vlan'] = $vlan;
#        $vlans['type'] = $type;
#        $vlans['item'] = $item;
#        $this->load->view("comments",$vlans);
#        }
#}

public function modify ($vlan) {
$user_id=$this->session->userdata('id_user');
if(!$user_id){
        $this->load->view("login");
        }
else {
        $vlans=$this->vlan_model->get_vlans();
        $comment=$this->vlan_model->get_comments($vlan);
        $vlans['vlans'] = $vlans;
        $vlans['vlan'] = $vlan;
        $vlans['comment'] = $comment;
        $this->load->view("comments",$vlans);
        }
}
}
?>
