<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Acceptance\MainContext\RentModule\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;
use QuiqueGilB\GrowPro\Tests\Acceptance\MainContext\RentModule\Book;

final class PostBikeAcceptanceTest extends ApiTestCase
{
    public function testPostBike(): void
    {
        $body = json_encode(['bike_id' => Uuid::v4()->value, 'type' => 'electric', 'plan' => 'basic'], JSON_THROW_ON_ERROR);

        $response = self::createClient()->request('POST', '/api/bikes', [
            'body' => $body,
            'headers'=> [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
        $this->assertEmpty($response->getContent());
    }
}
