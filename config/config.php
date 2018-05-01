<?php
return [
	'baseUrl'       => env( 'AVANGATE_BASE_URL', '' ),
	'apiKey'        => env( 'AVANGATE_API_KEY', '' ),
	'MerchantCode'     => env( 'AVANGATE_MERCHANT_CODE', '' ),
	'billableModel' => 'App\User'
];