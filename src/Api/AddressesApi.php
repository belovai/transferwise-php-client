<?php

namespace TransferWise\Api;


use TransferWise\ApiException;

/**
 * Class AddressesApi
 *
 * @package TransferWise\Api
 */
class AddressesApi extends AbstractApi implements AddressesApiInterface
{

    /**
     * List of addresses belonging to user profile.
     *
     * @param int $profileId
     *
     * @return string
     * @throws ApiException
     */
    public function getAll($profileId)
    {
        return $this->getApi("addresses", ['profile' => $profileId]);
    }

    /**
     * @param int $addressId
     *
     * @return string
     * @throws ApiException
     */
    public function getById($addressId)
    {
        return $this->getApi("addresses/" . $addressId);
    }


}