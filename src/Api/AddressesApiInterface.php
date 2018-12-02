<?php

namespace TransferWise\Api;

/**
 * Interface AddressesApiInterface
 *
 * @package TransferWise\Api
 */
interface AddressesApiInterface
{

    public function getAll($profileId);
}