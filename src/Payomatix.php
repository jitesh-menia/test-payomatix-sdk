<?php

namespace Payomatix;

use Payomatix\Service\PaymentService;

class Payomatix extends PaymentService
{
	/** @var array options to be used for requests. */
	public $options;

	/** @var array fields to be used for requests. */
	public $fields;

	public function __construct()
	{
		// 
	}

	public function getOptions()
	{
		return $this->options;
	}

	public function setOptions($options)
	{
		$this->options = $options;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
	}

	public function paymentAPI($fields)
	{
		print_r(['fields' => $fields, 'headers' => $this->getFields(), 'validations' => $this->getOptions()]);exit();

		return PaymentService::initializePayment($this->getFields(), $this->getOptions());
	}
}
