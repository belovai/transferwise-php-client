<?php

namespace TransferWise\Model\Addresses;

/**
 * Class AddressDetails
 *
 * @package TransferWise\Model\Addresses
 */
class AddressDetails
{

    /**
     * @var string 2 digit ISO country code
     */
    public $country;

    /**
     * @var string Address line: street, house, apartment
     */
    public $firstLine;

    /**
     * @var string Zip code
     */
    public $postCode;

    /**
     * @var string City name
     */
    public $city;

    /**
     * @var string State code. Required if country is US, CA, AU, BR
     */
    public $state;

    /**
     * @var string User occupation. Required for US, CA, JP
     */
    public $occupation;

    /**
     * AddressDetails constructor.
     *
     * @param $properties
     */
    public function __construct($properties)
    {
        foreach ($properties as $propertyName => $property) {
            if (property_exists($this, $propertyName)) {
                $this->$propertyName = $property;
            }
        }
    }
}