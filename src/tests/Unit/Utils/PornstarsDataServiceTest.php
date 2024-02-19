<?php

namespace Tests\Unit;

use App\Exceptions\NotAbleToGetDataException;
use App\Utils\PornstarsDataService;
use Exception;
use Faker\Calculator\Ean;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PornstarsDataServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_the_data_from_request(): void
    {
        //Arrange
        $data = [
            'id' => '1',
            'name' => 'testName',
        ];

        Cache::shouldReceive('get')->with('pornstar_data')->andReturnNull();
        Http::k([PornstarsDataService::PORNSTARS_URL => Http::response(json_encode($data))]);
        Cache::shouldReceive('put');

        //Act
        $service = new PornstarsDataService();
        $result = $service->getPornstars();

        //Assert
        self::assertNotEmpty($result);
        self::assertSame($data, $result);
    }

    /**
     * @test
     */
    public function it_should_get_data_from_cache(): void
    {
        //Arrange
        $data = [
            'id' => '1',
            'name' => 'testName',
        ];

        Cache::shouldReceive('get')->with('pornstar_data')->andReturn($data);

        //Act
        $service = new PornstarsDataService();
        $result = $service->getPornstars();

        //Assert
        self::assertNotEmpty($result);
        self::assertSame($data, $result);
    }

    /**
     * @test
     */
    public function it_should_throw_exception()
    {
        //Assert
        $this->expectException(NotAbleToGetDataException::class);

        //Arrange
        Cache::shouldReceive('get')->with('pornstar_data')->andReturnNull();
        Http::shouldReceive('get')->andThrow(new Exception('Test Exception'));

        //Act
        $service = new PornstarsDataService();
        $service->getPornstars();
    }
}
