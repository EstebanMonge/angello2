<?php
 
class Login extends CI_Controller {
 
public function __construct(){
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('vlan_model');
}
 
public function index()
{
$user_id=$this->session->userdata('id_user');
if(!$user_id){
	$this->load->view("login");
}
else {
	$data['vlans'] = $this->vlan_model->get_vlans();
	$this->load->view("index",$data);
}
}
 
public function login_view(){
	$this->load->view("login");
}

function login_user(){
  $user_login=array(
  'username'=>$this->input->post('username'),
  'password'=>$this->input->post('password')
  );
 
  $data=$this->user_model->login_user($user_login['username'],$user_login['password']);
     if($data)
      {
	$data['vlans'] = $this->vlan_model->get_vlans();
        $this->session->set_userdata('id_user',$data['id_user']);
        $this->session->set_userdata('email',$data['email']);
        $this->session->set_userdata('username',$data['username']);
        $this->session->set_userdata('name',$data['name']);
        $this->session->set_userdata('is_admin',$data['is_admin']);
        $this->load->view('index',$data);
      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login");
 
      }
}
 
public function user_logout(){
  $this->session->sess_destroy();
  $this->load->view('login');
}
}
 
?>
