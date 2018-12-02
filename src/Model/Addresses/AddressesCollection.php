<?php

namespace TransferWise\Model\Addresses;


use TransferWise\CollectionTrait;

/**
 * Class AddressesCollection
 *
 * @method Address current()
 *
 * @package TransferWise\Model\Addresses
 */
class AddressesCollection
{

    use CollectionTrait;

    /**
     * ProfilesCollection constructor.
     *
     * @param string $rawData Profiles data in json
     *
     * @throws \Exception
     */
    public function __construct($rawData)
    {
        $this->position = 0;
        $rawAddresses = json_decode($rawData, true);

        foreach ($rawAddresses as $rawAddress) {
            $this->collection[] = new Address($rawAddress);
        }
    }
}