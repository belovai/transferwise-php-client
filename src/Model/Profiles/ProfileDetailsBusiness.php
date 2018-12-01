<?php

namespace TransferWise\Model\Profiles;


/**
 * Class ProfileDetailsBusiness
 *
 * @package TransferWise\Model\Profiles
 */
class ProfileDetailsBusiness extends AbstractProfileDetails
{

    /**
     * @var string Business name
     */
    public $name;

    /**
     * @var string Business registration number
     */
    public $registrationNumber;

    /**
     * @var string Australian Company Number (only for AUS businesses)
     */
    public $acn;

    /**
     * @var string Australian Business Nnumber (only for AUS businesses)
     */
    public $abn;

    /**
     * @var string Australian Registered Body Number (only for AUS businesses)
     */
    public $arbn;

    /**
     * @var string Companu legal form
     */
    public $companyType;

    /**
     * @var string Role of person
     */
    public $companyRole;

    /**
     * @var string Sector / field of activity
     */
    public $descriptionOfBusiness;

    /**
     * @var string Business website
     */
    public $webpage;

    /**
     * @var int Address object id
     */
    public $primaryAddress;
}