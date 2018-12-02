<?php

namespace Tests\Model\Addresses;

use Tests\TestCase;
use TransferWise\Model\Addresses\Address;

/**
 * Class AddressTest
 *
 * @package Tests\Model\Addresses
 */
class AddressTest extends TestCase
{
    /** @test */
    public function itConstructedWithArray()
    {
        $addressArray = [
            "id" => 1,
            "profile" => 2,
            "details" => [
                "country" => "GB",
                "firstLine" => "1st Some street",
                "postCode" => "A11AA",
                "city" => "London",
                "state" => null,
                "occupation" => "something"
            ]
        ];

        $address = new Address($addressArray);
        $this->assertEquals(1, $address->id);
        $this->assertEquals(2, $address->profile);
        $this->assertEquals("London", $address->details->city);
    }

    /** @test */
    public function itConstructedWithJson()
    {
        $addressJson = json_encode([
            "id" => 1,
            "profile" => 2,
            "details" => [
                "country" => "GB",
                "firstLine" => "1st Some street",
                "postCode" => "A11AA",
                "city" => "London",
                "state" => null,
                "occupation" => "something"
            ]
        ]);

        $address = new Address($addressJson);
        $this->assertEquals(1, $address->id);
        $this->assertEquals(2, $address->profile);
        $this->assertEquals("London", $address->details->city);
    }

    /** @test */
    public function itThrowsExceptionOnEmptyString()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Address creation');
        new Address('');
    }

    /** @test */
    public function itThrowsExceptionOnEmptyArray()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Address creation');
        new Address([]);
    }

    /** @test */
    public function itThrowsExceptionOnEmptyJsonArray()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Address creation');
        new Address('[]');
    }

    /** @test */
    public function itThrowsExceptionOnIncorrectJsonString()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Incorrect Address creation');
        new Address('123');
    }
}
