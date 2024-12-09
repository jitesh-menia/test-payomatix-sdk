<?php

namespace Payomatix\Service;

use Payomatix\Service\ResponseService;
use Payomatix\Config\PackageConfig;
use Payomatix\Traits\APIService;

class PaymentService
{
	use APIService;

	protected $secret_key;

	protected function initializePayment($payload, $options)
	{
		$url = $payload['is_test'] == true ? PackageConfig::getLivePaymentUrl() : PackageConfig::getTestPaymentUrl(); 
		$this->secret_key = $this->getSecretKey();

		if (null == $this->secret_key) {
			return ResponseService::noSecKey();
		}

		$headers = [
			'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: '. $this->secret_key,
		];

		print_r([$url, $headers, $validations]);exit();
		$validations = ValidationService::paymentAPIValidation($payload);

		if (null !== $validations) {
			return ResponseService::validatioError();
		}

		return $this->curlRequest($url, $method, $headers, $payload, $options);
	}
}