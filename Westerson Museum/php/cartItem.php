<?php
	class cartItem
	{
		public $id = "";
		public $name = "";
		public $price = 0;
		public $qty = 0;
        public $photo = "";
        public $cartID = 0;
		
		function __construct($id , $name , $price , $qty , $photo, $cartID)
		{
			$this->id = $id;
			$this->name = $name;
			$this->price = $price;
			$this->qty = $qty;
            $this->photo = $photo;
            $this->cartID = $cartID;
		}
	}
?>