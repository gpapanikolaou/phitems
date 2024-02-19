<?php

namespace App\Models\Factories;


use App\Models\Pornstar;

class PornstarFactory
{

 public static function fromResponse(array $response) : Pornstar
 {

    return new Pornstar(
        $response['id'],
        $response['name'],
        $response['license'],
        $response['wlStatus'],
        $response['link'],
        $response['attributes'] !== [] ? AttributesFactory::fromResponse($response['attributes']) :null,
        isset($response['attributes']['stats']) && !empty($response['attributes']['stats'])  ? StatsFactory::fromResponse($response['attributes']['stats']) :null,
        $response['thumbnails'] !== [] ? ThumbnailFactory::fromResponseArray($response['thumbnails']) : [],
        $response['aliases'] !== [] ? AliasFactory::fromResponseArray($response['aliases']) : []
    );

 }

}