<?php

namespace Payomatix\Service;

use Payomatix\Helper\Fields as FieldOptions;

class ValidationService extends FieldOptions
{
	public static function paymentAPIValidation(array $fields)
	{
		$field_options = new FieldOptions;
		$field_options->getAllFieldsArray($fields);

		$validations = $this->paymentAPIFields();
		print_r(['field_options' => $field_options, 'validations' => $validations]);exit();

		return validateFields($validations, $field_options);
	}

	public function paymentAPIFields()
	{
		return [
			'email' => 'required',
			'amount' => 'required',
			'currency' => 'required',
			'return_url' => 'required',
			'notify_url' => 'required',

			'other_data' => 'nullable|array',

			'other_data.first_name' => 'nullable',
			'other_data.last_name' => 'nullable',
			'other_data.address' => 'nullable',
			'other_data.state' => 'nullable',
			'other_data.city' => 'nullable',
			'other_data.zip' => 'nullable',
			'other_data.country' => 'nullable',
			'other_data.phone_no' => 'nullable',
			'other_data.card_no' => 'nullable',
			'other_data.merchant_ref' => 'nullable',
			'other_data.search_key' => 'nullable',
			'other_data.select_type_id' => 'nullable|in:1,2,3,4,5',
			'other_data.customer_vpa' => 'nullable',

			'other_data.customer_vpa.products' => 'nullable|array',

			'other_data.customer_vpa.products.*.product_id' => 'required',
			'other_data.customer_vpa.products.*.name' => 'required',
			'other_data.customer_vpa.products.*.quantity' => 'required',
			'other_data.customer_vpa.products.*.price' => 'required',
			'other_data.customer_vpa.products.*.description' => 'required',
			'other_data.customer_vpa.products.*.product_code' => 'required',
			'other_data.customer_vpa.products.*.image_url' => 'required',
			'other_data.customer_vpa.products.*.category' => 'required',
			'other_data.customer_vpa.products.*.tax_rate' => 'required',
			'other_data.customer_vpa.products.*.discount' => 'required',
			'other_data.customer_vpa.products.*.weight' => 'required',
		];
	}

	public function validateFields($validations, $fields)
	{
		if (empty($validations)) {
			return null;
		}

		$validation_errors = [];

		foreach ($validations as $key => $validation) {
			$validate_types = explode('|', $validation);

			foreach ($validate_types as $validate_method) {
			    // field is required
				if ($validate_method === 'required') {
			        $validation_errors[$key]['required'] = validateRequired($fields);
			    // nothing to do in case nullable
				} elseif ($validate_method === 'nullable') {
					// 
			    // field is array
				} elseif (substr($validate_method, 0, 3) == 'in:') {
			        $validation_errors[$key]['array'] = validateIn($validate_method, $fields);
				} else {
					// 
				}
			}
		}
	}

	public function validateRequired($fields)
	{
		if (isset($fields[$key]) && $fields[$key] !== null) {
        	return null;
        } else {
        	return $key. ' field is required.';
        }
	}

	public function validateArray($fields)
	{
		if (isset($fields[$key]) && is_array($fields[$key])) {
        	return null;
        } else {
        	return $key. ' field should be array.';
        }
	}

	public function validateIn($validate_method, $fields)
	{

		if (isset($fields[$key]) && in_array($fields[$key], explode(',', str_replace('in:', '', $validate_method)))) {
        	return null;
        } else {
        	return $key. ' field should be from '. str_replace('in:', '', $validate_method);
        }
	}
}