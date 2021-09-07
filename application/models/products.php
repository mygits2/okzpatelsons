<?php
	Class Products extends CI_Model
	{
		function __construct()  
		{  
		 // Call the Model constructor  
		 parent::__construct();  
		}
		public function get_products($group, $limit)
		{
			$qry='SELECT * FROM products 
			LEFT OUTER JOIN products_unit ON products.id=products_unit.id
			WHERE products_unit.price = (SELECT MIN(price) FROM products_unit 
			WHERE id=products.id) AND products.group="'.$group.'" ORDER BY products.id DESC limit '.$limit.'';
			return $this->db->query($qry);
			
			/*$where="products_unit.price = (SELECT MIN(price) FROM products_unit WHERE id=products.id)";
			return $this->db
			->select('*')
			->from('products')
			->join('products_unit','products.id = products_unit.id','left outer')
			->where('products.group',$group)
			->where($where)
			->order_by('products.id', 'desc')
			->limit($limit)
			->get();*/
		}
		public function random($limit)
		{
			$where="products_unit.price = (SELECT MIN(price) FROM products_unit WHERE id=products.id)";
			return $this->db
			->select('*')
			->from('products')
			->join('products_unit','products.id = products_unit.id','left outer')
			->where($where)
			->order_by('rand()', 'DESC')
			->limit($limit)
			->get();
		}
		public function search($keywords, $limit)
		{
			/*$qry='SELECT * FROM products 
			LEFT OUTER JOIN products_unit ON products.id=products_unit.id
			WHERE products_unit.price = (SELECT MIN(price) FROM products_unit 
			WHERE id=products.id) AND products.group="'.$group.'" ORDER BY products.id DESC limit '.$limit.'';
			return $this->db->query($qry);
			*/
			$where="products_unit.price = (SELECT MIN(price) FROM products_unit WHERE id=products.id)";
			return $this->db
			->select('*')
			->from('products')
			->join('products_unit','products.id = products_unit.id','left outer')
			->like('products.keywords',$keywords)
			->where($where)
			->order_by('products.id', 'desc')
			->limit($limit)
			->get();
			
		}
		public function get_single_product($id)
		{
			return $this->db
			->select('*')
			->from('products')
			->where('products.id',$id)
			->limit(1)
			->get();
		}
		public function get_product_units($id)
		{
			return $this->db
			->select('*')
			->from('products_unit')
			->where('products_unit.id',$id)
			->order_by('products_unit.price','asc')
			->get();
		}
		public function get_product_images($id)
		{
			return $this->db
			->select('*')
			->from('pro_img')
			->where('pro_img.pro_id',$id)
			->get();
		}
		public function addtocart($c_id, $pro_id, $qty, $weight, $scale, $price, $sub_total)
		{
			$cart_item = array(
			'c_id'       => $c_id,
			'p_id'      => $pro_id,
			'qty'     => $qty,
			'weight'     => $weight,
			'scale'     => $scale,
			'price'       => $price,
			'subtotal' => $sub_total
			);
			$this->db->insert('cart',$cart_item);
			return true;
		}
		public function getcartitems($id)
		{
			return $this->db
			->select('*')
			->from('cart')
			->join('products','cart.p_id = products.id','left outer')
			->where('cart.c_id',$id)
			->order_by('cart.cart_id','desc')
			->get();
		}
		public function removefromcart($id,$cid)
		{
			$this->db->where('cart_id',$id);
			$this->db->where('c_id',$cid);
			if($this->db->delete('cart'))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>