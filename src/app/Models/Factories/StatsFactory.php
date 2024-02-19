<?php

namespace App\Models\Factories;

use Illuminate\Database\Eloquent\Model;
use App\Models\PornstarStats;


final class StatsFactory
{

    public static function fromResponse(array $response) : PornstarStats
    {        
        return new PornstarStats(
            $response['subscriptions'],
            $response['monthlySearches'],
            $response['views'],
            $response['videosCount'],
            $response['premiumVideosCount'],
            $response['whiteLabelVideoCount'],
            $response['rank'],
            $response['rankPremium'],
            $response['rankWl'],
        );
    }


}