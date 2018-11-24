<?php

namespace TransferWise;


/**
 * Class TransferWiseConfig
 *
 * @package TransferWise
 */
class TransferWiseConfig
{

    /**
     * TransferWise API url
     * Test: https://api.sandbox.transferwise.tech/v1/
     * Live: https://api.transferwise.com/v1/
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * TransferWise API key
     *
     * @var string
     */
    protected $apiKey;

    /**
     * TransferWiseConfig constructor.
     *
     * @param string $apiUrl
     * @param string $apiKey
     */
    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = rtrim($apiUrl, '/') . '/';
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function apiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function apiKey()
    {
        return $this->apiKey;
    }

}