<?php
namespace Avangate;

class Options
{
    private $apiKey;
    private $MerchantCode;
    private $baseUrl;
    public function getApiKey()
    {
        return $this->apiKey;
    }
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    public function getMerchantCode()
    {
        return $this->MerchantCode;
    }
    public function setMerchantCode($MerchantCode)
    {
        $this->MerchantCode = $MerchantCode;
    }
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
}