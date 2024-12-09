<?php

namespace Payomatix\Service;

use Payomatix\Config\PackageConfig;
use Payomatix\Traits\APIService;

class PaymentService extends PackageConfig
{
	use APIService;

	protected $secret_key;

	protected function initializePayment($payload, $options)
	{
		if (isset($payload['is_test']) && $payload['is_test'] == true) {
			$url = PackageConfig::getTestPaymentUrl(); 
		} else {
			$url = PackageConfig::getLivePaymentUrl(); 
		}

		$this->secret_key = $this->getSecretKey();

		if (null == $this->secret_key) {
			return ResponseService::noSecKey();
		}

		$headers = [
			'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: '. $this->secret_key,
		];

		$validations = ValidationService::paymentAPIValidation($payload);
		print_r(['url' => $url, 'headers' => $headers, 'validations' => $validations]);exit();

		if (null !== $validations) {
			return ResponseService::validatioError();
		}

		return $this->curlRequest($url, $method, $headers, $payload, $options);
	}
}