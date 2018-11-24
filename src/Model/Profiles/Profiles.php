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
     */
    public function getAll()
    {
        $profiles = $this->api->getAll();
        $profilesCollection = new ProfilesCollection($profiles);

        return $profilesCollection;
    }

}