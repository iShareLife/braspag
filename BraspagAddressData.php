<?php

/**
 * BraspagAddressData
 * Used to set Customer address data
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagAddressData {
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


