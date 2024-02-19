<?php

namespace App\Utils;

use App\Exceptions\NotAbleToGetDataException;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

final class PornstarsDataService
{
    public const PORNSTARS_URL = 'http://www.pornhub.com/files/json_feed_pornstars.json';

    public function getPornstars(): array
    {

        $cachedData = Cache::get('pornstar_data');
        if ($cachedData) {
            return $cachedData;
        }

        try {
            $response = Http::get(self::PORNSTARS_URL);
            $decodedResponse = json_decode($response->body(), true);
        } catch (Exception $exception) {
            throw NotAbleToGetDataException::create($exception->getMessage());
        }

        Cache::put('pornstar_data', $decodedResponse, now()->addDay(1));

        return $decodedResponse;
    }
}
