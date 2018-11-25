<?php

namespace TransferWise\Model\Profiles;


/**
 * Class Profile
 *
 * @package TransferWise\Model\Profiles
 */
class Profile
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var object
     */
    protected $details;

    /**
     * Profile constructor.
     *
     * @param array|string $profileData
     *
     * @throws \Exception
     */
    public function __construct($profileData)
    {
        $profileData = $this->validate($profileData);

        $this->id = $profileData['id'];
        $this->type = $profileData['type'];
        $this->details = (object)$profileData['details'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return object
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param $profileData
     *
     * @return array
     */
    protected function validate($profileData)
    {
        if (is_array($profileData) && empty($profileData)) {
            throw new \InvalidArgumentException('Incorrect Profile creation');
        }

        if (is_string($profileData) && ! ($profileData = json_decode($profileData, true))) {
            throw new \InvalidArgumentException('Incorrect Profile creation');
        }

        if (! is_array($profileData) || empty($profileData)) {
            throw new \InvalidArgumentException('Incorrect Profile creation');
        }
        return $profileData;
    }

}