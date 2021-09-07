<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function logout()
	{
		$this->load->model('user_model');
		$this->user_model->logout($this->session->userdata('userid'));
		
		$this->session->unset_userdata('userid');
		delete_cookie('okzclientauth');
		delete_cookie('okzclientuserid');
		redirect(base_url());
	}
	public function login()
	{
		if($this->session->userdata('userid')){
			redirect($_SERVER['HTTP_REFERER']);
		}
		else if($this->input->cookie('okzclientauth')=='')
		{
			$this->load->view('login');
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
				redirect(base_url());
			}
			else
			{
				delete_cookie('okzclientauth');
				delete_cookie('okzclientuserid');
				$this->load->view('login');
			}
		}
	}
	public function register()
	{
		$this->load->library('form_validation');
		if($this->session->userdata('userid')){
			redirect(base_url());
		}
		else if($this->input->cookie('okzclientauth')=='')
		{
			$this->load->view('register');
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
				redirect(base_url());
			}
			else
			{
				delete_cookie('okzclientauth');
				delete_cookie('okzclientuserid');
				$this->load->view('register');
			}
		}
	}
	
	public function auth_login()
	{
		$this->load->model('user_model');
		$rememberme = $this->input->post('rememberMe');
		$auth_token = random_string('alnum',50);
		$u_id       = $this->input->post('user_id');  
        $pass       = $this->input->post('password'); 
		
		//login with remember me
		if((int) $rememberme == 1)
		{
			if ($this->user_model->auth_login($u_id,$pass,$auth_token))   
			{  
				$token=array(
					'name' => 'okzclientauth',
					'value' => $auth_token,
					'expire' =>  '1209600', //two weeks
				);
				$email=array(
					'name' => 'okzclientuserid',
					'value' => $u_id,
					'expire' =>  '1209600', //two weeks
				);
				set_cookie($token);
				set_cookie($email);
				
				$this->session->set_userdata('userid',$u_id);  			
				redirect(base_url());
			}  
			else{  
				$this->session->set_flashdata('err',
							'<br><br><div class="alert alert-danger alert-dismissible fade show">
							<strong>Error!</strong> User ID or password did not match.
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							</div>'
					);
				redirect(base_url('user/login'));
			}
		}
		else  
		{   
		//login without remember me
			delete_cookie('okzclientauth');
			if ($this->user_model->auth_login($u_id,$pass,$auth_token))   
			{   
				$this->session->set_userdata('userid',$u_id);			
				redirect(base_url());
			}  
			else{  
				$this->session->set_flashdata('err',
							'<br><br><div class="alert alert-danger alert-dismissible fade show">
							<strong>Error!</strong> User ID or password did not match.
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							</div>'
					);
				redirect(base_url('user/login'));
			}
		}
	}
	
	//register new customer
	function auth_register()
	{
		$this->load->model('user_model');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Full Name', 'min_length[7]|trim|required|xss_clean|regex_match[/^[a-zA-Z ]{3,20}$/]');
		$this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[password]');
		
		
		$name 		= $this->input->post('name');
		$email		= $this->input->post('email');
		$mobile		= $this->input->post('mobile');
		$pass 		= $this->input->post('password');
		$cpass 		= $this->input->post('cpass');
		$rememberMe = $this->input->post('remember');
		if ($this->form_validation->run() == TRUE) 
		{
			$this->db->where('email', $email);
			$this->db->or_where('mobile', $mobile);
			$query=$this->db->get("customer");
			
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('exists','Entered email or mobile belongs to an existing account');
				$this->session->set_flashdata('err',validation_errors());
				$this->session->set_flashdata('name',$name);
				$this->session->set_flashdata('email',$email);
				$this->session->set_flashdata('mobile',$mobile);
				redirect(base_url('user/register'));
			}
			else 
			{
				if((int) $rememberMe == 1)
				{
					//with cookie
					$auth_token = random_string('alnum',50);
					if ($this->user_model->save_customer($name,$email,$mobile,$pass,$auth_token))   
					{  
						$token=array(
							'name' => 'okzclientauth',
							'value' => $auth_token,
							'expire' =>  '1209600', //two weeks
						);
						$userid=array(
							'name' => 'okzclientuserid',
							'value' => $email,
							'expire' =>  '1209600', //two weeks
						);
						set_cookie($token);
						set_cookie($userid);
						
						$this->session->set_userdata('userid',$email);  			
						redirect(base_url());
					}  
					else
					{  
						$this->session->set_flashdata('errsave',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> Something went wrong, Try again.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>'
							);
						redirect(base_url('user/register'));
					}
				}
				else
				{
					//without cookie
					$auth_token = random_string('alnum',50);
					if ($this->user_model->save_customer($name,$email,$mobile,$pass,$auth_token))   
					{  
						$this->session->set_userdata('userid',$email);  			
						redirect(base_url());
					}  
					else{  
						$this->session->set_flashdata('errsave',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> Something went wrong, Try again.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>'
							);
						redirect(base_url('user/register'));
					}
				}
			}
		} 
		else
		{
			$this->session->set_flashdata('err',validation_errors());
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('email',$email);
			$this->session->set_flashdata('mobile',$mobile);
			redirect(base_url('user/register'));
		}
	}
	public function addnewaddress()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('User_model');
			$cid 		= $this->User_model->get_userID();
			$alt_mobile = $this->input->post('mobile');
			$pincode    = $this->input->post('pincode');
			$address    = $this->input->post('address');
			$city 	    = $this->input->post('city');
			$landmark   = $this->input->post('landmark');
			
			if($this->User_model->addnewaddress($cid, $alt_mobile, $pincode, $address, $city , $landmark))
			{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-success alert-dismissible fade show">
										<strong>Success!</strong> address added.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect(base_url($this->input->get('referer')));
			}
			else{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-danger alert-dismissible fade show">
										<strong>Error!</strong> try again.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect(base_url($this->input->get('referer')));
			}
		}
		else
		{
		$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
		}
	}
	public function editaddrss()
	{
		$this->load->model('User_model');
		$addID = $this->input->get('addID');
		$data['address']=$this->User_model->getaddress2($addID);
		$this->load->view('editaddress',$data);
	}
	public function updateaddrss()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('User_model');
			$addid = $this->input->get('addID');
			$alt_mobile = $this->input->post('mobile');
			$pincode    = $this->input->post('pincode');
			$address    = $this->input->post('address');
			$city 	    = $this->input->post('city');
			$landmark   = $this->input->post('landmark');
			
			if($this->User_model->updateaddress($addid, $alt_mobile, $pincode, $address, $city , $landmark))
			{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-success alert-dismissible fade show">
										<strong>Success!</strong> address updated.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect(base_url($this->input->get('referer')));
			}
			else{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-danger alert-dismissible fade show">
										<strong>Error!</strong> try again.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect(base_url($this->input->get('referer')));
			}
		}
		else
		{
		$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
		}
	}
	public function addnewaddressview()
	{
		$this->load->view('addnewaddress');
	}
	public function removeaddrss()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('User_model');
			$add_id = $this->input->get('addID');
			if($this->User_model->removeaddrss($add_id))
			{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-success alert-dismissible fade show">
										<strong>Success!</strong> address removed.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else{
				$this->session->set_flashdata('addressms',
										'<br><br><div class="alert alert-danger alert-dismissible fade show">
										<strong>Error!</strong> try again.
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
		$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
		}
	}
	public function cart()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('Products');
			$this->load->model('User_model');
			$uid=$this->User_model->get_userID();
			$data['cartitems']=$this->Products->getcartitems($uid);
			$this->load->view('cart',$data);
		}
		else if($this->input->cookie('okzclientauth')=='')
		{
			$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
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
				
				$this->load->model('Products');
				$this->load->model('User_model');
				$uid=$this->User_model->get_userID();
				$data['cartitems']=$this->Products->getcartitems($uid);
				
				$this->session->set_userdata('userid',$userid); 
				$this->load->view('cart',$data);
			}
			else
			{
				delete_cookie('okzclientauth');
				delete_cookie('okzclientuserid');
				$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
				redirect(base_url('user/login'));
			}
		}
	}
	public function confirmorder()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('Products');
			$this->load->model('User_model');
			$uid=$this->User_model->get_userID();
			$data['subtotal']=$this->User_model->get_subtotal($uid);
			$data['username']=$this->User_model->get_username($uid);
			$data['adress']=$this->User_model->getaddress($uid);
			$data['cartitems']=$this->Products->getcartitems($uid);
			if($data['cartitems']->num_rows()==0)
			{
				$this->session->set_flashdata('cartsms',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> Something went wrong.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
				redirect(base_url('user/cart'));
			}
			else
			{
				$this->load->view('confirmorder',$data);
			}
		}
		else
		{
			$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
		}
	}
	public function placeorder()
	{
		if($this->session->userdata('userid'))
		{
			$this->load->model('User_model');
			$this->load->model('Products');
			$cid = $this->User_model->get_userID();
			$address_id = $this->input->post('address_id');
			$totalamount = $this->input->post('totalamount');
		
			if($this->User_model->placeorder($cid, $address_id, $totalamount))
			{
				$this->session->set_flashdata('cartsms',
									'<br><br><div class="alert alert-success alert-dismissible fade show">
									<strong>Success !</strong> order placed.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
				redirect(base_url('user/ordersuccess'));
			}
			else
			{
				$this->session->set_flashdata('cartsms',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> Something went wrong.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
				redirect(base_url('user/cart'));
			}
		}
		else
		{
			$this->session->set_flashdata('err',
									'<br><br><div class="alert alert-danger alert-dismissible fade show">
									<strong>Error!</strong> you must login first.
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									</div>');
			redirect(base_url('user/login'));
		}
	}
	public function ordersuccess()
	{
		$this->load->model('User_model');
		$id = $this->User_model->get_userID();
		$ord_id = $this->User_model->getorderid($id);
		$data['orderitems'] = $this->User_model->getlastorder($ord_id,$id);
		$this->load->view('ordersuccess',$data,$ord_id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */