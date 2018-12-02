<?php

namespace TransferWise\Model\Profiles;

use TransferWise\Api\ProfilesApiInterface;
use TransferWise\Api\ProfilesApi;
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
     * @var ProfilesApiInterface
     */
    protected $api;

    /**
     * Profiles constructor.
     *
     * @param TransferWiseConfig        $config
     * @param ProfilesApiInterface|null $api
     */
    public function __construct(TransferWiseConfig $config, ProfilesApiInterface $api = null)
    {
        $this->config = $config;
        $this->api = $api ?: new ProfilesApi($this->config);
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