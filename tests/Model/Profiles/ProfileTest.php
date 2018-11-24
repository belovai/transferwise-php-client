<?php

namespace Tests\Model\Profiles;

use Tests\TestCase;
use TransferWise\Model\Profiles\Profile;

/**
 * Class ProfileTest
 *
 * @package Tests\Model\Profiles
 */
class ProfileTest extends TestCase
{

    /** @test */
    public function itConstructedWithArray()
    {
        $profileArray = [
            "id" => 1,
            "type" => "personal",
            "details" => [
                "firstName" => "Jon",
                "lastName" => "Doe",
                "dateOfBirth" => "1984-11-15",
                "phoneNumber" => "+123456789",
                "avatar" => null,
                "occupation" => null,
                "primaryAddress" => 2
            ]
        ];
        $profile = new Profile($profileArray);
        $this->assertEquals(1, $profile->getId());
        $this->assertEquals("personal", $profile->getType());
        $this->assertEquals("Doe", $profile->getDetails()->lastName);
    }
}
