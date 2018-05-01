<?php

namespace Avangate\AvangatePayLaravel;

use AvangateClient\Client;
use GuzzleHttp\Exception\ClientException;
use Avangate\AvangatePayLaravel\AvangatePayLaravelFacade as AvangatePayLaravel;

/*
 *
  $customer = [
            'FirstName'   => 'John',
            'LastName'    => 'Doe',
            'Email'       => 'john.doe@avangate.com',
            'Company'     => 'A',
            'FiscalCode'  => '123' . mt_rand(100, 999),
            'Phone'       => '021-000-' . mt_rand(10000, 99999),
            'Fax'         => '021-000-000',
            'Address1'    => 'DP10A',
            'Address2'    => 'CBP, b3',
            'Zip'         => '12345',
            'City'        => 'Bucharest',
            'State'       => 'Bucharest',
            'CountryCode' => 'RO',
            'Language'    => 'ro',
        ];
   */

class Customer
{
 
  protected $customer;
  
  /*
   *  @param Customer
   */
  public function __construct ($param = null)
	{
    $this->customer = $param;
  }
  
  public function AddACustomer()
  {
    if($this->customer == null ) return(null);
    
    return AvangatePayLaravel::AddACustomer($this);
  }  
  
}
  