<?php

namespace TransferWise\Model\Addresses;


use TransferWise\Api\AddressesApi;
use TransferWise\TransferWiseConfig;

/**
 * Class Addresses
 *
 * @package TransferWise\Model\Addresses
 */
class Addresses
{

    /**
     * @var TransferWiseConfig
     */
    protected $config;

    /**
     * @var AddressesApi
     */
    private $api;

    /**
     * Addresses constructor.
     *
     * @param TransferWiseConfig $config
     */
    public function __construct(TransferWiseConfig $config)
    {
        $this->config = $config;
        $this->api = new AddressesApi($this->config);
    }

    /**
     * List of all profiles belonging to user.
     *
     * @param int $profileId
     *
     * @return AddressesCollection
     * @throws \TransferWise\ApiException
     * @throws \Exception
     */
    public function getAll($profileId)
    {
        $addresses = $this->api->getAll($profileId);
        $addressesCollection = new AddressesCollection($addresses);

        return $addressesCollection;
    }
}