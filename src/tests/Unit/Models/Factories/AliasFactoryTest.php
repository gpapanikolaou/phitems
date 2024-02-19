<?php

namespace Tests\Unit\Models\Factories;

use App\Models\Factories\AliasFactory;
use App\Models\PornstarAlias;
use PHPUnit\Framework\TestCase;

class AliasFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_an_alias(): void
    {
        //Arrange
        $alias = 'I am an alias';

        //Act
        $result = AliasFactory::fromResponse($alias);

        //Assert
        self::assertInstanceOf(PornstarAlias::class, $result);
        self::assertSame($alias, $result->alias);
    }

    /**
     * @test
     */
    public function it_should_create_multiple_aliases(): void
    {
        //Arrange
        $alias1 = 'I am an alias';
        $alias2 = 'I am another alias';
        $alias3 = 'I am the last alias';

        //Act
        $result = AliasFactory::fromResponseArray([$alias1, $alias2, $alias3]);

        //Assert
        self::assertContainsOnlyInstancesOf(PornstarAlias::class, $result);
        self::assertCount(3, $result);
        self::assertSame($alias1, $result[0]->alias);
        self::assertSame($alias2, $result[1]->alias);
        self::assertSame($alias3, $result[2]->alias);
    }
}
