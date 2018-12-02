<?php

namespace TransferWise\Api;


use TransferWise\ApiException;

/**
 * Class ProfilesApi
 *
 * @package TransferWise\Model\Api
 */
class ProfilesApi extends AbstractApi implements ProfilesApiInterface
{

    /**
     * List of all profiles belonging to user.
     *
     * @return string
     * @throws ApiException
     */
    public function getAll()
    {
        return $this->callApi("profiles");
    }

    /**
     * Get profile info by id.
     *
     * @param int $profileId
     *
     * @return string
     * @throws ApiException
     */
    public function getById($profileId)
    {
        return $this->callApi("profiles/" . $profileId);
    }
}