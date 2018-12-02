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
        $this->assertEquals(1, $profile->id);
        $this->assertEquals("personal", $profile->type);
        $this->assertEquals("Doe", $profile->details->lastName);
    }

    /** @test */
    public function itConstructedWithJson()
    {
        $profileJson = json_encode([
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
        ]);
        $profile = new Profile($profileJson);
        $this->assertEquals(1, $profile->id);
        $this->assertEquals("personal", $profile->type);
        $this->assertEquals("Doe", $profile->details->lastName);
    }

    /** @test */
    public function itThrowsExceptionOnEmptyString()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Profile creation');
        new Profile('');
    }

    /** @test */
    public function itThrowsExceptionOnEmptyArray()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Profile creation');
        new Profile([]);
    }

    /** @test */
    public function itThrowsExceptionOnEmptyJsonArray()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Profile creation');
        new Profile('[]');
    }

    /** @test */
    public function itThrowsExceptionOnIncorrectJsonString()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Profile creation');
        new Profile('123');
    }
}
