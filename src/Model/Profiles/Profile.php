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
     * @const string Personal Profile Type
     */
    const TYPE_PERSONAL = "personal";

    /**
     * @const string Personal Profile Type
     */
    const TYPE_BUSINESS = "business";

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var ProfileDetailsPersonal|ProfileDetailsBusiness
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

        if ($this->type == self::TYPE_PERSONAL) {
            $this->details = new ProfileDetailsPersonal($profileData['details']);
        } else {
            $this->details = new ProfileDetailsBusiness($profileData['details']);
        }
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
     * @return ProfileDetailsPersonal|ProfileDetailsBusiness
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