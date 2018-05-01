<?php
namespace Avangate\AvangatePayLaravel;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use AvangateClient;

use Avangate\AvangatePayLaravel\Options;
use Avangate\AvangatePayLaravel\Customer;

use AvangateClient\Client;
use GuzzleHttp\Exception\ClientException;


class AvangatePayLaravel
{
	
	/**
	 * @var Options
	 */
	protected $apiOptions;
  
  /**
	 * @var Options
	 */
  protected $client;
  
	/**
	 * AvangateLaravel constructor.
	 *
	 * @throws AvangateAuthenticationException
	 * @throws AvangateConnectionException
	 */
	public function __construct ()
	{
		$this->initializeApiOptions();
    
    /**
     * @Setup
     */
    $this->client = new Client([
          'code'  => $this->apiOptions->getMerchantCode(),
          'key'   => $this->apiOptions->getApiKey(),
          'base_uri' => 'https://api.avangate.com/3.0/'
     ]);
	}
  
  public function AddACustomer(Customer $customer)
  {
    $receiveData = self::SendData($customer->customer, 'customers/');
    
    static::assertTrue(is_int($receiveData));
    static::assertTrue($receiveData > 0);
    
    return [
            'inputCustomerData' => $customer,
            'internalCustomerReference' => $receiveData
        ];
  }  
  
  
  public function SendData($params , $url)
  {
      $headers = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'verify' => false,
                'proxy' => ''
            ],
            'body' => json_encode($params),
        ];
    
        $internalCustomerReference = null;
    
        try {
            $rawResponse = $this->client->post($url, $headers);
            $returnData = json_decode($rawResponse->getBody()->getContents());
        } catch (ClientException $e) {
            static::fail($e->getMessage() . ' -- ' . $e->getResponse()->getBody()->getContents());
        }

        return $returnData;
    
  }
  
  /**
	 * Initializing API options with the given credentials.
	 */
	private function initializeApiOptions ()
	{
		$this->apiOptions = new Options();
		$this->apiOptions->setBaseUrl( config( 'avangate.baseUrl' ) );
		$this->apiOptions->setMerchantCode( config( 'avangate.MerchantCode' ) );
		$this->apiOptions->setApiKey( config( 'avangate.apiKey' ) );
	}
  
  
	/**
	 * @return Options
	 */
	protected function getOptions (): Options
	{
		return $this->apiOptions;
	}
}