<?php

/**
 * BraspagAdditionalData
 * Used to post data on some kind of transactions
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagAdditionalData{

	public $Name;

	public $Value;

	public function __construct($name, $value){
		$this->Name = $name;
		$this->Value = $value;
	}
}