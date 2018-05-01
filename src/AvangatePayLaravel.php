<?php
namespace Avangate\AvangatePayLaravel;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use AvangateClient;
use Carbon\Carbon;

use Avangate\AvangatePayLaravel\Options;

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