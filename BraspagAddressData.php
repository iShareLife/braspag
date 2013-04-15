<?php

class BraspagAddressData{
	public $Street;
	public $Number;
	public $Complement;
	public $District;
	public $ZipCode;
	public $City;
	public $State;
	public $Country;

	public function __construct($street = false,$number = false,$complement = false,$district = false,$zipCode = false,$city = false,$state = false,$country = false){
		$this->Street = $street;
		$this->Number = $number;
		$this->Complement = $complement;
		$this->District = $district;
		$this->ZipCode = $zipCode;
		$this->City = $city;
		$this->State = $state;
		$this->Country = $country;
	}

}


