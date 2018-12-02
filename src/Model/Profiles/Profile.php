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
     * @var int Profile id
     */
    public $id;

    /**
     * @var string Profile type (personal or business)
     */
    public $type;

    /**
     * @var ProfileDetailsPersonal|ProfileDetailsBusiness
     */
    public $details;

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