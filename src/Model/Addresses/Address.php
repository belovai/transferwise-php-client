<?php

namespace TransferWise\Model\Addresses;


/**
 * Class Address
 *
 * @package TransferWise\Model\Addresses
 */
class Address
{

    /**
     * @var int Address id
     */
    public $id;

    /**
     * @var int User profile id
     */
    public $profile;

    /**
     * @var AddressDetails
     */
    public $details;

    /**
     * Address constructor.
     *
     * @param array|string $addressData
     */
    public function __construct($addressData)
    {
        $addressData = $this->validate($addressData);

        $this->id = $addressData['id'];
        $this->profile = $addressData['profile'];
        $this->details = new AddressDetails($addressData['details']);
    }

    /**
     * @param string|array $addressData
     *
     * @return array
     */
    protected function validate($addressData)
    {
        if (is_array($addressData) && empty($addressData)) {
            throw new \InvalidArgumentException('Incorrect Address creation');
        }

        if (is_string($addressData) && ! ($addressData = json_decode($addressData, true))) {
            throw new \InvalidArgumentException('Incorrect Address creation');
        }

        if (! is_array($addressData) || empty($addressData)) {
            throw new \InvalidArgumentException('Incorrect Address creation');
        }
        return $addressData;
    }
}