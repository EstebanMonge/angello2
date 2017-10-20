<?php
 
class Hosts extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('vlan_model');
		$this->load->model('host_model');
}

public function getvlanmodal() {
	$vlan=$this->input->post('vlan');
	$data['vlans']=$this->vlan_model->get_vlans();
	$data['hosts']=$this->host_model->get_hosts($vlan);
	$data['free_ip']=$this->host_model->free_ip($vlan);
	$data['total_ip']=$this->host_model->total_ip($vlan);
	$data['chosenvlan'] = $this->input->post('vlan');
	$this->load->view("hosts",$data);
} 

public function getvlan($vlan) {
        $data['vlans']=$this->vlan_model->get_vlans();
        $data['hosts']=$this->host_model->get_hosts($vlan);
        $data['free_ip']=$this->host_model->free_ip($vlan);
        $data['total_ip']=$this->host_model->total_ip($vlan);
        $data['chosenvlan'] = $vlan;
        $this->load->view("hosts",$data);
}


public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
	}
else {
	$data['vlans'] = $this->vlan_model->get_vlans();
	$this->load->view("hosts",$data);
	}
}

}
 
?>
