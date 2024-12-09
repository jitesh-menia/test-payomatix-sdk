<?php

namespace Payomatix\Helper;

class Fields
{
	private $first_name;

	private $last_name;

	public $address;

	public $amount;

	public $currency;

	public $return_url;

	public $notify_url;

	public $merchant_ref;

	public $products;

	public function __get($property)
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->property = $property;
		}
	}

	public function getAllFieldsArray($fields)
	{
		foreach ($fields as $name => $value) {
			$this->__set($name, $value);
		}

		return $this;
	}
}
