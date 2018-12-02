<?php

namespace TransferWise\Model\Addresses;


use TransferWise\Api\AddressesApiInterface;
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
     * @var AddressesApiInterface
     */
    private $api;

    /**
     * Addresses constructor.
     *
     * @param TransferWiseConfig         $config
     * @param AddressesApiInterface|null $api
     */
    public function __construct(TransferWiseConfig $config, AddressesApiInterface $api = null)
    {
        $this->config = $config;
        $this->api = $api ?: new AddressesApi($this->config);
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

    /**
     * @param int $addressId
     *
     * @return Address
     * @throws \TransferWise\ApiException
     */
    public function getById($addressId)
    {
        $rawAddress = $this->api->getById($addressId);

        return new Address($rawAddress);
    }
}