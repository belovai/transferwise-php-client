<?php

namespace TransferWise\Model\Profiles;


/**
 * Class AbstractProfileDetails
 *
 * @package TransferWise\Model\Profiles
 */
abstract class AbstractProfileDetails
{

    /**
     * AbstractProfileDetails constructor.
     *
     * @param array $properties
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