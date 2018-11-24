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
     * @var string
     */
    protected $apiUrl;

    /**
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