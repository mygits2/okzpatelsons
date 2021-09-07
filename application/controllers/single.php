<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Single extends CI_Controller {

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
		$id=$this->input->get('id');
		$data['single']=$this->Products->get_single_product($id);
		if(!$data['single']->result())
		{
			redirect(base_url());
		}
		$data['images']=$this->Products->get_product_images($id);
		$data['units']=$this->Products->get_product_units($id);
		
		if($this->session->userdata('userid')){
			$this->load->view('single',$data);
		}
		else if($this->input->cookie('okzclientauth')=='')
		{
			$this->load->view('single',$data);
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
				$this->load->view('single',$data);
			}
			else
			{
				delete_cookie('okzclientauth');
				delete_cookie('okzclientuserid');
				$this->load->view('single',$data);
			}
		}
	}
	public function addtocart()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('products');
			$this->load->model('user_model');
			
			$c_id     = $this->user_model->get_userID();
			$pro_id   = $this->input->post('pro_id');
			$qty      = $this->input->post('qty');
			$option   = explode(",", $this->input->post('weight'));
			$scale = $option[1];
			$weight   = $option[0];
			$price    = $option[2];
			
			$sub_total= $qty*$price;
			if($qty>=1)
			{
				$this->products->addtocart($c_id, $pro_id, $qty, $weight, $scale, $price, $sub_total);
				$this->session->set_flashdata('cartmessage',
							'<div class="alert alert-success alert-dismissible fade show">
							<strong>Success!</strong> Product added to the cart.
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$this->session->set_flashdata('cartmessage',
							'<div class="alert alert-danger alert-dismissible fade show">
							<strong>Error!</strong> try again
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			$this->session->set_flashdata('err',
							'<br><br><div class="alert alert-danger alert-dismissible fade show">
							<strong>Error!</strong> You must login first.
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							</div>');
			redirect(base_url('user/login'));
		}
	}
	public function removefromcart()
	{
		$this->load->model('Products');
		$this->load->model('User_model');
		$cid=$this->User_model->get_userID();
		$id=$this->input->get('id');
		if($this->Products->removefromcart($id,$cid))
		{
			$this->session->set_flashdata('cartsms',
								'<div class="alert alert-success alert-dismissible fade show">
								<strong>Success!</strong> Product successfully removed from your cart.
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								</div>');
			redirect(base_url('user/cart'));
		}
		else
		{
			$this->session->set_flashdata('cartsms',
								'<div class="alert alert-danger alert-dismissible fade show">
								<strong>Error!</strong> Something went wrong.
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								</div>');
			redirect(base_url('user/cart'));
		}
	}
}

/* End of file single.php */
/* Location: ./application/controllers/single.php */