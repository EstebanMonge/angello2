<?php
 
class Sites extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('vlan_model');
		$this->load->model('site_model');
}
 
public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
	}
else {
	$vlans['vlans'] = $this->vlan_model->get_vlans();
	$vlans['sites'] = $this->site_model->get_sites();
	$this->load->view("sites",$vlans);
	}
}
 
}
 
?>
