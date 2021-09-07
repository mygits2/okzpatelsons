<?php

Class User_model extends CI_Model
{
	function __construct()  
	{  
		 // Call the Model constructor  
		 parent::__construct();  
		}
		public function auth_login($u_id,$pass,$auth_token) {  
			//authenticate user with mobile and password  
			$this->db->where('mobile', $u_id);  
			$this->db->where('pass', $pass);  
			
			//or authenticate user with email and password
			$this->db->or_where('email', $u_id);  
			$this->db->where('pass', $pass);  
			$this->db->limit(1);
			$query = $this->db->get('customer');  

		if ($query->num_rows() == 1)  
		{  
			//update login token used in cookie
			$this->db->set('auth_token',$auth_token);
			$this->db->where('mobile',$u_id);
			$this->db->or_where('email',$u_id);
			$this->db->update('customer');
			return true;  
		} 
		else 
		{  
			return false;  
		}
    }  
	
	public function login_with_cookie($token,$userid,$auth_token) 
	{  
			//authenticate user trying to login with existing cookie  
			$this->db->where('auth_token', $token);
			$this->db->where('mobile', $userid);
			
			$this->db->or_where('auth_token', $token);
			$this->db->where('email', $userid);
			$query = $this->db->get('customer');  
  
        if ($query->num_rows() == 1)  
        {  
			//update login token used in cookie
			$this->db->set('auth_token',$auth_token);
			$this->db->where('mobile',$userid);
			$this->db->or_where('email',$userid);
			$this->db->update('customer');
            return true;  
        } else {  
            return false;  
        }  
  
    }  
	public function logout($id)
	{
		$this->db->set('auth_token',0);
		$this->db->where('mobile',$id);
		$this->db->or_where('email',$id);
		$this->db->update('customer');
		return true;
	}
	public function save_customer($name,$email,$mobile,$pass,$auth_token)
	{
		$newcutomer = array(
			'name'       => $name,
			'email'      => $email,
			'mobile'     => $mobile,
			'pass'       => $pass,
			'auth_token' => $auth_token
		);
		$this->db->insert('customer',$newcutomer);
		return true;
	}
	
	public function get_userID()
	{
		$uid = $this->session->userdata('userid');
		$this->db->select('u_id');
		$this->db->from('customer');
		$this->db->where('email',$uid);
		$this->db->or_where('mobile',$uid);
		$query = $this->db->get();
		$row = $query->row();
		return $row->u_id;
	}
	
	public function get_username($uid)
	{
		$this->db->select('name');
		$this->db->from('customer');
		$this->db->where('u_id',$uid);
		$query = $this->db->get();
		$row = $query->row();
		return $row->name;
	}
	
	public function get_subtotal($uid)
	{
		$this->db->select_sum('subtotal');
		$this->db->from('cart');
		$this->db->where('c_id',$uid);
		$query = $this->db->get();
		$row = $query->row();
		return $row->subtotal;
	}
	public function addnewaddress($cid, $alt_mobile, $pincode, $address, $city, $landmark)
	{
		$data = array(
				'c_id' => $cid,
				'alt_mobile' => $alt_mobile,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'landmark' => $landmark
				);
		if($this->db->insert('address',$data))
		{
			return true;
		}
		else
			return false;
	}
	public function getaddress($uid)
	{
		return $this->db
		->select('*')
		->from('address')
		->where('c_id',$uid)
		->get();
	}
	public function getaddress2($addID)
	{
		return $this->db
		->select('*')
		->from('address')
		->where('add_id',$addID)
		->limit(1)
		->get();
	}
	public function removeaddrss($add_id)
	{
		$this->db->where('add_id', $add_id);
		$this->db->delete('address');
		return true;
	}
	public function updateaddress($addid, $alt_mobile, $pincode, $address, $city , $landmark)
	{
		$this->db->where('add_id',$addid);
		$data = array('alt_mobile' => $alt_mobile,
					  'pincode'    => $pincode,
					  'address'    => $address,
					  'city'       => $city,
					  'landmark'   => $landmark,
						);
		
		if($this->db->update('address',$data))
		{ return true; }
		else{
			return false;
		}		
	}
	public function getorderid($cid)
	{
		$this->db->select('ord_id');
		$this->db->from('orders');
		$this->db->where('c_id',$cid);
		$this->db->order_by('ord_id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->row();
		return $row->ord_id;
	}
	public function placeorder($cid, $address_id, $totalamount)
	{
		//create new order
		$data = array(
			  'c_id' => $cid,
			  'amount' => $totalamount,
			  'date' => date("d-m-Y"),
			  'time' => date("h:i:sa"),
			  'address_id' => $address_id,
			  'payment_status' => 'COD',
			  'order_status' => 'Placed'
			  );
		if($this->db->insert('orders',$data))
		{
			$order_id = $this->User_model->getorderid($cid);
			//moving items from table cart to table order_items
			$query = $this->db->query('INSERT order_items (order_id, p_id, qty, weight, scale, price, subtotal)
					 SELECT '.$order_id.', p_id, qty, weight, scale, price, subtotal
					 FROM cart
					 WHERE cart.c_id = '.$cid);
			
			//delete items from cart
			$this->db->where('c_id', $cid);
			$this->db->delete('cart');
			return true;
		}
		else
			return false;
	}
	public function getlastorder($ord_id,$id)
	{
		return $this->db->select('*')
		->from('orders')
		->join('order_items','orders.ord_id=order_items.order_id')
		->join('products','order_items.p_id=products.id')
		->where('orders.c_id',$id)
		->where('orders.ord_id',$ord_id)
		->get();
	}
}
?>