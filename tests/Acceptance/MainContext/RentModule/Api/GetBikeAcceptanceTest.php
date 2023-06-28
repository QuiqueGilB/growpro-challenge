<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Acceptance\MainContext\RentModule\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Doctrine\ORM\EntityManagerInterface;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\View\BikeView;
use QuiqueGilB\GrowPro\Tests\Acceptance\MainContext\RentModule\Book;
use QuiqueGilB\GrowPro\Tests\Shared\Stub\BikeStub;

final class GetBikeAcceptanceTest extends ApiTestCase
{
    private BikeStub $bikeStub;
    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $this->bikeStub = new BikeStub();
        $this->entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testGetBike(): void
    {
        $bike = $this->bikeStub->stub();
        $this->entityManager->persist($bike);
        $this->entityManager->flush();

        $response = self::createClient()->request('GET', '/api/bikes', [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
    }
}
