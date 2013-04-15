<?php

/**
 * BraspagPaymentDataRequest
 * Internally used to make requests that envolves payment
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

abstract class BraspagPaymentDataRequest {

	public $PaymentMethod;
	public $Amount = 0;
	public $Currency = 'BRL';
	public $Country = 'BRA';
	public $AdditionalDataCollection = array();

	public function __construct($method = null){
		if ($method) {
			$this->PaymentMethod = $method;
		}
	}

	public function addAdditionalData($name, $value){
		$this->AdditionalDataCollection[] = new BraspagAdditionalData($name, $value);
	}
}
