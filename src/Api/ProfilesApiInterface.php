<?php

namespace TransferWise\Api;

/**
 * Interface ProfilesApiInterface
 *
 * @package TransferWise\Api
 */
interface ProfilesApiInterface
{

    public function getAll();

    public function getById($profileId);
}