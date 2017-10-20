<?php
 
class Users extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('vlan_model');
		$this->load->model('user_model');
}
 
public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
	}
else {
	$vlans['vlans'] = $this->vlan_model->get_vlans();
	$vlans['users'] = $this->user_model->get_users();
	$this->load->view("users",$vlans);
	}
}
 
}
 
?>
