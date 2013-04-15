<?php

/**
 * BraspagCustomerData
 * Generic Customer model used on serveral types of requests
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagCustomerData {

	private $ID;
	private $name;
	private $email;
	private $AddressData;
	private $DeliveryAddressData;


	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
		return $this;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
		return $this;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
		return $this;
	}

	public function getAddressData(){
		return $this->AddressData;
	}

	public function getDeliveryAddressData(){
		return $this->DeliveryAddressData;
	}

	public function setAddressData(BraspagAddressData $AddressData){
		$this->AddressData = $AddressData;
	}

	public function setDeliveryAddressData(BraspagAddressData $DeliveryAddressData){
		$this->DeliveryAddressData = $DeliveryAddressData;
	}
}
