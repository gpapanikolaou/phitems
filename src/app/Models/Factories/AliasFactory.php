<?php

namespace App\Models\Factories;

use App\Models\PornstarAlias;

final class AliasFactory
{
    public static function fromResponse(string $alias): PornstarAlias
    {
        return new PornstarAlias($alias);
    }

    /**
     * list<PornstarAlias>
     */
    public static function fromResponseArray(array $aliases): array
    {
        $aliasesResult = [];
        foreach ($aliases as $alias) {
            $aliasesResult[] = self::fromResponse($alias);
        }
        return $aliasesResult;
    }
}
