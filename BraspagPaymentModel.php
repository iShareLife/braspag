<?php

abstract class BraspagPaymentModel{

	// payment type
	const TYPE_CREDITCARD = 1;

	// order details
	protected $orderId;

	// payment details
	protected $type;
	protected $amount = 0;
	protected $currency = 'BRL';
	protected $country = 'BRA';

	public function getOrderId(){
		return $this->orderId;
	}

	public function setOrderId($orderId){
		$this->orderId = $orderId;
		return $this;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
		return $this;
	}

	public function getAmount(){
		return $this->amount;
	}

	public function setAmount($cents){
		$this->amount = $cents;
		return $this;
	}

	public function getCurrency(){
		return $this->currency;
	}

	public function setCurrency($currency){
		$this->currency = $currency;
		return $this;
	}



	public function getCountry(){
		return $this->country;
	}

	public function setCountry($country){
		$this->country = $country;
	}
}


