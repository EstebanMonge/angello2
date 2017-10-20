<?php
 
class Logs extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('vlan_model');
		$this->load->model('log_model');
}
 
public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
	}
else {
	$data['vlans'] = $this->vlan_model->get_vlans();
	$data['logs'] = $this->log_model->get_logs();
	$this->load->view("logs",$data);
	}
}
 
}
 
?>
