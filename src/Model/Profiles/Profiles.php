<?php

namespace TransferWise\Model\Profiles;

use TransferWise\Model\Api\ProfilesApi;
use TransferWise\TransferWiseConfig;

/**
 * Class Profiles
 *
 * @package TransferWise\Model
 */
class Profiles
{

    /**
     * @var TransferWiseConfig
     */
    protected $config;

    /**
     * @var ProfilesApi
     */
    protected $api;

    /**
     * Profiles constructor.
     *
     * @param TransferWiseConfig $config
     */
    public function __construct(TransferWiseConfig $config)
    {
        $this->config = $config;
        $this->api = new ProfilesApi($this->config);
    }

    /**
     * List of all profiles belonging to user.
     *
     * @return ProfilesCollection
     * @throws \TransferWise\ApiException
     * @throws \Exception
     */
    public function getAll()
    {
        $profiles = $this->api->getAll();
        $profilesCollection = new ProfilesCollection($profiles);

        return $profilesCollection;
    }

    /**
     * Get profile info by id.
     *
     * @param int $profileId
     *
     * @return Profile
     * @throws \TransferWise\ApiException
     * @throws \Exception
     */
    public function getById($profileId)
    {
        $rawProfile = $this->api->getById($profileId);

        return new Profile($rawProfile);
    }

}