<?php

namespace TransferWise\Model\Profiles;


/**
 * Class ProfileDetailsPersonal
 *
 * @package TransferWise\Model\Profiles
 */
class ProfileDetailsPersonal extends AbstractProfileDetails
{

    /**
     * @var string First name
     */
    public $firstName;

    /**
     * @var string Last name
     */
    public $lastName;

    /**
     * @var string Date of birth (YYYY-MM-DD)
     */
    public $dateOfBirth;

    /**
     * @var string Phone number
     */
    public $phoneNumber;

    /**
     * @var string Link to person avatar image
     */
    public $avatar;

    /**
     * @var string Person occupation
     */
    public $occupation;

    /**
     * @var int Address object id
     */
    public $primaryAddress;

}