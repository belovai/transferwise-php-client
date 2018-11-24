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
     * @param array $profileData
     */
    public function __construct($profileData)
    {
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

}