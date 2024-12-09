<?php

namespace Payomatix\Traits;

trait APIService
{
	public static function curlRequest($url, $method='post', $headers=[], $payload=null, $options = [])
	{
		$ch = curl_init();
        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        if (isset($options['timeout']) && is_integer($options['timeout']) && $options['timeout'] > 0) {
        	curl_setopt($ch, CURLOPT_TIMEOUT, $options['timeout']);
        } else {
        	curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
	}
}