<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Allproducts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Products');
		$cat=$this->input->get('cate');
		$data['allproducts']=$this->Products->get_products($cat,20);
		$data['random']=$this->Products->random(4);
		
		////////////////
		if($this->session->userdata('userid')){
			$this->load->view('products',$data);
		}
		else if($this->input->cookie('okzclientauth')=='')
		{
			$this->load->view('products',$data);
		}
		else
		{
			$token = get_cookie('okzclientauth');
			$userid = get_cookie('okzclientuserid');
			$auth_token =random_string('alnum',50);
			$this->load->model('user_model');
			if ($this->user_model->login_with_cookie($token,$userid,$auth_token))   
			{
				$token=array(
					'name' => 'okzclientauth',
					'value' => $auth_token,
					'expire' =>  '1209600', //two weeks
				);
				$email=array(
					'name' => 'okzclientuserid',
					'value' => $userid,
					'expire' =>  '1209600', //two weeks
				);
				set_cookie($token);
				set_cookie($email);
				
				$this->session->set_userdata('userid',$userid); 
				$this->load->view('products',$data);
			}
			else
			{
				delete_cookie('okzclientauth');
				delete_cookie('okzclientuserid');
				$this->load->view('products',$data);
			}
		}
		////////////////
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */