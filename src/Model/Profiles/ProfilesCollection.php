<?php

namespace TransferWise\Model\Profiles;


use TransferWise\CollectionTrait;

/**
 * Class ProfilesCollection
 *
 * @method Profile current()
 *
 * @package TransferWise\Model\Profiles
 */
class ProfilesCollection implements \Iterator
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
        $rawProfiles = json_decode($rawData, true);

        foreach ($rawProfiles as $rawProfile) {
            $this->collection[] = new Profile($rawProfile);
        }
    }
}