<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
	}
	public function index(){
			$this->load->view('index');
	}
	public function register(){
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('alias','Alias','trim|required|is_unique[users.alias]');
		$this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('DOB','Date of Birth','trim|required');

		if ($this->form_validation->run()== FALSE){
			$this->load->view('index');
		}
		else{
			$name = $this->input->post('name');
			$alias = $this->input->post('alias');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			// $date = date('Y-m-d, H:i:s');
			$DOB = $this->input->post('DOB');
			$data = array($name, $alias, $email, $DOB, $password);
			$this->user->add($data);
			$this->session->set_flashdata('success',"Thanks for registering! You may log in now!");
			redirect("/");
			}
	}
	public function login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$data = array($email, $password);
		$result = $this->user->login($data);
		if(empty($result)){
			$this->session->set_flashdata('errors',"It doesn't look like that email/password combination exists.");
			redirect('/');
		}
		else{
			$this->session->set_userdata('loggedin',true);
			$this->session->set_userdata('id',$result['id']);
			redirect('users/main');
		}
	}
	public function main(){
		$userInfo = $this->user->getUserData($this->session->userdata('id'));
		$friendsWithMe = $this->user->friendsWithMe($this->session->userdata('id'));
		$friendsWithThem = $this->user->friendsWithThem($this->session->userdata('id'));
		$friends = array($friendsWithMe, $friendsWithThem);
		$notFriends = $this->user->getAllFriends($this->session->userdata('id'));


		$results=array(
			'userInfo'=>$userInfo,
			'friends'=>$friends,
			'notFriends'=>$notFriends);
		$this->load->view('main',$results);
	}
	public function addfriend($friend_id){
		$id = $this->session->userdata('id');
		$this->user->addfriend($id, $friend_id);
		redirect('main');
	}
	public function userProfile($id){
		$results = $this->user->getUserData($id);
		$this->load->view('userprofile',$results);
	}
	public function removeFriend($friend_id){
		$id = $this->session->userdata('id');
		$this->user->removefriend($id, $friend_id);
		redirect('users/main');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}