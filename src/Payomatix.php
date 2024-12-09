<?php

namespace Payomatix;

use Payomatix\Service\PaymentService;

class Payomatix extends PaymentService
{
	/** @var array options to be used for requests. */
	public $options;

	public function getOptions()
	{
		return $this->options;
	}

	public function setOptions($options)
	{
		$this->options = $options;
	}

	public function paymentAPI($fields)
	{
		return PaymentService::initializePayment($fields, $this->getOptions());
	}
}
