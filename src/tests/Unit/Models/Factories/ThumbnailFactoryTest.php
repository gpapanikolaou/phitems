<?php

namespace Tests\Unit;

use App\Models\Factories\ThumbnailFactory;
use App\Models\PornstarThumbnails;
use PHPUnit\Framework\TestCase;

class ThumbnailFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_thumbnail(): void
    {
        //Arrange
        $thumbnail = [
            'height' => '200',
            'width' => '200',
            'type' => 'pc',
            'urls' => ['https://test.com'],
        ];

        //Act
        $result = ThumbnailFactory::fromResponse($thumbnail);

        //Assert
        self::assertContainsOnlyInstancesOf(PornstarThumbnails::class, [$result]);
    }

    /**
     * @test
     */
    public function it_should_create_multiple_thumbnails(): void
    {
        //Arrange
        $thumbnail = [
            [
                'height' => '200',
                'width' => '200',
                'type' => 'pc',
                'urls' => ['https://test.com'],
            ],
            [
                'height' => '200',
                'width' => '200',
                'type' => 'pc',
                'urls' => ['https://test1.com'],
            ],
            [
                'height' => '200',
                'width' => '200',
                'type' => 'pc',
                'urls' => ['https://test2.com'],
            ],
        ];

        //Act
        $result = ThumbnailFactory::fromResponseArray($thumbnail);

        //Assert
        self::assertContainsOnlyInstancesOf(PornstarThumbnails::class, $result);
    }
}
