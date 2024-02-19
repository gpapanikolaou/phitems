<?php

namespace Tests\Unit;

use App\Models\Factories\PornstarFactory;
use App\Models\Pornstar;
use App\Models\PornstarAlias;
use App\Models\PornstarAttributes;
use App\Models\PornstarStats;
use App\Models\PornstarThumbnails;
use PHPUnit\Framework\TestCase;

class PornstarFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_pornstar(): void
    {
        //Arrange
        $pornstar = [
            'id' => '1',
            'name' => 'test',
            'license' => 'testLicense',
            'wlStatus' => '1',
            'link' => 'https://www.example.com',
            'attributes' => [
                'hairColor' => 'black',
                'ethnicity' => 'greek',
                'tattoos' => false,
                'piercings' => false,
                'breastSize' => '30',
                'breastType' => 'A',
                'gender' => 'female',
                'orientation' => 'straight',

                'stats' => [
                    'subscriptions' => 1,
                    'monthlySearches' => 1,
                    'views' => 1,
                    'videosCount' => 1,
                    'premiumVideosCount' => 1,
                    'whiteLabelVideoCount' => 1,
                    'rank' => 1,
                    'rankPremium' => 1,
                    'rankWl' => 1,
                ],
            ],
            'thumbnails' => [
                [
                    'height' => 200,
                    'width' => 200,
                    'type' => 'pc',
                    'urls' => ['https:www.example.com'],
                ],
            ],
            'aliases' => ['test'],
        ];

        //Act
        $result = PornstarFactory::fromResponse($pornstar);

        //Assert
        self::assertInstanceOf(Pornstar::class, $result);
        self::assertInstanceOf(Pornstar::class, $result);
        self::assertSame($pornstar['id'], $result->id);
        self::assertSame($pornstar['name'], $result->name);
        self::assertSame($pornstar['license'], $result->license);
        self::assertSame($pornstar['wlStatus'], $result->wlStatus);
        self::assertSame($pornstar['link'], $result->link);
        self::assertInstanceOf(PornstarAttributes::class, $result->attributes);
        self::assertInstanceOf(PornstarStats::class, $result->stats);
        self::assertInstanceOf(PornstarThumbnails::class, $result->thumbnails[0]);
        self::assertInstanceOf(PornstarAlias::class, $result->aliases[0]);
    }

    /**
     * @test
     */
    public function it_should_create_a_pornstar_with_empty_arrays(): void
    {
        //Arrange
        $pornstar = [
            'id' => '1',
            'name' => 'test',
            'license' => 'testLicense',
            'wlStatus' => '1',
            'link' => 'https://www.example.com',
            'attributes' => [],
            'thumbnails' => [],
            'aliases' => [],
        ];

        //Act
        $result = PornstarFactory::fromResponse($pornstar);

        //Assert
        self::assertInstanceOf(Pornstar::class, $result);
        self::assertSame($pornstar['id'], $result->id);
        self::assertSame($pornstar['name'], $result->name);
        self::assertSame($pornstar['license'], $result->license);
        self::assertSame($pornstar['wlStatus'], $result->wlStatus);
        self::assertSame($pornstar['link'], $result->link);
        self::assertNull($result->attributes);
        self::assertNull($result->stats);
        self::assertEmpty($result->thumbnails);
        self::assertEmpty($result->aliases);
    }
}
